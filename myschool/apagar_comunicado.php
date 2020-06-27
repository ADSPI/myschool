<?php
session_start();
if($_SESSION['status'] != 'm'){
    header('Location: index.php?violation');
}
require_once('db_class.php');
$objdb = new db();
$link = $objdb->conecta_mysql();

$sql = "TRUNCATE TABLE comunicado_aluno";

$result = mysqli_query($link,$sql);

if(!$result){
	header('Location: mensagem.php?msg=1');
}else{
	header('Location: comunicado.php?msg=1');
}

?>