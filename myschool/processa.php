<?php
require_once('db_class.php');
$campo = filter_input(INPUT_POST,'campo',FILTER_SANITIZE_STRING);
$objdb = new db();
$link = $objdb->conecta_mysql();
$sql = "SELECT * FROM usuario WHERE ativo_sn = 'n' AND ra = '$campo'";
$result = mysqli_query($link,$sql);

while($row_user = mysqli_fetch_assoc($result)){
	echo $row_user['usuario'].'<br/>';
}


?>