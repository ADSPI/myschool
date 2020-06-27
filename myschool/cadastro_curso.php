<?php 
session_start();
if($_SESSION['status'] != 'm'){
	header('Location: index.php?violation');
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
  <style type="text/css">
  	.padrao_form{
    height: 35px ;
    width: 450px ;
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
		<form class="form-group" method="post" action="registrarCurso.php">
			<input class="form-control padrao_form" type="text" name="c_nome" placeholder="Nome do curso"><br/>
			<input class="form-control padrao_form" type="text" name="c_duracao" placeholder="Duração do curso"><br/>
			<textarea class="form-control padrao_form" name="c_text" id="exampleFormControlTextarea1" rows="3" placeholder="Descrição do curso"></textarea><br/>
			<input class="btn btn-primary" type="submit" name="c_confirmar" value="cadastrar">
		</form>
	</div>


</body>
</html>