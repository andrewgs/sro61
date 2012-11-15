<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Mdusers extends MY_Model{

	var $id   			= 0;
	var $organization	= '';
	var $access			= 1;
	var $grn			= '';
	var $inn			= '';
	var $number			= '';
	
	var $login 			= '';
	var $address		= '';
	var $email			= '';
	var $cryptpassword 	= '';
	var $password 		= '';
	var $phones  		= '';
	var $signdate  		= '0000-00-00';

	function __construct(){
		parent::__construct();
	}
	
	function insert_record($data){

		$this->organization 	= $data['organization'];
		$this->grn 				= $data['grn'];
		$this->inn 				= $data['inn'];
		$this->number 			= $data['number'];
		$this->address 			= $data['address'];
		$this->login 			= $data['login'];
		$this->cryptpassword	= $this->encrypt->encode($data['password']);
		$this->password			= md5($data['password']);
		$this->email 			= $data['email'];
		$this->phones 			= $data['phones'];
		$this->signdate 		= date("Y-m-d");
		
		$this->db->insert('users',$this);
		return $this->db->insert_id();
	}
	
	function auth_user($login,$password){
		
		$this->db->where('login',$login);
		$this->db->where('password',md5($password));
		$query = $this->db->get('users',1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0];
		return NULL;
	}

	function user_exist($field,$parameter){
			
		$this->db->where($field,$parameter);
		$query = $this->db->get('users',1);
		$data = $query->result_array();
		if(count($data)) return $data[0]['id'];
		return FALSE;
	}

	function read_limit_members($count,$from){
		
		$this->db->where("id >",1);
		$this->db->order_by('organization','ASC');
		$this->db->limit($count,$from);
		$query = $this->db->get('users');
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function count_members(){
		
		$this->db->select("COUNT(*) AS cnt");
		$this->db->where("id >",1);
		$query = $this->db->get('users');
		$data = $query->result_array();
		if(isset($data[0])) return $data[0]['cnt'];
		return 0;
	}
	
}