<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {	

	public function index()
	{
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
			'link_ativo' => '#linkHome'
		);		

		$this->load->view('master_page/head', $head);
		$this->load->view('master_page/nav');
		$this->load->view('home');
		$this->load->view('master_page/footer', $footer);
	}
	
}

/*

EXEMPLO FUNCTION VIEW

public function AQUI-A-VIEW(){
	
	//AQUI DEFINIMOS AS META TAGS
	$head = array(
		'title' => 'Lennon Santos | designer de interface e web designer',
		'key'   => 'lennon santos, lennon, desenvolvedor, designer, web design, são josé dos campos',
		'description' => 'Olá eu sou Lennon Santos, tenho vários trabalhos legais, venha ver :)'
	);

	
	// AQUI DEFINIMOS QUAL SCRIPT SERÁ CARREGADO NA PAGINA 
	$footer = array(
		'scripts' => array(
			"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" => "externo", 
			"assets/js/jquery.mask.min.js" => "local",
			"assets/js/use-mask-tel.js" => "local",
			"assets/js/scroll.js" => "local"
		),
		'link_ativo' => 'id do link da pagina [exemplo: #linkHome]'
	);	
	
	//AQUI CARREGAMOS NOSSO HTML EM PARTES, PODERIA SER SÓ EM UM ARQUIVO, MAS FICA A SEU CRITÉRIO
	$this->load->view('master_page/head', $head);
	$this->load->view('master_page/nav', $nav);
	$this->load->view('contato');
	$this->load->view('master_page/footer', $footer);

}

*/