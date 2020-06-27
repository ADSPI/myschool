<?php
$erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario']: 0 ;
$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email']: 0 ;
$erro_ra = isset($_GET['erro_ra']) ? $_GET['erro_ra']: 0 ;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Index</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="estilo.css" rel="stylesheet">
</head>
<body>
	 <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 100px;"  align="center">
           <a href="index.php"><img style="height: 100px;" src="img/logo1.png"></a> <br/>
           <label>Cadastro</label><br/>

           <form method="post" action="registraUser.php" id="formCadastro">
             <div class="form-group">
               <input class="form-control style-form img-logo2" type="text" name="nome" id="nome" placeholder="Nome" required="requeiored">
             </div>
              <div class="form-group">
               <input class="form-control style-form img-logo2" type="email" name="email" id="email" placeholder="E-mail" required="requeiored">
               <?php
               if($erro_email){
                echo '<font style = "color: red" </font>E-mail já existe';
               }
               ?>
             </div>
              <div class="form-group">
               <input class="form-control style-form img-logo2" type="text" name="ra" id="ra" placeholder="R.A" required="requeiored">
               <?php
               if($erro_ra){
                echo '<font style = "color: red" </font>R.A já existe';
               }
               ?>
             </div>
              <div class="form-group">
               <input class="form-control style-form img-logo2" type="text" name="usuario" id="usuario" placeholder="Usuario" required="requeiored">
               <?php
               if($erro_usuario){
                echo '<font style = "color: red" </font>Usuário já existe';
               }
               ?>
             </div>
              <div class="form-group">
               <input class="form-control style-form img-logo2" type="password" name="senha" id="senha" placeholder="Senha" required="requeiored">
             </div>

             <button style="width: 70px;" type="submit" class="btn btn-primary form-control">Enviar</button>
           </form>

           </div>
    </div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>