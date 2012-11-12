<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Users_interface extends MY_Controller{
	
	function __construct(){
		
		parent::__construct();
		
	}
	
	public function index(){
		
		if($this->input->post('enter')):
			unset($_POST['enter']);
			$user = $this->mdusers->auth_user($this->input->post('login'),$this->input->post('password'));
			if(!$user):
				redirect($this->uri->uri_string());
			else:
				$session_data = array('logon'=>md5($user['login']),'userid'=>$user['id']);
				$this->session->set_userdata($session_data);
				if($user['id']):
					redirect("cabinet/orders");
				else:
					redirect("admin-panel/actions/orders");
				endif;
			endif;
		endif;
		
		$this->pages($this->uri->uri_string());
	}
	
	public function send_order(){
		
		$statusval = array('status'=>FALSE,'message'=>'Сообщение не отправлено');
		$data = trim($this->input->post('postdata'));
		if(!$data):
			show_404();
		endif;
		$data = preg_split("/&/",$data);
		for($i=0;$i<count($data);$i++):
			$dataid = preg_split("/=/",$data[$i]);
			$dataval[$i] = $dataid[1];
		endfor;
		if($dataval):
			ob_start();
			?>
			<img src="<?=base_url();?>images/logo.png" alt="" />
			<p>Сообщение от <?=$dataval[0];?></p>
			<p>Email: <?=$dataval[1];?></p>
			<p>Контактный номер: <?=$dataval[2];?></p>
			<p>Адрес объекта: <?=$dataval[3];?></p>
			<p>Сообщение: <?=$dataval[4];?></p>
			<br/><br/><p><a href="<?=base_url();?>">С уважением администрация СРО «Энергоаудит»</a></p>
			<?
			$mailtext = ob_get_clean();
			$users = $this->mdusers->read_records('users');
			for($i=0;$i<count($users);$i++):
				$statusval['status'] = $this->send_mail($users[$i]['email'],'robot@sro61.ru','СРО «Энергоаудит»','Новая заявка на sro61.ru',$mailtext);
				$this->mdorders->insert_record($dataval);
			endfor;
		endif;
		echo json_encode($statusval);
	}
	
	public function pages($page_url = ''){
		
		$page_data = $this->mdpages->read_fields_url($page_url,'*','pages');
		
		if(!$page_data):
			show_404();
		endif;
		
		$pagevar = array(
			'title'			=> $page_data['title'],
			'description'	=> $page_data['description'],
			'keywords'		=> $page_data['keywords'],
			'content'		=> $page_data['content'],
			'baseurl' 		=> base_url(),
			'news' 			=> array(),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr')
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		$this->load->view("users_interface/pages",$pagevar);
	}
	
	public function news(){
		
		$pagevar = array(
			'title'			=> 'СРО НП «Энергоаудит» в Ростове, Элисте, Краснодаре, Сочи: энергетический паспорт, энергетическое обследование',
			'description'	=> 'СРО ЮФО – некоммерческая саморегулируемая организация в Ростове на Дону, которая предлагает оформить энергетический паспорт.',
			'keywords'		=> 'сро юфо, вступить в, стоимость энергопаспорта, ростов на дону, энергосбережение, ставрополь, энергетический паспорт, краснодар, программа энергосбережения, сочи, обследования, астрахань, обязательное энергетическое обследование, пятигорск, энергоаудит, элиста, нп обинж энерго, майкоп, энергопаспорт, гильдия энергоаудиторов, волгоград, махачкала',
			'baseurl' 		=> base_url(),
			'news' 			=> array(),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr')
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		$this->load->view("users_interface/news",$pagevar);
	}
	
	public function application_energy_audit(){
		
		$pagevar = array(
			'title'			=> 'СРО НП «Энергоаудит» в Ростове, Элисте, Краснодаре, Сочи: энергетический паспорт, энергетическое обследование',
			'description'	=> 'СРО ЮФО – некоммерческая саморегулируемая организация в Ростове на Дону, которая предлагает оформить энергетический паспорт.',
			'keywords'		=> 'сро юфо, вступить в, стоимость энергопаспорта, ростов на дону, энергосбережение, ставрополь, энергетический паспорт, краснодар, программа энергосбережения, сочи, обследования, астрахань, обязательное энергетическое обследование, пятигорск, энергоаудит, элиста, нп обинж энерго, майкоп, энергопаспорт, гильдия энергоаудиторов, волгоград, махачкала',
			'baseurl' 		=> base_url(),
			'news' 			=> array(),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr')
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		$this->load->view("users_interface/news",$pagevar);
	}
	
	public function application_passing_energy_performance(){
		
		$pagevar = array(
			'title'			=> 'СРО НП «Энергоаудит» в Ростове, Элисте, Краснодаре, Сочи: энергетический паспорт, энергетическое обследование',
			'description'	=> 'СРО ЮФО – некоммерческая саморегулируемая организация в Ростове на Дону, которая предлагает оформить энергетический паспорт.',
			'keywords'		=> 'сро юфо, вступить в, стоимость энергопаспорта, ростов на дону, энергосбережение, ставрополь, энергетический паспорт, краснодар, программа энергосбережения, сочи, обследования, астрахань, обязательное энергетическое обследование, пятигорск, энергоаудит, элиста, нп обинж энерго, майкоп, энергопаспорт, гильдия энергоаудиторов, волгоград, махачкала',
			'baseurl' 		=> base_url(),
			'news' 			=> array(),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr')
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		$this->load->view("users_interface/news",$pagevar);
	}
	
	public function loginin(){
	
		if(isset($_POST['submit_x'])):
			if(!$_POST['login'] || !$_POST['password']):
				$this->session->set_userdata('msgauth','Не заполены необходимые поля');
				redirect($_SERVER['HTTP_REFERER']);
			else:
				$user = $this->mdusers->auth_user($_POST['login'],$_POST['password']);
				if(!$user):
					$this->session->set_userdata('msgauth','Не верные данные для авторизации');
					redirect($_SERVER['HTTP_REFERER']);
				else:
					if($user['type'] == 4 || $user['type'] == 3):
						$this->session->set_userdata('msgauth','Авторизация запрещена!');
						redirect($_SERVER['HTTP_REFERER']);
					endif;
					$this->session->set_userdata(array('logon'=>md5($user['login'].$user['password']),'userid'=>$user['id'],'ulogin'=>$user['login']));
					$this->mdusers->update_field($user['id'],'lastlogin',date("Y-m-d"));
					$this->access_cabinet($user['id'],$user['type']);
				endif;
			endif;
		endif;
		show_404();
	}
	
	public function actions_logoff(){
		
		$this->session->sess_destroy();
		redirect('');
	}
}