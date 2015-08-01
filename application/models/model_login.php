<?php
class Model_login extends MY_Model {

   public $_tabela = "tb_user";

   function __construct(){
  	 parent::__construct();
   }

    function get($email,$senha){
      trim($email);
      trim($senha);

      return $this->read("email_user= '{$email}' AND pwd_user = '{$senha}' AND active_user = 1 ");
    }   

}

/*

CREATE TABLE tb_user(

	id_user int not null primary key auto_increment,
	email_user varchar(50) not null,
	pwd_user varchar(50) not null,
	active_user char(1) not null

)ENGINE=INNODB;

INSERT INTO `test`.`tb_user` (`id_user`, `email_user`, `pwd_user`, `active_user`) VALUES (NULL, 'lennonsbueno@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1');

*/