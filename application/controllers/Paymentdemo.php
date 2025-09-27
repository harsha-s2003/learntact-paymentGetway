<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    public function index()
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
                    "CustomerEmailId" => "atomdev@gmail.com",
                    "CustomerMobile" => "8888888888",
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
    
    // to get response pass below as return URL in your view
    public function response()
    {
        $this->load->library("AtompayResponse",array(
                "data" => $_POST['encData'],
                "merchId" => $_POST['merchId'],
                "ResponseDecryptionKey" => "75AEF0FA1B94B3C10D4F5B268F757F11",
         ));
//        echo "<pre>";
//        print_r($this->atompayresponse->decryptResponseIntoArray()['responseDetails']);
//        print_r($this->atompayresponse->decryptResponseIntoArray()['merchDetails']);
//        print_r($this->atompayresponse->decryptResponseIntoArray()['payModeSpecificData']);
//        exit;
       // to get data from above arrays use below code
        
        echo "Transaction Result: ".$this->atompayresponse->decryptResponseIntoArray()['responseDetails']['statusCode']."<br><br>";
        echo "Merchant Transaction Id: ".$this->atompayresponse->decryptResponseIntoArray()['merchDetails']['merchTxnId']."<br><br>";
        echo "Transaction Date: ".$this->atompayresponse->decryptResponseIntoArray()['merchDetails']['merchTxnDate']."<br><br>";
        echo "Bank Transaction Date: ".$this->atompayresponse->decryptResponseIntoArray()['payModeSpecificData']['bankDetails']['bankTxnId']."<br><br>";
        
    }
    
}