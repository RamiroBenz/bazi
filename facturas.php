<?php
require('comunes.php');

	$active_facturas="active";
	$active_productos="";
	$active_clientes="";
	$active_usuarios="";
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos


	$sql = "SELECT * FROM facturas";

	$resultado=$con->query($sql);		
	 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include("head.php");?>
	<link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/5028/basics_3.css">

	<style>
		

		.responsive-table {
  width: 100%;
  margin-bottom: 1.5em;
}
.responsive-table thead {
  position: absolute;
  clip: rect(1px 1px 1px 1px);
  /* IE6, IE7 */
  clip: rect(1px, 1px, 1px, 1px);
  padding: 0;
  border: 0;
  height: 1px;
  width: 1px;
  overflow: hidden;
}
.responsive-table thead th {
  background-color: #1d96b2;
  border: 1px solid #1d96b2;
  font-weight: normal;
  text-align: center;
  color: white;
}
.responsive-table thead th:first-of-type {
  text-align: left;
}
.responsive-table tbody,
.responsive-table tr,
.responsive-table th,
.responsive-table td {
  display: block;
  padding: 0;
  text-align: left;
  white-space: normal;
}
.responsive-table th,
.responsive-table td {
  padding: .5em;
  vertical-align: middle;
}
.responsive-table caption {
  margin-bottom: 1em;
  font-size: 1em;
  font-weight: bold;
  text-align: center;
}
.responsive-table tfoot {
  font-size: .8em;
  font-style: italic;
}
.responsive-table tbody tr {
  margin-bottom: 1em;
  border: 2px solid #1d96b2;
}
.responsive-table tbody tr:last-of-type {
  margin-bottom: 0;
}
.responsive-table tbody th[scope="row"] {
  background-color: #1d96b2;
  color: white;
}
.responsive-table tbody td[data-type=currency] {
  text-align: right;
}
.responsive-table tbody td[data-title]:before {
  content: attr(data-title);
  float: left;
  font-size: .8em;
  color: rgba(94, 93, 82, 0.75);
}
.responsive-table tbody td {
  text-align: right;
  border-bottom: 1px solid #1d96b2;
}


@media (min-width: 52em) {
  .responsive-table {
    font-size: .9em;
  }
  .responsive-table thead {
    position: relative;
    clip: auto;
    height: auto;
    width: auto;
    overflow: auto;
  }
  .responsive-table tr {
    display: table-row;
  }
  .responsive-table th,
  .responsive-table td {
    display: table-cell;
    padding: .5em;
  }

  .responsive-table caption {
    font-size: 1.5em;
  }
  .responsive-table tbody {
    display: table-row-group;
  }
  .responsive-table tbody tr {
    display: table-row;
    border-width: 1px;
  }
  .responsive-table tbody tr:nth-of-type(even) {
    background-color: rgba(94, 93, 82, 0.1);
  }
  .responsive-table tbody th[scope="row"] {
    background-color: transparent;
    color: #5e5d52;
    text-align: left;
  }
  .responsive-table tbody td {
    text-align: center;
  }
  .responsive-table tbody td[data-title]:before {
    content: none;
  }
}
@media (min-width: 62em) {
  .responsive-table {
    font-size: 1em;
  }
  .responsive-table th,
  .responsive-table td {
    padding: .75em .5em;
  }
  .responsive-table tfoot {
    font-size: .9em;
  }
}

@media (min-width: 75em) {
  .responsive-table th,
  .responsive-table td {
    padding: .75em;
  }
}

	</style>

  </head>
  <body>
	<?php
	include("navbar.php");
	?>  
    <div class="container">
		<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<a  href="nueva_factura.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Nueva Factura</a>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Facturas</h4>
		</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Cliente o # de factura</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Nombre del cliente o # de factura" onkeyup='load(1);'>
							</div>
							
							
							
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
				
				
				
			</form>
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<!-- <div class='outer_div'></div> --><!-- Carga los datos ajax -->

<br>
<br>
<br>

<div id="cuadro" align="center" >
<table class="responsive-table">
    <caption>Productos: Edilu S.R.L.</caption>
			<thead class="thead-light">

				<tr class="centro">
					
					<th scope="col"><b>Id</b></th>
					<th scope="col"><b>Num. Fact.</b></th>
					<th scope="col"><b>Fecha</b></th>
					<th scope="col"><b>Cliente</b></th>
					<th scope="col"><b>Vendedor</b></th>
					<th scope="col"><b>Condiciones</b></th>
					<th scope="col"><b>Total Venta</b></th>
					<th scope="col"><b>Estado Factura</b></th>
					

					<th scope="col"><b>Modificar</b></th>
					<th scope="col"><b>Eliminar</b></th>
				</tr>
				<tbody>
					<?php while($row=$resultado->fetch_assoc()){ ?>
					<tr>
						<td scope="row"><?php echo $row['id_factura']?></td>
						<td scope="row"><?php echo $row['numero_factura']?></td>
						<td scope="row"><?php echo $row['fecha_factura']?></td>
						<td scope="row"><?php echo $row['id_cliente']?></td>
						<td scope="row"><?php echo $row['id_vendedor']?></td>
						<td scope="row"><?php echo $row['condiciones']?></td>
						<td scope="row"><?php echo $row['total_venta']?></td>
						<td scope="row"><?php echo $row['estado_factura']?></td>
						
						

						<!-- Botones Modificar y Eliminar.. -->
						<td scope="row"><a href="modificarStock.php?id=<?php echo $row['id']; ?> " class="btn btn-primary">Modificar</a></td>
						<td scope="row"><a href="eliminar_stock.php" class="btn btn-primary">Eliminar</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</thead>
		</table>
	</div>
<div align="center">
<br>
		<br>
		<br>		
	<img src="img/banner3.jpg" alt="" width="900px;">	
</div>
			</div>
		</div>	
		
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/facturas.js"></script>
  </body>
</html>