<?php

class db{

	//host
	private $host = 'localhost';

	//user
	private $usuario = 'SYSDBA';

	//senha
	private $senha = 'masterkey';

	//bd
	private $database = 'myschool';

	public function conecta_mysql(){
		$connection = mysqli_connect($this->host,$this->usuario,$this->senha,$this->database);

		mysqli_set_charset($connection,'utf8');

		if(mysqli_connect_errno()){
			echo 'Erro ao tentar se conectar com o banco de dados mysql: '.mysqli_connect_errno();
		}

		return $connection;
	}




} 
 ?>