<?php 
session_start();
require_once('db_class.php');
if($_SESSION['status'] != 'm'){
	header('Location: index.php?violation');
}
$erro = isset($_GET['msg'])? $_GET['msg']:0;

$objdb = new db();
$link = $objdb->conecta_mysql();

$sql = "SELECT * FROM tb_cursos WHERE ativo_sn = 's'";
$result = mysqli_query($link,$sql);
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
	width: 150px ;
}
   .padrao_form2{
	height: 30px ;
	width: 250px ;
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

	<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 100px;"  align="center">
		<form class="form-group" method="post" action="registraSemestre.php">
			<h3>Cadastrar Semestre</h3>
			<input class="form-control padrao_form" type="text" name="num_semestre" placeholder="Numero semestre" required="requeiored"><br/>
			<label>Selecione o curso:</label>
			<select class="form-control padrao_form2" name="id_curso">
				<option></option>
				<?php 
				while($acesso_curso = mysqli_fetch_assoc($result)){
					?>
					<option value="<?php echo $acesso_curso['id_curso']; ?>"><?php echo $acesso_curso['nome_curso']; ?></option>
					<?php
				}
				?>
			</select><br/>
			<?php 
			if($erro == 1){
				?> <label style="color: red;">Semestre já cadastrado para o curso</label><br/> <?php
			}
			?>
			<input class="btn btn-primary" type="submit" name="btn" value="Cadastrar">
		</form>
	</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>