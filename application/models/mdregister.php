<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Mdregister extends MY_Model{
	
	var $id   		= 0;
	var $number		= 0;
	var $expert 	= 0;
	var $conclusion = '';
	var $register 	= '';
	var $transfer	= '';
	var $organization= 0;
	var $customer	= '';
	
	function __construct(){
		parent::__construct();
	}
	
	function insert_record($data){
			
		$this->number		= $data['number'];
		$this->expert		= $data['expert'];
		$this->conclusion	= $data['conclusion'];
		$this->register		= $data['register'];
		$this->transfer		= $data['transfer'];
		$this->organization	= $data['organization'];
		$this->customer		= $data['customer'];
		
		$this->db->insert('register',$this);
		return $this->db->insert_id();
	}
	
	function update_record($id,$data){
			
		$this->db->set('number',$data['number']);
		$this->db->set('expert',$data['expert']);
		$this->db->set('conclusion',$data['conclusion']);
		$this->db->set('register',$data['register']);
		$this->db->set('transfer',$data['transfer']);
		$this->db->set('organization',$data['organization']);
		$this->db->set('customer',$data['customer']);
		$this->db->where('id',$id);
		$this->db->update('register');
		return $this->db->affected_rows();
	}
}