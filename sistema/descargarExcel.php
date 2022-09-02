<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <!--Importante--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar</title>
</head>
<body>
    
<?php
include "../conexion.php";						
date_default_timezone_set("America/Bogota");
$fecha = date("d/m/Y");

header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
$filename = "ReporteExcel_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");


?>


<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #D0CDCD;">
    <th>Id</th>
	<th>Fecha</th>
	<th>Total</th>
    </tr>
</thead>
<tbody>
						<?php
						require "../conexion.php";
						$query = mysqli_query($conexion, "SELECT nofactura, fecha,codcliente, totalfactura, estado FROM factura ORDER BY nofactura DESC");
						mysqli_close($conexion);
						$cli = mysqli_num_rows($query);

						if ($cli > 0) {
							while ($dato = mysqli_fetch_array($query)) {
						?>
						<tr>
							<td><?php echo $dato['nofactura']; ?></td>
							<td><?php echo $dato['fecha']; ?></td>
							<td><?php echo $dato['totalfactura']; ?></td>
							
									</td>
								</tr>
						<?php }
						} ?>
					</tbody>
</table>

</body>
</html>