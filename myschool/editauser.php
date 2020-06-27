<?php 
session_start();
if(!isset($_SESSION['usuario'])){
  header('Location: login.php?erro=1');
 }
require_once('db_class.php');

$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
$ra = filter_input(INPUT_POST,'ra',FILTER_SANITIZE_STRING);

$sql = "UPDATE tb_usuario SET ativo_sn = 's' WHERE ra = '$ra' ";
$objdb = new db();
$link = $objdb->conecta_mysql();
$result = mysqli_query($link,$sql);

if(mysqli_affected_rows($link)){
	header('Location: solicitacao_user.php');
}
 ?>
