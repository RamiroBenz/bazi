	<?php
  require('comunes.php');
		/*if (isset($nombre))
		{*/
      $nombre="Lola Morena";
	?>
<nav class="navbar navbar-default " style="background-color: #7d0505;border-color: #000080; color: white;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="https://www.lolamorena.com.ar"><?php echo $nombre; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" style="color: white;">
        <li style="color: white;" class="<?php echo $active_facturas;?>"><a href="facturas.php"><i class='glyphicon glyphicon-list-alt'></i> Facturas <span class="sr-only">(current)</span></a></li>
        
        <li style="color: white;" class="<?php echo $active_productos;?>"><a href="productos.php"><i class='glyphicon glyphicon-barcode'></i> Productos</a></li>

		<li style="color: white;" class="<?php echo $active_clientes;?>"><a href="clientes.php"><i class='glyphicon glyphicon-user'></i> Clientes</a></li>

		<li style="color: white;" class="<?php echo $active_usuarios;?>"><a href="usuarios.php"><i  class='glyphicon glyphicon-lock'></i> Usuarios</a></li>
		<li style="color: white;" class="<?php if(isset($active_perfil)){echo $active_perfil;}?>"><a href="perfil.php"><i  class='glyphicon glyphicon-cog'></i> Configuración</a></li>
       </ul>
      <ul class="nav navbar-nav navbar-right">
        <li style="color: white;"><a href="http://www.rbcreacionesweb.com/" target='_blank'><i class='glyphicon glyphicon-envelope'></i> Soporte</a></li>
		<li style="color: white;"><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<?php
		/*}*/
	?>