<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Mdorders extends MY_Model{
	
	var $id   		= 0;
	var $name		= '';
	var $email 		= '';
	var $phones 	= '';
	var $address 	= '';
	var $text		= '';
	var $date		= '';
	var $closed		= 0;
	
	function __construct(){
		parent::__construct();
	}
	
	function insert_record($data){
			
		$this->name		= $data[0];
		$this->email	= $data[1];
		$this->phones	= $data[2];
		$this->address	= $data[3];
		$this->text		= $data[4];
		$this->date		= date("Y-m-d H:i:s");
		$this->closed	= 0;
		
		$this->db->insert('orders',$this);
		return $this->db->insert_id();
	}
}