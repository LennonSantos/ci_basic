window.onload = function() {

 	var menu = "fechado";

	$( "nav.menu > h2" ).click(function() {

		if(menu == "aberto"){

			$("nav.menu > ul").hide('slow/400/fast', function() {			
			});

			$( "nav.menu > h2" ).removeClass('ico-abrir-menu')
			$( "nav.menu > h2" ).addClass('ico-fechar-menu');

			menu = "fechado";			

		}else{			

			$("nav.menu > ul").show('slow/400/fast', function() {			
			});		

			$( "nav.menu > h2" ).removeClass('ico-fechar-menu')
			$( "nav.menu > h2" ).addClass('ico-abrir-menu');

			menu = "aberto";

		}		

	});


	//fechar menu
	$(".fechar-menu").click(function(event) {

		$("nav.menu > ul").hide('slow/400/fast', function() {			
		});

		menu = "fechado";

	});
	//fim fechar menu
};