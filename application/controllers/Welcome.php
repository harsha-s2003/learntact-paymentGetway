<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/lib/Utility.php');
require_once(APPPATH.'libraries/lib/config.php');
error_reporting(0);
class Welcome extends CI_Controller {

	public function index(){
		$this->load->view('home');
	}

	// public function index()
	// {
	// 	// Generate random transaction ID
    //     $transactionId = sprintf("%06d", mt_rand(1, 999999));
        
    //     // NDPS Payment URL
    //     $payUrl = "https://caller.atomtech.in/ots/aipay/auth";
    //     $amount = "50.00"; 
        
    //     // Load NDPS Atom Library
    //     $this->load->library("AtompayRequest", array(
    //         "Login" => "446442",
    //         "Password" => "Test@123",
    //         "ProductId" => "NSE",
    //         "Amount" => $amount,
    //         "TransactionCurrency" => "INR",
    //         "TransactionAmount" => $amount,
    //          "ReturnUrl" => base_url("paymentdemo/confirm"),
    //         "ClientCode" => "007",
    //         "TransactionId" => $transactionId,
    //         "CustomerEmailId" => "atomdev@gmail.com",
    //         "CustomerMobile" => "8888888888",
    //         "udf1" => "Atom Dev",
    //         "udf2" => "Andheri Mumbai",
    //         "udf3" => "udf3",
    //         "udf4" => "udf4",
    //         "udf5" => "udf5",
    //         "CustomerAccount" => "639827",
    //         "url" => $payUrl,
    //         "RequestEncypritonKey" => "A4476C2062FFA58980DC8F79EB6A799E",
    //         "ResponseDecryptionKey" => "75AEF0FA1B94B3C10D4F5B268F757F11",
    //     ));
        
    //     // Data to pass to view
    //     $data = array(
    //         'atomTokenId'   => $this->atompayrequest->payNow(),
    //         'transactionId' => $transactionId,
    //         'amount'        => $amount
    //     );
        
    //     // Load your main dashboard view instead of home.php
    //    $this->load->view('dashboard', $data);


	   

    // }
    
    // NDPS Payment Response
    public function response()
    {
        $this->load->library("AtompayResponse", array(
            "data" => $_POST['encData'],
            "merchId" => $_POST['merchId'],
            "ResponseDecryptionKey" => "75AEF0FA1B94B3C10D4F5B268F757F11",
        ));
        
        $response = $this->atompayresponse->decryptResponseIntoArray();
        
        echo "Transaction Result: ".$response['responseDetails']['statusCode']."<br><br>";
        echo "Merchant Transaction Id: ".$response['merchDetails']['merchTxnId']."<br><br>";
        echo "Transaction Date: ".$response['merchDetails']['merchTxnDate']."<br><br>";
        echo "Bank Transaction Id: ".$response['payModeSpecificData']['bankDetails']['bankTxnId']."<br><br>";
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
	if(!empty($_POST['TxnRefNo']))
	{
		$data_Arr = array('program' => $_POST['program'], 'fee_amt'=>$_POST['Amount'],'student_id'=>$_SESSION['adccepay']->id,'mobile'=>$_SESSION['adccepay']->mobile,'transation_id'=>$_POST['TxnRefNo']);
		$this->Common_model->SaveData('student_fee_details',$data_Arr);
		$this->load->view('header');
		$this->load->view('process-pay');
		$this->load->view('footer');
	}
	else {
		redirect('dashboard');
	}
}



public function dashboard()
{
	
	if(!empty($_SESSION['adccepay']))
	{
		$getData = $this->Common_model->GetData('student_reg','',"id='".$_SESSION['adccepay']->id."'",'','','','1');
		// $data['studentfeeD'] = $getData;
		// $this->load->view('header');
		// $this->load->view('dashboard',$data);
		// $this->load->view('footer');
		  {
        
          $transactionId =  sprintf("%06d", mt_rand(1, 999999));
          $payUrl = "https://caller.atomtech.in/ots/aipay/auth";
          $amount = "50.00"; 
         
          $this->load->library("AtompayRequest",array(
                    "Login" => "446442",
                    "Password" => "Test@123",
                    "ProductId" => "NSE",
                    "Amount" => $amount,
                    "TransactionCurrency" => "INR",
                    "TransactionAmount" => $amount,
                    "ReturnUrl" => base_url("paymentdemo/confirm"),
                    "ClientCode" => "007",
                    "TransactionId" => $transactionId,
                    "CustomerEmailId" => "sagar.gopale@atomtech.in",
                    "CustomerMobile" => "8976286911",
                    "udf1" => "Atom Dev", // optional udf1
                    "udf2" => "Andheri Mumbai", // optional udf2
                    "udf3" => "udf3", // optional udf3
                    "udf4" => "udf4", // optional udf4
                    "udf5" => "udf5", // optional udf5
                    "CustomerAccount" => "639827",
                    "url" => $payUrl,
                    "RequestEncypritonKey" => "A4476C2062FFA58980DC8F79EB6A799E",
                    "ResponseDecryptionKey" => "75AEF0FA1B94B3C10D4F5B268F757F11",
            ));
        
        // Merge all data into one array
        $data = array(
            'studentfeeD'   => $getData,
            'atomTokenId'   => $this->atompayrequest->payNow(),
            'transactionId' => $transactionId,
            'amount'        => $amount
        );

        // Load header, dashboard, footer once
        $this->load->view('header');
        $this->load->view('dashboard', $data);
        $this->load->view('footer');
    }
	}
	// else {
	// 	redirect(site_url('dashboard'));
	// }
		
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
		redirect(site_url('login'));
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
