<?php
session_start();
if($_SESSION['status'] != 'm'){
    header('Location: index.php?violation');
}
require_once('db_class.php');
$objdb = new db();
$link = $objdb->conecta_mysql();
$texto = $_POST['texto'];
$title = $_POST['title'];

$sql = "INSERT INTO comunicado_aluno(titulo,comunicado,dta) VALUES('$title','$texto',null)";

$result = mysqli_query($link,$sql);

if(!$result){
	header('Location: mensagem.php?msg=1');
}else{
	header('Location: mensagem.php');
}

?>