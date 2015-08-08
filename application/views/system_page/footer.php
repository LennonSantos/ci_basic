        <footer>
        <!-- footer -->
        <p class="text-center"><a href="http://lennonsantos.com.br" target="_blank">por Lennon santos</a></p>
        </footer>
    	 <!-- jQuery & Scripts --> 
        <?php
        	foreach ($scripts as $key => $value) {
        		if($value == "local"){
        			echo "<script type='text/javascript' src='".base_url().$key."'>  </script>";
        		}elseif($value == "externo"){
        			echo "<script type='text/javascript' src='".$key."'>  </script>";
        		}
        	}
        ?>
        <script type="text/javascript">
            $("<?php echo $link_ativo;  ?>").addClass('active');
        </script>
    </div><!-- .box -->
</body>
</html>