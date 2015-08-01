<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
	public function index($erro = null){

		$head = array(
			'title' => 'Lennon Santos | Login',
			'key'   => '',
			'description' => ''
		);

		$footer = array(
			'scripts' => array(
				"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" => "externo", 
				"assets/js/scripts.js" => "local",
			),
			'nav' => '#linkLogin'
		);

		$avisos = array(
			"erro" => $erro
		);

		$this->load->view('master_page/head', $head);
		$this->load->view('master_page/nav');
		$this->load->view('login',$avisos);
		$this->load->view('master_page/footer', $footer);
	}
	
	public function logar(){

		$this->load->model('model_login','login');
		
		$email = $this->input->post("txtEmail");
		$senha = sha1($this->input->post("txtPwd"));

		$result = $this->login->get($email, $senha);

		if ($email == $result[0]['email_user'] && $senha == $result[0]['pwd_user']) {
			$this->session->set_userdata("logado", 1);
			redirect(base_url('restrito'));
		} else {
			redirect(base_url('login/index/usuario-ou-senha-invalidos'));
		}
	}

	public function logout(){
		$this->session->unset_userdata("logado");
		redirect(base_url('login'));
		
	}
	
}