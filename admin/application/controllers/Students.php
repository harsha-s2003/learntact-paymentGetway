<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	/* List Page */
	public function index()
	{
		$data['studentData'] = $this->Common_model->get_multiple_record("student_reg","","id DESC");
		//print_r($_SESSION);exit;
		$this->load->view('common/header');
		$this->load->view('student/list',$data);
		$this->load->view('common/footer');
	}

	public function status($status,$id)
	{
		if(!empty($status && $id))
		{
			if($status=='Pending')
			{
				$arrayD = array('status' =>'Approved');
				$this->Common_model->SaveData('registrations',$arrayD,"id='".$id."'");
				redirect('Students/index');
			}
			else{
			$arrayD = array('status' =>'Pending');
				$this->Common_model->SaveData('registrations',$arrayD,"id='".$id."'");	
				redirect('Students/index');
			}			
		}
		else {
			redirect('Students/index');
		}
	}
}