<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/lib/Utility.php');
require_once(APPPATH.'libraries/lib/config.php');
error_reporting(0);
class Welcome extends CI_Controller {

	public function index(){
		$this->load->view('home');
	}

	

	public function login()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function getProgramData()
	{
		$getclasD =  $this->Common_model->GetData("class_prog_mapping","class,program_id","class='".$_POST['class']."'","","","","1");
	if(!empty($getclasD->program_id))
	{
		$pid = $getclasD->program_id;
	}
	else {
		$pid = 0;
	}
	$getProgram =  $this->Common_model->GetData("student_program","program_name","id IN($pid)","","","","");
	foreach($getProgram as $getProgramRow) {
		$Hdata = "<li><label><b><input name='program_name[]' type='checkbox' class'form-control' value=".$getProgramRow->program_name." id='geproc'>$getProgramRow->program_name</label></b></li>";
     // $Hdata = "<option value=".$getProgramRow->program_name.">$getProgramRow->program_name</option>";
      echo  $Hdata;       
              }   
         exit;     
	}

	public function register()
	{
		$getSchool =  $this->Common_model->get_data("mst_schools","","","","school_name");
		$getclass =  $this->Common_model->get_data("class_prog_mapping","","","","");
		$data_array=array("title"=>"adcc academy| EPAY",'getSchool'=>$getSchool,'getclass'=>$getclass);
		$this->load->view('header');
		$this->load->view('register',$data_array);
		$this->load->view('footer');
	}

	public function student_login()
	{
		//print_r($_POST);exit;
		$cond = "mobile='".$_POST['mobile']."'";
		$getData = $this->Common_model->GetData('student_reg','',$cond,'','','','1');
		if(!empty($getData))
		{
			$otp = rand(100000,999999); 
			$adata = array("otp" => $otp);
			$this->Common_model->SaveData('student_reg',$adata,"mobile='".$_POST['mobile']."'");
			redirect(site_url('otp-verify'));		
		}
		else {
			echo "<script>alert('Your mobile number does not exist. Please try again.');</script>";
			redirect('login');
		}
		
		
	}
	public function otp_verify()
	{
		$this->load->view('header');
		$this->load->view('otp');
		$this->load->view('footer');
	}

	public function otp_verification()
	{
		$cond = "otp='".$_POST['otp']."'";
		$getData = $this->Common_model->GetData('student_reg','',$cond,'','','','1');
		if (!empty($getData)) {
			$_SESSION['adccepay'] = $getData;
			redirect(site_url('dashboard'));
		}
		else {
			echo "<script>alert('OTP is incorrect. Please try again')</script>";
			redirect(site_url('login'));
		}
	}
	
	public function order_pay()
	{
		if(!empty($_POST['transactionId']) && !empty($_POST['amount']))
		{
			$transactionId = $_POST['transactionId'];
			$amount = $_POST['amount'];

			// check if record already exists
			$existing = $this->Common_model->GetData(
				'student_fee_details',
				'',
				"transation_id='".$transactionId."'",
				'',
				'',
				'',
				'1'
			);

			if(empty($existing)) {
				$data_Arr = array(
					'student_id'     => $_SESSION['adccepay']->id,
					'program'        => $_SESSION['adccepay']->program ?? '',
					'fee_amt'        => $amount,
					'mobile'         => $_SESSION['adccepay']->mobile,
					'transation_id'  => $transactionId,
					'payment_status' => ($statusCode == 'OTS0000') ? 'Success' : 'Failed',
					'created'        => date("Y-m-d H:i:s"),
					'modified'       => date("Y-m-d H:i:s")
				);
				$this->Common_model->SaveData('student_fee_details', $data_Arr);
			}

			// redirect to actual AtomPay page or process view
			$data = [
				'transactionId' => $transactionId,
				'amount' => $amount
			];
			$this->load->view('process-pay', $data);
		}
		else {
			redirect('dashboard');
		}
	}

	public function dashboard()
	{
		if (!empty($_SESSION['adccepay'])) 
		{
			$getData = $this->Common_model->GetData(
				'student_reg',
				'',
				"id='".$_SESSION['adccepay']->id."'",
				'',
				'',
				'',
				'1'
			);

			

			$transactionId = sprintf("%06d", mt_rand(1, 999999));
			$payUrl = "https://caller.atomtech.in/ots/aipay/auth";
            $amount = $this->input->post('amount');
			$amount = $_POST['amount'] ?? null;

			if (empty($amount) || $amount >= 100) {
				$amount = 100; // default amount
			}

			$this->load->library("AtompayRequest", array(
				"Login" => "446442",
				"Password" => "Test@123",
				"ProductId" => "NSE",
				"Amount" => $amount,
				"TransactionCurrency" => "INR",
				"TransactionAmount" => $amount,
				"ReturnUrl" => base_url("welcome/response"),
				"ClientCode" => "007",
				"TransactionId" => $transactionId,
				"CustomerEmailId" => $getData->email ?? "test@example.com",
				"CustomerMobile" => $getData->mobile,
				"CustomerAccount" => "639827",
				"url" => $payUrl,
				"RequestEncypritonKey" => "A4476C2062FFA58980DC8F79EB6A799E",
				"ResponseDecryptionKey" => "75AEF0FA1B94B3C10D4F5B268F757F11",
			));

			$atomTokenId = $this->atompayrequest->payNow();
            $insertData = array(
            'student_id'     => $getData->id,
            'program'        => $getData->program,
            'fee_amt'        => $amount,
            'mobile'         => $getData->mobile,
            'transation_id'  => $transactionId, // spelling same rakho
            'payment_status' => 'Pending',
            'created'        => date("Y-m-d H:i:s"),
            'modified'       => date("Y-m-d H:i:s")
        );
        $this->Common_model->SaveData('student_fee_details', $insertData);
			

			$data = array(
				'studentfeeD'   => $getData,
				'atomTokenId'   => $atomTokenId,
				'transactionId' => $transactionId,
				'amount'        => $amount
			);

			$this->load->view('header');
			$this->load->view('dashboard', $data);
			$this->load->view('footer');
		} 
		else {
			redirect(site_url('dashboard'));
		}
	}

	public function response()
	{
		$this->load->library("AtompayResponse", array(
			"data" => $_POST['encData'],
			"merchId" => $_POST['merchId'],
			"ResponseDecryptionKey" => "75AEF0FA1B94B3C10D4F5B268F757F11",
		));

		$responseArr = $this->atompayresponse->decryptResponseIntoArray();

		$statusCode     = $responseArr['responseDetails']['statusCode'];
		$transactionId  = $responseArr['merchDetails']['merchTxnId'];   // Atom ka txn id
		$transactionDate= $responseArr['merchDetails']['merchTxnDate'];
		$bankTxnId      = $responseArr['payModeSpecificData']['bankDetails']['bankTxnId'];

		// DB save/update
		$data_Arr = array(
			'bank_trans_id'  => $bankTxnId,
			'payment_status' => ($statusCode == 'OTS0000') ? 'Success' : 'Failed',
			'payment_date'   => $transactionDate,
			'modified'       => date("Y-m-d H:i:s"),
		);

	
		$this->Common_model->SaveData(
			'student_fee_details',
			$data_Arr,
			"transation_id='".$transactionId."'"   // fix spelling
		);

		if ($statusCode == 'OTS0000') {
			redirect('payment-history');
		} else {
			$this->session->set_flashdata('error', 'Payment failed, please try again.');
			redirect('dashboard');
		}
	}


	

	
	public function resstatus()
	{
		print_r($_REQUEST);exit;
	}
	
	public function logout()
	{
		unset($_SESSION['adccepay']);
		redirect(site_url('login'));
	}
	
	public function save_registration_data()
	{
		$pp = implode(",",$_POST['program_name']);
		$name = trim($_POST['name']);
		$mobile = trim($_POST['mobile']);
		$school = trim($_POST['school']);
		$program_name = $_POST['program_name'];
		$class = trim($_POST['class']);
		$academic_sess = trim($_POST['academic_sess']);
		$cond = "mobile='".$_POST['mobile']."'";
		$getData = $this->Common_model->GetData('student_reg','',$cond,'','','','1');
		if(empty($getData)) { 
		$otp = rand(100000,999999); 
			
	        $arrayR = array('name' => $name,'mobile'=>$mobile,'school'=>$school,'program'=>$pp,'class'=>$class,'otp'=>$otp,'session'=>$academic_sess);
		    $this->Common_model->SaveData('student_reg',$arrayR);
	    	redirect(site_url('otp-verify'));
	    } else {
	    	echo "<script>alert('Your Mobile No Already exist!');</script>";
	    	redirect('login');
	    }
		
	}

	public function payment_history()
	{

		if(!empty($_SESSION['adccepay']))
		{
			$getData = $this->Common_model->GetData('student_fee_details','',"student_id='".$_SESSION['adccepay']->id."'",'','','','');
			$data['studentfeeD'] = $getData;
			$this->load->view('header');
			$this->load->view('payment-history',$data);
			$this->load->view('footer');	
		}
		else {
			redirect(site_url('dashboard'));
		}	
	}

	public function payment_invoice($sid)
	{
		if(!empty($_SESSION['adccepay']))
		{
			$getData = $this->Common_model->GetData('student_fee_details','',"id='".$sid."'",'','','','1');
			$getSchData = $this->Common_model->GetData('student_reg','',"id='".$getData->student_id."'",'','','','1');
			$getAmountNumber = $this->convert_number($getData->fee_amt);
			$data['studentfeeD'] = $getData;
			$data['school'] = $getSchData;
			$data['word'] = $getAmountNumber;
			$this->load->view('header');
			$this->load->view('invoice',$data);
			$this->load->view('footer');	
		}
		else {
			redirect(site_url('login'));
		}
	}	

	public function about_us()
	{
		$this->load->view('header');
		$this->load->view('about-us');
		$this->load->view('footer');
	}

	public function contact_us()
	{
		$this->load->view('header');
		$this->load->view('contact-us');
		$this->load->view('footer');
	}
	public function term_condition()
	{
		$this->load->view('header');
		$this->load->view('term-condition');
		$this->load->view('footer');
	}
	public function privacy_policy()
	{
		$this->load->view('header');
		$this->load->view('privacy-policy');
		$this->load->view('footer');
	}
	public function cancalation_refund_policy()
	{
		$this->load->view('header');
		$this->load->view('refund-policy');
		$this->load->view('footer');
	}
		

		public function getStudentAjax()
		{
			if($_POST['school'])
			{
				$data_array['getStudent'] =  $this->Common_model->get_data("mgs_employees","school='".$_POST['school']."' and status='Active'");
				$this->load->view('append_student',$data_array);
			}else
			{
				echo "1";exit;
			}
		}
	}