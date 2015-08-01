<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contato extends CI_Controller {

	public function index(){	

		$head = array(
			'title' => 'Lennon Santos | Contato',
			'key'   => 'Lennon santos contato, lennon, contato',
			'description' => 'Entre em contato comigo :)'
		);

		$footer = array(
			'scripts' => array(
				"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" => "externo", 
				"assets/js/scripts.js" => "local",
				"assets/js/jquery.mask.min.js" => "local",
				"assets/js/use-mask-tel.js" => "local",
			),
			'nav' => '#linkContato'
		);

		$this->load->view('master_page/head', $head);
		$this->load->view('master_page/nav');
		$this->load->view('contato');
		$this->load->view('master_page/footer', $footer);

			
	}// function index

	public function enviar(){		

		$this->load->model('model_contato', 'contato');
		$this->load->library('form_validation');			

		$this->form_validation->set_rules('txtNome', 'Nome', 'required|min_length[4]|max_length[49]');
		$this->form_validation->set_rules('txtTel', 'Telefone', 'required|min_length[4]|max_length[20]');
		$this->form_validation->set_rules('txtEmail', 'Email', 'required|min_length[4]|max_length[49]|valid_email');
		$this->form_validation->set_rules('txtUrl', 'Link', 'required|min_length[4]|max_length[49]');
		$this->form_validation->set_rules('txtMsg', 'Mensagem', 'required|min_length[4]|max_length[5000]');

		if ($this->form_validation->run() == FALSE){				

			$avisos = array(
				form_error('txtNome'),
				form_error('txtTel'),
				form_error('txtEmail'),
				form_error('txtUrl'),
				form_error('txtMsg')				
			);


		}else{
			$nome = $this->input->post("txtNome");
			$tel = $this->input->post("txtTel");
			$email = $this->input->post("txtEmail");
			$url = $this->input->post("txtUrl");
			$msg = $this->input->post("txtMsg");

			$this->contato->inserir($nome, $tel, $email, $url, $msg);

			$avisos = array(
				"<p>Obrigado. Agradecemos o seu contato. Em breve encaminharei a resposta.</p>"				
			);
		}	                   

		$this->session->set_flashdata('msg-contato', $avisos);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 

		redirect(base_url('contato'));

	} // function enviar

}