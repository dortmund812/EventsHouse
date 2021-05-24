<?php 
require_once '../../../../config/config.php';
require_once '../../../../config/funciones.php';

$conexion = conexion($base_datos);
// CONEXION
if (!$conexion) {
	header('Location: '.RUTA.'config/error.php');
	die();
}

	// ------------------------------------------ INFORMES ------------------------------------------
	// TRAER LABELS EVENTO
	$statement = $conexion->prepare('SELECT evento.tipo_evento, COUNT(solicitud.evento_id_evento) AS Agosto FROM solicitud
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento
		GROUP BY evento.tipo_evento');
	$statement->execute();
	$resultado = $statement->fetchAll();
	// ASPIRANTES APROBADOS
	$statementAspirantesA = $conexion->prepare(
		'SELECT estado_aspirante.estado_aspirante, COUNT(aspirante.estado_aspirante) AS Aprobado FROM aspirante
		INNER JOIN estado_aspirante ON aspirante.estado_aspirante = estado_aspirante.id_estado_aspirante
		WHERE aspirante.estado_aspirante = 1'
	);
	$statementAspirantesA->execute();
	$resultadoAspirantesA = $statementAspirantesA->fetch();
	// ASPIRANTES RECHAZADOS
	$statementAspirantesR = $conexion->prepare(
		'SELECT estado_aspirante.estado_aspirante, COUNT(aspirante.estado_aspirante) AS Aprobado FROM aspirante
		INNER JOIN estado_aspirante ON aspirante.estado_aspirante = estado_aspirante.id_estado_aspirante
		WHERE aspirante.estado_aspirante = 2'
	);
	$statementAspirantesR->execute();
	$resultadoAspirantesR = $statementAspirantesR->fetch();
	// ASPIRANTES EN ESPERA
	$statementAspirantesE = $conexion->prepare(
		'SELECT estado_aspirante.estado_aspirante, COUNT(aspirante.estado_aspirante) AS Aprobado FROM aspirante
		INNER JOIN estado_aspirante ON aspirante.estado_aspirante = estado_aspirante.id_estado_aspirante
		WHERE aspirante.estado_aspirante = 3'
	);
	$statementAspirantesE->execute();
	$resultadoAspirantesE = $statementAspirantesE->fetch();

	$statementCargosAsp = $conexion->prepare('SELECT rol_trabajador.rol_trabajador, COUNT(aspirante.rol_aspirante) as Total FROM aspirante
		INNER JOIN rol_trabajador on aspirante.rol_aspirante = rol_trabajador.id_rol
		WHERE aspirante.estado_aspirante = 1
		GROUP by rol_trabajador.rol_trabajador');
	$statementCargosAsp->execute();
	$resultadoCargosAsp = $statementCargosAsp->fetchAll();

	// ---------------------------------------------- ENERO ----------------------------------------------
	$statementREnero = $conexion->prepare(
		"SELECT SUM(cotizacion.costo_cotizacion) AS Enero FROM cotizacion 
		INNER JOIN solicitud on cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		WHERE(solicitud.fecha_evento > '2019-01-01') and (solicitud.fecha_evento < '2019-02-01');"
	);
	$statementREnero->execute();
	$resultadoREnero = $statementREnero->fetch();
	if (empty($resultadoREnero)) {
		$resultadoREnero[0] = 0;
	}
	// --------------------------------------------- FEBRERO ---------------------------------------------
	$statementRFebrero = $conexion->prepare(
		"SELECT SUM(cotizacion.costo_cotizacion) AS Febrero FROM cotizacion 
		INNER JOIN solicitud on cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		WHERE(solicitud.fecha_evento > '2019-02-01') and (solicitud.fecha_evento < '2019-03-01');"
	);
	$statementRFebrero->execute();
	$resultadoRFebrero = $statementRFebrero->fetch();
	if (empty($resultadoRFebrero)) {
		$resultadoRFebrero[0] = 0;
	}
	// ---------------------------------------------- MARZO ----------------------------------------------
	$statementRMarzo = $conexion->prepare(
		"SELECT SUM(cotizacion.costo_cotizacion) AS Marzo FROM cotizacion 
		INNER JOIN solicitud on cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		WHERE(solicitud.fecha_evento > '2019-03-01') and (solicitud.fecha_evento < '2019-04-01');"
	);
	$statementRMarzo->execute();
	$resultadoRMarzo = $statementRMarzo->fetch();
	if (empty($resultadoRMarzo)) {
		$resultadoRMarzo[0] = 0;
	}
	// ---------------------------------------------- ABRIL ----------------------------------------------
	$statementRAbril = $conexion->prepare(
		"SELECT SUM(cotizacion.costo_cotizacion) AS Abril FROM cotizacion 
		INNER JOIN solicitud on cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		WHERE(solicitud.fecha_evento > '2019-04-01') and (solicitud.fecha_evento < '2019-05-01');"
	);
	$statementRAbril->execute();
	$resultadoRAbril = $statementRAbril->fetch();
	if (empty($resultadoRAbril)) {
		$resultadoRAbril[0] = 0;
	}
	// ---------------------------------------------- MAYO ----------------------------------------------
	$statementRMayo = $conexion->prepare(
		"SELECT SUM(cotizacion.costo_cotizacion) AS Mayo FROM cotizacion 
		INNER JOIN solicitud on cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		WHERE(solicitud.fecha_evento > '2019-05-01') and (solicitud.fecha_evento < '2019-06-01');"
	);
	$statementRMayo->execute();
	$resultadoRMayo = $statementRMayo->fetch();
	if (empty($resultadoRMayo)) {
		$resultadoRMayo[0] = 0;
	}
	// ---------------------------------------------- JUNIO ----------------------------------------------
	$statementRJunio = $conexion->prepare(
		"SELECT SUM(cotizacion.costo_cotizacion) AS Junio FROM cotizacion 
		INNER JOIN solicitud on cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		WHERE(solicitud.fecha_evento > '2019-06-01') and (solicitud.fecha_evento < '2019-07-01');"
	);
	$statementRJunio->execute();
	$resultadoRJunio = $statementRJunio->fetch();
	if (empty($resultadoRJunio)) {
		$resultadoRJunio[0] = 0;
	}
	// ---------------------------------------------- JULIO ----------------------------------------------
	$statementRJulio = $conexion->prepare(
		"SELECT SUM(cotizacion.costo_cotizacion) AS Julio FROM cotizacion 
		INNER JOIN solicitud on cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		WHERE(solicitud.fecha_evento > '2019-07-01') and (solicitud.fecha_evento < '2019-08-01');"
	);
	$statementRJulio->execute();
	$resultadoRJulio = $statementRJulio->fetch();
	if (empty($resultadoRJulio)) {
		$resultadoRJulio[0] = 0;
	}
	// --------------------------------------------- AGOSTO ---------------------------------------------
	$statementRAgosto = $conexion->prepare(
		"SELECT SUM(cotizacion.costo_cotizacion) AS Agosto FROM cotizacion 
		INNER JOIN solicitud on cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		WHERE(solicitud.fecha_evento > '2019-08-01') and (solicitud.fecha_evento < '2019-09-01');"
	);
	$statementRAgosto->execute();
	$resultadoRAgosto = $statementRAgosto->fetch();
	if (empty($resultadoRAgosto[0])) {
		$resultadoRAgosto[0] = 0;
	}
	// ------------------------------------------- SEPTIEMBRE -------------------------------------------
	$statementRSeptiembre = $conexion->prepare(
		"SELECT SUM(cotizacion.costo_cotizacion) AS Septiembre FROM cotizacion 
		INNER JOIN solicitud on cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		WHERE(solicitud.fecha_evento > '2019-09-01') and (solicitud.fecha_evento < '2019-10-01');"
	);
	$statementRSeptiembre->execute();
	$resultadoRSeptiembre = $statementRSeptiembre->fetch();
	if (empty($resultadoRSeptiembre)) {
		$resultadoRSeptiembre[0] = 0;
	}
	// --------------------------------------------- OCTUBRE ---------------------------------------------
	$statementROctubre = $conexion->prepare(
		"SELECT SUM(cotizacion.costo_cotizacion) AS Octubre FROM cotizacion 
		INNER JOIN solicitud on cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		WHERE(solicitud.fecha_evento > '2019-10-01') and (solicitud.fecha_evento < '2019-11-01');"
	);
	$statementROctubre->execute();
	$resultadoROctubre = $statementROctubre->fetch();
	if (empty($resultadoROctubre)) {
		$resultadoROctubre[0] = 0;
	}
	// -------------------------------------------- NOVIEMBRE --------------------------------------------
	$statementRNoviembre = $conexion->prepare(
		"SELECT SUM(cotizacion.costo_cotizacion) AS Noviembre FROM cotizacion 
		INNER JOIN solicitud on cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		WHERE(solicitud.fecha_evento > '2019-11-01') and (solicitud.fecha_evento < '2019-12-01');"
	);
	$statementRNoviembre->execute();
	$resultadoRNoviembre = $statementRNoviembre->fetch();
	if (empty($resultadoRNoviembre)) {
		$resultadoRNoviembre[0] = 0;
	}
	// -------------------------------------------- DICIEMBRE --------------------------------------------
	$statementRDiciembre = $conexion->prepare(
		"SELECT SUM(cotizacion.costo_cotizacion) AS Diciembre FROM cotizacion 
		INNER JOIN solicitud on cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		WHERE(solicitud.fecha_evento > '2019-12-01') and (solicitud.fecha_evento < '2020-01-01');"
	);
	$statementRDiciembre->execute();
	$resultadoRDiciembre = $statementRDiciembre->fetch();
	if (empty($resultadoRDiciembre)) {
		$resultadoRDiciembre[0] = 0;
	}
	// ----------------------------------- EVENTOS EN ENERO -----------------------------------
	$statementEEnero = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadEventosEnero FROM solicitud
		WHERE (solicitud.fecha_solicitud > '2019-01-01 00:00:00') AND (solicitud.fecha_solicitud < '2019-02-01 00:00:00');"
	);
	$statementEEnero->execute();
	$resultadoEEnero = $statementEEnero->fetch();
	// ----------------------------------- EVENTOS EN FEBRERO -----------------------------------
	$statementEFebrero = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadEventosFebrero FROM solicitud
		WHERE (solicitud.fecha_solicitud > '2019-02-01 00:00:00') AND (solicitud.fecha_solicitud < '2019-03-01 00:00:00');"
	);
	$statementEFebrero->execute();
	$resultadoEFebrero = $statementEFebrero->fetch();
	// ----------------------------------- EVENTOS EN MARZO -----------------------------------
	$statementEMarzo = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadEventosMarzo FROM solicitud
		WHERE (solicitud.fecha_solicitud > '2019-03-01 00:00:00') AND (solicitud.fecha_solicitud < '2019-04-01 00:00:00');"
	);
	$statementEMarzo->execute();
	$resultadoEMarzo = $statementEMarzo->fetch();
	// ----------------------------------- EVENTOS EN ABRIL -----------------------------------
	$statementEAbril = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadEventosAbril FROM solicitud
		WHERE (solicitud.fecha_solicitud > '2019-04-01 00:00:00') AND (solicitud.fecha_solicitud < '2019-05-01 00:00:00');"
	);
	$statementEAbril->execute();
	$resultadoEAbril = $statementEAbril->fetch();
	// ----------------------------------- EVENTOS EN MAYO -----------------------------------
	$statementEMayo = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadEventosMayo FROM solicitud
		WHERE (solicitud.fecha_solicitud > '2019-05-01 00:00:00') AND (solicitud.fecha_solicitud < '2019-06-01 00:00:00');"
	);
	$statementEMayo->execute();
	$resultadoEMayo = $statementEMayo->fetch();
	// ----------------------------------- EVENTOS EN JUNIO -----------------------------------
	$statementEJunio = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadEventosJunio FROM solicitud
		WHERE (solicitud.fecha_solicitud > '2019-06-01 00:00:00') AND (solicitud.fecha_solicitud < '2019-07-01 00:00:00');"
	);
	$statementEJunio->execute();
	$resultadoEJunio = $statementEJunio->fetch();
	// ----------------------------------- EVENTOS EN JULIO -----------------------------------
	$statementEJulio = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadEventosJulio FROM solicitud
		WHERE (solicitud.fecha_solicitud > '2019-07-01 00:00:00') AND (solicitud.fecha_solicitud < '2019-08-01 00:00:00');"
	);
	$statementEJulio->execute();
	$resultadoEJulio = $statementEJulio->fetch();
	// ------------------------------------ EVENTOS EN AGOSTO ------------------------------------
	$statementEAgosto = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadEventosAgosto  FROM solicitud
		WHERE (solicitud.fecha_solicitud > '2019-08-01 00:00:00') AND (solicitud.fecha_solicitud < '2019-09-01 00:00:00');"
	);
	$statementEAgosto->execute();
	$resultadoEAgosto = $statementEAgosto->fetch();
	// ----------------------------------- EVENTOS EN SEPTIEMBRE -----------------------------------
	$statementESeptiembre = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadEventosSeptiembre FROM solicitud
		WHERE (solicitud.fecha_solicitud > '2019-09-01 00:00:00') AND (solicitud.fecha_solicitud < '2019-10-01 00:00:00');"
	);
	$statementESeptiembre->execute();
	$resultadoESeptiembre = $statementESeptiembre->fetch();
	// ------------------------------------ EVENTOS EN OCTUBRE ------------------------------------
	$statementEOctubre = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadEventosOctubre FROM solicitud
		WHERE (solicitud.fecha_solicitud > '2019-10-01 00:00:00') AND (solicitud.fecha_solicitud < '2019-11-01 00:00:00');"
	);
	$statementEOctubre->execute();
	$resultadoEOctubre = $statementEOctubre->fetch();
	// ------------------------------------ EVENTOS EN NOVIEMBRE ------------------------------------
	$statementENoviembre = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadEventosNoviembre FROM solicitud
		WHERE (solicitud.fecha_solicitud > '2019-11-01 00:00:00') AND (solicitud.fecha_solicitud < '2019-12-01 00:00:00');"
	);
	$statementENoviembre->execute();
	$resultadoENoviembre = $statementENoviembre->fetch();
	// ------------------------------------ EVENTOS EN DICIEMBRE ------------------------------------
	$statementEDiciembre = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadEventosDiciembre FROM solicitud
		WHERE (solicitud.fecha_solicitud > '2019-12-01 00:00:00') AND (solicitud.fecha_solicitud < '2020-01-01 00:00:00');"
	);
	$statementEDiciembre->execute();
	$resultadoEDiciembre = $statementEDiciembre->fetch();

?>