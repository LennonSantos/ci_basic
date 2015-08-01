<footer>
<!-- footer -->
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
        $("<?php echo $nav;  ?>").addClass('active');
    </script>
</body>
</html>