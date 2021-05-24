<?php require_once 'json/php/informes.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Icomoon/style.css">
	<title>Informes</title>
</head>
<body>
	<div class="container-fluid mb-4">
		<div class="row pt-3">
			<!-- FINANZAS -->
			<div class="col-12 mb-3">
				<div class="card card-body">
					<div id="grafico1"></div>
				</div>
			</div>
			<!-- EVENTOS AL MES -->
			<div class="col-12 mb-3">
				<div class="card card-body">
					<div id="grafico2"></div>
				</div>
			</div>
			<!-- TOTAL EVENTOS -->
			<div class="col-12 col-md-6 mb-3">
				<div class="card">
					<div id="grafico3"></div>
				</div>
			</div>
			<!-- TOTAL ASPIRANTES -->
			<div class="col-12 col-md-6 mb-3">
				<div class="card">
					<div id="grafico4"></div>
				</div>
			</div>
			<!-- TARBAJADORES POR CARGO -->
			<div class="col-12 mb-3">
				<div class="card card-body">
					<div id="grafico5"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- NATIVOS -->
	<script src="<?php echo RUTA; ?>js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="<?php echo RUTA; ?>js/Bootstrap/popper.min.js"></script>
	<script src="<?php echo RUTA; ?>js/Bootstrap/bootstrap.min.js"></script>

	<!-- HIGH CHARTS -->
	<script src="<?php echo RUTA; ?>js/Highcharts-7.2.0/code/highcharts.js"></script>
	<script src="<?php echo RUTA; ?>js/Highcharts-7.2.0/code/highcharts-3d.js"></script>
	<script src="<?php echo RUTA; ?>js/Highcharts-7.2.0/code/modules/exporting.js"></script>
	<script src="<?php echo RUTA; ?>js/Highcharts-7.2.0/code/modules/export-data.js"></script>

	<!-- SCRIPTS HIGH FINANCIERO -->
	<script>
		Highcharts.chart('grafico1', {
				    chart: {
				        type: 'line'
				    },
				    title: {
				        text: 'Ganancias Mensuales'
				    },
				    subtitle: {
				        text: 'Finanzas'
				    },
				    caption: {
				        text: 'La gráfica tiene como función comparar las ganancias mensuales de la casa de eventos AMSAYUL cada mes, teniendo como base, la fecha de ejecución del evento y el costo de la cotización. El gráfico tiene la disponibilidad de descargarse en formatos pdf, png, jpg, xls (excel) y sgv. '
				    },
				    xAxis: {
				        categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
				    },
				    yAxis: {
				        title: {
				            text: 'Ganancias $'
				        }
				    },
				    plotOptions: {
				        line: {
				            dataLabels: {
				                enabled: true
				            },
				            enableMouseTracking: false
				        }
				    },
				    series: [{
				        name: 'Ganacias',
				        data: 
				        <?php echo "[" ?>
				        500000000,250000000,670000000,450000000,700000000,490000000,600000000,
				        	<?php echo $resultadoRAgosto[0]; ?>,
						    <?php echo $resultadoRSeptiembre[0]; ?>,
						    <?php echo $resultadoROctubre[0]; ?>,
						    <?php echo $resultadoRNoviembre[0]; ?>,
						    <?php echo $resultadoRDiciembre[0]; ?>,
				        <?php echo "]" ?>
				        ,
				    }]
				});
	</script>
	<!-- SCRIPTS HIGH EVENTOS MENSUAL -->
	<script>
		// Set up the chart
		var chart = new Highcharts.Chart({
		    chart: {
		        renderTo: 'grafico2',
		        type: 'column',
		        options3d: {
		            enabled: true,
		            alpha: 0,
		            beta: 0,
		            depth: 25,
		            viewDistance: 25
		        }
		    },
		    title: {
		        text: 'Eventos al mes'
		    },
		    subtitle: {
		        text: 'Cantidad de eventos que se solicitan al mes.'
		    },
		    caption: {
		        text: 'El gráfico permite visualizar las solicitudes que se han registrado en el sistema dividiendolas por mes. Además el gráfico tiene la disponibilidad de descargarse en formatos pdf, png, jpg, xls (excel) y sgv.'
		    },
		    xAxis: {
		        categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
		    },
		    plotOptions: {
		        column: {
		            depth: 25
		        }
		    },
		    series: [{
		    	name: ['Eventos Solicitados'],
		        data: [
		        	<?php echo $resultadoEEnero[0]; ?>,
		        	<?php echo $resultadoEFebrero[0]; ?>,
		        	<?php echo $resultadoEMarzo[0]; ?>,
		        	<?php echo $resultadoEAbril[0]; ?>,
		        	<?php echo $resultadoEMayo[0]; ?>,
		        	<?php echo $resultadoEJunio[0]; ?>,
		        	<?php echo $resultadoEJulio[0]; ?>,
		        	<?php echo $resultadoEAgosto[0]; ?>,
		        	<?php echo $resultadoESeptiembre[0]; ?>,
		        	<?php echo $resultadoEOctubre[0]; ?>,
		        	<?php echo $resultadoENoviembre[0]; ?>,
		        	<?php echo $resultadoEDiciembre[0]; ?>,
		        ]
		    }]
		});

		function showValues() {
		    $('#alpha-value').html(chart.options.chart.options3d.alpha);
		    $('#beta-value').html(chart.options.chart.options3d.beta);
		    $('#depth-value').html(chart.options.chart.options3d.depth);
		}

		// Activate the sliders
		$('#sliders input').on('input change', function () {
		    chart.options.chart.options3d[this.id] = parseFloat(this.value);
		    showValues();
		    chart.redraw(false);
		});

		showValues();
	</script>
	<!-- SCRIPTS HIGH EVENTOS SOLICITADOS 3D -->
	<script>
		Highcharts.chart('grafico3', {
		    chart: {
		        type: 'pie',
		        options3d: {
		            enabled: true,
		            alpha: 45,
		            beta: 0
		        }
		    },
		    title: {
		        text: 'Eventos Solicitados En 2019 '
		    },
		    subtitle: {
		        text: 'Tipos de eventos disponibles'
		    },
		    caption: {
		        text: 'En la gráfica se evidencias todos los tipos de eventos que existen en el sistema, en la cual se muestran la cantidad de los eventos solicitados en el transcurso del año 2019. El gráfico tiene la disponibilidad de descargarse en formatos pdf, png, jpg, xls (excel) y sgv.'
		    },
		    plotOptions: {
		        pie: {
		            allowPointSelect: true,
		            cursor: 'pointer',
		            depth: 35,
		            dataLabels: {
		                enabled: true,
		                format: '{point.name}'
		            }
		        }
		    },
		    series: [{
		        type: 'pie',
		        name: 'Solicitudes: ',
		        data: [
		        	<?php foreach ($resultado as $res): ?>
		        		<?php echo '[' ?>
		        		<?php echo "'" . $res[0] . "'"; ?>, <?php echo $res[1]; ?>
		        		<?php echo '],' ?>
		        	<?php endforeach ?>
		        ]
		    }]
		});
	</script>
	<!-- SCRIPTS HIGH ASPIRANTES -->
	<script>
		Highcharts.chart('grafico4', {
		    chart: {
		        type: 'column'
		    },
		    title: {
		        text: 'Aspirantes'
		    },
		    caption: {
		        text: 'El gráfico se evidencia la cantidad total de aspirantes registrados en el sistema mostrandose mediante cada uno de sus estados (Aprobado, En Espera y Rechazado) la cual la secretaria es quien logra el cambio de los datos en el gráfico. Además el gráfico tiene la disponibilidad de descargarse en formatos pdf, png, jpg, xls (excel) y sgv.'
		    },
		    xAxis: {
		        categories: ['Aspirantes']
		    },
		    yAxis: {
		        min: 0,
		        title: {
		            text: 'Total de Aspirantes %'
		        }
		    },
		    tooltip: {
		        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
		        shared: true
		    },
		    plotOptions: {
		        column: {
		            stacking: 'percent'
		        }
		    },
		    series: [{
		        name: <?php echo "'" . $resultadoAspirantesA[0] . "'"; ?>,
		        data: [<?php echo $resultadoAspirantesA[1]; ?>]
		    }, {
		        name: <?php echo "'" . $resultadoAspirantesR[0] . "'"; ?>,
		        data: [<?php echo $resultadoAspirantesR[1]; ?>]
		    }, {
		        name: <?php echo "'" . $resultadoAspirantesE[0] . "'"; ?>,
		        data: [<?php echo $resultadoAspirantesE[1]; ?>]
		    }]
		});
	</script>
	<!-- SCRIPTS HIGH EMPLEADOS POR CARGO -->
	<script>
		Highcharts.chart('grafico5', {
		    chart: {
		        type: 'column'
		    },
		    title: {
		        text: 'Empleados por Cargo'
		    },
		    caption: {
		        text: 'El gráfico se evidencia la cantidad total de empleados registrados en el sistema mostrandose mediante cada uno de sus cargos (Acomodador, Aseo, Bartender, Camarógrafo, Cocinero, DJ, Electrónicos, Locutor, Logística, Mesero, Recreador y Seguridad). Además el gráfico tiene la disponibilidad de descargarse en formatos pdf, png, jpg, xls (excel) y sgv.'
		    },
		    yAxis: {
		        allowDecimals: false,
		        title: {
		            text: 'Cantidad de empleados'
		        }
		    },
		    xAxis: {
		        categories: [
		        	<?php foreach ($resultadoCargosAsp as $restCA): ?>
		        		<?php echo "'".$restCA[0]."'"; ?>,
		        	<?php endforeach ?>
		        ]
		    },
		    plotOptions: {
		        series: {
		            depth: 25,
		            colorByPoint: true
		        }
		    },
		    series: [{
		                name: 'Empleados',
		                data: [
		                <?php foreach ($resultadoCargosAsp as $restCA): ?>
		                	<?php echo $restCA[1]; ?>,
		                <?php endforeach ?>
		                ]
		            }]
		});
	</script>
</body>
</html>