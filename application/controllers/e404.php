<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class e404 extends CI_Controller {	

	public function index(){

		$head = array(
			'title' => 'Lennon Santos | página não encontrada',
			'key'   => 'lennon santos, lennon, desenvolvedor, designer, web design, são josé dos campos',
			'description' => 'Olá eu sou Lennon Santos, tenho vários trabalhos legais, venha ver :)'
		);

		$footer = array(
			'scripts' => array(
				"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" => "externo", 
				"assets/js/scripts.js" => "local",
			),
			'nav' => '#linkHome'
		);

		$this->load->view('master_page/head', $head);
		$this->load->view('master_page/nav');
		$this->load->view('404');
		$this->load->view('master_page/footer', $footer);

	}

}