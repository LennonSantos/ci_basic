//insere o email do usuario caso ele ja tenha logado
function inserirValores(){

	$('#txtEmail').val( $.cookie('txtEmail') );

}

inserirValores();

	

