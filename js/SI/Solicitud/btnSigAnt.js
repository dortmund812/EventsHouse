$(document).ready(function(){
	// BTN SIGUIENTE (EVENTO)
	$('#btn_sig_eve').on('click', function(e){
		e.preventDefault();
		$('#lugar_tab').click();
	});
	// BTN ANTERIOR (LUGAR)
	$('#btn_ant_lug').on('click', function(e){
		e.preventDefault();
		$('#evento_tab').click();
	});
	// BTN SIGUIENTE (LUGAR)
	$('#btn_sig_lug').on('click', function(e){
		e.preventDefault();
		$('#banquete_tab').click();
	});
	// BTN ANTERIOR (BANQUETE)
	$('#btn_ant_ban').on('click', function(e){
		e.preventDefault();
		$('#lugar_tab').click();
	});
	// BTN SIGUIENTE (BANQUETE)
	$('#btn_sig_ban').on('click', function(e){
		e.preventDefault();
		$('#paquete_tab').click();
	});
	// BTN ANTERIOR (PAQUETE)
	$('#btn_ant_paq').on('click', function(e){
		e.preventDefault();
		$('#banquete_tab').click();
	});
});