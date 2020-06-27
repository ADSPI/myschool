<?php
session_start();
$erro = isset($_GET['erro']) ? $_GET['erro']: 0 ;
if($_SESSION['status'] != 'm'){
    header('Location: index.php?violation');
}
require_once('db_class.php');


$objdb = new db();
$link = $objdb->conecta_mysql();
$sql = "SELECT * FROM tb_usuario WHERE user_status = 'p' AND ativo_sn = 's'";
$sql2 = "SELECT * FROM tb_semestre ss 
INNER JOIN tb_cursos cc ON ss.id_curso = cc.id_curso WHERE cc.ativo_sn = 's'";
$professor = mysqli_query($link,$sql);
$semestre = mysqli_query($link,$sql2);


$var = 'rafa';
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="javascript.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="estilo.css" rel="stylesheet">
    <style type="text/css">
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
    height: 96%;

}
    .text{
        border: 1px solid black;
        color: white;
    }
    .text:hover{
        background: gray;
        color: white;
        transition: background 1s, color 1s;
        border: 1px solid gray;
    }
    h1{
       color: black;
    }
    a{
        color: white;
    }
    .padrao_form{
    height: 35px ;
    width: 450px ;
}
   .padrao_form2{
    height: 30px ;
    width: 450px ;
}
   .btn-cor{
    color: black;
   }

    </style>
</head>
<body>
    <div class="capa">
     <div class="texto-capa">
       <div class="container" align="center">
         <h3 class="btn-cor">Cadastrar Matéria</h3>
        <div class="col-md-12">
           <form method="post" action="registrarMateria.php">
            <input class="form-control padrao_form" type="text" name="materia" placeholder="Nome da matéria"> <br/>
               <label style="color: black">Selecione o professor:</label>
              <select name="id_professor" class="form-control padrao_form2">
                <option></option>
                <?php 
                while($result = mysqli_fetch_assoc($professor)){
                 ?>
                 <option value="<?php echo $result['id_user']; ?>"><?php echo $result['nome_user']; ?></option> <?php
                }
                ?>
            </select><br/>

             <label style="color: black">Selecione o semestre:</label>
              <select name="id_semestre" class="form-control padrao_form2">
                <option></option>
                <?php 
                while($result_semestre = mysqli_fetch_assoc($semestre)){
                 ?>
                 <option value="<?php echo $result_semestre['id_semestre']; ?>"><?php echo $result_semestre['num_semestre']."-".$result_semestre['nome_curso']; ?></option> <?php
                }
                ?>
            </select><br/>
            <input type="submit" name="btn" class="btn btn-default btn-cor btn-lg text" value="Cadastrar Matéria">
          
            <button class="btn btn-danger btn-lg text btn-cor"><a href="menu_Adm.php">Voltar</a></button>
           </form>
           <?php 
           if($erro == 1){
            ?><label style="color: red;">Favor preencher o formulário com todos os dados</label><?php 
           }
           ?>
        </div>
       </div> 
     </div>
   </div>

</body>
</html>