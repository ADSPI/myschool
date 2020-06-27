<?php
session_start();
if($_SESSION['status'] != 'm'){
    header('Location: index.php?violation');
}
require_once('db_class.php');
$nome = $_POST['materia'];
$id_prof = $_POST['id_professor'];
$id_semestre = $_POST['id_semestre'];

$objdb = new db();
$link = $objdb->conecta_mysql();


$sql = "INSERT INTO tb_materias(nome_materia,id_user_ministra,id_semestre,ativo_sn) VALUES('$nome',$id_prof,$id_semestre,'s')";
$result = mysqli_query($link,$sql);
if(!$result){
	header('Location: mensagem.php?msg=1');
}else{
	header('Location: mensagem.php');
}
//header('Location: menu_prof.php');
?>