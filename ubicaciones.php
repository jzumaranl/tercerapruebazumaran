<?php include('cabeza.php');?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ubicaciones</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/tabla.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
	<script type="text/javascript">
	$(function() {
		$("#tablesorter").tablesorter({sortList:[[0,0]], widgets: ['zebra']});
		$("#options").tablesorter({sortList: [[0,0]], headers: { 3:{sorter: false}, 4:{sorter: false}}});
	});
	</script>
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<?php
$csv = array_map('str_getcsv', file('data/ubicaciones.csv'));
array_walk($csv, function(&$a) use ($csv) {$a = array_combine($csv[0], $a);});
array_shift($csv);
?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
	<h1>El Diseño en Chile<h4>Ubicación de Instituciones de formación técnico y profesional que imparten carreras afines en el país.<h4></h1>


	<table id="tablesorter" class="tablesorter" border="0" cellpadding="0" cellspacing="1">
		<thead>
			<tr>
				<th>Carrera</th>
				<th>Escuela</th>
				<th>Dirección</th>
				<th>Latitud</th>
				<th>Longitud</th>
			</tr>
		</thead>
		<tbody>
			<?php for($a = 0; $a < $total = count($csv); $a++){?>
			<tr>
				<td><?php echo($csv[$a]["Carrera"])?></td>
				<td><?php echo($csv[$a]["Escuela"])?></td>
				<td><?php echo($csv[$a]["Direccion"])?></td>
				<td><?php echo($csv[$a]["Latitud"])?></td>
				<td><?php echo($csv[$a]["Longitud"])?></td>
			</tr>
			<?php };?>

		</tbody>
	</table>

   <iframe src="https://www.google.com/maps/d/embed?mid=1HHuVxLDmSDgcGE6kP13yg1xOScI" width="640" height="480"></iframe>


</div>
</div>
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
