<?php
session_start();
require_once('db_class.php');
$id = $_SESSION['id'];
$objdb = new db();
$link = $objdb->conecta_mysql();
$sql = "SELECT * FROM tb_aluno_materia am
        INNER JOIN tb_materias mm ON am.id_materia = mm.id_materia
        INNER JOIN tb_semestre ss ON mm.id_semestre = ss.id_semestre
        INNER JOIN tb_usuario uu ON mm.id_user_ministra = uu.id_user WHERE am.id_aluno = $id";

$result = mysqli_query($link,$sql);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Visualziar matérias</title>
	<meta charset="utf-8">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/font-awesome/3.4.1/css/font-awesome.min.css" />
    <link href="estilo_menup.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style type="text/css">
    	.margem{
    		margin-top: 40px;
    	}
    	.largura{
    		width: 50px;
    	}
    	.largura-text{
    		width: 150px;
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
                    <li><a href="home.php">voltar</a></li>
				</ul>
			</div>
		</div>
	</nav>


	<div class="container margem" align="center">
		<div>
			<table class="table table-striped table-bordered table-hover table-condensed botao">
				<thead>
					<tr>
						<th> Matéria </th>
						<th> Professor</th>
						<th> Semestre</th>
					</tr>
					<tbody>
						<?php 
						while($resultado_query_aluno_materias = mysqli_fetch_assoc($result)){?>
						<tr class="info">
							<td> <?php echo $resultado_query_aluno_materias['nome_materia']; ?> </td>
							<td> <?php echo $resultado_query_aluno_materias['nome_user']; ?> </td>
							<td class="largura"> <?php echo $resultado_query_aluno_materias['num_semestre']; ?> </td>
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