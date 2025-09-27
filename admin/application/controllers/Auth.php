<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function index()
	{
		$dynamic['title'] = page_title." | Login";
		$this->load->view('auth/login',$dynamic);
	}

	public function login_action()
	{
		if(isset($_POST['lg_email']) && isset($_POST['lg_password']))
		{
		
			$email = trim($_POST['lg_email']);
			$password = trim($_POST['lg_password']);
			$md5_password = md5($password);

			$checkUser = $this->Common_model->get_single_record("users","email='".$email."' and password='".$md5_password."'");

			//print_r($checkUser);exit;
			if(!empty($checkUser))
			{
				if($checkUser->status=="Active")
				{
					$the_session[session_name] = array("fullname" => $checkUser->fullname, 
								 "userid" => $checkUser->id,
								 "username" => $checkUser->username,
								 "email" => $checkUser->email,
								 "type" => $checkUser->type,
								 "location" => $checkUser->location,
								 'validated' => true
								);
					$this->session->set_userdata($the_session);
					redirect('dashboard');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Account Inactive, please contact with admin for login.');
					redirect('Auth');
				}
				
			}else
			{
				$this->session->set_flashdata('msg', "Invalid Email or Password");
				redirect('Auth');
			}
			
		}
		else
		{
			redirect('Auth');
		}
	}

	public function logout()
	{
		$newdata[session_name] = array(
			'userid' =>'',
			'fullname' => '',
			'username' => '',
			'email' => '',
			'type' => '',  
			'location' => '',                                   
			'logged_in' => FALSE,
		   );

		$this->session->unset_userdata($newdata[session_name]);
		$this->session->sess_destroy();
		redirect('auth');
	}
}
