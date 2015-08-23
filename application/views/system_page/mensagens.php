<section>
	<div class="sub-box">
		<div class="content">
			<h2>Você esta em Sistema &raquo; <?php echo $pagina ?> </h2> <br>
			<ul class="menu-aba">
				<li><a href="<?php echo base_url('restrito'); ?>">Mensagens [<?php echo $qte_msg; ?>]</a></li>
				<li <?php echo $class_page_lidas; ?> ><a href="<?php echo base_url('restrito/lidas'); ?>">Lidas</a></li>
				<li <?php echo $class_page_lixeira; ?>><a href="<?php echo base_url('restrito/lixeira'); ?>">Lixeira</a></li>
			</ul>
		</div> <!-- .content -->
		<div class="sub-box">
		<div class="content">
			<ul class="box-mensagens">
			<?php foreach ($mensagens as $key => $value) { ?>
				<li>
					<p class="author">de: <?php echo $value['nome_contato'];  ?>, <a href="<?php echo $value['url_contato'];  ?>" target="_blank"><?php echo $value['url_contato'];  ?></a></p>
					<p class="msg"><?php echo $value['msg_contato']; ?></p>
					<p class="info"><b>Email:</b> <?php echo $value['email_contato'];  ?> &bull; <b>Telefone:</b> <?php echo $value['tel_contato']; ?> &bull; <b>Data:</b> <?php echo $value['data_contato'];  ?></p>
					<div class="content">
					<?php if( $value['lixo_contato'] == 0 ){ ?>
						<a href="<?php $id = $value['id_contato']; $action = "restrito/action/arquivar/{$id}"; echo base_url($action); ?>">Enviar para lixeira &raquo;</a>				
					<?php } ?>						
					</div>
				</li>
			<?php } ?>
			</ul>
		</div> <!-- .content -->
	</div> <!-- .sub-box -->
</section>
