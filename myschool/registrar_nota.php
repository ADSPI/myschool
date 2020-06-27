<?php
session_start();
$id_materia_nota = $_SESSION['id_materia_nota'];
$id_aluno = $_POST['id'];
$nota = $_POST['nota'];
$atividade = $_SESSION['atividade'];

require_once('db_class.php');
$objdb = new db();
$link = $objdb->conecta_mysql();

$sql = "INSERT INTO tb_aluno_nota(id_aluno,id_materia,nota,atividade,dta)VALUES($id_aluno,$id_materia_nota,$nota,'$atividade',null)";
$result = mysqli_query($link,$sql);
if(!$result){
	header('Location: mensagem_professor.php?msg=1');
}else{
	header("Location: cadastrar_nota.php?aluno=".$id_aluno);
}



?>