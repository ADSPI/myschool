<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('Location: login.php?erro=1');
}
if($_SESSION['status'] != 'a'){
    header('Location: index.php?violation');
}

require_once('db_class.php');
$objdb = new db();
$link = $objdb->conecta_mysql();

$sql = "SELECT * FROM comunicado_aluno";
$result = mysqli_query($link,$sql);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Index</title>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/font-awesome/3.4.1/css/font-awesome.min.css" />
    <link href="estilo_menup.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style type="text/css">
      .btn_style{
        background: darkgray;
      }
      .btn_style:hover{
        background: lightyellow;
        color: black;
        transition: 1s;
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
                    <li><a href="sair.php">Sair</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Sidebar -->
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:20%">
    	<h3 class="w3-bar-item">Menu Aluno</h3>
     
      <a href="visualizar_materia.php" class="w3-bar-item w3-button btn_style">Visualizar Matérias</a>

      
      <a href="visualizar_nota.php" class="w3-bar-item w3-button btn_style">Visualizar Notas</a>

      <a href="visualizar_faltas.php" class="w3-bar-item w3-button btn_style">Visualizar Faltas</a>


    </div>
    <!-- Conteudo da pagina -->
    <div style="margin-left:20%">

     <!-- <div class="w3-container w3-teal">
       <h1>Pagina Administrativa</h1>
     </div> -->

    <div class="w3-container">
      <div align="center" class="w3-container w3-teal">
       <h2>Bem Vindo(a)</h2>
      </div><?php 
      while($query = mysqli_fetch_assoc($result)){?>
      <div align="center">
        <div><h1><?php echo $query['titulo']; ?></h1></div>
      <label><?php
       echo $query['comunicado'];?>
       </label>
      </div> <?php } ?>
    </div>

</div>



<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>