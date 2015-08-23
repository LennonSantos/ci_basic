<section>
	<div class="sub-box">
		<div class="content">
			<h2>Você esta em Sistema &raquo; <?php echo $pagina ?> </h2> <br>
			<ul class="menu-aba">
				<li class="active"><a href="<?php echo base_url('restrito'); ?>">Mensagens [<?php echo $qte_msg; ?>]</a></li>
				<li><a href="<?php echo base_url('restrito/lidas'); ?>">Lidas</a></li>
				<li><a href="<?php echo base_url('restrito/lixeira'); ?>">Lixeira</a></li>
			</ul>
		</div> <!-- .content -->
	</div> <!-- .sub-box -->
	<div class="sub-box">
		<div class="content">
			<ul class="box-mensagens">
			<?php foreach ($mensagens as $key => $value) { ?>
				<li>
					<p class="author">de: <?php echo $value['nome_contato'];  ?>, <a href="<?php echo $value['url_contato'];  ?>" target="_blank"><?php echo $value['url_contato'];  ?></a></p>
					<p class="msg"><?php echo $value['msg_contato']; ?></p>
					<p class="info"><b>Email:</b> <?php echo $value['email_contato'];  ?> &bull; <b>Telefone:</b> <?php echo $value['tel_contato']; ?> &bull; <b>Data:</b> <?php echo $value['data_contato'];  ?></p>
					<div class="content">
						<a href="<?php $id = $value['id_contato']; $action = "restrito/action/ler/{$id}"; echo base_url($action); ?>">Marcar como lida &raquo;</a> &nbsp;&nbsp; &bull; &nbsp;&nbsp;
						<a href="<?php $id = $value['id_contato']; $action = "restrito/action/arquivar/{$id}"; echo base_url($action); ?>">Enviar para lixeira &raquo;</a>
					</div>
				</li>
			<?php } ?>
			</ul>
		</div> <!-- .content -->
	</div> <!-- .sub-box -->
</section>
