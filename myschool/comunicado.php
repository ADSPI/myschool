<?php
session_start();
if($_SESSION['status'] != 'm'){
    header('Location: index.php?violation');
}
$msg = isset($_GET['msg']) ? $_GET['msg']: 0 ;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Comunicado</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="estilo_menup.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style type="text/css">
    	.margem{
    		margin-top: 50px;
    	}
    	.top{
    		margin-top: 5px;
    	}
    	.larg{
    		width: 300px;
    	}
    </style>
</head>
<body>
	<!-- barra de navegação -->
	<nav class="nav navbar-default ">
		<!-- painel -->

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

	<div class="container" align="center">
		<form class="margem" action="registrar_comunicado.php" method="post">
			<input class="form-control larg" type="text" name="title" placeholder="Título"><br/>
			<textarea class="form-control" name="texto" rows="3" placeholder="Digite o comunicado"></textarea><br/>
			<input class="btn btn-primary" type="submit" name="btn">
		</form>
		<button onclick="window.location.href = 'apagar_comunicado.php'" class="btn btn-danger top">Apagar comunicado antigo</button>
		<div>
			<?php 
			 if($msg == 1){
			 	?> <label>Registro excluido com sucesso !</label><?php 
			 }
			?>
		</div>
	</div>
</body>
</html>
