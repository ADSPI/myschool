<?php 
require_once('db_class.php'); 
$num_semestre = $_POST['num_semestre'];
$id_curso = $_POST['id_curso'];

$objdb = new db();
$link = $objdb->conecta_mysql();

$num_semestre_existe = false;
$num_curso_existe = false;


$sql_semestre = "SELECT * FROM tb_semestre WHERE num_semestre = $num_semestre AND id_curso = $id_curso";
if($resultado_semestre = mysqli_query($link,$sql_semestre)){
	$array = mysqli_fetch_assoc($resultado_semestre);
	if(isset($array['num_semestre'])){
		echo 'semestre já cadastrado';
		$num_semestre_existe = true;
	}
}

$sql_semestre_curso = "SELECT * FROM tb_semestre WHERE num_semestre = $num_semestre AND id_curso = $id_curso";
if($resultado_semestre_curso = mysqli_query($link,$sql_semestre_curso)){
	$array = mysqli_fetch_assoc($resultado_semestre_curso);
	if(isset($array['id_curso'])){
		echo 'curso já cadastrado';
		$num_curso_existe = true;
	}
}

if($num_curso_existe || $num_semestre_existe ){
	$retorno_get = '';

	if($num_curso_existe){
	}

	if($num_semestre_existe){
		$retorno_get.= "msg=1";
	}
	
	header('Location: cadastro_semestre.php?'.$retorno_get);
	die();
}

$sql = "INSERT INTO tb_semestre(num_semestre,id_curso,ativo_sn) VALUES($num_semestre,$id_curso,'s')";
$result = mysqli_query($link,$sql);

if(!$result){
	header('Location: mensagem.php?msg=1');
}else{
	header('Location: mensagem.php?msg=0');
}
 ?>