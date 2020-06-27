<?php 
session_start();
if($_SESSION['status'] != 'a'){
    header('Location: index.php?violation');
}
require_once('db_class.php');
$id = $_SESSION['id'];
$idmateria = isset($_GET['materia']) ? $_GET['materia']: 0 ;
$objdb = new db();
$link = $objdb->conecta_mysql();
$sql = "SELECT SUM(num_falta) AS total FROM tb_faltas WHERE id_aluno = $id AND id_materia = $idmateria";
$result = mysqli_query($link,$sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Faltas</title>
	<meta charset="utf-8">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/font-awesome/3.4.1/css/font-awesome.min.css" />
    <link href="estilo_menup.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style type="text/css">
    	.margem{
    		margin-top: 250px;
    		width: 100px;
    	}
    </style>
</head>
<body>
	<div class="container" align="center">
		<?php while($total_falta = mysqli_fetch_assoc($result)){ ?>
			<table class="table table-striped table-bordered table-hover table-condensed botao margem">
				<thead>
					<tr>
						<th>Faltas</th>
					</tr>
					<tbody>
						<tr>
							<td><?php echo $total_falta['total']; ?></td>
						</tr>
					</tbody>
				</thead>
			</table>
			<button class="btn btn-primary"><a href="visualizar_faltas.php">Voltar</a></button>
			<?php 
		}?>
	</div>
</body>
</html>