<?php 
session_start();
if($_SESSION['status'] != 'p'){
	header('Location: index.php?violation');
}
require_once('db_class.php');
$objdb = new db();
$link = $objdb->conecta_mysql();
$id = $_SESSION['id'];
$sql_materia = "SELECT * FROM tb_materias WHERE id_user_ministra = $id";
$query_materia = mysqli_query($link,$sql_materia);
$idmateria = isset($_POST['id_materia']) ? $_POST['id_materia']: 0 ;
$atividade = isset($_POST['atividade']) ? $_POST['atividade']: 0 ;
$query_result = isset($_GET['aluno']) ? $_GET['aluno']: 0 ;
$_SESSION['atividade']= $atividade;

//query aluno-nota

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar nota</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/font-awesome/3.4.1/css/font-awesome.min.css" />
    <link href="estilo_menup.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style type="text/css">
    	.margem{
    		margin-top: 30px;
    	}
    	.margem2{
    		margin-top: 13px;
    	}
    	.wid{
    		width: 100px;
    	}
    	.wid2{
    		width: 50px;
    	}
    	.query_registro{
    		margin-top: 100px;

    	}
    </style>
</head>
<body>
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
		<form method="post" action="cadastrar_nota.php">
			<select name="id_materia" class="form-control">
				<?php 
				  while($resultado_query_materia = mysqli_fetch_assoc($query_materia)){
				  	?><option value="<?php echo $resultado_query_materia['id_materia']; ?>">
				  		<?php echo $resultado_query_materia['nome_materia']; ?>
				  	</option><?php
				  }?>
				  <input class="form-control margem2" type="textbox" name="atividade" placeholder="Digite o nome da Atividade">
				  <input class="btn btn-primary margem2" type="submit" name="btn" value="Cadastrar Atividade">
			</select>
		</form>
	</div>


	<div align="center" class="query_registro">
		<?php
		if($query_result){ 
		$resultado_registro_nota = "SELECT * FROM tb_usuario WHERE id_user = $query_result";
		$resultado_registro_nota_query = mysqli_query($link,$resultado_registro_nota);
		$vetor_query_registro_nota = mysqli_fetch_assoc($resultado_registro_nota_query);
		?> <label><?php echo "Aluno ".$vetor_query_registro_nota['nome_user']." registrado"; ?></label><?php
	    }
		?>
	</div>



   <?php 
   if($idmateria){
   	$sql_aluno_materia = "SELECT * FROM tb_aluno_materia am 
                           INNER JOIN tb_usuario uu
                           ON am.id_aluno = uu.id_user
                           WHERE am.id_materia = $idmateria AND uu.ativo_sn = 's'";
	 $query_aluno_materia = mysqli_query($link,$sql_aluno_materia);
	 $_SESSION['id_materia_nota'] = $idmateria;
	 ?>
	<div class="container margem">
		<label><h3><?php echo "Cadastrar atividade: ".$atividade;  ?></h3></label>
		<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
				<tr>
					<th> Nome </th>
					<th> Ra </th>
					<th class="invisible"> ID </th>
					<th> Nota </th>
					<th class="wid2"></th>
				</tr>
				<tbody>
					<?php 
					while($resultado_aluno = mysqli_fetch_assoc($query_aluno_materia)){ ?>
					<form method="post" action="registrar_nota.php">
					<tr>
						<td><?php echo $resultado_aluno['nome_user']; ?></td>
						<td><?php echo $resultado_aluno['ra']; ?></td>
						<td class="invisible wid2"><input type="text" name="id" value="<?php echo $resultado_aluno['id_user']; ?>"></td>
						<td class="wid"><input class="form-control" type="text" name="nota"></td>
						<td><input class="btn btn-danger" type="submit" name="botao"></td>
					</tr>
					</form><?php
				    }?>	
				</tbody>
			</thead>
		</table>
	</div><?php
    }?>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>