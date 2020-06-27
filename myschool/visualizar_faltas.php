<?php
session_start();
if($_SESSION['status'] != 'a'){
    header('Location: index.php?violation');
}
require_once('db_class.php');
$id = $_SESSION['id'];
$objdb = new db();
$link = $objdb->conecta_mysql();
$sql = "SELECT * FROM tb_aluno_materia am 
INNER JOIN tb_materias mm ON am.id_materia = mm.id_materia WHERE am.id_aluno = $id";
$result = mysqli_query($link,$sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Faltas</title>
	<meta charset="utf-8">
</head>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/font-awesome/3.4.1/css/font-awesome.min.css" />
    <link href="estilo_menup.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style type="text/css">
    	.margem{
    		margin-top: 100px;
    	}
    	.largura{
    		width: 300px;
    	}
    </style>
<body>
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
                    <li><a href="home.php">voltar</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container margem largura" align="center">
		<div>
			<table class="table table-striped table-bordered table-hover table-condensed botao">
				<thead>
					<tr>
						<th> Visualizar falta: </th>
					</tr>
					<tbody>
						<?php 
						while($resultado_query_aluno_materias = mysqli_fetch_assoc($result)){?>
						<tr class="success">
							<td><a href="faltas.php?materia=<?php echo $resultado_query_aluno_materias['id_materia']; ?>"><?php echo $resultado_query_aluno_materias['nome_materia'] ?></a></td>
						</tr><?php
					   }?>
					</tbody>
				</thead>
			</table>
		</div>
	</div>



<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>