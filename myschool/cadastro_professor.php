<?php 
session_start();
if($_SESSION['status'] != 'm'){
	header('Location: index.php?violation');
}

$erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario']: 0 ;
$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email']: 0 ;
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="estilo.css" rel="stylesheet">
  <style type="text/css">
  	.padrao_form{
	height: 30px ;
	width: 300px ;
}
  </style>
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
                    <li><a href="menu_Adm.php">voltar</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container" style="margin-top: 40px;" align="center">
		<h3>Cadastrar Professor</h3>
		<form class="form-group" method="post" action="registrarProfessor.php">
			<input class="form-control padrao_form" type="text" name="p_nome" placeholder="Nome" required="requeiored"><br/>
			<input class="form-control padrao_form" type="email" name="p_email" placeholder="E-mail" required="requeiored"><br/>
			<?php 
			  if($erro_email == 1){
			  	?><label style="color: red;">E-mail já cadastrado</label><?php 
			  }
			?>
			<input class="form-control padrao_form" type="text" name="p_user" placeholder="Usuario" required="requeiored"><br/>
			<?php 
			 if($erro_usuario == 1){
			 	?> <label style="color: red;">Usuário já existe</label><?php
			 }
			?>
			<input class="form-control padrao_form" type="password" name="p_senha" placeholder="Senha" required="requeiored"><br/>
			
			<input class="btn btn-primary" type="submit" name="c_confirmar" value="cadastrar">
		</form>
	</div>


</body>
</html>