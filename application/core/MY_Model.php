<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function read_record($record_id,$table){
		
		$this->db->where('id',$record_id);
		$query = $this->db->get($table,1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0];
		return NULL;
	}
	
	function read_records($table,$field = 'id',$order = 'ASC'){
		
		$this->db->order_by($field,$order);
		$query = $this->db->get($table);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function read_limit_records($count,$from,$table,$field = 'id',$order = 'ASC'){
		
		$this->db->order_by($field,$order);
		$this->db->limit($count,$from);
		$query = $this->db->get($table);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function record_exist($table,$field,$parameter){
		
		if(empty($parameter) || is_null($parameter)):
			return FALSE;
		endif;
		
		$this->db->where($field,$parameter);
		$query = $this->db->get($table,1);
		$data = $query->result_array();
		if(count($data)) return $data[0]['id'];
		return FALSE;
	}
	
	function read_field($id,$table,$field){
			
		$this->db->where('id',$id);
		$query = $this->db->get($table,1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0][$field];
		return FALSE;
	}
	
	function read_field_translit($translit,$field,$table){
			
		$this->db->where('translit',$translit);
		$query = $this->db->get($table,1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0][$field];
		return FALSE;
	}
	
	function update_field($id,$field,$value,$table){
			
		$this->db->set($field,$value);
		$this->db->where('id',$id);
		$this->db->update($table);
		return $this->db->affected_rows();
	}
	
	function delete_record($id,$table){
	
		$this->db->where('id',$id);
		$this->db->delete($table);
		return $this->db->affected_rows();
	}

	function count_all_records($table){
		
		return $this->db->count_all($table);
	}
	
	function search_data($search,$field,$fields,$table){
		
		$query = "SELECT $fields FROM $table WHERE $field LIKE '%$search%' LIMIT 0,15";
		$query = $this->db->query($query);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function read_finding_data($id = FALSE,$search,$field,$fields,$table){
		
		if($id):
			$query = "SELECT $fields FROM $table WHERE (id = $id OR $field = '$search') LIMIT 0,15";
		else:
			$query = "SELECT $fields FROM $table WHERE $field = '$search' LIMIT 0,15";
		endif;
		$query = $this->db->query($query);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function return_image($id,$field,$table){
		
		$this->db->where('id',$id);
		$this->db->select($field);
		$query = $this->db->get($table);
		$data = $query->result_array();
		return $data[0][$field];
	}
}