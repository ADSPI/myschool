<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('Location: login.php?erro=1');
}
if($_SESSION['status'] != 'p'){
	header('Location: index.php?violation');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Index</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
          <li><a href="sair.php">Sair</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Sidebar -->
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:20%">
    	<h3 class="w3-bar-item">Menu Professor</h3>
     
      <a href="cadastro_falta.php" class="w3-bar-item w3-button btn_style">Cadastrar Falta</a>

      
      <a href="cadastrar_nota.php" class="w3-bar-item w3-button btn_style">Cadastrar Nota</a>


    </div>
    <!-- Conteudo da pagina -->
    <div style="margin-left:20%">

     <!-- <div class="w3-container w3-teal">
       <h1>Pagina Administrativa</h1>
     </div> -->

    <div class="w3-container">
    <div align="center" class="w3-container w3-teal">
    <h2>Sua escola na palma da mão</h2>
    </div>
    <div align="center">
     <img src="img/background.png">
    </div>
    </div>

    </div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>


<!-- <input type="checkbox" id="check" name="">
        <label id="icone" for="check"><img src="img/icone.png"></label>
            <div class="barra">
    	        <nav id="nave">
    		        <a href="solicitacao_user.php"><div class="link">Solicitação de cadastros</div></a>
    		        <a href="cadastro_curso.php"><div class="link">Curso</div></a>
    		        <a href="cadastro_materia.php"><div class="link">Cadastro Matéria</div></a>
    		        <a href="cadastro_professor.php"><div class="link">Cadastro Professor</div></a>
    	        </nav>
            </div> --> 