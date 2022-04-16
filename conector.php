<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<meta charset="utf-8">
	<title>Sánchez Gutiérrez David Emanuel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

	<body>
		<div class="container">
			<div class="table table-bordered">        
				<table id="prueba" class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Precio</th>
							<th>Cantidad en existencia</th>
							<th>Estatus</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$host="localhost";
						$username="root";
						$password="1234";
						$database="sabatino";

						$mysqli_link = mysqli_connect($host, $username , $password, $database);

						if (mysqli_connect_errno())
						{
							printf("Hubo un error", mysqli_connect_error());
							exit;
						}

						echo("Se realizó la conexión a la base de datos correctamente. <br/><br/>");
						$select_query = "SELECT * FROM producto";
						$result = mysqli_query($mysqli_link, $select_query);

						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							if ($row['estatus_produ'] == 2) {
								echo '<tr class="success">';

								echo	'<td>'. $row['id_produ'] .'</td>';
								echo	'<td>'. $row['nombre_produ'] . '</td>';
								echo	'<td>'. $row['precio_produ'] .'</td>';
								echo	'<td>'. $row['cantiexi_produ'] .'</td>';
								echo	'<td>'. $row['estatus_produ'] .'</td>';

								echo'</tr>';
							} elseif ($row['estatus_produ'] == -1) {
								echo '<tr class="danger">';

								echo	'<td>'. $row['id_produ'] .'</td>';
								echo	'<td>'. $row['nombre_produ'] . '</td>';
								echo	'<td>'. $row['precio_produ'] .'</td>';
								echo	'<td>'. $row['cantiexi_produ'] .'</td>';
								echo	'<td>'. $row['estatus_produ'] .'</td>';

								echo'</tr>';
							} else {
								echo '<tr>';

								echo	'<td>'. $row['id_produ'] .'</td>';
								echo	'<td>'. $row['nombre_produ'] . '</td>';
								echo	'<td>'. $row['precio_produ'] .'</td>';
								echo	'<td>'. $row['cantiexi_produ'] .'</td>';
								echo	'<td>'. $row['estatus_produ'] .'</td>';

								echo'</tr>';
							}
						}

						?>
							
					</tbody>
				</table>
			</div>
			<script>
				$(document).ready(function(){
					$('#prueba').DataTable({
						responsive: true
					});
				});
			</script>
		<body>
	</head>
</html>