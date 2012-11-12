<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Clients_interface extends MY_Controller{
	
	function __construct(){
		
		parent::__construct();
		if(!$this->loginstatus):
			redirect('');
		endif;
	}
	
	public function available_orders(){
		
		$from = intval($this->uri->segment(5));
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Личный кабинет | Доступные заказы',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'orders'		=> $this->mdorders->read_limit_active(10,$from),
					'pages'			=> array(),
					'msgs'			=> $this->session->userdata('msgs'),
					'msgr'			=> $this->session->userdata('msgr')
			);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		$pagevar['pages'] = $this->pagination('cabinet/orders',4,$this->mdorders->count_active_records(),10);
		
		for($i=0;$i<count($pagevar['orders']);$i++):
			$pagevar['orders'][$i]['date'] = $this->operation_date_on_time($pagevar['orders'][$i]['date']);
		endfor;
		$this->session->set_userdata('backpath',$pagevar['baseurl'].$this->uri->uri_string());
		$this->load->view("clients_interface/available-orders",$pagevar);
	}
}