<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restrito extends MY_Controller {	

	public function __construct(){

		parent::__construct();		

		$this->load->model('model_contato', 'contato');

	}

	public function index(){

		$head = array(
			'title' => 'Lennon Santos | Sistema',
			'key'   => 'Sistema',
			'description' => 'Sistema'
		);

		$mensagens = $this->contato->get_n_lidas();
		$qte_msg = count($mensagens);

		$page = array(

			"pagina" => "Home",
			"mensagens" => $mensagens,
			"qte_msg" => $qte_msg,

		);

		// carrega os scripts da pagina
		$footer = array(
			'scripts' => array(
				"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" => "externo", 			
				"assets/js/scripts.js" => "local",		
			),
			//aqui é definido qual link vai ser o ativo para identificar a pagina
			'link_ativo' => '#linkHome'
		);

		$this->load->view('system_page/head', $head);
		$this->load->view('system_page/nav');
		$this->load->view('restrito', $page);
		$this->load->view('system_page/footer', $footer);

	}

	public function lidas(){

		$head = array(
			'title' => 'Lennon Santos | Sistema &raquo; Mensagens Lidas',
			'key'   => 'Sistema',
			'description' => 'Sistema'
		);

		$msg_n_lida = $this->contato->get_n_lidas();
		$qte_msg = count($msg_n_lida);
		$mensagens = $this->contato->get_lidas();

		$page = array(

			"pagina" => "Mensagens lidas",
			"mensagens" => $mensagens,
			"qte_msg" => $qte_msg,
			"class_page_lidas" => "class='active' ",
			"class_page_lixeira" => "",

		);

		// carrega os scripts da pagina 
		$footer = array(
			'scripts' => array(
				"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" => "externo", 			
				"assets/js/scripts.js" => "local",		
			),
			//aqui é definido qual link vai ser o ativo para identificar a pagina
			'link_ativo' => '#linkHome'
		);

		$this->load->view('system_page/head', $head);
		$this->load->view('system_page/nav');
		$this->load->view('system_page/mensagens', $page);
		$this->load->view('system_page/footer', $footer);

	}

	public function lixeira(){

		$head = array(
			'title' => 'Lennon Santos | Sistema &raquo; Lixeira',
			'key'   => 'Sistema',
			'description' => 'Sistema'
		);

		$msg_n_lida = $this->contato->get_n_lidas();
		$qte_msg = count($msg_n_lida);
		$mensagens = $this->contato->get_lixeira();

		$page = array(

			"pagina" => "Lixeira",
			"mensagens" => $mensagens,
			"qte_msg" => $qte_msg,
			"class_page_lidas" => "",
			"class_page_lixeira" => "class='active'",

		);

		// carrega os scripts da pagina
		$footer = array(
			'scripts' => array(
				"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" => "externo", 			
				"assets/js/scripts.js" => "local",		
			),
			//aqui é definido qual link vai ser o ativo para identificar a pagina
			'link_ativo' => '#linkHome'
		);

		$this->load->view('system_page/head', $head);
		$this->load->view('system_page/nav');
		$this->load->view('system_page/mensagens', $page);
		$this->load->view('system_page/footer', $footer);


	}

	public function action($action = null, $id = null){

		if( $action == null || $id == null){

			redirect(base_url());

		}elseif( $action == 'ler'){

			$this->contato->ler($id);
			redirect(base_url('restrito'));

		}elseif( $action == 'arquivar' ){

			$this->contato->arquivar($id);
			redirect(base_url('restrito/lidas'));

		}	
		
	}

}