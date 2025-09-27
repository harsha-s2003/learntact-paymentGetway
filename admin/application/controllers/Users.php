<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/* List Page */
	public function index()
	{
		$data['user'] = $this->Common_model->get_multiple_record("users","type!='Admin' and status='Active'","id DESC");
		//print_r($data);exit;
		$this->load->view('common/header');
		$this->load->view('user/list',$data);
		$this->load->view('common/footer');
	}

	public function addUser()
	{
		$school = $this->Common_model->get_multiple_record("mst_schools","status='A'","id DESC");
		$data = array(
					"id"=>set_value("id"),
					"fullname"=>set_value("fullname"),
					"email"=>set_value("email"),
					"mobile"=>set_value("mobile"),
					"school"=>set_value("school"),
					"password"=>set_value("password"),
					"show_password"=>set_value("show_password"),
					"status"=>set_value("status"),
					"school_list"=>$school,
					"btn"=>"Create",
					"heading"=>"Add User",
					"action"=>site_url('Users/addAction'),
				);
		$this->load->view('common/header');
		$this->load->view('user/form',$data);
		$this->load->view('common/footer');
	}
public function addAction()
	{
		if(isset($_SESSION[session_name]['userid']))
		{
				$data_Arr['fullname'] = $this->input->post('fullname');
				$data_Arr['email'] = $this->input->post('email');
				$data_Arr['mobile'] = $this->input->post('mobile');
				$data_Arr['school'] = $this->input->post('school');
				$data_Arr['password'] = md5($this->input->post('password'));
				$data_Arr['show_password'] = $this->input->post('password');
				$data_Arr['type'] = 'User';
				$data_Arr['status'] = $this->input->post('status');		
				$data_Arr['created'] = date('Y-m-d H:i:s');	
				$this->db->insert("users",$data_Arr);
				$this->session->set_flashdata('message', 'Record has been created successfully.');
				redirect('Users');
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
				$row = $this->Common_model->get_single_record("users","id='".$id."'");
				$school = $this->Common_model->get_multiple_record("mst_schools","status='A'","id DESC");
				//print_r($row);exit;

				$data = array(
					"id"=>set_value("id",$row->id),
					"fullname"=>set_value("fullname",$row->fullname),
					"email"=>set_value("email",$row->email),
					"mobile"=>set_value("mobile",$row->mobile),
					"school"=>set_value("school",$row->school),
					"show_password"=>set_value("show_password",$row->show_password),
					"status"=>set_value("status",$row->status),
					"school_list"=>$school,
					"btn"=>"Update",
					"heading"=>"Edit User",
					"action"=>site_url('Users/editAction'),
					);
				//print_r($data);exit;
					$this->load->view('common/header');
					$this->load->view('user/form',$data);
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
				$data_Arr['fullname'] = $this->input->post('fullname');
				$data_Arr['email'] = $this->input->post('email');
				$data_Arr['mobile'] = $this->input->post('mobile');
				$data_Arr['school'] = $this->input->post('school');
				$data_Arr['password'] = md5($this->input->post('password'));
				$data_Arr['show_password'] = $this->input->post('password');
				$data_Arr['status'] = $this->input->post('status');		
				
				$this->db->update("users",$data_Arr,"id='".$_POST['id']."'");
				$this->session->set_flashdata('message', 'Record has been updated successfully.');
				redirect('Users');				
			}
			else
			{
				redirect("Users");
			}
			
		}else
		{
			redirect('auth');
		}
	}

	
/* delete category as well as gallery images */

	public function del($id='')
	{
		if(isset($_SESSION[session_name]['userid']))
		{
			if(!empty($id))
			{
				$data_Arr['status'] = 'Inactive';	
				$this->db->update("users",$data_Arr,"id='".$id."'");
					
			}else
			{
				redirect('Users');
			}
			
		}else
		{
			redirect('auth');
		}		
	}
}