<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Mdusers extends MY_Model{

	var $id   			= 0;
	var $organization	= '';
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
	
	function update_record($data){
		
		if(isset($data['password'])):
			$this->db->set('password',md5($data['password']));
			$this->db->set('cryptpassword',$this->encrypt->encode($data['password']));
		endif;
		if(isset($data['email'])):
			$this->db->set('email',$data['email']);
		endif;
		if(isset($data['phones'])):
			$this->db->set('phones',$data['phones']);
		endif;
		if(isset($data['address'])):
			$this->db->set('address',$data['address']);
		endif;
		if(isset($data['organization'])):
			$this->db->set('organization',$data['organization']);
		endif;
		$this->db->where('id',$data['uid']);
		$this->db->update('users');
		return $this->db->affected_rows();
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
}