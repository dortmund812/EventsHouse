<?php require_once '../../views/Sistema/header.view.php'; ?>
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/SI/Cotizacion/estiloCotizacion.css">
	<!-- DETECTAR IDIOMA -->
	<p id="detectar_idioma" class="d-none"><?php echo $idi; ?></p>
	<h2 class="titulo h1 pl-0 pr-0"><?php echo $lenguaje["NuestrosEventos"] ?></h2>
	<div class="container pt-4">
		<div class="row">
			<!-- BOTONES DE IDIOMA -->
			<div class="idiomas">
				<ul>
					<li>
						<a href="<?php echo RUTA; ?>SI/Cotizacion/cotizacion?lenguaje=es">
							<img src="<?php echo RUTA; ?>img/Extras/CO.png" alt="">
						</a>
						<a href="<?php echo RUTA; ?>SI/Cotizacion/cotizacion?lenguaje=en">
							<img src="<?php echo RUTA; ?>img/Extras/US.png" alt="">
						</a>
						<a href="<?php echo RUTA; ?>SI/Cotizacion/cotizacion?lenguaje=fr">
							<img src="<?php echo RUTA; ?>img/Extras/FR.png" alt="">
						</a>
					</li>
				</ul>
			</div>
			<!-- NAVEGACION -->
			<div class="menu col-12 d-flex justify-content-between">
				<a href="<?php echo RUTA; ?>" class="inicio btn"><?php echo $lenguaje["Inicio"]; ?></a>
				<div class="busqueda">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
						<input type="search" placeholder="<?php echo $lenguaje["Buscar"]; ?>" name="buscar" id="buscar"></input>
						<button type="submit" class="icon icon-search" value="" id="btn_buscar_evento"></button> 
					</form>
				</div>
			</div>
			<!-- EVENTOS -->
			<div class="col-12">
				<div class="row justify-content-center" id="contenedor_eventos">
					<!-- TRAER EVENTOS -->
				</div>
			</div>
		</div>
	</div>
<?php require_once '../../views/Sistema/footer.view.php'; ?>
<!-- SCRIPT BUSCAR EVENTO -->
<script src="<?php echo RUTA; ?>json/Cotizacion/buscarEvento.js"></script>
<script>
	setInterval(function(){
		traerCargos('HW');
	}, 1000);
	function traerCargos(consulta){
		$.ajax({
			url: '../../config/validar',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			console.log(respuesta);
		})
		.fail(function(){
			console.log('error');
		});
	}
</script>
</body>
</html>