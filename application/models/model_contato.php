<?php
class Model_contato extends MY_Model {

   public $_tabela = "tb_contato";

   function __construct(){
  	 parent::__construct();
   }

    function get(){
      return $this->read("");
    }

    function inserir($nome, $tel, $email, $msg){

    	return $this->insert(array(
    		"id_contato"    => 0,
			"nome_contato"  => $nome,
			"tel_contato"   => $tel,
			"email_contato" => $email,
			"msg_contato"   => $msg,
			"data_contato"  => date("Y-m-d H:i:s")
		));

    }   

}