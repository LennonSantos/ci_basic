//insere valores nos inputs  quando há erro, assim evitando do usuário digitar novamente
function inserirValores(){

	$('#txtNome').val( $.cookie('txtNome') );
	$('#txtTelefone').val( $.cookie('txtTel') );
	$('#txtEmail').val( $.cookie('txtEmail') );
	$('#txtUrl').val( $.cookie('txtUrl') );
	$('#txtMsg').val( $.cookie('txtMsg') );

}

inserirValores();

	

