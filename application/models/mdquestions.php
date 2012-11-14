<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Mdquestions extends MY_Model{
	
	var $id   		= 0;
	var $name		= '';
	var $email 		= '';
	var $data 		= '';
	var $text 		= '';
	var $comment 	= '';
	
	function __construct(){
		parent::__construct();
	}
	
	function insert_record($data){
			
		$this->name		= $data['name'];
		$this->email	= $data['email'];
		$this->data		= $data['data'];
		$this->text		= $data['text'];
		$this->comment	= $data['comment'];
		
		$this->db->insert('questions',$this);
		return $this->db->insert_id();
	}
	
	function update_record($id,$data){
			
		$this->db->set('text',$data['text']);
		$this->db->where('id',$id);
		$this->db->update('questions');
		return $this->db->affected_rows();
	}
}