<?php
session_start();
$_checkbox = $_POST['caixas'];
$id_materia = $_POST['id_materia'];
require_once('db_class.php'); 
$objdb = new db();
$id = 0;

$user_existe = false;
$materia_existe = false;

$link = $objdb->conecta_mysql();
foreach($_checkbox as $_valor){
	$sql_user = "SELECT * FROM tb_aluno_materia WHERE id_materia = $id_materia AND id_aluno = $_valor";
	if($resultado_id = mysqli_query($link,$sql_user)){
		$query = mysqli_fetch_assoc($resultado_id);
		if(isset($query['id_aluno'])){
		$materia_existe = true;
	    $user_existe = true;
	    }
	}

	if($user_existe || $materia_existe){
		header("Location: cadastrarAlunoMateria.php?error=1");
		die();
	}
	$sql = "INSERT INTO tb_aluno_materia(id_materia,id_aluno) VALUES($id_materia,$_valor)";
	$result = mysqli_query($link,$sql);
	if(!$result){
		header('Location: cadastrarAlunoMateria.php?msg=1');
	}else{
	header('Location: mensagem.php');
   }
}
?>