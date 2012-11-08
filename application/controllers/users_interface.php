<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Users_interface extends MY_Controller{
	
	function __construct(){
		
		parent::__construct();
	}
	
	public function index(){
		
		$this->pages($this->uri->uri_string());
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