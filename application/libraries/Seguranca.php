<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Seguranca {

    public function set_seguranca_login(){

    	$CI =& get_instance();

    	$CI->load->library('session');

    	$session  = $CI->session->userdata("seguranca_login");

    	if( $session != null ){

			$qte_erros = $CI->session->userdata("seguranca_login") + 1;

			$CI->session->set_userdata("seguranca_login", $qte_erros); 

		}else{
			$CI->session->set_userdata("seguranca_login", 1); 
		} 	

    }

    public function unset_seguranca_login(){

    	$CI =& get_instance();

    	$CI->load->library('session');

    	// aqui destruimos a session de segurança login pois o usuário informou os dados corretos
		$CI->session->unset_userdata("seguranca_login");

    }

    public function verifica_bot_login($max){

    	$CI =& get_instance();

    	$CI->load->library('session');
    	$CI->load->helper('url');

    	$session  = $CI->session->userdata("seguranca_login");

    	if( $session > $max ){
    		redirect( base_url('captcha') ); 
    	}

    }

}