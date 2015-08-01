<section>
	<div class="sub-box">
		<div class="content">
			<h2 class="text-center"> { PAGINA DE CONTATO }</h2>
		</div>
		<form method="post" action="<?php echo base_url('contato/enviar') ?>" class="form">

			<div class="row">
				<div class="cols cols-6-3x">
					<div class="content">
						<label>Nome</label>
						<input type="text" name="txtNome" pattern="[a-z-A-Z\s]+$" required>
					</div>
				</div>
				<div class="cols cols-6-3x">
					<div class="content">
						<label>Telefone</label>
						<input id="txtTelefone" name="txtTel" type="tel" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="cols cols-6-3x">
					<div class="content">
						<label>Email</label>
						<input type="email" name="txtEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required> 
					</div>
				</div>
				<div class="cols cols-6-3x">
					<div class="content">
						<label>Website, Facebook..</label>
						<input type="text" name="txtUrl">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="cols cols-1">
					<div class="content">
						<label>Mensagem</label>
						<textarea rows="5" name="txtMsg"></textarea>
					</div>
				</div>
			</div>		

			<input type="submit" value="ENVIAR">

		</form>

		<ul id="msg-box" class="content">
		<?php

			$msg_contato = $this->session->flashdata('msg-contato');

			if( isset( $msg_contato ) && $msg_contato != null ){

				foreach($msg_contato as $key => $value){
					if($value != null){
						echo "<li> $value </li>";
					}
				}

			}		
		?>
		</ul>
	</div>
</section>
<section class="jumbotron">
	<div class="sub-box">
		<div class="content">
			<h2>IMPORTANTE</h2>
			<ol>
				<li>Antes você deve criar uma tabela na base de dados test, script abaixo.
					<ul>
						<li>CREATE table tb_contato( <br>

						  id_contato int not null primary key auto_increment, <br>
						  nome_contato varchar(50) not null, <br>
						  tel_contato varchar(20) not null, <br>
						  email_contato varchar(50) not null, <br>
						  url_contato varchar(50) not null, <br>
						  msg_contato text(5000) not null, <br>
						  data_contato datetime not null <br>

						)ENGINE=INNODB;</li>
					</ul>
				</li>				
				<li>Para alterar a base de dados vá até  a pasta system/model.php e altere a linha 61</li>
				<li>Para alterar a tabela vá até a pasta application/models/model_login.php e altere a linha 4</li>
			</ol>
		</div>
	</div>
</section>