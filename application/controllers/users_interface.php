<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Users_interface extends MY_Controller{
	
	function __construct(){
		
		parent::__construct();
		
	}
	
	public function index(){
		
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
	
	public function forum(){
		
		$from = intval($this->uri->segment(3));
		$pagevar = array(
			'title'			=> 'СРО НП «Энергоаудит» в Ростове, Элисте, Краснодаре, Сочи: энергетический паспорт, энергетическое обследование',
			'description'	=> 'СРО ЮФО – некоммерческая саморегулируемая организация в Ростове на Дону, которая предлагает оформить энергетический паспорт.',
			'keywords'		=> 'сро юфо, вступить в, стоимость энергопаспорта, ростов на дону, энергосбережение, ставрополь, энергетический паспорт, краснодар, программа энергосбережения, сочи, обследования, астрахань, обязательное энергетическое обследование, пятигорск, энергоаудит, элиста, нп обинж энерго, майкоп, энергопаспорт, гильдия энергоаудиторов, волгоград, махачкала',
			'baseurl' 		=> base_url(),
			'questions'		=> $this->mdquestions->read_limit_records(10,$from,'questions'),
			'answers' 		=> array(),
			'news' 			=> array(),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr')
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('number',' ','required|trim');
			$this->form_validation->set_rules('expert',' ','required|trim');
			$this->form_validation->set_rules('conclusion',' ','trim');
			$this->form_validation->set_rules('register',' ','trim');
			$this->form_validation->set_rules('transfer',' ','trim');
			$this->form_validation->set_rules('organization',' ','required|trim');
			$this->form_validation->set_rules('customer',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				$this->add_register();
				return FALSE;
			else:
				$this->mdregister->insert_record($this->input->post());
				$this->session->set_userdata('msgs','Запись создана успешно.');
				redirect($this->uri->uri_string());
			endif;
		endif;
		
		$pagevar['pages'] = $this->pagination('admin-panel/actions/forum',5,$this->mdquestions->count_all_records('questions'),10);
		$pagevar['answers'] = $this->mdanswers->read_records_by_questions($pagevar['questions']);
		
		for($i=0;$i<count($pagevar['questions']);$i++):
			$pagevar['questions'][$i]['date'] = $this->operation_date_on_time($pagevar['questions'][$i]['date']);
		endfor;
		for($i=0;$i<count($pagevar['answers']);$i++):
			$pagevar['answers'][$i]['date'] = $this->operation_date_on_time($pagevar['answers'][$i]['date']);
		endfor;
		
		$this->load->view("users_interface/forum",$pagevar);
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
	
	public function logoff(){
		
		$this->session->sess_destroy();
		redirect('');
	}
	
	public function login(){
		
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
		redirect('');
	}
}