<?php
 require_once('db_class.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$ra = $_POST['ra'];
$senha = md5($_POST['senha']);

$objdb = new db();
$link = $objdb->conecta_mysql();

$user_existe = false;
$email_existe = false;
$ra_existe = false;


//verificar se usuario já existe
$sql_user = "SELECT * FROM tb_usuario WHERE usuario = '$usuario'";
if($resultado_id = mysqli_query($link,$sql_user)){
	$array = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
	if(isset($array['usuario'])){
		echo 'usuario já cadastrado';
		$user_existe = true;
	}
}


//verificar se email já existe
$sql_user = "SELECT * FROM tb_usuario WHERE e_mail = '$email'";
if($resultado_id = mysqli_query($link,$sql_user)){
	$array = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
	if(isset($array['e_mail'])){
		echo 'e_mail já cadastrado';
		$email_existe = true;
	}
}


//verificar se ra já existe
$sql_user = "SELECT * FROM tb_usuario WHERE ra = '$ra'";
if($resultado_id = mysqli_query($link,$sql_user)){
	$array = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
	if(isset($array['ra'])){
		echo 'ra já cadastrado';		
		$ra_existe = true;
	}
}

if($user_existe || $email_existe || $ra_existe){
	$retorno_get = '';

	if($user_existe){
		$retorno_get.= "erro_usuario=1&";
	}

	if($email_existe){
		$retorno_get.= "erro_email=1&";
	}

	if($ra_existe){
		$retorno_get.= "erro_ra=1&";
	}
	
	header('Location: cadastro.php?'.$retorno_get);
	die();
}
	

$sql = "insert into tb_usuario(nome_user,e_mail,usuario,ra,senha,ativo_sn) values('$nome','$email','$usuario','$ra','$senha','n')";


//Executar query
mysqli_query($link,$sql);
header('Location: mensagem_registro.php');

 ?>