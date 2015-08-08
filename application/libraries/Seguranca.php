<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Seguranca {

    public function set_session_seguranca(){

    	$CI =& get_instance();

    	$CI->load->library('session');

    	$session  = $CI->session->userdata("seguranca");

    	if( $session != null ){

			$qte_erros = $CI->session->userdata("seguranca") + 1;

			$CI->session->set_userdata("seguranca", $qte_erros); 

		}else{
			$CI->session->set_userdata("seguranca", 1); 
		} 	

    }

    public function unset_session_seguranca(){

    	$CI =& get_instance();

    	$CI->load->library('session');

    	// aqui destruimos a session de segurança login pois o usuário informou os dados corretos
		$CI->session->unset_userdata("seguranca");

    }

    public function verifica_bot($max = 10, $pagina = null){

    	$CI =& get_instance();

    	$CI->load->library('session');
    	$CI->load->helper('url');

    	$session  = $CI->session->userdata("seguranca");

    	if( $session > $max ){
            $action = "captcha/index/$pagina";
    		redirect( base_url($action) ); 
    	}

    } 


}