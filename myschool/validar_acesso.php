<?php

session_start();

require_once('db_class.php');
$login = $_POST['login'];
$password = md5($_POST['password']);


$sql = "SELECT * FROM tb_usuario WHERE usuario = '$login' AND senha = '$password' AND ativo_sn = 's' ";

$objdb = new db();
$link = $objdb->conecta_mysql();

$result = mysqli_query($link,$sql);

if($result){
$dados = mysqli_fetch_array($result);
if(isset($dados['usuario'])){
	$_SESSION['usuario'] = $dados['usuario'];
	$_SESSION['status'] = $dados['user_status'];
	$_SESSION['id'] = $dados['id_user'];
	if($dados[5]=='a'){
		header('Location: home.php');
	}else if($dados[5]=='m'){
		header('Location: menu_Adm.php ');
    }else if($dados[5]=='p'){
		header('Location: home_professor.php ');
	}
}else{
	header('Location: login.php?erro=1');
}
}else {
	echo 'error execution, please contact the admin';
}
  ?>
