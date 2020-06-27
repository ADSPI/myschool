<?php 
session_start();
if($_SESSION['status'] != 'p'){
    header('Location: index.php?violation');
}
$idmateria = isset($_POST['id_materia']) ? $_POST['id_materia']: 0 ;
require_once('db_class.php');
$id = $_SESSION['id'];
$objdb = new db();
$link = $objdb->conecta_mysql();
$sql_materia = "SELECT * FROM tb_materias WHERE id_user_ministra = $id";
$query_materia = mysqli_query($link,$sql_materia);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Menu de Matérias</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="estilo_menup.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style type="text/css">
    	.botao{
    		margin-top: 10px;
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
          <li><a href="home_professor.php">voltar</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container" align="center">
		<div align="left"><h3>Selecione a matéria</h3></div>
		<form method="post" action="cadastro_falta.php">
			<select name="id_materia" class="form-control">
				<?php 
				  while($resultado_query_materia = mysqli_fetch_assoc($query_materia)){
				  	?><option value="<?php echo $resultado_query_materia['id_materia']; ?>">
				  		<?php echo $resultado_query_materia['nome_materia']; ?>
				  	</option><?php
				  }?>

				  <input class="btn btn-primary botao" type="submit" name="btn" value="Buscar">
			</select>
		</form>
	</div>
	<?php 
	if($idmateria){
	 $sql_aluno_materia = "SELECT * FROM tb_aluno_materia am 
                           INNER JOIN tb_usuario uu
                           ON am.id_aluno = uu.id_user
                           WHERE am.id_materia = $idmateria AND uu.ativo_sn = 's'";
	 $query_aluno_materia = mysqli_query($link,$sql_aluno_materia);
	 $_SESSION['id_materia_falta'] = $idmateria;
	 ?>
	 <form method="post" action="registrarFalta.php">
	  <table class="table table-striped table-bordered table-hover table-condensed botao">
	  	<thead>
	  		<tr>
	  			<th> Nome </th>
	  			<th> Ra </th>
	  			<th> Falta </th>
	  		</tr>
	  		<?php 
	  		 while($resultado_query_aluno_materia = mysqli_fetch_assoc($query_aluno_materia)){?>
	  		<tbody>
	  			<tr>
	  				<td><?php echo $resultado_query_aluno_materia['nome_user'];?></td>
	  				<td><?php echo $resultado_query_aluno_materia['ra']; ?></td>
	  				<td>
	  					<input type="checkbox" name="caixas[]" value="<?php echo $resultado_query_aluno_materia['id_user']; ?>">
	  				</td>
	  			</tr><?php
	  		 }?> 
	  		</tbody>
	  	</thead>
	  </table>
	  <input class="btn btn-danger" type="submit" name="btn" value="Enviar">
	</form>
	 <?php
	}else {
		
	}
	?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>