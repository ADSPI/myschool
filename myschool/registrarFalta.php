<?php
session_start();
require_once('db_class.php'); 
$objdb = new db();
$link = $objdb->conecta_mysql();

$idmateria = $_SESSION['id_materia_falta'];
$hoje = date('y-m-d');

$_checkbox = $_POST['caixas'];
foreach($_checkbox as $_valor){
	 $sql = "INSERT INTO tb_faltas(id_aluno,id_materia,num_falta,dta) VALUES($_valor,$idmateria,1,'$hoje')";
	 $result = mysqli_query($link,$sql);
	}

if(!$result){
	header('Location: mensagem.php?msg=1');
}else{
	header('Location: mensagem_professor.php');
}
?>