<?php
require_once('db_class.php');

$nome_curso = $_POST['c_nome'];
$duracao_curso = $_POST['c_duracao'];
$descricao_curso = $_POST['c_text'];

$objdb = new db();
$link = $objdb->conecta_mysql();
$sql = "insert into tb_cursos(nome_curso,duracao,descricao_curso,dta_cadastro,ativo_sn) values('$nome_curso',$duracao_curso,'$descricao_curso',null,'s')";

//Executar query
$result = mysqli_query($link,$sql);
if(!$result){
	header('Location: mensagem.php?msg=1');
}else{
	header('Location: mensagem.php?msg=0');
}
echo $nome_curso.'<br/>';
echo $duracao_curso.'<br/>';
echo $descricao_curso.'<br/>';

?>