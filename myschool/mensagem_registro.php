<?php
$erro = isset($_GET['msg'])? $_GET['msg']:0; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Mensagem</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="estilo.css" rel="stylesheet">
</head>
<style type="text/css">
	.faixa{
		border:;
		background: linear-gradient(20deg,white,lightblue);
		height: 30px;
		width: all;
		width: 1000px;
	}
	.faixa-2{
		border:;
		background: linear-gradient(20deg,yellow,white);
		height: 30px;
		margin-top: all;
		width: 1000px;
	}
	    .capa{
     display: table;
     width: 100%
}
     .texto-capa{
    text-align: center;
    color: white;
    display: table-cell;
    vertical-align: middle;
}
     html, body, .capa{
    height: 80%;
    background:;

}
    .color-msg{
    	color: black;
    	font-family: Comic Sans MS, Comic Sans, cursive;
    }

    .btne{
    	font-family: Verdana, sans-serif;
    	width: 120px;
    	height: 35px;
    	color: black;
    	background: white;
    	border: 1px solid black;
    	transition: 2s;

    }
    .btn:hover{
    	background: lightblue;
    	color: black;
    	border: 2px darkgray white;
    	transition: 2s;
    }
</style>
<body>

 <div align="center">
 	<a href="index.php"><img style="height: 100px;" src="img/logo1.png"></a>
 </div>
 <div class="capa">
     <div class="texto-capa">
       <div class="container" align="center">
        <div class="col-md-12">
           <div class=" container faixa"></div>
           <?php 
           if($erro == 1){
           	?><h3 class="color-msg">Erro inexperado, contate o Administrador</h3><?php 
           }else{
           	?><h3 class="color-msg">Solicitação de cadastro enviada, aguarde e-mail com a confirmação do seu cadastro</h3><?php 
           }
           ?>
           <div class="faixa-2"></div><br/>
           <button onclick="window.location.href = 'index.php'" class="btn btn-default btne">Voltar</button>
        </div>
       </div> 
     </div>
   </div>



</body>
</html>