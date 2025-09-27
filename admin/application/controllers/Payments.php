<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

	/* List Page */
	public function index()
	{
		$data['studentData'] = $this->Common_model->get_multiple_record("student_fee_details","","id DESC");
		$this->load->view('common/header');
		$this->load->view('payment/list',$data);
		$this->load->view('common/footer');
	}
public function addUser()
	{
		$student = $this->Common_model->get_multiple_record("registrations","status='Approved'","id DESC");
		$program = $this->Common_model->get_multiple_record("mst_programe","status='A'","id DESC");
		$data = array(
					"id"=>set_value("id"),
					"student_name"=>set_value("student_name"),
					"program"=>set_value("program"),
					"program_fee"=>set_value("program_fee"),
					"install_1"=>set_value("install_1"),
					"install_2"=>set_value("install_2"),
					"install_3"=>set_value("install_3"),
					"install_4"=>set_value("install_4"),
					"status"=>set_value("status"),
					"student"=>$student,
					"p_list"=>$program,
					"btn"=>"Create",
					"heading"=>"Add Student Program Fees",
					"action"=>site_url('Payments/addAction'),
				);
		$this->load->view('common/header');
		$this->load->view('payment/form',$data);
		$this->load->view('common/footer');
	}
public function addAction()
	{
		if(isset($_SESSION[session_name]['userid']))
		{
				$data_Arr['student_name'] = $this->input->post('student_name');
				$data_Arr['program'] = $this->input->post('program');
				$data_Arr['program_fee'] = $this->input->post('program_fee');
				$data_Arr['install_1'] = $this->input->post('install_1');
				$data_Arr['install_2'] = $this->input->post('install_2');
				$data_Arr['install_3'] = $this->input->post('install_3');
				$data_Arr['install_4'] = $this->input->post('install_4');
				$data_Arr['status'] = $this->input->post('status');		
				$data_Arr['created'] = date('Y-m-d H:i:s');	
				$this->db->insert("student_program",$data_Arr);
				$this->session->set_flashdata('message', 'Record has been created successfully.');
				redirect('Payments');
		}
		else
		{
			redirect('auth');
		}	
		
	}
	public function edit($id='')
	{
		if(isset($_SESSION[session_name]['userid']))
		{	
			if(!empty($id))
			{
				$row = $this->Common_model->get_single_record("student_program","id='".$id."'");
				$student = $this->Common_model->get_multiple_record("registrations","status='Approved'","id DESC");
				$program = $this->Common_model->get_multiple_record("mst_programe","status='A'","id DESC");

				$data = array(
					"id"=>set_value("id",$row->id),
					"student_name"=>set_value("student_name",$row->student_name),
					"program"=>set_value("program",$row->program),
					"program_fee"=>set_value("program_fee",$row->program_fee),
					"install_1"=>set_value("install_1",$row->install_1),
					"install_2"=>set_value("install_2",$row->install_2),
					"install_3"=>set_value("install_3",$row->install_3),
					"install_4"=>set_value("install_4",$row->install_4),
					"status"=>set_value("status",$row->status),
					"student"=>$student,
					"p_list"=>$program,
					"btn"=>"Update",
					"heading"=>"Edit Student Program Fees",
					"action"=>site_url('Payments/editAction'),
					);
				//print_r($data);exit;
					$this->load->view('common/header');
					$this->load->view('payment/form',$data);
					$this->load->view('common/footer');
			}else
			{
				redirect('Users');
			}
		}else
		{
			redirect('auth');
		}
	}

	public function editAction()
	{
		if(isset($_SESSION[session_name]['userid']))
		{
			if(!empty($_POST['id']))
			{	
				$data_Arr['student_name'] = $this->input->post('student_name');
				$data_Arr['program'] = $this->input->post('program');
				$data_Arr['program_fee'] = $this->input->post('program_fee');
				$data_Arr['install_1'] = $this->input->post('install_1');
				$data_Arr['install_2'] = $this->input->post('install_2');
				$data_Arr['install_3'] = $this->input->post('install_3');
				$data_Arr['install_4'] = $this->input->post('install_4');
				$data_Arr['status'] = $this->input->post('status');				
				$this->db->update("student_program",$data_Arr,"id='".$_POST['id']."'");
				$this->session->set_flashdata('message', 'Record has been updated successfully.');
				redirect('Payments');				
			}
			else
			{
				redirect("Payments");
			}
			
		}else
		{
			redirect('auth');
		}
	}
	public function status($status,$id)
	{
		if(!empty($status && $id))
		{
			if($status=='Pending')
			{
				$arrayD = array('status' =>'Approved');
				$this->Common_model->SaveData('student_program',$arrayD,"id='".$id."'");
				redirect('Payments/index');
			}
			else{
			$arrayD = array('status' =>'Pending');
				$this->Common_model->SaveData('student_program',$arrayD,"id='".$id."'");	
				redirect('Payments/index');
			}			
		}
		else {
			redirect('Payments/index');
		}
	}
}