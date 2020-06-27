<?php
$erro = isset($_GET['error'])? $_GET['error']:0;
session_start();
$user = $_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
  header('Location: login.php?erro=1');
}
require_once('db_class.php');

$sql = "SELECT * FROM tb_usuario WHERE ativo_sn = 'n' ";
$objdb = new db();
$link = $objdb->conecta_mysql();
$result = mysqli_query($link,$sql);
//$sql2 = "SELECT * FROM usuario WHERE usuario = '$user' AND user_status = 'm'";
//$result2 = mysqli_query($link,$sql2);
//!$resultado = mysqli_fetch_assoc($result2)
if($_SESSION['status'] != 'm'){
	header('Location: home.php?violation');
}

  ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Index</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="estilo.css" rel="stylesheet">
    <link href="estilo_menup.css" rel="stylesheet">
    <style type="text/css">
    	.padrao_form{
    height: 50px ;
    width: 450px ;
}
    </style>
    
</head>
<body >

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

	<div style="margin-top: 15px;" class="container" align="center">
	<form class="form-group" action="confirmar_solicitacao_user.php" method="post">
		<input class="form-control padrao_form" type="text" name="campo" id="campo" placeholder="Digite o registro acadêmico do aluno">
		<?php 
		  if($erro == 1){
		  	?>
		  	<label style="color: red;">cadastro não encontrado, usuario já ativo ou inexistente</label>
		<?php
		  }?><br/>
		 <input class="btn btn-primary" type="submit" name="btn" value="Pesquisar">  
	</form>
	</div>


	<?php
	 while($row_user = mysqli_fetch_assoc($result)){
	 	?> <hr/>
	  <div class="container" align="center">
	 	<label style="font-family: OCR A Std, monospace;"><?php echo "User: " .$row_user['usuario']; ?> </label> <br/>
		<label style="font-family: OCR A Std, monospace;" > <?php echo "Ra: " .$row_user['ra']; ?> </label> <br/> 
		<button class="btn btn-secondary" style="font-family: cursive;">
		   <?php 
			echo "<a href='confirmar_solicitacao_user.php?id=".$row_user['id_user']."'>Aceitar solicitação</a>";
		    ?>
		</button>
	  </div><hr/>
	  <?php
	}
	?>
	
</body>
</html>
