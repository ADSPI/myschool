<?php
require_once('db_class.php');
$nome = $_POST['p_nome'];
$email = $_POST['p_email'];
$usuario = $_POST['p_user'];
$senha = md5($_POST['p_senha']);

$objdb = new db();
$link = $objdb->conecta_mysql();

$user_existe = false;
$email_existe = false;

$sql_user = "SELECT * FROM tb_usuario WHERE usuario = '$usuario'";
if($resultado_id = mysqli_query($link,$sql_user)){
	$array = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
	if(isset($array['usuario'])){
		echo 'usuario já cadastrado';
		$user_existe = true;
	}
}
$sql_user = "SELECT * FROM tb_usuario WHERE e_mail = '$email'";
if($resultado_id = mysqli_query($link,$sql_user)){
	$array = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
	if(isset($array['e_mail'])){
		echo 'e_mail já cadastrado';
		$email_existe = true;
	}
}

if($user_existe || $email_existe){
	$retorno_get = '';

	if($user_existe){
		$retorno_get.= "erro_usuario=1&";
	}

	if($email_existe){
		$retorno_get.= "erro_email=1&";
	}
	
	header('Location: cadastro_professor.php?'.$retorno_get);
	die();
}

$sql = "insert into tb_usuario(nome_user,e_mail,usuario,user_status,senha,ativo_sn) values('$nome','$email','$usuario','p','$senha','s')";


//Executar query
mysqli_query($link,$sql);
header('Location: mensagem.php');


?>