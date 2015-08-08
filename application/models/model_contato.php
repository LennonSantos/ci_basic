<?php
class Model_contato extends MY_Model {

   public $_tabela = "tb_contato";

   function __construct(){
  	 parent::__construct();
   }

    function get_n_lidas(){
      return $this->read("lida_contato = 0 AND lixo_contato = 0","", "", "data_contato ASC");
    }

    function get_lidas(){
      return $this->read("lida_contato = 1 AND lixo_contato = 0","", "", "data_contato DESC");
    }

    function get_lixeira(){
      return $this->read("lixo_contato = 1","", "", "data_contato DESC");
    }

    function inserir($nome, $tel, $email, $url, $msg){

    	return $this->insert(array(
      	"id_contato"    => 0,
  			"nome_contato"  => $nome,
  			"tel_contato"   => $tel,
  			"email_contato" => $email,
        "url_contato" => $url,
  			"msg_contato"   => $msg,
        "lida_contato"  => 0,
        "lixo_contato"  => 0,
  			"data_contato"  => date("Y-m-d H:i:s")
  		));

    }  

    function ler($id){

      return $this->update(array(
        "lida_contato" => 1,
      ),"id_contato = {$id}");

    } 

    function arquivar($id){

      return $this->update(array(
        "lixo_contato" => 1,
      ),"id_contato = {$id}");

    }

}

/*

CREATE table tb_contato(

  id_contato int not null primary key auto_increment,
  nome_contato varchar(50) not null,
  tel_contato varchar(20) not null,
  email_contato varchar(50) not null,
  url_contato varchar(50),
  msg_contato text(5000) not null,
  lida_contato char(1) not null,
  lixo_contato char(1) not null,
  data_contato datetime not null

)ENGINE=INNODB;

*/