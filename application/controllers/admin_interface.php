<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_interface extends MY_Controller{
	
	function __construct(){
		
		parent::__construct();
		if(!$this->loginstatus || $this->user['uid']):
			redirect('');
		endif;
	}
	
	public function control_panel(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Администрирование | Панель управления',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'msgs'			=> $this->session->userdata('msgs'),
					'msgr'			=> $this->session->userdata('msgr')
			);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		$this->load->view("admin_interface/control-panel",$pagevar);
	}
	
	public function available_orders(){
		
		$from = intval($this->uri->segment(5));
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Администрирование | Доступные заказы',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'orders'		=> $this->mdorders->read_limit_records(10,$from,'orders'),
					'pages'			=> array(),
					'msgs'			=> $this->session->userdata('msgs'),
					'msgr'			=> $this->session->userdata('msgr')
			);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		$pagevar['pages'] = $this->pagination('admin-panel/actions/orders',5,$this->mdorders->count_all_records('orders'),10);
		
		for($i=0;$i<count($pagevar['orders']);$i++):
			$pagevar['orders'][$i]['date'] = $this->operation_date_on_time($pagevar['orders'][$i]['date']);
		endfor;
		$this->session->set_userdata('backpath',$pagevar['baseurl'].$this->uri->uri_string());
		$this->load->view("admin_interface/available-orders",$pagevar);
	}
	
	public function order_delete(){
		
		$id = $this->uri->segment(6);
		if($id):
			$result = $this->mdorders->delete_record($id,'orders');
			$this->session->set_userdata('msgs','Заявка удалена успешно.');
			redirect($this->session->userdata('backpath'));
		else:
			show_404();
		endif;
	}
	
	public function closed_order(){
		
		$id = $this->uri->segment(6);
		if($id):
			$this->mdorders->update_field($id,'closed',1,'orders');
			$this->session->set_userdata('msgs','Заявка закрыта.');
			redirect($this->session->userdata('backpath'));
		else:
			show_404();
		endif;
	}
	
	public function actions_users(){
		
		$from = intval($this->uri->segment(5));
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Администрирование | Пользователи',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'users'			=> $this->mdusers->read_limit_records(3,$from,'users'),
					'pages'			=> array(),
					'msgs'			=> $this->session->userdata('msgs'),
					'msgr'			=> $this->session->userdata('msgr')
			);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		$pagevar['pages'] = $this->pagination('admin-panel/actions/users',5,$this->mdusers->count_all_records('users'),3);
		
		for($i=0;$i<count($pagevar['users']);$i++):
			$pagevar['users'][$i]['password'] = $this->encrypt->decode($pagevar['users'][$i]['cryptpassword']);
		endfor;
		
		$this->session->set_userdata('backpath',$pagevar['baseurl'].$this->uri->uri_string());
		$this->load->view("admin_interface/users",$pagevar);
	}
	
	public function user_add(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Администрирование | Пользователи',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'msgs'			=> $this->session->userdata('msgs'),
					'msgr'			=> $this->session->userdata('msgr')
			);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('organization',' ','required|trim');
			$this->form_validation->set_rules('address',' ','required|trim');
			$this->form_validation->set_rules('phones',' ','required|trim');
			$this->form_validation->set_rules('login',' ','required|trim');
			$this->form_validation->set_rules('password',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				$this->user_add();
				return FALSE;
			else:
				$this->mdusers->insert_record($_POST);
				$this->session->set_userdata('msgs','Запись создана успешно.');
				redirect($this->uri->uri_string());
			endif;
		endif;
		
		$this->load->view("admin_interface/user-add",$pagevar);
	}
	
	public function user_delete(){
		
		$id = $this->uri->segment(6);
		if($id):
			$result = $this->mdusers->delete_record($id,'users');
			$this->session->set_userdata('msgs','Пользователь удален успешно.');
			redirect($this->session->userdata('backpath'));
		else:
			show_404();
		endif;
	}
	
	public function actions_profile(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Администрирование | Личный кабинет',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'user'			=> $this->mdusers->read_record($this->user['uid']),
					'cntunit'		=> array(),
					'msgs'			=> $this->session->userdata('msgs'),
					'msgr'			=> $this->session->userdata('msgr')
			);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			$_POST['submit'] = NULL;
			$this->form_validation->set_rules('fio',' ','required|trim');
			$this->form_validation->set_rules('oldpas',' ','trim');
			$this->form_validation->set_rules('password',' ','trim');
			$this->form_validation->set_rules('confpass',' ','trim');
			$this->form_validation->set_rules('wmid',' ','trim');
			$this->form_validation->set_rules('phones',' ','trim');
			$this->form_validation->set_rules('icq',' ','trim');
			$this->form_validation->set_rules('skype',' ','trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				redirect($this->uri->uri_string());
			else:
				if(!empty($_POST['oldpas']) && !empty($_POST['password']) && !empty($_POST['confpass'])):
					if(!$this->mdusers->user_exist('password',md5($_POST['oldpas']))):
						$this->session->set_userdata('msgr',' Не верный старый пароль!');
					elseif($_POST['password']!=$_POST['confpass']):
						$this->session->set_userdata('msgr',' Пароли не совпадают.');
					else:
						$this->mdusers->update_field($this->user['uid'],'password',md5($_POST['password']));
						$this->mdusers->update_field($this->user['uid'],'cryptpassword',$this->encrypt->encode($_POST['password']));
						$this->session->set_userdata('msgs',' Пароль успешно изменен');
						$this->session->set_userdata('logon',md5($this->user['ulogin'].md5($_POST['password'])));
					endif;
				endif;
				if(!isset($_POST['sendmail'])):
					$_POST['sendmail'] = 0;
				endif;
				unset($_POST['password']);unset($_POST['login']);
				$_POST['uid'] = $this->user['uid'];
				$result = $this->mdusers->update_record($_POST);
				if($result):
					$msgs = 'Личные данные успешно сохранены.<br/>'.$this->session->userdata('msgs');
					$this->session->set_userdata('msgs',$msgs);
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		
		$pagevar['cntunit']['users'] = $this->mdusers->count_all();
		$pagevar['cntunit']['platforms'] = $this->mdplatforms->count_all();
		$pagevar['cntunit']['markets'] = $this->mdmarkets->count_all();
		$pagevar['cntunit']['services'] = $this->mdservices->count_all();
		$pagevar['cntunit']['twork'] = $this->mdtypeswork->count_all();
		$pagevar['user']['signdate'] = $this->operation_date($pagevar['user']['signdate']);
		$pagevar['cntunit']['mails'] = $this->mdmessages->count_records_by_admin_new($this->user['uid']);
		
		$this->load->view("admin_interface/profile",$pagevar);
	}
}