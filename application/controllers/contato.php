<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contato extends CI_Controller {

	public function __construct(){

		parent::__construct();		

		// library de segurança
		$this->load->library('seguranca');

		//verefica se á bot, o usuario pode errar o email e senha 10 vezes
		$this->seguranca->verifica_bot(10, "contato");

	}

	public function index(){	

		// cria o head da pagina contato
		$head = array(
			'title' => 'Lennon Santos | Contato',
			'key'   => 'Lennon santos contato, lennon, contato',
			'description' => 'Entre em contato comigo :)'
		);

		// carrega os scripts da pagina contato
		$footer = array(
			'scripts' => array(
				"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" => "externo", 
				"assets/js/jquery.cookie.js" => "local",
				"assets/js/contato-scripts.js" => "local",				
				"assets/js/scripts.js" => "local",				
				"assets/js/jquery.mask.min.js" => "local",
				"assets/js/use-mask-tel.js" => "local",
			),
			//aqui é definido qual link vai ser o ativo para identificar a pagina
			'link_ativo' => '#linkContato'
		);

		$this->load->view('master_page/head', $head);
		$this->load->view('master_page/nav');
		$this->load->view('contato');
		$this->load->view('master_page/footer', $footer);

			
	}// fim function index

    /******************************************************************************************************/

	public function enviar(){		

		//carrega a biblioteca de validação do formulario
		$this->load->library('form_validation');			

		// valida as informações informadas pelo usuário
		$this->form_validation->set_rules('txtNome', 'Nome', 'required|min_length[4]|max_length[49]');
		$this->form_validation->set_rules('txtTel', 'Telefone', 'required|min_length[4]|max_length[20]');
		$this->form_validation->set_rules('txtEmail', 'Email', 'required|min_length[4]|max_length[49]|valid_email');
		$this->form_validation->set_rules('txtUrl', 'Link', 'min_length[4]|max_length[49]');
		$this->form_validation->set_rules('txtMsg', 'Mensagem', 'required|min_length[4]|max_length[5000]');

		$inputs = array(

			"txtNome"  => $this->input->post("txtNome"),
			"txtTel"   => $this->input->post("txtTel"),
			"txtEmail" => $this->input->post("txtEmail"),
			"txtUrl"   => $this->input->post("txtUrl"),
			"txtMsg"   => $this->input->post("txtMsg")

		);

		if ($this->form_validation->run() == FALSE){				

			// cria um array com todos erros
			$avisos = array(
				form_error('txtNome'),
				form_error('txtTel'),
				form_error('txtEmail'),
				form_error('txtUrl'),
				form_error('txtMsg')				
			);			

			//cria os cookies com as informações digitadas no input pelo usuario, e servira para que ele não digite novamente oque ja foi feito
			foreach ($inputs as $key => $value) {

				setcookie("{$key}", "{$value}", (time() + (20)));

			}			


		}else{

			//carrega o model contato para poder inserir o contato
			$this->load->model('model_contato', 'contato');

			// insere o contato usando a função inserir do model contato
			$this->contato->inserir($this->input->post("txtNome"), 
				                    $this->input->post("txtTel"), 
				                    $this->input->post("txtEmail"), 
				                    $this->input->post("txtUrl"), 
				                    $this->input->post("txtMsg"));			

			// cria o aviso de conclusão
			$avisos = array(
				"<p>Obrigado. Agradecemos o seu contato. Em breve encaminharei a resposta.</p>"				
			);

			//destroi os cookies
			foreach ($inputs as $key => $value) {
				setcookie("{$key}", "{$value}", (time() - (3600)));
			}

		} // fim else	                   

		//seta uma session com os avisos, erros..
		$this->session->set_flashdata('msg-contato', $avisos);       

		$this->seguranca->set_session_seguranca();	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          

		// redireciona para a pagina contato
		redirect(base_url('contato'));

	} // fim function enviar

}