<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    public function index()
    {
        
          $transactionId =  sprintf("%06d", mt_rand(1, 999999));
          $payUrl = "https://caller.atomtech.in/ots/aipay/auth";
          $amount = $this->input->post('amount') ?? "50.00";  // dynamic amount from user input
 
         
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
        
          // Data to pass to view
        $data = array(
            'atomTokenId'   => $this->atompayrequest->payNow(),
            'transactionId' => $transactionId,
            'amount'        => $amount
        );
        
        
        // Load your main dashboard view instead of home.php
       $this->load->view('dashboard', $data);
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

    
}