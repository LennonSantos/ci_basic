<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('seguranca'))
{

	//este helper calcula a idade a partir de uma data inserida na função
	// $this->load->helper('calcage');
	// echo calcage('17/05/1995');

    function seguranca(){

        if( $this->session->userdata("seguranca_login") != null ){

            $qte_erros = $this->session->userdata("seguranca_login") + 1;

            $this->session->set_userdata("seguranca_login", $qte_erros); 

        }else{
            $this->session->set_userdata("seguranca_login", 1); 
        } 

    }
}