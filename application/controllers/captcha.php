<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha extends CI_Controller {	

	/* Initialize the controller by calling the necessary helpers and libraries */
    public function __construct(){
    
    	parent::__construct();

	}

	public function index($pagina =  null){

		$head = array(
			'title' => 'Lennon Santos | designer de interface e web designer',
			'key'   => 'lennon santos, lennon, desenvolvedor, designer, web design, são josé dos campos',
			'description' => 'Olá eu sou Lennon Santos, tenho vários trabalhos legais, venha ver :)'
		);

		$footer = array(
			'scripts' => array(
				"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" => "externo", 
				"assets/js/scripts.js" => "local",
			),
			'link_ativo' => ''
		);	

		$n1 = rand(1,20);
		$n2 = rand(1,9);
		$result = $n1 + $n2;

		$this->session->set_userdata("result", $result);

		$captcha = array(
			"n1" => $n1,
			"n2" => $n2,
			"action" => "captcha/verifica/$pagina"
		);

        $this->load->view('master_page/head', $head);
	    $this->load->view('master_page/nav');
	    $this->load->view('captcha', $captcha);
	    $this->load->view('master_page/footer', $footer);	


	}

	public function verifica($pagina = null){

		if( $this->input->post('txtResult') ==  $this->session->userdata("result") ){

			$this->load->library('seguranca');

			$this->seguranca->unset_session_seguranca();
			$this->session->unset_userdata("result");

			redirect( base_url($pagina) );

		}else{

			redirect( base_url("captcha/index/$pagina") );

		}

	}
	
}