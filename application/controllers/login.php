<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {

	public function __construct(){

		parent::__construct();		

		// library de segurança
		$this->load->library('seguranca');

		//verefica se á bot, o usuario pode errar o email e senha 10 vezes
		$this->seguranca->verifica_bot(10, "login");

	}
 
	public function index(){

		// cria o head da pagina login
		$head = array(
			'title' => 'Lennon Santos | Login',
			'key'   => '',
			'description' => ''
		);

		// carrega os scripts da pagina login
		$footer = array(
			'scripts' => array(
				"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" => "externo", 				
				"assets/js/scripts.js" => "local",
				"assets/js/jquery.cookie.js" => "local",
				"assets/js/login-scripts.js" => "local"
			),
			//aqui é definido qual link vai ser o ativo para identificar a pagina, script no footer, identificado pelo id do link
			'link_ativo' => '#linkLogin'
		);

		// carrega as views
		$this->load->view('master_page/head', $head);
		$this->load->view('master_page/nav');
		$this->load->view('login');
		$this->load->view('master_page/footer', $footer);
	}
	
	// função para logar o usuário
	public function logar(){

		$this->load->model('model_login','login');
		
		$email = $this->input->post("txtEmail");
		$senha = sha1($this->input->post("txtPwd"));

		// cunsulta no BD se existe uma conta com os seguintes dados
		$result = $this->login->get($email, $senha);

		if ($email == $result[0]['email_user'] && $senha == $result[0]['pwd_user']) {

			//seta um session de autenticação do usuário
			$this->session->set_userdata("logado", 1);

			// seta um cookie com email do usuario por 7 dias
			setcookie("txtEmail", "{$email}", (time() + (3600 * 24 * 7)));

			// aqui destruimos a session de segurança login pois o usuário informou os dados corretos
			$this->session->unset_userdata("seguranca");

			// destroi a session seguranca pois o usuario acertou a senha
			$this->seguranca->unset_session_seguranca();

			redirect(base_url('restrito'));

		} else {

			// seta um cookie com email do usuario por 20 segundos caso ele erre o email e senha
			setcookie("txtEmail", "{$email}", (time() + (20)));				 	

			$this->seguranca->set_session_seguranca();			

			$s = $this->session->userdata("seguranca");

			// seta uma session de menssagem
			$this->session->set_flashdata('msg-login', "usuário ou senha inválidos. <br> tente usar email como <b>lennonsbueno@gmail.com</b> e senha como <b>123</b> {$s}"); 

			//redireciona para a pagina login 
			redirect(base_url('login'));

		}
	}

	// função para deslogar usuario
	public function logout(){
		$this->session->unset_userdata("logado");
		redirect(base_url('login'));
		
	}
	
}