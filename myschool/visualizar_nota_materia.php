<?php
session_start();
if($_SESSION['status'] != 'a'){
    header('Location: index.php?violation');
}
$idmateria = isset($_GET['materia']) ? $_GET['materia']: 0 ;

require_once('db_class.php');
$id = $_SESSION['id'];
$objdb = new db();
$link = $objdb->conecta_mysql();
$sql = "SELECT * FROM tb_aluno_nota au WHERE au.id_aluno = $id AND au.id_materia = $idmateria;";
$sql2 = "SELECT * FROM tb_materias WHERE id_materia = $idmateria";
$result = mysqli_query($link,$sql);
$result_materia = mysqli_query($link,$sql2);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Notas</title>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/font-awesome/3.4.1/css/font-awesome.min.css" />
    <link href="estilo_menup.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style type="text/css">
    	.margem{
    		margin-top: 50px;
    	}
    	.margem_label{
    		margin-top: 15px;
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
                    <li><a href="visualizar_nota.php">voltar</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<?php $nome_materia = mysqli_fetch_assoc($result_materia); ?>
	<div class="margem_label" align="center"><label><h3><?php echo $nome_materia['nome_materia']; ?></h3></label></div>
	<div class="container margem" align="center">
		<div>
			<table class="table table-striped table-bordered table-hover table-condensed botao">
				<thead>
					<tr>
						<th> Atividade </th>
						<th> Nota </th>
					</tr>
					<tbody>
						<?php 
						while($resultado_query_aluno_materias = mysqli_fetch_assoc($result)){?>
						<tr class="warning">
							<td><?php echo $resultado_query_aluno_materias['atividade']; ?></td>
							<td><?php echo $resultado_query_aluno_materias['nota']; ?></td>
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