<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
       
        $this->load->model('Common_model');
        /*keep this code for load database*/
        $this->load->database();
        $this->load->helper('security');
    }
   

	//get save and update
    public function SaveData($table,$data,$condition='')
    {
        $DataArray = array();
        if(empty($condition))
        {
            $data['created']=date("Y-m-d H:i:s");
            $data['modified']=date("Y-m-d H:i:s");
        } else {
            $data['modified']=date("Y-m-d H:i:s");
        }
        $table_fields = $this->db->list_fields($table);
        foreach($data as $field=>$value)
        {
            if(in_array($field,$table_fields))
            {
                $DataArray[$field]= $value;
            }
        }
       
        if($condition != '')
        {
            $this->db->where($condition);
            $this->db->update($table, $DataArray);
        }else{
            $this->db->insert($table, $DataArray);
        }
    }

	//get data
	function get_data($table,$con='',$order='',$limit='',$group='')
	{
		if($con!='')
		$this->db->where($con);
		if($order != '')
		$this->db->order_by($order);
		if($limit != '')
        $this->db->limit($limit);
        if($group != '')
        $this->db->group_by($group);
        return $this->db->get($table)->result(); 
	}
	
     function get_multiple_record($table, $con='',$order='',$limit='',$group='')
    {   
        if($con != '')
        $this->db->where($con);
        if($order != '')
        $this->db->order_by($order);
        if($limit != '')
        $this->db->limit($limit);
        if($group != '')
        $this->db->group_by($group);
        return $this->db->get($table)->result();
    }
	// delete data
    function delete($table,$con)
    {
        $this->db->where($con);
        $this->db->delete($table);
    }
    /*get Criteria wise filter */
   function GetData($table,$select = '',$con='',$group='',$order='',$limit='',$record='')
    {
        if(empty($select))
        {
            $this->db->select("*");         
        }else{
            $this->db->select($select);     
        }
        if($con!='')
        $this->db->where($con);
        if($order != '')
        $this->db->order_by($order);
        if($limit != '')
        $this->db->limit($limit);
        if($group != '')
        $this->db->group_by($group);
        if(!empty($record))
        return $this->db->get($table)->row();
        else
        return $this->db->get($table)->result();
    }
    public function GetFieldData($table,$field='',$condition='',$group='',$order='',$limit='',$result='',$having='')
    {
        if($field != '')
        $this->db->select($field);
        if($condition != '')
        $this->db->where($condition);
        if($order != '')
        $this->db->order_by($order);
        if($limit != '')
        $this->db->limit($limit);
        if($group != '')
        $this->db->group_by($group);
        if($having != '')
        $this->db->having($having);
        if($result != '')
        {
            $return =  $this->db->get($table)->row();
        }else{
            $return =  $this->db->get($table)->result();
        }
        return $return;
    } 
  

    function get_single_record($tablename,$condition)
    {
            $this->db->where($condition);   
            return $this->db->get($tablename)->row();
    }

    public function save($table,$data,$condition='')
    {
        $DataArray = array();
        if(!empty($data))
        {
            $data['created']=date("Y-m-d H:i:s");
            $data['modified']=date("Y-m-d H:i:s");
        }
        $table_fields = $this->db->list_fields($table);
        foreach($data as $field=>$value)
        {
            if(in_array($field,$table_fields))
            {
                $DataArray[$field]= $value;
            }
        }

        if($condition != '')
        {
          $this->db->where($condition);
          $this->db->update($table, $DataArray);
      }else{
          $this->db->insert($table, $DataArray);
      }
  }

 
    public function csv()
        {
            $this->load->dbutil();
            $this->load->helper('file');
            $this->load->helper('download');
            $query = $this->db->query("SELECT name,email,mobile,status FROM Users where is_deleted='No' and role='User'");
            //print_r($this->db->last_query());exit;
            $delimiter = ",";
            $newline = "\r\n";
            $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
            force_download('CSV_Report.csv', $data);
        }
}

?>