<?php
$erro = isset($_GET['erro'])? $_GET['erro']:0; 
  ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Index</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="estilo.css" rel="stylesheet">
    <script type="text/javascript">
      $(document).ready(function(){
        $('#btn_login').click(function(){

          var campo_vazio = false;
          
          if($('#campo_user').val() == ''){
            $('#campo_user').css({'border-color': 'red'});
            var campo_vazio = true;
          }

          if($('#campo_password').val() == ''){
            $('#campo_password').css({'border-color': 'red'});
            var campo_vazio = true;
          }

          if(campo_vazio) return false;
        });
      });
    </script>
</head>
<body>
	 <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 100px;"  align="center">
           <a href="index.php"><img style="height: 100px;" src="img/logo1.png"></a>

           <div>
           	<label>Login</label> <br/>
            <form method="post" action="validar_acesso.php" id="formLogin">
           	<input class="form-control img-logo2" type="text" id="campo_user" name="login" placeholder="Usuário"> 
           	<input class="form-control img-logo2" type="password" id="campo_password" name="password" placeholder="Senha"> 
           	<button type="submit" id="btn_login" class="btn btn-primary">Entrar</button>
           </form>
           <?php
           if($erro == 1){
            echo '<font color="red"> user and password invalid</font>';
           }else{

           }

             ?>
           </div>
     </div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>