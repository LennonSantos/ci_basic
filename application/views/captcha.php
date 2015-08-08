<section>
	<div class="sub-box jumbotron">
		<div class="content">
			<h2 class="text-center"> Foi detectado uma ação suspeita, você é humano?</h2>
			<p class="text-center">Insira o resultado corretamente para prossegur.</p>
		</div>
	</div>
</section>
<section>
	<div class="sub-box">
		<form action="<?php echo base_url($action); ?>" method="post" class="form">			
			<div class="row">
				<div class="cols cols-1">
					<div class="content">
						<label>Qual o resultado para a adição seguinte : <b><?php echo $n1." + ".$n2; ?></b> = ?</label>
						<input type="number" name="txtResult" required placeholder="Resultado aqui:">
					</div>					
				</div>
			</div>	
			<input type="submit">		
		</form>

	</div>
</section>