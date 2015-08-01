<section>
	<div class="sub-box jumbotron">
		<div class="content">
			<h2 class="text-center"> { PAGINA DE LOGIN }</h2>
			<form id="formLogin" class="content" method="post" action="<?php echo base_url('login/logar'); ?>">
				<input type="email" name="txtEmail" placeholder="lennonsbueno@gmail.com"> <br> <br>
				<input type="password" name="txtPwd" placeholder="123">  <br>
				<input type="submit">
			</form>
			<p>
			<?php  

			if(isset($erro)){

				$new = str_replace("-", " ", $erro);
				echo $new;
			}

			?>
			</p>
		</div>
	</div>
</section>
<section class="jumbotron">
	<div class="sub-box">
		<div class="content">
			<h2>IMPORTANTE</h2>
			<ol>
				<li>Antes você deve criar uma tabela na base de dados test, script abaixo.</li>
				<ul>
					<li>CREATE TABLE tb_user(<br>

						id_user int not null primary key auto_increment,<br>
						email_user varchar(50) not null,<br>
						pwd_user varchar(50) not null,<br>
						active_user char(1) not null<br>

					)ENGINE=INNODB;</li>
				</ul>
				<li>Em seguida adicionar o seguinte script com os dados de login.</li>
				<ul>
					<li>INSERT INTO `test`.`tb_user` (`id_user`, `email_user`, `pwd_user`, `active_user`) VALUES (NULL, 'lennonsbueno@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1');</li>
				</ul>
				<li>Para alterar a base de dados vá até  a pasta system/model.php e altere a linha 61</li>
				<li>Para alterar a tabela vá até a pasta application/models/model_login.php e altere a linha 4</li>
			</ol>
		</div>
	</div>
</section>S