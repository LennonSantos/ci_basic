<?php
class Model_contato extends MY_Model {

   public $_tabela = "tb_contato";

   function __construct(){
  	 parent::__construct();
   }

    function get(){
      return $this->read("");
    }

    function inserir($nome, $tel, $email, $url, $msg){

    	return $this->insert(array(
    	"id_contato"    => 0,
			"nome_contato"  => $nome,
			"tel_contato"   => $tel,
			"email_contato" => $email,
      "url_contato" => $url,
			"msg_contato"   => $msg,
			"data_contato"  => date("Y-m-d H:i:s")
		));

    }   

}

/*

CREATE table tb_contato(

  id_contato int not null primary key auto_increment,
  nome_contato varchar(50) not null,
  tel_contato varchar(20) not null,
  email_contato varchar(50) not null,
  url_contato varchar(50) not null,
  msg_contato text(5000) not null,
  data_contato datetime not null

)ENGINE=INNODB;

*/