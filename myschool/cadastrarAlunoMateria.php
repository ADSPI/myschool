<?php
session_start();
$erro = isset($_GET['error']) ? $_GET['error']: 0 ;
if(!isset($_SESSION['usuario'])){
  header('Location: login.php?erro=1');
}
$idprof = $_SESSION['id'];
require_once('db_class.php'); 
$objdb = new db();
$link = $objdb->conecta_mysql();
$sql = "SELECT * FROM tb_usuario WHERE user_status = 'a' AND ativo_sn = 's'";
$sql2 = "SELECT * FROM tb_materias WHERE ativo_sn = 's'";
$query_user = mysqli_query($link,$sql);
$query_materia = mysqli_query($link,$sql2);

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
    	.materia{
        border: 1px solid black;
        color: green;
      }
      .largura{
        width: 150px;
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
          <li><a href="menu_Adm.php">voltar</a></li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container">
<form name="form1" method="POST" action="registrarAlunoMateria.php">


<b>Cadastrar:</b><br><br>
<select style="width: 100px;" name="id_materia" class="form-control padrao_form2">
<?php 
while($result_semestre = mysqli_fetch_assoc($query_materia)){
                 ?>
                 <option value="<?php echo $result_semestre['id_materia']; ?>"><?php echo $result_semestre['nome_materia']; ?></option> <?php
                } ?>
</select><br/> 
<label>
  <?php
  if($erro != 0 ){
   $sqlerro = "SELECT * FROM tb_usuario WHERE id_user = $erro";
   $query_erro = mysqli_query($link,$sqlerro);
   $result_erro = mysqli_fetch_assoc($query_erro);
   echo "Usuário Já cadastrado na matéria";
 }
  ?>
</label><br/>
<?php 
  while($result = mysqli_fetch_assoc($query_user)){
    $id = $result['id_user'];
    ?><input type="checkbox" name="caixas[]" value =<?php echo $result['id_user']; ?>><?php echo $result['nome_user'];?>
    <br/><?php 
    $sql3 = "SELECT * FROM tb_aluno_materia am 
    INNER JOIN tb_materias mm ON am.id_materia = mm.id_materia WHERE id_aluno = $id";
    $query_AM = mysqli_query($link,$sql3);?>
       <table class="table table-striped table-bordered table-hover table-condensed botao largura">
         <thead>
           <tr>
             <th>Matéria</th>
           </tr>
           <tbody>
            <?php while($result_m = mysqli_fetch_assoc($query_AM)){?>
             <tr>
               <td class="info"><?php echo $result_m['nome_materia']; ?></td>  
             </tr><?php
             }?>
           </tbody>
         </thead>
       </table>
       <?php
     
  }
?>
<br/>
<input style="margin-bottom: 15px;" class="btn btn-primary" type="submit" value="Cadastrar" />

</form>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>