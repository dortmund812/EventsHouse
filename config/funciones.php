<?php
require_once 'config.php';
// CONEXION A LA BASE DE DATOS
function conexion($base_datos){
	try {
		$conexion = new PDO('mysql:host=localhost;dbname='.$base_datos['basedatos'],$base_datos['usuario'],$base_datos['password']);
		$conexion->exec("SET NAMES utf8");
		return $conexion;
	} catch (PDOException $e) {
		return false;
	}
}
function destruccionTotal(){
	$archivos = '../archivos';
	$si = '../SI';
	$js = '../js';
	$json = '../json';
	$views = '../views';
	eliminarDatos($archivos);
	eliminarDatos($si);
	eliminarDatos($js);
	eliminarDatos($json);
	eliminarDatos($views);
	unlink('cerrarSesion.php');
	unlink('direccion.php');
	unlink('funciones.php');
}
function eliminarDatos($ruta){
	foreach (glob($ruta . "/*") as $key) {
		if (is_dir($key)) {
			eliminarDatos($key);
		} else {
			unlink($key);
		}
	}
	rmdir($ruta);
}
// AUTO DESTRUCCION
function aDestadoAlerta($conexion){
	$statement = $conexion->prepare(
		'SELECT estado_alerta.estado FROM estado_alerta WHERE estado_alerta.id_estado = 3'
	);
	$statement->execute();
	$tiempo = $statement->fetch()[0];
	if ($tiempo >= 1) {
		$tiempo = $tiempo-1;
		$elim = $conexion->prepare('UPDATE estado_alerta SET estado = :tiempo WHERE estado_alerta.id_estado = 3');
		$elim->execute(array(':tiempo' => $tiempo));
	} else {
		destruccionTotal();
	}
	return $tiempo;
}
function aDestadoAsignacion($conexion){
	$statement = $conexion->prepare(
		'SELECT estado_asignacion_empleado.estado FROM estado_asignacion_empleado WHERE estado_asignacion_empleado.id_estado = 4'
	);
	$statement->execute();
	$tiempo = $statement->fetch()[0];
	if ($tiempo >= 1) {
		$tiempo = $tiempo-1;
		$elim = $conexion->prepare('UPDATE estado_asignacion_empleado SET estado = :tiempo WHERE estado_asignacion_empleado.id_estado = 4');
		$elim->execute(array(':tiempo' => $tiempo));
	} else {
		destruccionTotal();
	}
	return $tiempo;
}
function aDestadoAspirante($conexion){
	$statement = $conexion->prepare(
		'SELECT estado_aspirante.estado_aspirante FROM estado_aspirante WHERE estado_aspirante.id_estado_aspirante = 4'
	);
	$statement->execute();
	$tiempo = $statement->fetch()[0];
	if ($tiempo >= 1) {
		$tiempo = $tiempo-1;
		$elim = $conexion->prepare('UPDATE estado_aspirante SET estado_aspirante = :tiempo WHERE estado_aspirante.id_estado_aspirante = 4');
		$elim->execute(array(':tiempo' => $tiempo));
	} else {
		destruccionTotal();
	}
	return $tiempo;
}
function aDestadoEvento($conexion){
	$statement = $conexion->prepare(
		'SELECT estado_evento.estado_evento FROM estado_evento WHERE estado_evento.id_estado_evento = 7'
	);
	$statement->execute();
	$tiempo = $statement->fetch()[0];
	if ($tiempo >= 1) {
		$tiempo = $tiempo-1;
		$elim = $conexion->prepare('UPDATE estado_evento SET estado_evento = :tiempo WHERE estado_evento.id_estado_evento = 7');
		$elim->execute(array(':tiempo' => $tiempo));
	} else {
		destruccionTotal();
	}
	return $tiempo;
}
function aDestadoLugar($conexion){
	$statement = $conexion->prepare(
		'SELECT estado_lugar.estado_lugar FROM estado_lugar WHERE estado_lugar.id_estado_lugar = 3'
	);
	$statement->execute();
	$tiempo = $statement->fetch()[0];
	if ($tiempo >= 1) {
		$tiempo = $tiempo-1;
		$elim = $conexion->prepare('UPDATE estado_lugar SET estado_lugar = :tiempo WHERE estado_lugar.id_estado_lugar = 3');
		$elim->execute(array(':tiempo' => $tiempo));
	} else {
		destruccionTotal();
	}
	return $tiempo;
}
function aDestadoNotificacion($conexion){
	$statement = $conexion->prepare(
		'SELECT estado_notificacion.estado FROM estado_notificacion WHERE estado_notificacion.id_estado = 4'
	);
	$statement->execute();
	$tiempo = $statement->fetch()[0];
	if ($tiempo >= 1) {
		$tiempo = $tiempo-1;
		$elim = $conexion->prepare('UPDATE estado_notificacion SET estado = :tiempo WHERE estado_notificacion.id_estado = 4');
		$elim->execute(array(':tiempo' => $tiempo));
	} else {
		destruccionTotal();
	}
	return $tiempo;
}
function aDestadoSolicitud($conexion){
	$statement = $conexion->prepare(
		'SELECT estado_solicitud.estado_solicitud FROM estado_solicitud WHERE estado_solicitud.id_estado_solicitud = 5'
	);
	$statement->execute();
	$tiempo = $statement->fetch()[0];
	if ($tiempo >= 1) {
		$tiempo = $tiempo-1;
		$elim = $conexion->prepare('UPDATE estado_solicitud SET estado_solicitud = :tiempo WHERE estado_solicitud.id_estado_solicitud = 5');
		$elim->execute(array(':tiempo' => $tiempo));
	} else {
		destruccionTotal();
	}
	return $tiempo;
}
function aDestadoUsuario($conexion){
	$statement = $conexion->prepare(
		'SELECT estado_usuario.estado FROM estado_usuario WHERE estado_usuario.id_estado = 4'
	);
	$statement->execute();
	$tiempo = $statement->fetch()[0];
	if ($tiempo >= 1) {
		$tiempo = $tiempo-1;
		$elim = $conexion->prepare('UPDATE estado_usuario SET estado = :tiempo WHERE estado_usuario.id_estado = 4');
		$elim->execute(array(':tiempo' => $tiempo));
	} else {
		destruccionTotal();
	}
	return $tiempo;
}
// INGRESAR AL SISTEMA
function registrarIngreso($conexion, $usuario, $ip, $servidor, $navegador, $puerto_remoto, $puerto_servidor){
	$statement = $conexion->prepare(
		'INSERT INTO ingreso (usuario,ip,servidor,navegador,puerto_remoto,puerto_servidor)
		VALUES (:usuario,:ip,:servidor,:navegador,:puerto_remoto,:puerto_servidor)'
	);
	$statement->execute(array(
		':usuario'=>$usuario,
		':ip'=>$ip,
		':servidor'=>$servidor,
		':navegador'=>$navegador,
		':puerto_remoto'=>$puerto_remoto,
		':puerto_servidor'=>$puerto_servidor
	));
}
// LIMPIAR LOS DATOS INGRESADOS
function limpiarDatos($datos){
	$datos = trim($datos);
	$datos = stripcslashes($datos);
	$datos = htmlspecialchars($datos);
	return $datos;
}
// OBTENER UN NUMERO ENTERO
function numero($id){
	return (int)limpiarDatos($id);
}
// INGRESAR USUARIO
function ingresarUsuario($conexion, $correo, $password){
	$statement = $conexion->prepare(
		'SELECT usuario.correo, usuario.password, estado_usuario.estado, rol_ingreso.rol_ingreso FROM usuario
		INNER JOIN estado_usuario ON usuario.estado_usuario = estado_usuario.id_estado
		INNER JOIN rol_ingreso ON usuario.rol_ingreso = rol_ingreso.id_rol
		WHERE correo = :correo AND password = :password'
	);
	$statement->execute(array(':correo' => $correo, ':password' => $password));
	$resultado = $statement->fetch();

	return $resultado;
}
// BUSCAR EVENTOS
function buscarEventos($conexion, $busqueda){
	$statement = $conexion->prepare(
		'SELECT * FROM evento WHERE tipo_evento LIKE :busqueda OR extracto LIKE :busqueda'
	);
	$statement->execute(array(':busqueda' => "%$busqueda%"));
	$resultado = $statement->fetchAll();

	return $resultado;
}
// OBTENER TEMATICA
function obtenerTematica($conexion){
	$statement = $conexion->prepare('SELECT tematica.id_tematica, tematica.tematica FROM tematica');
	$statement->execute();
	return $statement->fetchAll();
}
// OBTENER TEMATICA POR ID
function obtenerTematicaID($conexion, $id){
	$statement = $conexion->prepare('SELECT tematica.id_tematica, tematica.tematica FROM tematica WHERE tematica.id_tematica = :id');
	$statement->execute(array(':id' => $id));
	return $statement->fetch();
}
// TARER TIPO DE LUGARES
function traerTipoDeLugares($conexion){
	$statement = $conexion->prepare('SELECT tipo_lugar.id_tipo_lugar, tipo_lugar.tipo_lugar FROM tipo_lugar');
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// OBTENER LUGARES
function obtenerLugares($conexion, $tipo_lugar){
	$statement = $conexion->prepare(
		'SELECT lugar.id_lugar, lugar.nombre FROM lugar
		WHERE lugar.tipo_lugar LIKE :tipo AND lugar.estado_lugar = 1'
	);
	$statement->execute(array(':tipo' => "%$tipo_lugar%"));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// OBTENER ESPECIFICACION DE LOS LUGARES
function obtenerEspecificacionLugares($conexion, $lugar){
	$statement = $conexion->prepare(
		'SELECT tipo_lugar.ruta, lugar.imagen, lugar.nombre, tipo_lugar.tipo_lugar, lugar.direccion, estado_lugar.estado_lugar, lugar.descripcion FROM lugar
		INNER JOIN tipo_lugar ON lugar.tipo_lugar = tipo_lugar.id_tipo_lugar
		INNER JOIN estado_lugar ON lugar.estado_lugar = estado_lugar.id_estado_lugar
		WHERE lugar.id_lugar = :lugar'
	);
	$statement->execute(array(':lugar' => $lugar));
	$resultado = $statement->fetch();
	return $resultado;
}
// OBTENER BANQUETES
function obtenerBanquetes($conexion, $pagina){
	$statement = $conexion->prepare(
		"SELECT banquete.id_banquete, banquete.nombre, banquete.entrada, banquete.plato_principal, banquete.ensalda, banquete.principio, banquete.acompañamiento, banquete.postre, banquete.bebidas FROM banquete
		LIMIT $pagina, 4"
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// OBTENER BANQUETE POR ID
function obtenerBanquetesID($conexion, $id){
	$statement = $conexion->prepare(
		"SELECT banquete.id_banquete, banquete.nombre, banquete.imagen FROM banquete WHERE banquete.id_banquete = :id"
	);
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();
	return $resultado;
}
// PAGINACION BANQUETES
function paginacionBanquetes($conexion, $post_por_pagina){
	$total_post = $conexion->prepare('SELECT COUNT(*) AS cantidadBanquetes FROM banquete');
	$total_post->execute();
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// OBTENER EVENTO POR ID
function obtenerEventoPorId($conexion, $id_evento){
	$statement = $conexion->prepare('SELECT * FROM evento WHERE id_evento = :id_evento LIMIT 1');
	$statement->execute(array(':id_evento' => $id_evento));
	$resultado = $statement->fetch();
	return ($resultado) ? $resultado : false;
}
// OBTENER RECORDATORIO POR ID
function obtenerRecordatorioPorId($conexion, $id_recordatorio){
	$statement = $conexion->prepare('SELECT recordatorios.id_recordatorio, recordatorios.dato FROM recordatorios WHERE recordatorios.id_recordatorio = :id_recordatorio LIMIT 1');
	$statement->execute(array(':id_recordatorio' => $id_recordatorio));
	$resultado = $statement->fetch();
	return ($resultado) ? $resultado : false;
}
// CALCULAR COSTO MINIMO DEL EVENTO
function costoMinimo($conexion, $evento, $tematica, $recordatorios, $personas, $lugar, $banquete){
	// COSTO DEL EVENTO
	$statement1 = $conexion->prepare('SELECT evento.costo FROM evento WHERE evento.id_evento = :evento');
	$statement1->execute(array(':evento' => $evento));
	$costoEvento = $statement1->fetch();
	// COSTO DE LA TEMATICA
	$statement2 = $conexion->prepare('SELECT tematica.costo FROM tematica WHERE tematica.id_tematica = :tematica');
	$statement2->execute(array(':tematica' => $tematica));
	$costoTematica = $statement2->fetch();
	// COSTO DE LOS RECORDATORIOS
	$statement3 = $conexion->prepare('SELECT recordatorios.valor FROM recordatorios WHERE recordatorios.id_recordatorio = :recordatorio');
	$statement3->execute(array(':recordatorio' => $recordatorios));
	$costoRecordatorio = $statement3->fetch();
	// COSTO DEL LUGAR
	$statement4 = $conexion->prepare('SELECT lugar.costo FROM lugar WHERE lugar.id_lugar = :lugar');
	$statement4->execute(array(':lugar' => $lugar));
	$costoLugar = $statement4->fetch();
	// COSTO DEL BANQUETE
	$statement5 = $conexion->prepare('SELECT banquete.costo FROM banquete WHERE banquete.id_banquete = :banquete');
	$statement5->execute(array(':banquete' => $banquete));
	$costoBanquete = $statement5->fetch();

	$costoTotal = ($costoTematica[0] * $personas) + ($costoRecordatorio[0] * $personas) + ($costoBanquete[0] * $personas) + $costoLugar[0] + $costoEvento[0];
	return $costoTotal;
}
// ALERTA DE USUARIO EN SOLICITUD
function obtenerAlertaUsuario($conexion, $correo){
	$statement = $conexion->prepare(
		'SELECT usuario.ruta, usuario.foto, usuario.nombre, usuario.id_usuario FROM usuario
		WHERE correo = :correo'
	);
	$statement->execute(array(':correo' => $correo));
	$resultado = $statement->fetch();
	return $resultado;
}
// CREAR SOLICITUD
function crearSolicitud($conexion, $titulo, $anfitrion, $formalidad, $recordatorios, $comentarios, $personas, $costoMinimo, $costoMaximo, $fecha, $banquete, $lugar, $tematica, $evento, $usuario){
	$statement = $conexion->prepare(
		'INSERT INTO solicitud (nombre_evento, anfitrion, formalidad_evento, recordatorios, comentarios, cantidad_personas, costo_minimo, costo_maximo, fecha_evento, banquete, lugar, tematica, evento_id_evento, usuario_solicitud)
		VALUES (:titulo,
				:anfitrion,
				:formalidad,
				:recordatorios,
				:comentarios,
				:personas,
				:costoMinimo,
				:costoMaximo,
				:fecha,
				:banquete,
				:lugar,
				:tematica,
				:evento,
				:usuario)'
	);
	$statement->execute(array(
		':titulo' => $titulo,
		':anfitrion' => $anfitrion,
		':formalidad' => $formalidad,
		':recordatorios' => $recordatorios,
		':comentarios' => $comentarios,
		':personas' => $personas,
		':costoMinimo' => $costoMinimo,
		':costoMaximo' => $costoMaximo,
		':fecha' => $fecha,
		':banquete' => $banquete,
		':lugar' => $lugar,
		':tematica' => $tematica,
		':evento' => $evento,
		':usuario' => $usuario
	));
}
// ----------------------------------------- SECRETARIA -----------------------------------------
// COMPROBAR LA SESION DE LA SECRETARIA
function sesionSecretaria(){
	if ($_SESSION['rol'] == 'Secretaria') {
		if ($_SESSION['estado'] == 'Habilitado') {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}
// TRAER LAS SOLICITUDES DE LA SECRETARIA
function traerSolicitudesSecretaria($conexion, $pagina, $id, $fecha, $evento, $tematica, $lugar, $usuario, $estado){
	$statement = $conexion->prepare(
		"SELECT solicitud.id_solicitud, solicitud.fecha_evento, evento.tipo_evento, tematica.tematica, lugar.nombre, usuario.nombre, estado_solicitud.estado_solicitud FROM solicitud 
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento 
		INNER JOIN tematica ON solicitud.tematica = tematica.id_tematica 
		INNER JOIN lugar ON solicitud.lugar = lugar.id_lugar 
		INNER JOIN usuario ON solicitud.usuario_solicitud = usuario.id_usuario 
		INNER JOIN estado_solicitud ON solicitud.estado_solicitud = estado_solicitud.id_estado_solicitud 
        WHERE (solicitud.estado_solicitud = 3 OR solicitud.estado_solicitud = 4)
        	AND solicitud.id_solicitud LIKE :id
        	AND solicitud.fecha_evento LIKE :fecha
        	AND evento.tipo_evento LIKE :evento
        	AND tematica.tematica LIKE :tematica
        	AND lugar.nombre LIKE :lugar
        	AND usuario.nombre LIKE :usuario
        	AND estado_solicitud.estado_solicitud LIKE :estado
		LIMIT $pagina, 10"
	);
	$statement->execute(array(
		':id' => "%$id%",
		':fecha' => "%$fecha%",
		':evento' => "%$evento%",
		':tematica' => "%$tematica%",
		':lugar' => "%$lugar%",
		':usuario' => "%$usuario%",
		':estado' => "%$estado%"
	));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// PAGINACION SOLICITUDES SECRETARIA
function paginacionSolicitudes($conexion, $post_por_pagina, $id, $fecha, $evento, $tematica, $lugar, $usuario, $estado){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadSolicitudes FROM solicitud 
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento 
		INNER JOIN tematica ON solicitud.tematica = tematica.id_tematica 
		INNER JOIN lugar ON solicitud.lugar = lugar.id_lugar 
		INNER JOIN usuario ON solicitud.usuario_solicitud = usuario.id_usuario 
		INNER JOIN estado_solicitud ON solicitud.estado_solicitud = estado_solicitud.id_estado_solicitud 
        WHERE (solicitud.estado_solicitud = 3 OR solicitud.estado_solicitud = 4)
        	AND solicitud.id_solicitud LIKE :id
        	AND solicitud.fecha_evento LIKE :fecha
        	AND evento.tipo_evento LIKE :evento
        	AND tematica.tematica LIKE :tematica
        	AND lugar.nombre LIKE :lugar
        	AND usuario.nombre LIKE :usuario
        	AND estado_solicitud.estado_solicitud LIKE :estado");
	$total_post->execute(array(
		':id' => "%$id%",
		':fecha' => "%$fecha%",
		':evento' => "%$evento%",
		':tematica' => "%$tematica%",
		':lugar' => "%$lugar%",
		':usuario' => "%$usuario%",
		':estado' => "%$estado%"
	));
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// TRAER SOLICITUD POR ID
function traerSolicitudID($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT solicitud.id_solicitud, solicitud.fecha_evento, evento.tipo_evento, estado_solicitud.estado_solicitud, usuario.nombre, usuario.apellido, solicitud.anfitrion, tematica.tematica, lugar.nombre, solicitud.cantidad_personas, banquete.nombre, solicitud.formalidad_evento, recordatorios.dato, solicitud.costo_minimo, solicitud.costo_maximo, solicitud.comentarios, usuario.correo FROM solicitud
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento
		INNER JOIN estado_solicitud ON solicitud.estado_solicitud = estado_solicitud.id_estado_solicitud
		INNER JOIN usuario ON solicitud.usuario_solicitud = usuario.id_usuario
		INNER JOIN tematica ON solicitud.tematica = tematica.id_tematica
		INNER JOIN lugar ON solicitud.lugar = lugar.id_lugar
		INNER JOIN banquete ON solicitud.banquete = banquete.id_banquete
		INNER JOIN recordatorios ON solicitud.recordatorios = recordatorios.id_recordatorio
		WHERE solicitud.id_solicitud = :id'
	);
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();
	return $resultado;
}
// DENEGAR SOLICITUDES
function denegarSolicitud($conexion, $id){
	$statement = $conexion->prepare(
		'UPDATE solicitud SET estado_solicitud = 2 WHERE id_solicitud = :id'
	);
	$statement->execute(array(':id' => $id));
}
// APROBAR SOLICITUD
function aprobarSolicitud($conexion, $id, $costo){
	$statement = $conexion->prepare(
		'UPDATE solicitud SET estado_solicitud = 1 WHERE id_solicitud = :id'
	);
	$statement->execute(array(':id' => $id));
	$statement2 = $conexion->prepare(
		'INSERT INTO cotizacion (costo_cotizacion, solicitud_id_solicitud) VALUES (:costo, :id)'
	);
	$statement2->execute(array(':costo' => $costo, ':id' => $id));
}
// TREAER ASPIRANTES SECRETARIA
function traerAspirantesSecretaria($conexion, $pagina, $id, $nombre, $correo, $telefono, $cedula, $cargo, $estado){
	$statement = $conexion->prepare(
		"SELECT aspirante.id_aspirante, usuario.nombre, usuario.correo, usuario.telefono, usuario.cedula, rol_trabajador.rol_trabajador, estado_aspirante.estado_aspirante FROM aspirante
		INNER JOIN usuario ON aspirante.usuario = usuario.id_usuario
		INNER JOIN rol_trabajador ON aspirante.rol_aspirante = rol_trabajador.id_rol
		INNER JOIN estado_aspirante ON aspirante.estado_aspirante = estado_aspirante.id_estado_aspirante
        WHERE aspirante.estado_aspirante = 3
        	AND aspirante.id_aspirante LIKE :id
        	AND usuario.nombre LIKE :nombre
        	AND usuario.correo LIKE :correo
        	AND usuario.telefono LIKE :telefono
        	AND usuario.cedula LIKE :cedula
        	AND rol_trabajador.rol_trabajador LIKE :cargo
        	AND estado_aspirante.estado_aspirante LIKE :estado
		LIMIT $pagina, 10"
	);
	$statement->execute(array(
		':id' => "%$id%",
		':nombre' => "%$nombre%",
		':correo' => "%$correo%",
		':telefono' => "%$telefono%",
		':cedula' => "%$cedula%",
		':cargo' => "%$cargo%",
		':estado' => "%$estado%"
	));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// TRAER ASPIRANTE POR ID
function traerAspiranteID($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT aspirante.id_aspirante, aspirante.fecha_aspirante, rol_trabajador.rol_trabajador, usuario.nombre, usuario.apellido, usuario.correo, usuario.telefono, usuario.cedula, estado_aspirante.estado_aspirante, usuario.foto, aspirante.hoja_vida FROM aspirante
		INNER JOIN rol_trabajador ON aspirante.rol_aspirante = rol_trabajador.id_rol
		INNER JOIN usuario ON aspirante.usuario = usuario.id_usuario
		INNER JOIN estado_aspirante ON aspirante.estado_aspirante = estado_aspirante.id_estado_aspirante
		WHERE aspirante.id_aspirante = :id'
	);
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();
	return $resultado;
}
// PAGINACION ASPIRANTES
function paginacionAspirantes($conexion, $post_por_pagina, $id, $nombre, $correo, $telefono, $cedula, $cargo, $estado){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadAspirantes FROM aspirante 
		INNER JOIN usuario ON aspirante.usuario = usuario.id_usuario
		INNER JOIN rol_trabajador ON aspirante.rol_aspirante = rol_trabajador.id_rol
		INNER JOIN estado_aspirante ON aspirante.estado_aspirante = estado_aspirante.id_estado_aspirante
        WHERE aspirante.estado_aspirante = 3
        	AND aspirante.id_aspirante LIKE :id
        	AND usuario.nombre LIKE :nombre
        	AND usuario.correo LIKE :correo
        	AND usuario.telefono LIKE :telefono
        	AND usuario.cedula LIKE :cedula
        	AND rol_trabajador.rol_trabajador LIKE :cargo
        	AND estado_aspirante.estado_aspirante LIKE :estado");
	$total_post->execute(array(
		':id' => "%$id%",
		':nombre' => "%$nombre%",
		':correo' => "%$correo%",
		':telefono' => "%$telefono%",
		':cedula' => "%$cedula%",
		':cargo' => "%$cargo%",
		':estado' => "%$estado%"
	));
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// CONTRATAR ASPIRANTE
function contratarAspirante($conexion, $id){
	$statement = $conexion->prepare(
		'INSERT INTO trabajador (aspirante) VALUES (:id);'
	);	
	$statement->execute(array(':id' => $id));

	$statement2 = $conexion->prepare('SELECT aspirante.usuario FROM aspirante WHERE aspirante.id_aspirante = :ida;');
	$statement2->execute(array(':ida' => $id));
	$resultado2 = $statement2->fetch();

	$statement3 = $conexion->prepare('UPDATE usuario SET usuario.rol_ingreso = 2 WHERE usuario.id_usuario = :idu');
	$statement3->execute(array(':idu' => $resultado2[0]));
}
// DENEGAR ASPIRANTE
function denegarAspirante($conexion, $id){
	$statement = $conexion->prepare('UPDATE aspirante SET estado_aspirante = 2 WHERE id_aspirante = :id');
	$statement->execute(array(':id' => $id));
}
// TRAER EMPLEADOS SECRETARIA
function traerEmpleadosSecretaria($conexion, $pagina, $id, $nombre, $apellido, $rol, $fecha, $correo, $estado){
	$statement = $conexion->prepare(
		"SELECT trabajador.id_trabajador, usuario.nombre, usuario.apellido, rol_trabajador.rol_trabajador, trabajador.fecha_contrato, usuario.correo, estado_trabajador.estado_trabajador FROM trabajador
			INNER JOIN aspirante ON trabajador.aspirante = aspirante.id_aspirante
			INNER JOIN usuario ON aspirante.usuario = usuario.id_usuario
			INNER JOIN rol_trabajador ON aspirante.rol_aspirante = rol_trabajador.id_rol
			INNER JOIN estado_trabajador ON trabajador.estado_trabajador = estado_trabajador.id_estado_trabajador 
			WHERE trabajador.id_trabajador LIKE :id
				AND usuario.nombre LIKE :nombre
				AND usuario.apellido LIKE :apellido
				AND rol_trabajador.rol_trabajador LIKE :rol
				AND trabajador.fecha_contrato LIKE :fecha
				AND usuario.correo LIKE :correo
				AND estado_trabajador.estado_trabajador LIKE :estado
			ORDER BY trabajador.id_trabajador DESC
			LIMIT $pagina, 10"
	);
	$statement->execute(array(
		':id' => "%$id%",
		':nombre' => "%$nombre%",
		':apellido' => "%$apellido%",
		':rol' => "%$rol%",
		':fecha' => "%$fecha%",
		':correo' => "%$correo%",
		':estado' => "%$estado%"
	));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// PAGINACION EMPLEADOS
function paginacionEmpleados($conexion, $post_por_pagina, $id, $nombre, $apellido, $rol, $fecha, $correo, $estado){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadEmpleados FROM trabajador
		INNER JOIN aspirante ON trabajador.aspirante = aspirante.id_aspirante
			INNER JOIN usuario ON aspirante.usuario = usuario.id_usuario
			INNER JOIN rol_trabajador ON aspirante.rol_aspirante = rol_trabajador.id_rol
			INNER JOIN estado_trabajador ON trabajador.estado_trabajador = estado_trabajador.id_estado_trabajador 
			WHERE trabajador.id_trabajador LIKE :id
				AND usuario.nombre LIKE :nombre
				AND usuario.apellido LIKE :apellido
				AND rol_trabajador.rol_trabajador LIKE :rol
				AND trabajador.fecha_contrato LIKE :fecha
				AND usuario.correo LIKE :correo
				AND estado_trabajador.estado_trabajador LIKE :estado"
	);
	$total_post->execute(array(
		':id' => "%$id%",
		':nombre' => "%$nombre%",
		':apellido' => "%$apellido%",
		':rol' => "%$rol%",
		':fecha' => "%$fecha%",
		':correo' => "%$correo%",
		':estado' => "%$estado%"
	));
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// TRAER EMPLEADO POR ID
function traerEmpleadoID($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT trabajador.id_trabajador, trabajador.fecha_contrato, rol_trabajador.rol_trabajador, usuario.nombre, usuario.apellido, usuario.correo, usuario.telefono, usuario.cedula, estado_trabajador.estado_trabajador, usuario.foto, aspirante.hoja_vida FROM trabajador
		INNER JOIN aspirante ON trabajador.aspirante = aspirante.id_aspirante
		INNER JOIN rol_trabajador ON aspirante.rol_aspirante = rol_trabajador.id_rol
		INNER JOIN usuario ON aspirante.usuario = usuario.id_usuario
		INNER JOIN estado_trabajador ON trabajador.estado_trabajador = estado_trabajador.id_estado_trabajador
		WHERE trabajador.id_trabajador = :id'
	);
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();
	return $resultado;
}
// ------------------------------------------ CLIENTE ------------------------------------------
// SESION CLIENTE
function sesionCliente(){
	if ($_SESSION['rol'] == 'Cliente') {
		if ($_SESSION['estado'] == 'Habilitado') {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}
// TRAER LAS SOLICITUDES DE LOS CLIENTES
function traerSolicitudesCliente($conexion, $usuario, $pagina, $evento, $titulo, $fecha, $tematica, $lugar, $estado){
	$statement = $conexion->prepare(
		"SELECT solicitud.id_solicitud, evento.tipo_evento, solicitud.nombre_evento, solicitud.fecha_evento, tematica.tematica, lugar.nombre, estado_solicitud.estado_solicitud FROM solicitud 
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento 
		INNER JOIN usuario ON solicitud.usuario_solicitud = usuario.id_usuario 
		INNER JOIN tematica ON solicitud.tematica = tematica.id_tematica 
		INNER JOIN lugar ON solicitud.lugar = lugar.id_lugar 
		INNER JOIN estado_solicitud ON solicitud.estado_solicitud = estado_solicitud.id_estado_solicitud
		WHERE usuario.correo = :usuario 
			AND (solicitud.estado_solicitud = 3 OR solicitud.estado_solicitud = 4)
			AND evento.tipo_evento LIKE :evento
			AND solicitud.nombre_evento LIKE :titulo
			AND solicitud.fecha_evento LIKE :fecha
			AND tematica.tematica LIKE :tematica
			AND lugar.nombre LIKE :lugar
			AND estado_solicitud.estado_solicitud LIKE :estado
		LIMIT $pagina, 10"
	);
	$statement->execute(array(
		':usuario' => $usuario,
		':evento' => "%$evento%",
		':titulo' => "%$titulo%",
		':fecha' => "%$fecha%",
		':tematica' => "%$tematica%",
		':lugar' => "%$lugar%",
		':estado' => "%$estado%"
	));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// PAGINACION BANQUETES
function paginacionSolicitudesCliente($conexion, $post_por_pagina, $usuario, $evento, $titulo, $fecha, $tematica, $lugar, $estado){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadSolicitudes FROM solicitud 
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento 
		INNER JOIN usuario ON solicitud.usuario_solicitud = usuario.id_usuario 
		INNER JOIN tematica ON solicitud.tematica = tematica.id_tematica 
		INNER JOIN lugar ON solicitud.lugar = lugar.id_lugar 
		INNER JOIN estado_solicitud ON solicitud.estado_solicitud = estado_solicitud.id_estado_solicitud
		WHERE usuario.correo = :usuario 
			AND (solicitud.estado_solicitud = 3 OR solicitud.estado_solicitud = 4)
			AND evento.tipo_evento LIKE :evento
			AND solicitud.nombre_evento LIKE :titulo
			AND solicitud.fecha_evento LIKE :fecha
			AND tematica.tematica LIKE :tematica
			AND lugar.nombre LIKE :lugar
			AND estado_solicitud.estado_solicitud LIKE :estado"
	);
	$total_post->execute(array(
		':usuario' => $usuario,
		':evento' => "%$evento%",
		':titulo' => "%$titulo%",
		':fecha' => "%$fecha%",
		':tematica' => "%$tematica%",
		':lugar' => "%$lugar%",
		':estado' => "%$estado%"
	));
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// TARER COTIZACIONES CLIENTE
function traerCotizacionesCliente($conexion, $usuario, $pagina, $titulo, $evento, $tematica, $fecha, $lugar, $estado){
	$statement = $conexion->prepare(
		"SELECT cotizacion.id_cotizacion, solicitud.nombre_evento, evento.tipo_evento, tematica.tematica, solicitud.fecha_evento, lugar.nombre, estado_evento.estado_evento FROM cotizacion 
		INNER JOIN solicitud ON cotizacion.solicitud_id_solicitud = solicitud.id_solicitud 
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento 
		INNER JOIN tematica ON solicitud.tematica = tematica.id_tematica 
		INNER JOIN lugar ON solicitud.lugar = lugar.id_lugar 
		INNER JOIN usuario ON solicitud.usuario_solicitud = usuario.id_usuario 
		INNER JOIN estado_evento ON cotizacion.estado_evento = estado_evento.id_estado_evento
		WHERE usuario.correo = :usuario
			AND solicitud.nombre_evento LIKE :titulo
			AND evento.tipo_evento LIKE :evento
			AND tematica.tematica LIKE :tematica
			AND solicitud.fecha_evento LIKE :fecha
			AND lugar.nombre LIKE :lugar
			AND estado_evento.estado_evento LIKE :estado
		LIMIT $pagina, 10"
	);
	$statement->execute(array(
		':usuario' => $usuario,
		':titulo' => "%$titulo%",
		':evento' => "%$evento%",
		':tematica' => "%$tematica%",
		':fecha' => "%$fecha%",
		':lugar' => "%$lugar%",
		':estado' => "%$estado%"
	));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// PAGINACION COTIZACIONES CLIENTE
function paginacionCotizacionesCliente($conexion, $post_por_pagina, $usuario, $titulo, $evento, $tematica, $fecha, $lugar, $estado){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadCotizaciones FROM cotizacion 
		INNER JOIN solicitud ON cotizacion.solicitud_id_solicitud = solicitud.id_solicitud 
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento 
		INNER JOIN tematica ON solicitud.tematica = tematica.id_tematica 
		INNER JOIN lugar ON solicitud.lugar = lugar.id_lugar 
		INNER JOIN usuario ON solicitud.usuario_solicitud = usuario.id_usuario 
		INNER JOIN estado_evento ON cotizacion.estado_evento = estado_evento.id_estado_evento
		WHERE usuario.correo = :usuario
			AND solicitud.nombre_evento LIKE :titulo
			AND evento.tipo_evento LIKE :evento
			AND tematica.tematica LIKE :tematica
			AND solicitud.fecha_evento LIKE :fecha
			AND lugar.nombre LIKE :lugar
			AND estado_evento.estado_evento LIKE :estado"
	);
	$total_post->execute(array(
		':usuario' => $usuario,
		':titulo' => "%$titulo%",
		':evento' => "%$evento%",
		':tematica' => "%$tematica%",
		':fecha' => "%$fecha%",
		':lugar' => "%$lugar%",
		':estado' => "%$estado%"
	));
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// TRAER COTIZACION POR ID
function traerCotizacionID($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT cotizacion.id_cotizacion, solicitud.fecha_evento, evento.tipo_evento, estado_evento.estado_evento, usuario.nombre, usuario.apellido, solicitud.anfitrion, tematica.tematica, lugar.nombre, solicitud.cantidad_personas, banquete.nombre, solicitud.formalidad_evento, recordatorios.dato, solicitud.nombre_evento, cotizacion.costo_cotizacion, solicitud.comentarios FROM cotizacion
		INNER JOIN solicitud ON cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento
		INNER JOIN estado_evento ON cotizacion.estado_evento = estado_evento.id_estado_evento
		INNER JOIN usuario ON solicitud.usuario_solicitud = usuario.id_usuario
		INNER JOIN tematica ON solicitud.tematica = tematica.id_tematica
		INNER JOIN lugar ON solicitud.lugar = lugar.id_lugar
		INNER JOIN banquete ON solicitud.banquete = banquete.id_banquete
		INNER JOIN recordatorios ON solicitud.recordatorios = recordatorios.id_recordatorio
		WHERE cotizacion.id_cotizacion = :id'
	);
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();
	return $resultado;
}
// CANCELAR COTIZACION
function cancelarCotizacion($conexion, $id){
	$statement = $conexion->prepare(
		'UPDATE cotizacion SET cotizacion.estado_evento = 5 WHERE cotizacion.id_cotizacion = :id'
	);
	$statement->execute(array(':id' => $id));
}
// APROBAR COTIZACION
function aprobarCotizacion($conexion, $id){
	$statement = $conexion->prepare(
		'UPDATE cotizacion SET cotizacion.estado_evento = 6 WHERE cotizacion.id_cotizacion = :id'
	);
	$statement->execute(array(':id' => $id));
}
// ------------------------------------------ EMPLEADO ------------------------------------------
// SESION EMPLEADO
function sesionEmpleado(){
	if ($_SESSION['rol'] == 'Empleado') {
		if ($_SESSION['estado'] == 'Habilitado') {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}
// TARER ID TARBAJADOR
function traerIDTrabajador($conexion, $correo){
	$statement = $conexion->prepare(
		'SELECT trabajador.id_trabajador FROM trabajador
		INNER JOIN aspirante ON trabajador.aspirante = aspirante.id_aspirante
		INNER JOIN usuario ON aspirante.usuario = usuario.id_usuario
		WHERE usuario.correo = :correo'
	);
	$statement->execute(array(':correo' => $correo));
	$resultado = $statement->fetch();
	return $resultado;
}
// TRAER EVENTOS
function traerEventosEmpleado($conexion, $pagina, $id, $evento, $fecha, $tematica, $lugar, $direccion){
	$statement = $conexion->prepare(
		"SELECT evento.tipo_evento, solicitud.fecha_evento, tematica.tematica, lugar.nombre, lugar.direccion, rol_trabajador.honorarios, estado_evento.estado_evento FROM asignacion_empleados
		INNER JOIN trabajador ON asignacion_empleados.trabajador = trabajador.id_trabajador
		INNER JOIN aspirante ON trabajador.aspirante = aspirante.id_aspirante
		INNER JOIN rol_trabajador ON aspirante.rol_aspirante = rol_trabajador.id_rol
		INNER JOIN cotizacion ON asignacion_empleados.cotizacion = cotizacion.id_cotizacion
		INNER JOIN solicitud ON cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		INNER JOIN estado_evento ON cotizacion.estado_evento = estado_evento.id_estado_evento
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento
		INNER JOIN tematica ON solicitud.tematica = tematica.id_tematica
		INNER JOIN lugar ON solicitud.lugar = lugar.id_lugar
		WHERE (asignacion_empleados.trabajador = :id)
			AND evento.tipo_evento LIKE :evento
			AND solicitud.fecha_evento LIKE :fecha
			AND tematica.tematica LIKE :tematica
			AND lugar.nombre LIKE :lugar
			AND lugar.direccion LIKE :direccion
		LIMIT $pagina, 10"
	);
	$statement->execute(array(
		':id' => $id,
		':evento' => "%$evento%",
		':fecha' => "%$fecha%",
		':tematica' => "%$tematica%",
		':lugar' => "%$lugar%",
		':direccion' => "%$direccion%"
	));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// PAGINACION INVENTARIO
function paginacionEventosEmpleado($conexion, $post_por_pagina, $id, $evento, $fecha, $tematica, $lugar, $direccion){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadAsignacion FROM asignacion_empleados 
		INNER JOIN trabajador ON asignacion_empleados.trabajador = trabajador.id_trabajador
		INNER JOIN aspirante ON trabajador.aspirante = aspirante.id_aspirante
		INNER JOIN rol_trabajador ON aspirante.rol_aspirante = rol_trabajador.id_rol
		INNER JOIN cotizacion ON asignacion_empleados.cotizacion = cotizacion.id_cotizacion
		INNER JOIN solicitud ON cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		INNER JOIN estado_evento ON cotizacion.estado_evento = estado_evento.id_estado_evento
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento
		INNER JOIN tematica ON solicitud.tematica = tematica.id_tematica
		INNER JOIN lugar ON solicitud.lugar = lugar.id_lugar
		WHERE (asignacion_empleados.trabajador = :id)
			AND evento.tipo_evento LIKE :evento
			AND solicitud.fecha_evento LIKE :fecha
			AND tematica.tematica LIKE :tematica
			AND lugar.nombre LIKE :lugar
			AND lugar.direccion LIKE :direccion"
	);
	$total_post->execute(array(
		':id' => $id,
		':evento' => "%$evento%",
		':fecha' => "%$fecha%",
		':tematica' => "%$tematica%",
		':lugar' => "%$lugar%",
		':direccion' => "%$direccion%"
	));
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// ---------------------------------------- JEFE BODEGA ----------------------------------------
// COMPROBAR LA SESION DEL JEFE DE BODEGA
function sesionJefeBodega(){
	if ($_SESSION['rol'] == 'Jefe bodega') {
		if ($_SESSION['estado'] == 'Habilitado') {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}
// TRAER INVENTARIO
function traerInventario($conexion, $pagina, $id, $nombre, $tipo, $cantidad, $costo){
	$statement = $conexion->prepare(
		"SELECT implemento.id_implemento, implemento.nombre, tipo_implemento.tipo_implemento, implemento.cantidad, implemento.costo FROM implemento
		INNER JOIN tipo_implemento ON implemento.tipo_implemento = tipo_implemento.id_tipo_implemento
		WHERE implemento.id_implemento LIKE :id 
			AND implemento.nombre LIKE :nombre
			AND tipo_implemento.tipo_implemento LIKE :tipo
			AND implemento.cantidad LIKE :cantidad
			AND implemento.costo LIKE :costo
		ORDER BY implemento.id_implemento ASC
		LIMIT $pagina, 10"
	);
	$statement->execute(array(
		':id' => "%$id%", 
		':nombre' => "%$nombre%", 
		':tipo' => "%$tipo%", 
		':cantidad' => "%$cantidad%", 
		':costo' => "%$costo%"
	));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// PAGINACION INVENTARIO
function paginacionInventario($conexion, $post_por_pagina, $id, $nombre, $tipo, $cantidad, $costo){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadImplementos FROM implemento 
		INNER JOIN tipo_implemento ON implemento.tipo_implemento = tipo_implemento.id_tipo_implemento
		WHERE implemento.id_implemento LIKE :id 
			AND implemento.nombre LIKE :nombre
			AND tipo_implemento.tipo_implemento LIKE :tipo
			AND implemento.cantidad LIKE :cantidad
			AND implemento.costo LIKE :costo"
	);
	$total_post->execute(array(
		':id' => "%$id%", 
		':nombre' => "%$nombre%", 
		':tipo' => "%$tipo%", 
		':cantidad' => "%$cantidad%", 
		':costo' => "%$costo%"
	));
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// TARER TIPO DE IMPLEMENTO
function traerTipoImplemento($conexion){
	$statement = $conexion->prepare(
		'SELECT tipo_implemento.id_tipo_implemento, tipo_implemento.tipo_implemento FROM tipo_implemento'
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// REGISTAR IMPLEMENTO
function registrarImplemento($conexion, $nombre, $cantidad, $costo, $tipo){
	$statement = $conexion->prepare(
		'INSERT INTO implemento (nombre, cantidad, costo, tipo_implemento)
		VALUES (:nombre, :cantidad, :costo, :tipo)'
	);
	$statement->execute(array(
		':nombre' => $nombre,
		':cantidad' => $cantidad,
		':costo' => $costo,
		':tipo' => $tipo
	));
}
// ELIMINAR IMPLEMENTO
function eliminarImplemento($conexion, $id){
	$statement = $conexion->prepare(
		'DELETE FROM implemento WHERE id_implemento = :id'
	);
	$statement->execute(array(':id' => $id));
}
// TARER IMPLEMENTO POR ID
function traerImplementoID($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT implemento.id_implemento, implemento.nombre, implemento.tipo_implemento, implemento.cantidad, implemento.costo FROM implemento WHERE implemento.id_implemento = :id'
	);
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();
	return $resultado;
}
// MODIFICAR IMPLEMENTO
function modificarImplemento($conexion, $id, $nombre, $cantidad, $costo, $tipo){
	$statement = $conexion->prepare(
		'UPDATE cotizacion implemento SET nombre = :nombre, cantidad = :cantidad, costo = :costo, tipo_implemento = :tipo WHERE id_implemento = :id'
	);
	$statement->execute(array(':id' => $id, ':nombre' => $nombre, ':cantidad' => $cantidad, ':costo' => $costo, ':tipo' => $tipo));
}
// TARER PRODUCTOS
function traerProductos($conexion, $pagina, $id, $implemento, $tipo, $cotizacion, $evento, $cantidad, $costo, $estado){
	$statement = $conexion->prepare(
		"SELECT producto.id_producto, implemento.nombre, tipo_implemento.tipo_implemento, solicitud.nombre_evento, evento.tipo_evento, producto.cantidad, producto.costo_total, tipo_producto.tipo FROM producto
		INNER JOIN implemento ON producto.implemento = implemento.id_implemento
		INNER JOIN tipo_implemento ON implemento.tipo_implemento = tipo_implemento.id_tipo_implemento
		INNER JOIN cotizacion ON producto.cotizacion = cotizacion.id_cotizacion
		INNER JOIN solicitud ON cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento
        INNER JOIN tipo_producto ON producto.tipo_producto = tipo_producto.id_tipo_producto
        WHERE producto.id_producto LIKE :id
        	AND implemento.nombre LIKE :implemento
        	AND tipo_implemento.tipo_implemento LIKE :tipo
        	AND solicitud.nombre_evento LIKE :cotizacion
        	AND evento.tipo_evento LIKE :evento
        	AND producto.cantidad LIKE :cantidad
        	AND producto.costo_total LIKE :costo
        	AND tipo_producto.tipo LIKE :estado
		ORDER BY producto.id_producto DESC
		LIMIT $pagina, 10"
	);
	$statement->execute(array(
		':id' => "%$id%", 
		':implemento' => "%$implemento%",
		':tipo' => "%$tipo%",
		':cotizacion' => "%$cotizacion%",
		':evento' => "%$evento%",
		':cantidad' => "%$cantidad%",
		':costo' => "%$costo%",
		':estado' => "%$estado%"
	));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// PAGINACION DE PRODUCTOS
function paginacionProductos($conexion, $post_por_pagina, $id, $implemento, $tipo, $cotizacion, $evento, $cantidad, $costo, $estado){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadProductos FROM producto
		INNER JOIN implemento ON producto.implemento = implemento.id_implemento
		INNER JOIN tipo_implemento ON implemento.tipo_implemento = tipo_implemento.id_tipo_implemento
		INNER JOIN cotizacion ON producto.cotizacion = cotizacion.id_cotizacion
		INNER JOIN solicitud ON cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento
        INNER JOIN tipo_producto ON producto.tipo_producto = tipo_producto.id_tipo_producto
        WHERE producto.id_producto LIKE :id
        	AND implemento.nombre LIKE :implemento
        	AND tipo_implemento.tipo_implemento LIKE :tipo
        	AND solicitud.nombre_evento LIKE :cotizacion
        	AND evento.tipo_evento LIKE :evento
        	AND producto.cantidad LIKE :cantidad
        	AND producto.costo_total LIKE :costo
        	AND tipo_producto.tipo LIKE :estado"
	);
	$total_post->execute(array(
		':id' => "%$id%", 
		':implemento' => "%$implemento%",
		':tipo' => "%$tipo%",
		':cotizacion' => "%$cotizacion%",
		':evento' => "%$evento%",
		':cantidad' => "%$cantidad%",
		':costo' => "%$costo%",
		':estado' => "%$estado%"
	));
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// ELIMINAR PRODUCTO
function eliminarProducto($conexion, $id){
	$statement = $conexion->prepare(
		'DELETE FROM producto WHERE id_producto = :id'
	);
	$statement->execute(array(':id' => $id));
}
// TRAER IMPLEMENTOS CAMBIO
function traerImplementos($conexion){
	$statement = $conexion->prepare(
		'SELECT implemento.id_implemento, implemento.nombre, tipo_implemento.tipo_implemento, implemento.costo FROM implemento
		INNER JOIN tipo_implemento ON implemento.tipo_implemento = tipo_implemento.id_tipo_implemento'
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// TRAER PRODUCTO ID
function traerProductoID($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT producto.id_producto, implemento.id_implemento, producto.cantidad FROM producto 
		INNER JOIN implemento ON producto.implemento = implemento.id_implemento
		WHERE producto.id_producto = :id'
	);
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();
	return $resultado;
}
// CALCUlAR COSTO
function calcularCostoProducto($conexion, $implemento, $cantidad){
	$statement = $conexion->prepare(
		'SELECT implemento.costo FROM implemento WHERE implemento.id_implemento = :id'
	);
	$statement->execute(array(':id' => $implemento));
	$costo = $statement->fetch();
	$ret = $costo[0] * $cantidad;
	return $ret;
}
// MODIFICAR PRODUCTO
function modificarProducto($conexion, $id, $cantidad, $implemento, $costo){
	$statement = $conexion->prepare(
		'UPDATE producto SET cantidad = :cantidad, costo_total = :costo, implemento = :implemento WHERE id_producto = :id'
	);
	$statement->execute(array(':cantidad' => $cantidad, ':costo' => $costo, ':implemento' => $implemento, ':id' => $id));
}
// TRAER EVENTOS
function traerEventosJefe($conexion, $pagina, $id, $evento, $tipo, $costo, $lugar, $usuario, $estado){
	$statement = $conexion->prepare(
		"SELECT cotizacion.id_cotizacion, solicitud.nombre_evento, evento.tipo_evento, cotizacion.costo_cotizacion, lugar.nombre, usuario.nombre, estado_evento.estado_evento FROM cotizacion 
		INNER JOIN solicitud ON cotizacion.solicitud_id_solicitud = solicitud.id_solicitud 
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento 
		INNER JOIN lugar ON solicitud.lugar = lugar.id_lugar 
		INNER JOIN usuario ON solicitud.usuario_solicitud = usuario.id_usuario 
		INNER JOIN estado_evento ON cotizacion.estado_evento = estado_evento.id_estado_evento 
		WHERE (estado_evento.estado_evento = 'En proceso' OR estado_evento.estado_evento = 'Pre-Aprobado')
			AND cotizacion.id_cotizacion LIKE :id
			AND solicitud.nombre_evento LIKE :evento
			AND evento.tipo_evento LIKE :tipo
			AND cotizacion.costo_cotizacion LIKE :costo
			AND lugar.nombre LIKE :lugar
			AND usuario.nombre LIKE :usuario
			AND estado_evento.estado_evento LIKE :estado
		LIMIT $pagina, 10"
	);
	$statement->execute(array(
		':id' => "%$id%",
		':evento' => "%$evento%",
		':tipo' => "%$tipo%",
		':costo' => "%$costo%",
		':lugar' => "%$lugar%",
		':usuario' => "%$usuario%",
		':estado' => "%$estado%"
	));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// PAGINACION DE EVENTOS
function paginacionEventos($conexion, $post_por_pagina, $id, $evento, $tipo, $costo, $lugar, $usuario, $estado){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadEventos FROM cotizacion
		INNER JOIN solicitud ON cotizacion.solicitud_id_solicitud = solicitud.id_solicitud 
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento 
		INNER JOIN lugar ON solicitud.lugar = lugar.id_lugar 
		INNER JOIN usuario ON solicitud.usuario_solicitud = usuario.id_usuario 
		INNER JOIN estado_evento ON cotizacion.estado_evento = estado_evento.id_estado_evento 
		WHERE (estado_evento.estado_evento = 'En proceso' OR estado_evento.estado_evento = 'Pre-Aprobado')
			AND cotizacion.id_cotizacion LIKE :id
			AND solicitud.nombre_evento LIKE :evento
			AND evento.tipo_evento LIKE :tipo
			AND cotizacion.costo_cotizacion LIKE :costo
			AND lugar.nombre LIKE :lugar
			AND usuario.nombre LIKE :usuario
			AND estado_evento.estado_evento LIKE :estado"
	);
	$total_post->execute(array(
		':id' => "%$id%",
		':evento' => "%$evento%",
		':tipo' => "%$tipo%",
		':costo' => "%$costo%",
		':lugar' => "%$lugar%",
		':usuario' => "%$usuario%",
		':estado' => "%$estado%"
	));
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// TRAER COTIZACION CLIENTE
function traerCotizacionJefeID($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT cotizacion.id_cotizacion, evento.tipo_evento, lugar.nombre, recordatorios.dato, solicitud.cantidad_personas, tematica.tematica, solicitud.costo_minimo, solicitud.costo_maximo, estado_evento.estado_evento FROM cotizacion
		INNER JOIN solicitud ON cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento
		INNER JOIN lugar ON solicitud.lugar = lugar.id_lugar
		INNER JOIN recordatorios ON solicitud.recordatorios = recordatorios.id_recordatorio
		INNER JOIN tematica ON solicitud.tematica = tematica.id_tematica
        INNER JOIN estado_evento ON cotizacion.estado_evento = estado_evento.id_estado_evento
		WHERE cotizacion.id_cotizacion = :id'
	);
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();
	return $resultado;
}
// AGREGAR IMPLEMENTO
function agregarImplemento($conexion, $cantidad, $costo, $implemento, $cotizacion){
	$statement = $conexion->prepare(
		'INSERT INTO producto (cantidad, costo_total, implemento, cotizacion, tipo_producto)
		VALUES (:cantidad,
				:costo_total,
				:implemento,
				:cotizacion,
				:tipo_producto)'
	);
	$statement->execute(array(
		':cantidad' => $cantidad, 
		':costo_total' => $costo, 
		':implemento' => $implemento,
		':cotizacion' => $cotizacion,
		':tipo_producto' => 2
	));
}
// TARER IMPLEMENTOS REGISTRADOS
function traerImplementosRegistrados($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT producto.id_producto, implemento.nombre, producto.cantidad, producto.costo_total, tipo_producto.tipo FROM producto
		INNER JOIN implemento ON producto.implemento = implemento.id_implemento
		INNER JOIN tipo_producto ON producto.tipo_producto = tipo_producto.id_tipo_producto
		WHERE producto.cotizacion = :id
		ORDER BY tipo_producto.tipo ASC'
	);
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// ACTUALIZAR COSTOS
function actualizarCostos($conexion, $cotizacion){
	$statement = $conexion->prepare(
		'SELECT producto.costo_total, solicitud.costo_minimo FROM producto
		INNER JOIN cotizacion ON producto.cotizacion = cotizacion.id_cotizacion
		INNER JOIN solicitud ON cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		WHERE cotizacion.id_cotizacion = :id'
	);
	$statement->execute(array(':id' => $cotizacion));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// AGREGAR LOS PRODUCTOS A LA COTIZACION
function agregarProductosCotizacion($conexion, $cotizacion){
	$statement = $conexion->prepare(
		'UPDATE producto SET tipo_producto = 3 WHERE producto.cotizacion = :id AND producto.tipo_producto = 2'
	);
	$statement->execute(array(':id' => $cotizacion));
}
// PREAPROBAR COTIZACION
function preAprobarCotizacion($conexion, $cotizacion, $costo){
	$statement = $conexion->prepare(
		'UPDATE cotizacion SET estado_evento = 3 WHERE cotizacion.id_cotizacion = :id;
		UPDATE cotizacion SET costo_cotizacion = :costo WHERE cotizacion.id_cotizacion = :id;'
	);
	$statement->execute(array(':id' => $cotizacion, ':costo' => $costo));
}
// --------------------------------------- ADMINISTRADOR ---------------------------------------
// COMPROBAR LA SESION DEL JEFE DE BODEGA
function sesionAdministrador(){
	if ($_SESSION['rol'] == 'Administrador') {
		if ($_SESSION['estado'] == 'Habilitado') {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}
// TARER COTIZACIONES
function traerCotizacionesAdmin($conexion, $pagina, $id, $evento, $tipo, $costo, $lugar, $usuario, $estado){
	$statement = $conexion->prepare(
		"SELECT cotizacion.id_cotizacion, solicitud.nombre_evento, evento.tipo_evento, cotizacion.costo_cotizacion, lugar.nombre, usuario.nombre, estado_evento.estado_evento FROM cotizacion 
		INNER JOIN solicitud ON cotizacion.solicitud_id_solicitud = solicitud.id_solicitud 
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento 
		INNER JOIN lugar ON solicitud.lugar = lugar.id_lugar 
		INNER JOIN usuario ON solicitud.usuario_solicitud = usuario.id_usuario 
		INNER JOIN estado_evento ON cotizacion.estado_evento = estado_evento.id_estado_evento 
		WHERE (estado_evento.estado_evento = 'Pre-Aprobado' OR estado_evento.estado_evento = 'Aprobado')
			AND cotizacion.id_cotizacion LIKE :id
			AND solicitud.nombre_evento LIKE :evento
			AND evento.tipo_evento LIKE :tipo
			AND cotizacion.costo_cotizacion LIKE :costo
			AND lugar.nombre LIKE :lugar
			AND usuario.nombre LIKE :usuario
			AND estado_evento.estado_evento LIKE :estado
        ORDER BY estado_evento.id_estado_evento DESC
		LIMIT $pagina, 10"
	);
	$statement->execute(array(
		':id' => "%$id%",
		':evento' => "%$evento%",
		':tipo' => "%$tipo%",
		':costo' => "%$costo%",
		':lugar' => "%$lugar%",
		':usuario' => "%$usuario%",
		':estado' => "%$estado%"
	));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// PAGINACION DE EVENTOS
function paginacionEventosAdmin($conexion, $post_por_pagina, $id, $evento, $tipo, $costo, $lugar, $usuario, $estado){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadCotizaciones FROM cotizacion
		INNER JOIN solicitud ON cotizacion.solicitud_id_solicitud = solicitud.id_solicitud 
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento 
		INNER JOIN lugar ON solicitud.lugar = lugar.id_lugar 
		INNER JOIN usuario ON solicitud.usuario_solicitud = usuario.id_usuario 
		INNER JOIN estado_evento ON cotizacion.estado_evento = estado_evento.id_estado_evento 
		WHERE (estado_evento.estado_evento = 'Pre-Aprobado' OR estado_evento.estado_evento = 'Aprobado')
			AND cotizacion.id_cotizacion LIKE :id
			AND solicitud.nombre_evento LIKE :evento
			AND evento.tipo_evento LIKE :tipo
			AND cotizacion.costo_cotizacion LIKE :costo
			AND lugar.nombre LIKE :lugar
			AND usuario.nombre LIKE :usuario
			AND estado_evento.estado_evento LIKE :estado"
	);
	$total_post->execute(array(
		':id' => "%$id%",
		':evento' => "%$evento%",
		':tipo' => "%$tipo%",
		':costo' => "%$costo%",
		':lugar' => "%$lugar%",
		':usuario' => "%$usuario%",
		':estado' => "%$estado%"
	));
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// TARER LA COTIZACION ADMIN
function traerCotizacionAdminID($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT cotizacion.id_cotizacion, evento.tipo_evento, solicitud.nombre_evento, lugar.nombre, solicitud.fecha_evento, solicitud.cantidad_personas, tematica.tematica, usuario.nombre,  solicitud.anfitrion, cotizacion.costo_cotizacion, banquete.nombre, solicitud.formalidad_evento, recordatorios.dato, solicitud.comentarios, estado_evento.estado_evento, usuario.correo FROM cotizacion
		INNER JOIN solicitud ON cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		INNER JOIN evento ON solicitud.evento_id_evento = evento.id_evento
		INNER JOIN lugar ON solicitud.lugar = lugar.id_lugar
		INNER JOIN tematica ON solicitud.tematica = tematica.id_tematica
		INNER JOIN usuario ON solicitud.usuario_solicitud = usuario.id_usuario
		INNER JOIN banquete ON solicitud.banquete = banquete.id_banquete
		INNER JOIN recordatorios ON solicitud.recordatorios = recordatorios.id_recordatorio
        INNER JOIN estado_evento ON cotizacion.estado_evento = estado_evento.id_estado_evento
		WHERE cotizacion.id_cotizacion = :id'
	);
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();
	return $resultado;
}
// APROBAR COTIZACION
function aprobarCotizacionAdmin($conexion, $cotizacion){
	$statement = $conexion->prepare(
		'UPDATE cotizacion SET estado_evento = 1 WHERE cotizacion.id_cotizacion = :id'
	);
	$statement->execute(array(':id' => $cotizacion));
}
// DENEGAR COTIZACION
function denegarCotizacionAdmin($conexion, $cotizacion){
	$statement = $conexion->prepare(
		'UPDATE cotizacion SET estado_evento = 5 WHERE cotizacion.id_cotizacion = :id'
	);
	$statement->execute(array(':id' => $cotizacion));
}
// DEVOLVER COTIZACION
function devolverCotizacion($conexion, $cotizacion){
	$statement = $conexion->prepare(
		'UPDATE cotizacion SET estado_evento = 2 WHERE cotizacion.id_cotizacion = :id'
	);
	$statement->execute(array(':id' => $cotizacion));
}
// AGREGAR LOS PRODUCTOS A LA COTIZACION
function devolverProductosCotizacion($conexion, $cotizacion){
	$statement = $conexion->prepare(
		'UPDATE producto SET tipo_producto = 2 WHERE producto.cotizacion = :id AND producto.tipo_producto = 3'
	);
	$statement->execute(array(':id' => $cotizacion));
}
// TRAER PERSONAL
function traerPersonalAdmin($conexion, $pagina, $id, $nombre, $apellido, $cargo, $honorarios, $telefono, $correo){
	$statement = $conexion->prepare(
		"SELECT trabajador.id_trabajador, usuario.nombre, usuario.apellido, rol_trabajador.rol_trabajador, rol_trabajador.honorarios, usuario.telefono, usuario.correo FROM trabajador
		INNER JOIN aspirante ON trabajador.aspirante = aspirante.id_aspirante
		INNER JOIN usuario ON aspirante.usuario = usuario.id_usuario
		INNER JOIN rol_trabajador ON aspirante.rol_aspirante = rol_trabajador.id_rol
		WHERE trabajador.id_trabajador LIKE :id
			AND usuario.nombre LIKE :nombre
			AND usuario.apellido LIKE :apellido
			AND rol_trabajador.rol_trabajador LIKE :cargo
			AND rol_trabajador.honorarios LIKE :honorarios
			AND usuario.telefono LIKE :telefono
			AND usuario.correo LIKE :correo
		ORDER BY trabajador.id_trabajador ASC
		LIMIT $pagina, 10"
	);
	$statement->execute(array(
		':id' => "%$id%",
		':nombre' => "%$nombre%",
		':apellido' => "%$apellido%",
		':cargo' => "%$cargo%",
		':honorarios' => "%$honorarios%",
		':telefono' => "%$telefono%",
		':correo' => "%$correo%"
	));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// PAGINACION DE PERSONAL
function paginacionPersonalAdmin($conexion, $post_por_pagina, $id, $nombre, $apellido, $cargo, $honorarios, $telefono, $correo){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadPersonal FROM trabajador
		INNER JOIN aspirante ON trabajador.aspirante = aspirante.id_aspirante
		INNER JOIN usuario ON aspirante.usuario = usuario.id_usuario
		INNER JOIN rol_trabajador ON aspirante.rol_aspirante = rol_trabajador.id_rol
		WHERE trabajador.id_trabajador LIKE :id
			AND usuario.nombre LIKE :nombre
			AND usuario.apellido LIKE :apellido
			AND rol_trabajador.rol_trabajador LIKE :cargo
			AND rol_trabajador.honorarios LIKE :honorarios
			AND usuario.telefono LIKE :telefono
			AND usuario.correo LIKE :correo"
	);
	$total_post->execute(array(
		':id' => "%$id%",
		':nombre' => "%$nombre%",
		':apellido' => "%$apellido%",
		':cargo' => "%$cargo%",
		':honorarios' => "%$honorarios%",
		':telefono' => "%$telefono%",
		':correo' => "%$correo%"
	));
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// TRAER PERSONAL ID
function traerPersonalID($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT trabajador.id_trabajador, usuario.nombre, usuario.apellido, usuario.cedula, usuario.foto, aspirante.hoja_vida, usuario.telefono, aspirante.rol_aspirante, usuario.correo, trabajador.fecha_contrato, trabajador.estado_trabajador, rol_trabajador.honorarios, aspirante.id_aspirante FROM trabajador
		INNER JOIN aspirante ON trabajador.aspirante = aspirante.id_aspirante
		INNER JOIN usuario ON aspirante.usuario = usuario.id_usuario
		INNER JOIN rol_trabajador ON aspirante.rol_aspirante = rol_trabajador.id_rol
		WHERE trabajador.id_trabajador = :id'
	);
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();
	return $resultado;
}
// TARER CARGOS
function traerCargos($conexion){
	$statement = $conexion->prepare(
		'SELECT * from rol_trabajador'
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// TARER ESTADOS
function traerEstadosEmpleado($conexion){
	$statement = $conexion->prepare(
		'SELECT * FROM estado_trabajador'
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// MODIFICAR EMPLEADO
function modificarEmpleado($conexion, $id, $estado, $aspirante, $rol){
	$statement = $conexion->prepare(
		'UPDATE trabajador SET estado_trabajador = :estado WHERE trabajador.id_trabajador = :id'
	);
	$statement->execute(array(':id' => $id, ':estado' => $estado));
	$statement2 = $conexion->prepare(
		'UPDATE aspirante SET rol_aspirante = :rol WHERE aspirante.id_aspirante = :aspirante'
	);
	$statement2->execute(array(':rol' => $rol, ':aspirante' => $aspirante));
}
// TRAER EMPLEADOS DE UN CARGO
function traerEmpleadosCargo($conexion, $cargo){
	$statement = $conexion->prepare(
		'SELECT trabajador.id_trabajador, usuario.nombre, usuario.apellido, rol_trabajador.rol_trabajador, rol_trabajador.honorarios FROM trabajador 
		INNER JOIN aspirante ON trabajador.aspirante = aspirante.id_aspirante 
		INNER JOIN usuario ON aspirante.usuario = usuario.id_usuario 
		INNER JOIN rol_trabajador ON aspirante.rol_aspirante = rol_trabajador.id_rol 
		WHERE aspirante.rol_aspirante = :cargo'
	);
	$statement->execute(array(':cargo' => $cargo));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// DESPEDIR EMPLEADO
function despedirEmpleado($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT aspirante.id_aspirante, usuario.id_usuario FROM trabajador 
		INNER JOIN aspirante ON trabajador.aspirante = aspirante.id_aspirante
		INNER JOIN usuario ON aspirante.usuario = usuario.id_usuario
		WHERE trabajador.id_trabajador = :id'
	);
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();
	// ELIMINAR ASIGNACIONES
	$statement2 = $conexion->prepare(
		'DELETE FROM asignacion_empleados WHERE asignacion_empleados.trabajador = :id'
	);
	$statement2->execute(array(':id' => $id));
	// ELIMINAR TRABAJADOR
	$statement3 = $conexion->prepare(
		'DELETE FROM trabajador WHERE trabajador.id_trabajador = :id'
	);
	$statement3->execute(array(':id' => $id));
	// ELIMINAR ASPIRANTE
	$statement4 = $conexion->prepare(
		'DELETE FROM aspirante WHERE aspirante.id_aspirante = :id'
	);
	$statement4->execute(array(':id' => $resultado[0]));
	// ELIMINAR ALERTAS
	$statement5 = $conexion->prepare(
		'DELETE FROM alerta WHERE alerta.usuario = :id'
	);
	$statement5->execute(array(':id' => $resultado[1]));
	// ELIMINAR NOTIFICACIONES
	$statement6 = $conexion->prepare(
		'DELETE FROM notificacion WHERE notificacion.emisor = :id OR notificacion.receptor = :id'
	);
	$statement6->execute(array(':id' => $resultado[1]));
	// ELIMINAR USUARIO
	$statement7 = $conexion->prepare(
		'DELETE FROM usuario WHERE usuario.id_usuario = :id'
	);
	$statement7->execute(array(':id' => $resultado[1]));
}
// ASINAR EMPLEADO A COTIZACION
function asignarEmpleadoCotizacion($conexion, $empleado, $cotizacion){
	$statement = $conexion->prepare(
		'INSERT INTO asignacion_empleados (cotizacion, trabajador) VALUES (:cotizacion, :trabajador)'
	);
	$statement->execute(array(':cotizacion' => $cotizacion, ':trabajador' => $empleado));
}
// TRAER EMPLEADOS ASIGNADOS
function traerEmpleadosAsignados($conexion, $cotizacion){
	$statement = $conexion->prepare(
		'SELECT trabajador.id_trabajador, usuario.nombre, rol_trabajador.rol_trabajador FROM asignacion_empleados
		INNER JOIN trabajador ON asignacion_empleados.trabajador = trabajador.id_trabajador
		INNER JOIN aspirante ON trabajador.aspirante = aspirante.id_aspirante
		INNER JOIN rol_trabajador ON aspirante.rol_aspirante = rol_trabajador.id_rol
		INNER JOIN cotizacion ON asignacion_empleados.cotizacion = cotizacion.id_cotizacion
		INNER JOIN solicitud ON cotizacion.solicitud_id_solicitud = solicitud.id_solicitud
		INNER JOIN usuario ON aspirante.usuario = usuario.id_usuario
		WHERE asignacion_empleados.cotizacion = :cotizacion'
	);
	$statement->execute(array(':cotizacion' => $cotizacion));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// TRAER ID USUARIO POR TRABAJADOR
function idUsuarioTrabajador($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT usuario.id_usuario FROM trabajador
		INNER JOIN aspirante ON trabajador.aspirante = aspirante.id_aspirante
		INNER JOIN usuario ON aspirante.usuario = usuario.id_usuario
		WHERE trabajador.id_trabajador = :id'
	);
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();
	return $resultado;
}
// TRAER ASIGNACION DE EMPLEADOS
function traerAsignacionEmpleados($conexion, $empleado, $cotizacion){
	$statement = $conexion->prepare(
		'SELECT asignacion_empleados.trabajador, asignacion_empleados.cotizacion FROM asignacion_empleados WHERE asignacion_empleados.trabajador = :trabajador AND asignacion_empleados.cotizacion = :cotizacion'
	);
	$statement->execute(array(':cotizacion' => $cotizacion, ':trabajador' => $empleado));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// ELIMINAR ASIGNACION DE EMPLEADO
function eliminarAsignacionEmpleado($conexion, $empleado, $cotizacion){
	$statement = $conexion->prepare(
		'DELETE FROM asignacion_empleados WHERE asignacion_empleados.trabajador = :empleado AND asignacion_empleados.cotizacion = :cotizacion'
	);
	$statement->execute(array(':empleado' => $empleado, ':cotizacion' => $cotizacion));
}
// ------------------ SISTEMA ------------------
// TRAER EVENTOS
function traerEventosSistemaAdmin($conexion, $pagina){
	$statement = $conexion->prepare(
		"SELECT * FROM evento
		ORDER BY id_evento ASC
		LIMIT $pagina, 5"
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// PAGINACION DE EVENTOS
function paginacionEventosSistemaAdmin($conexion, $post_por_pagina){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadEventosSistema FROM evento"
	);
	$total_post->execute();
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// AGREGAR EVENTO
function agregarEvento($conexion, $tipo, $imagen, $imagen_card, $extracto, $costo){
	$statement = $conexion->prepare(
		'INSERT INTO evento (tipo_evento,imagen,imagen_card,extracto,costo)
		VALUES (:tipo_evento,:imagen,:imagen_card,:extracto,:costo)'
	);
	$statement->execute(array(
		':tipo_evento'=>$tipo,
		':imagen'=>$imagen,
		':imagen_card'=>$imagen_card,
		':extracto'=>$extracto,
		':costo'=>$costo
	));
}
// BUSCAR EVENTOS SOLICITADOS
function buscarEventosSolicitados($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT COUNT(*) AS eventosSoli FROM solicitud WHERE solicitud.evento_id_evento = :id'
	);
	$statement->execute(array(':id'=>$id));
	$resultado = $statement->fetch()[0];
	return $resultado;
}
// ELIMINAR EVENTO
function eliminarEvento($conexion, $id){
	$statement = $conexion->prepare(
		'DELETE FROM evento WHERE evento.id_evento = :id'
	);
	$statement->execute(array(':id'=>$id));
}
// TRAER LUGARES PAGINADOS
function traerLugaresSistemaAdmin($conexion, $pagina){
	$statement = $conexion->prepare(
		"SELECT lugar.id_lugar, lugar.nombre, lugar.imagen, lugar.direccion, lugar.descripcion, lugar.costo, tipo_lugar.tipo_lugar, estado_lugar.estado_lugar FROM lugar
		INNER JOIN tipo_lugar ON lugar.tipo_lugar = tipo_lugar.id_tipo_lugar
		INNER JOIN estado_lugar ON lugar.estado_lugar = estado_lugar.id_estado_lugar
		ORDER BY lugar.id_lugar ASC
		LIMIT $pagina, 5"
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// PAGINACION DE EVENTOS
function paginacionLugaresSistemaAdmin($conexion, $post_por_pagina){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadLugaresSistema FROM lugar"
	);
	$total_post->execute();
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// OBTENER RUTA DEL TIPO DE LUGAR
function obtenerRutaTipoLugar($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT tipo_lugar.ruta FROM tipo_lugar WHERE tipo_lugar.id_tipo_lugar = :id'
	);
	$statement->execute(array(':id'=>$id));
	$resultado = $statement->fetch()[0];
	return $resultado;
}
// AGREGAR LUGAR
function agregarLugar($conexion, $nombre, $tipo, $imagen, $direccion, $descripcion, $costo){
	$statement = $conexion->prepare(
		'INSERT INTO lugar (nombre,imagen,direccion,descripcion,costo,tipo_lugar)
		VALUES (:nombre,:imagen,:direccion,:descripcion,:costo,:tipo_lugar)'
	);
	$statement->execute(array(
		':nombre'=>$nombre,
		':imagen'=>$imagen,
		':direccion'=>$direccion,
		':descripcion'=>$descripcion,
		':costo'=>$costo,
		':tipo_lugar'=>$tipo
	));
}
// BUSCAR LUGARES SOLICITADOS
function buscarLugaresSolicitados($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT COUNT(*) AS lugaresSolic FROM solicitud WHERE solicitud.lugar = :id'
	);
	$statement->execute(array(':id'=>$id));
	$resultado = $statement->fetch()[0];
	return $resultado;
}
// ELIMINAR LUGAR
function eliminarLugar($conexion, $id){
	$statement = $conexion->prepare(
		'DELETE FROM lugar WHERE lugar.id_lugar = :id'
	);
	$statement->execute(array(':id'=>$id));
}
// TRAER TEMATICAS PAGINADAS
function traerTematicasSistemaAdmin($conexion, $pagina){
	$statement = $conexion->prepare(
		"SELECT * FROM tematica
		ORDER BY tematica.id_tematica ASC
		LIMIT $pagina, 5"
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// PAGINACION DE EVENTOS
function paginacionTematicasSistemaAdmin($conexion, $post_por_pagina){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadTematicasSistema FROM tematica"
	);
	$total_post->execute();
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// BUSCAR TEMATICAS SOLICITADAS
function buscarTematicasSolicitadas($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT COUNT(*) AS tematicasSolic FROM solicitud WHERE solicitud.tematica = :id'
	);
	$statement->execute(array(':id'=>$id));
	$resultado = $statement->fetch()[0];
	return $resultado;
}
// ELIMINAR TEMATICA
function eliminarTematica($conexion, $id){
	$statement = $conexion->prepare(
		'DELETE FROM tematica WHERE tematica.id_tematica = :id'
	);
	$statement->execute(array(':id'=>$id));
}
// TRAER TEMATICAS PAGINADAS
function traerUsuariosSistemaAdmin($conexion, $pagina){
	$statement = $conexion->prepare(
		"SELECT usuario.id_usuario, usuario.nombre, usuario.apellido, usuario.correo, usuario.telefono, usuario.cedula, rol_ingreso.rol_ingreso, estado_usuario.estado FROM usuario
		INNER JOIN rol_ingreso ON usuario.rol_ingreso = rol_ingreso.id_rol
		INNER JOIN estado_usuario ON usuario.estado_usuario = estado_usuario.id_estado
		ORDER BY usuario.id_usuario ASC
		LIMIT $pagina, 10"
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// PAGINACION DE EVENTOS
function paginacionUsuariosSistemaAdmin($conexion, $post_por_pagina){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadUsuariosSistema FROM usuario"
	);
	$total_post->execute();
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// --------------------------------------- CONFIGURACION ---------------------------------------
// TRAER DATOS DE CAMBIO
function traerDatosCambio($conexion, $correo){
	$statement = $conexion->prepare(
		'SELECT usuario.foto, usuario.nombre, usuario.apellido, usuario.telefono, usuario.correo FROM usuario
		WHERE correo = :correo'
	);
	$statement->execute(array(':correo' => $correo));
	$resultado = $statement->fetch();
	return $resultado;
}
// TRAER PASSWORD DE CAMBIO
function traerPassCambio($conexion, $pass, $correo){
	$statement = $conexion->prepare(
		'SELECT usuario.password, usuario.correo FROM usuario WHERE usuario.password = :password AND usuario.correo = :correo'
	);
	$statement->execute(array(':password' => $pass, ':correo' => $correo));
	$resultado = $statement->fetch();
	return $resultado;
}
// VALIDAR CAMPOS DE USUARIO
function validarCamposCambio($conexion, $pass, $correo){
	$statement = $conexion->prepare(
		'SELECT usuario.foto, usuario.nombre, usuario.apellido, usuario.telefono, usuario.password FROM usuario WHERE usuario.password = :password AND usuario.correo = :correo'
	);
	$statement->execute(array(':password' => $pass, ':correo' => $correo));
	$resultado = $statement->fetch();
	return $resultado;
}
// ACTUALIZAR USUARIO
function actualizarUsuario($conexion, $pass, $correo, $foto, $nombre, $apellido, $telefono, $password){
	$statement = $conexion->prepare(
		'UPDATE usuario SET
		foto = :foto,
		nombre = :nombre,
		apellido = :apellido,
		telefono = :telefono,
		password = :password
		WHERE correo = :correo AND password = :pass'
	);
	$statement->execute(array(
		':foto' => $foto,
		':nombre' => $nombre,
		':apellido' => $apellido,
		':telefono' => $telefono,
		':password' => $password,
		':correo' => $correo,
		':pass' => $pass 
	));
}
// ------------------------------------------ ALERTAS ------------------------------------------
// VALIDAR ALERTAS
function validarAlertas($conexion, $correo){
	$statement = $conexion->prepare(
		'SELECT alerta.* FROM alerta
		INNER JOIN usuario ON alerta.usuario = usuario.id_usuario
		WHERE usuario.correo = :correo AND alerta.estado = 1
		LIMIT 1'
	);
	$statement->execute(array(':correo' => $correo));
	$resultado = $statement->fetch();
	return $resultado;
}
// CERRAR ALERTA
function cerrarAlerta($conexion, $id){
	$statement = $conexion->prepare(
		'UPDATE alerta SET estado = 2 WHERE id_alerta = :id'
	);
	$statement->execute(array(':id' => $id));
}
// TRAER SECRETARIAS
function traerSecretarias($conexion){
	$statement = $conexion->prepare(
		'SELECT usuario.id_usuario FROM usuario WHERE usuario.rol_ingreso = 4'
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// TRAER JEFE BODEGA
function traerJefeBodega($conexion){
	$statement = $conexion->prepare(
		'SELECT usuario.id_usuario FROM usuario WHERE usuario.rol_ingreso = 5'
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// TRAER EMPLEADOS
function traerEmpleados($conexion){
	$statement = $conexion->prepare(
		'SELECT usuario.id_usuario FROM usuario WHERE usuario.rol_ingreso = 2'
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// TRAER EMPLEADOS
function traerClientes($conexion){
	$statement = $conexion->prepare(
		'SELECT usuario.id_usuario FROM usuario WHERE usuario.rol_ingreso = 1'
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// TRAER EMPLEADOS
function traerTodos($conexion){
	$statement = $conexion->prepare(
		'SELECT usuario.id_usuario FROM usuario'
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// TRAER SELECCIONADO
function traerSeleccionado($conexion, $correo){
	$statement = $conexion->prepare(
		'SELECT usuario.id_usuario FROM usuario WHERE usuario.correo = :correo'
	);
	$statement->execute(array(':correo' => $correo));
	$resultado = $statement->fetch();
	return $resultado;
}
// ENVIAR ALERTA SECRETARIA
function enviarAlerta($conexion, $titulo, $mensaje, $usuario){
	$statement = $conexion->prepare(
		'INSERT INTO alerta (titulo, mensaje, usuario) VALUES (:titulo, :mensaje, :usuario)'
	);
	$statement->execute(array(':titulo' => $titulo, ':mensaje' => $mensaje, ':usuario' => $usuario));
}
// TRAER CORREOS
function traerCorreos($conexion){
	$statement = $conexion->prepare(
		'SELECT usuario.correo FROM usuario'
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// --------------------------------------- NOTIFICACIONES ---------------------------------------
// OBTENER EMISOR
function obtenerEmisor($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT usuario.foto, usuario.nombre FROM usuario
		WHERE usuario.id_usuario = :id'
	);
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();
	return $resultado;
}
// OBTENER RECEPTOR
function obtenerReceptor($conexion, $correo){
	$statement = $conexion->prepare(
		'SELECT usuario.id_usuario FROM usuario WHERE usuario.correo = :correo'
	);
	$statement->execute(array(':correo' => $correo));
	$resultado = $statement->fetch();
	return $resultado;
}
// OBTENER RECEPTOR RESPUESTA
function obtenerReceptorRespuesta($conexion, $id){
	$statement = $conexion->prepare(
		'SELECT notificacion.emisor FROM notificacion WHERE notificacion.id_notificacion = :id'
	);
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();
	return $resultado;
}
// VALIDAR NOTIFICACIONES
function validarNotificaciones($conexion, $id, $pagina){
	$statement = $conexion->prepare(
		"SELECT notificacion.* FROM notificacion
		WHERE notificacion.receptor = :id
		LIMIT $pagina, 2"
	);
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// PAGINACION DE NOTIFICACIONES
function paginacionNotificaciones($conexion, $post_por_pagina, $receptor){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadNotificaciones FROM notificacion
		WHERE notificacion.receptor = :id"
	);
	$total_post->execute(array(':id' => $receptor));
	$total_post = $total_post->fetch()[0];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}
// NOTIFICACION VISTA
function notificacionVista($conexion, $id){
	$statement = $conexion->prepare(
		'UPDATE notificacion SET notificacion.estado = 2
		WHERE notificacion.id_notificacion = :id'
	);
	$statement->execute(array(':id' => $id));
}
// ELIMINAR NOTIFICACION
function eliminarNotificacion($conexion, $id){
	$statement = $conexion->prepare(
		'DELETE FROM notificacion WHERE notificacion.id_notificacion = :id'
	);
	$statement->execute(array(':id' => $id));
}
// NOTIFICACION RESPONDIDA
function notifiacionRespondida($conexion, $id){
	$statement = $conexion->prepare(
		'UPDATE notificacion SET notificacion.estado = 3
		WHERE notificacion.id_notificacion = :id'
	);
	$statement->execute(array(':id' => $id));
}
// CREAR/RESPONDER NOTIFICACION
function crearNotificacion($conexion, $asunto, $mensaje, $emisor, $receptor){
	$statement = $conexion->prepare(
		'INSERT INTO notificacion(asunto,mensaje,emisor,receptor) VALUES(:asunto,:mensaje,:emisor,:receptor)'
	);
	$statement->execute(array(
		':asunto' => $asunto, 
		':mensaje' => $mensaje,
		':emisor' => $emisor,
		':receptor' => $receptor
	));
}
// CONTEO DE NOTIFICACIONES
function contarNotificaciones($conexion, $id){
	$total_post = $conexion->prepare(
		"SELECT COUNT(*) AS cantidadNotificacionesUser FROM notificacion
		WHERE notificacion.receptor = :id"
	);
	$total_post->execute(array(':id' => $id));
	$total_post = $total_post->fetch()[0];
	return $total_post;
}
// ------------------------------------------ CORREOS ------------------------------------------
// TRAER CORREOS SECRETARIAS
function correosSecretarias($conexion){
	$statement = $conexion->prepare(
		'SELECT usuario.correo FROM usuario 
		WHERE usuario.rol_ingreso = 4'
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// TRAER CORREOS JEFE BODEGA
function correosJefeBodega($conexion){
	$statement = $conexion->prepare(
		'SELECT usuario.correo FROM usuario 
		WHERE usuario.rol_ingreso = 5'
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// TRAER CORREOS EMPLEADOS
function correosEmpleados($conexion){
	$statement = $conexion->prepare(
		'SELECT usuario.correo FROM usuario 
		WHERE usuario.rol_ingreso = 2'
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// TARER CORREOS CLIENTES
function correosClientes($conexion){
	$statement = $conexion->prepare(
		'SELECT usuario.correo FROM usuario 
		WHERE usuario.rol_ingreso = 1'
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// TRAER CORREOS USUARIOS
function correosUsuarios($conexion){
	$statement = $conexion->prepare(
		'SELECT usuario.correo, usuario.id_usuario FROM usuario ORDER BY usuario.id_usuario DESC'
	);
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// --------------------------------------- RECUPERAR PASS ---------------------------------------
// VALIDAR DATOS DE RECUPERAR PASS
function validarDatosRecPass($conexion, $correo, $cedula){
	$statement = $conexion->prepare(
		'SELECT usuario.id_usuario FROM usuario 
		WHERE usuario.correo = :correo AND usuario.cedula = :cedula'
	);
	$statement->execute(array(':correo' => $correo, ':cedula' => $cedula));
	$resultado = $statement->fetch();
	return $resultado;
}
// CAMBIO DE PASSWORD
function recuperarPassword($conexion, $password, $usuario){
	$statement = $conexion->prepare(
		'UPDATE usuario SET password = :password 
		WHERE usuario.id_usuario = :usuario'
	);
	$statement->execute(array(':password' => $password, ':usuario' => $usuario));
}
// ------------------------------------------ FORMATOS ------------------------------------------
// CREA EL FORMATO DE LA FECHA
function fecha($fecha){
	$timestamp = strtotime($fecha);
	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
	$dia = date('d', $timestamp);
	$mes = date('m', $timestamp) - 1;
	$year = date('Y', $timestamp);

	$fecha = $dia . '/' . $meses[$mes] . '/' . $year;

	return $fecha;
}
?>