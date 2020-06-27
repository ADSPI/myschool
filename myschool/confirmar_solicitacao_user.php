<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('Location: login.php?erro=1');
  }
require_once('db_class.php'); 
$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * FROM tb_usuario WHERE ativo_sn ='n' AND id_user = '$id'";
$objdb = new db();
$link = $objdb->conecta_mysql();
$result = mysqli_query($link,$sql);
$user_vet = mysqli_fetch_assoc($result);

$campo = isset($_POST['campo'])? $_POST['campo']:0; 



if($_SESSION['status'] != 'm'){
	header('Location: home.php?violation');
}


  ?>

<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="estilo.css" rel="stylesheet">
    <link href="estilo_menup.css" rel="stylesheet">
   	
 </head>
 <body>
 	<!-- barra de navegação -->
	<nav class="nav navbar-default">
		<div class="container">
			<!-- logo navbar -->
			<div class="navbar-header">
				<a href="#" class="navbar-brand">
					<img class="nav navbar-nav img-logo3" src="img/logo3.PNG">
					<img class="img-logo2" src="img/logo2.PNG">
				</a>
			</div>

			<!-- Menu barra navegação -->
			<div>
				<ul class="nav navbar-nav navbar-right">
					<li> <a href="#" ><span class="glyphicon glyphicon-user"></a> </li>
          <li> <a href="#" ><?= $_SESSION['usuario']; ?></a> </li>
          <li><a href="solicitacao_user.php">voltar</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<?php if($campo == ''){ ?>
 <div class="container" align="center" style="margin-top: 200px;">
 	<form method="post" action="editauser.php" class="form-group">

 		<input class="form-control" readonly="true" type="text" name="nome" value="<?php echo $user_vet['usuario'];?>">
 		<br/>
 		<input class="form-control" readonly="true" type="text" name="ra" value="<?php 
 		if($user_vet['ra'] == '' || $user_vet['ativo_sn'] == 's'){
 			header('Location: solicitacao_user.php?error=1');
 		}

 		 echo $user_vet['ra'];?>">
 		<br/>
 		<input class="btn btn-primary" type="submit" name="Editar" value="confirmar">
 	</form>

 </div><?php 
}else{
	$sql_ra = "SELECT * FROM tb_usuario WHERE ativo_sn ='n' AND ra = '$campo'";
	$result_ra = mysqli_query($link,$sql_ra);
    $query_ra = mysqli_fetch_assoc($result_ra); ?>

    <div class="container" align="center" style="margin-top: 200px;">
 	<form method="post" action="editauser.php" class="form-group">

 		<input class="form-control" readonly="true" type="text" name="nome" value="<?php echo $query_ra['usuario'];?>">
 		<br/>
 		<input class="form-control" readonly="true" type="text" name="ra" value="<?php 
 		if($campo == '' || $query_ra['ativo_sn'] == 's'){
 			header('Location: solicitacao_user.php?error=1');
 		}

 		 echo $campo;?>">
 		<br/>
 		<input class="btn btn-primary" type="submit" name="Editar" value="confirmar">
 	</form><?php

}?>
 </body>
 </html>