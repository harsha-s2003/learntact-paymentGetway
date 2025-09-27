<?php
require_once 'AtomAES.php';

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Version 1.0
 */
class AtompayRequest
{
    private $login;

    private $password;

    private $productId;

    private $amount;

    private $transactionCurrency;

    private $transactionAmount;

    private $transactionId;

    private $customerAccount;

    private $customerName;

    private $customerEmailId;

    private $customerMobile;

    private $customerBillingAddress;

    private $transactionUrl;

    private $requestEncypritonKey = "";

    private $responseDecryptionKey = "";
    
    private $udf3 = "";
    
    private $udf4 = "";
    
    private $udf5 = "";

    public function __construct($config = array()) {
        
               $this->login = $config['Login'];

               $this->password = $config['Password'];

               $this->productId = $config['ProductId'];

               $this->amount = $config['Amount'];

               $this->transactionCurrency = $config['TransactionCurrency'];

               $this->transactionAmount = $config['TransactionAmount'];

               $this->transactionId = $config['TransactionId'];

               $this->customerAccount = $config['CustomerAccount'];
             
               $this->customerName = $config['udf1'];

               $this->customerEmailId = $config['CustomerEmailId'];

               $this->customerMobile = $config['CustomerMobile'];

               $this->customerBillingAddress = $config['udf2'];

               $this->transactionUrl = $config['url'];

               $this->requestEncypritonKey = $config['RequestEncypritonKey'];

               $this->responseDecryptionKey = $config['ResponseDecryptionKey'];
        
               $this->udf3 = $config['udf3'];
        
               $this->udf4 = $config['udf4'];
        
               $this->udf5 = $config['udf5'];
        
    }

    public function setRequestEncypritonKey($key){
        $this->requestEncypritonKey = $key;
    }

    public function setResponseDecryptionKey($key){
        $this->responseDecryptionKey = $key;
    }
   
    public function setUdf3($key){
        $this->udf3 = $key;
    }   
    
    public function setUdf4($key){
        $this->udf4 = $key;
    }    
    
    public function setUdf5($key){
        $this->udf5 = $key;
    }

    /**
     * @return string
     */
    public function getRespHashKey()
    {
        return $this->respHashKey;
    }

    /**
     * @param string $respHashKey
     */
    public function setRespHashKey($respHashKey)
    {
        $this->respHashKey = $respHashKey;
    }

    /**
     * @return the $login
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return the $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    /**
     * @return the $productId
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param string $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return the $amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return the $transactionCurrency
     */
    public function getTransactionCurrency()
    {
        return $this->transactionCurrency;
    }

    /**
     * @param string $transactionCurrency
     */
    public function setTransactionCurrency($transactionCurrency)
    {
        $this->transactionCurrency = $transactionCurrency;
    }

    /**
     * @return the $transactionAmount
     */
    public function getTransactionAmount()
    {
        return $this->transactionAmount;
    }

    /**
     * @param string $transactionAmount
     */
    public function setTransactionAmount($transactionAmount)
    {
        $this->transactionAmount = $transactionAmount;
    }

    /**
     * @return the $transactionId
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return the $customerAccount
     */
    public function getCustomerAccount()
    {
        return $this->customerAccount;
    }

    /**
     * @param string $customerAccount
     */
    public function setCustomerAccount($customerAccount)
    {
        $this->customerAccount = $customerAccount;
    }

    /**
     * @return the $customerName
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @param string $customerName
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
    }

    /**
     * @return the $customerEmailId
     */
    public function getCustomerEmailId()
    {
        return $this->customerEmailId;
    }

    /**
     * @param string $customerEmailId
     */
    public function setCustomerEmailId($customerEmailId)
    {
        $this->customerEmailId = $customerEmailId;
    }

    /**
     * @return the $customerMobile
     */
    public function getCustomerMobile()
    {
        return $this->customerMobile;
    }

    /**
     * @param string $customerMobile
     */
    public function setCustomerMobile($customerMobile)
    {
        $this->customerMobile = $customerMobile;
    }

    /**
     * @return the $customerBillingAddress
     */
    public function getCustomerBillingAddress()
    {
        return $this->customerBillingAddress;
    }

    /**
     * @param string $customerBillingAddress
     */
    public function setCustomerBillingAddress($customerBillingAddress)
    {
        $this->customerBillingAddress = $customerBillingAddress;
    }

    /**
     * @return the $transactionUrl
     */
    public function getTransactionUrl()
    {
        return $this->transactionUrl;
    }

    /**
     * @param string $transactionUrl
     */
    public function setTransactionUrl($transactionUrl)
    {
        $this->transactionUrl = $transactionUrl;
    }
    
    public function payNow()
    {
          $datenow = date("Y-m-d H:m:s");

          $atomenc = new AtomAES();
        
          $jsondata = '{
            "payInstrument": {
                "headDetails": {
                "version": "OTSv1.1",      
                "api": "AUTH",  
                "platform": "FLASH"	
                },
                "merchDetails": {
                "merchId": "'.$this->getLogin().'",
                "userId": "",
                "password": "'.$this->getPassword().'",
                "merchTxnId": "'.$this->getTransactionId().'",      
                "merchTxnDate": "'.$datenow.'"
                },
                "payDetails": {
                "amount": "'.$this->getAmount().'",
                "product": "'.$this->getProductId().'",
                "custAccNo": "'.$this->getCustomerAccount().'",
                "txnCurrency": "'.$this->getTransactionCurrency().'"
                },	
                "custDetails": {
                 "custEmail": "'.$this->getCustomerEmailId().'",
                 "custMobile": "'.$this->getCustomerMobile().'"
                },
                "extras": {
                "udf1": "'.$this->getCustomerName().'",  
                "udf2": "'.$this->getCustomerBillingAddress().'",  
                "udf3": "'.$this->udf3.'",  
                "udf4": "'.$this->udf4.'",  
                "udf5": "'.$this->udf5.'" 
                }
             }  
           }';
                
//        echo $jsondata;
//        exit;
        
         $encData = $atomenc->encrypt($jsondata, $this->requestEncypritonKey, $this->requestEncypritonKey);
     
         $curl = curl_init();
         curl_setopt_array($curl, array(
          CURLOPT_URL => $this->transactionUrl,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_SSL_VERIFYHOST => 2,
          CURLOPT_SSL_VERIFYPEER => 1,
          CURLOPT_CAINFO => getcwd() ."/application/libraries/cacert.pem",
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "encData=".$encData."&merchId=".$this->getLogin(),
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/x-www-form-urlencoded"
          ),
         ));
   
        $atomTokenId = null;
        $response = curl_exec($curl);
    
        $resp = json_decode($response, true);
        
        if(strpos($response, 'encData=') !== false) {
            
                $getresp = explode("&", $response); 
                $encresp = substr($getresp[1], strpos($getresp[1], "=") + 1);   

                $decData = $atomenc->decrypt($encresp, $this->responseDecryptionKey, $this->responseDecryptionKey);

                if(curl_errno($curl)) {
                    $error_msg = curl_error($curl);
                    echo "error = ".$error_msg;
                }      

                if(isset($error_msg)) {
                    echo "error = ".$error_msg;
                }   

                curl_close($curl);

                $res = json_decode($decData, true);   

                if($res){
                  if($res['responseDetails']['txnStatusCode'] == 'OTS0000'){
                     $atomTokenId = $res['atomTokenId'];
                  }else{
                    echo "Error getting data";
                     $atomTokenId = null;
                  }
                }   
            
        }else{
           $atomTokenId = null;    
           echo "Error has been occured!";
        }
        
        return $atomTokenId;
     
    }


    public function writeLog($data){
        $fileName = "date".date("Y-m-d").".txt";
        log_message('info', $fileName);
    }




}
