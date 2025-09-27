<?php

require_once('config.php');

class Utility 
{	
	
	function validate(){
		$error = "";
		if(ENC_KEY == "" || strlen(ENC_KEY) != 32) {
			$error .= "ENC_KEY is required and lenth should be 32 characters. ";
		} else if (SECURE_SECRET == "" || strlen(SECURE_SECRET) != 32 || $this->secureHashValidate(SECURE_SECRET) == false){
			$error .= "SECURE_SECRET is required and lenth should be 32 characters without special characters. ";
		} else if(strlen(RETURNURL) > 500) {
			$error .= "Return URL length exceeds 500 characters. ";
		} else if(strlen(PASSCODE) != 8 || $this->hasSpecialCharacters(PASSCODE)) {
			$error .= "Passcode length should be 8 and no special characters allowed. ";
		} else if(strlen(MCC) != 4 || $this->mccVaidate(MCC) == false) {
			$error .= "MCC length should be 4 and no special characters allowed. ";
		} else if(strlen(BANKID) < 5 || strlen(BANKID) > 6|| $this->hasSpecialCharacters(MCC)) {
			$error .= "BANKID length should be 6 and no special characters allowed. ";
		}

		if($error != "") {
			echo $error;
			die();	
		}
		return;
	}

	function encrypt($input, $key) 
	{		
	    return  base64_encode(openssl_encrypt($input,"AES-256-ECB", $key, OPENSSL_RAW_DATA ));
	}
	
	function decrypt($sStr, $key) 
	{		
		return  openssl_decrypt(base64_decode($sStr), 'AES-256-ECB', $key, OPENSSL_RAW_DATA);
	}	
	
	function generateSecurehash($sortedData)
	{ 
		if($sortedData)
		{
			$SecureHash = SECURE_SECRET;

			foreach($sortedData as $key => $val)
			{
				  $SecureHash = $SecureHash . ($val);
				
			}
		}

		//Generate SHA-256 hash
		$SecureHash = hash('sha256', utf8_encode($SecureHash));
		return $SecureHash;
	}
	
	
	function null2unknown($check_null,$Array_data)
	{
		if(!isset($Array_data[$check_null]))
		{
			return "No Value Returned";
		}
		else
		{
			return $Array_data[$check_null];
		}
	}

	// Function to check if a string has special characters
	function hasSpecialCharacters($str) {
		// Use a regular expression to match any character that is not alphanumeric
		return preg_match('/[^a-zA-Z0-9]/', $str);
	}

	function secureHashValidate($str) {
		return preg_match('/^[a-fA-F0-9]*$/', $str);
	}

	function mccVaidate($str) {
		return preg_match('/^[1-9]\\d*$/', $str);		
	}
}
?>