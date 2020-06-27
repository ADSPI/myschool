<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Index</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="estilo.css" rel="stylesheet">
</head>
<body>
	
		
	<!-- barra de navegação -->
	<nav class="nav navbar-default">
		<div class="container">
			<!-- logo navbar -->
			<div class="navbar-header">
				<a href="#" class="navbar-brand">
					<img class="nav navbar-nav img-logo3" src="img/logo3.PNG">
					<img class="img-logo2" src="img/logo2.PNG">
				</a>
			</div>

			<!-- Menu barra navegação -->
			<div>
				<ul class="nav navbar-nav navbar-right">
					<li> <button onclick="window.location.href = 'login.php'" class="btn style-menu"><a href="login.php" class=""><span class="black">Login</span></a></button> </li>
					<li> <button onclick="window.location.href = 'cadastro.php'" class="btn style-menu"><a href="cadastro.php" class=""><span class="black">Solicitar cadastro</span></a></button> </li>
				</ul>
			</div>
		</div>
	</nav>

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <!-- <li data-target="#carousel-example-generic" data-slide-to="2"></li> -->
        </ol>

     <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
         <div class="item active">
           <img style="height: 600px;" src="img/slide1.png" alt="...">
           <div class="carousel-caption">
           
         </div>
      </div>

      <div class="item">
        <img style="height: 600px;" src="img/slide2.png" alt="...">
        <div class="carousel-caption">
        
        </div>
      </div>
    
    </div>

    <!-- Controls -->
     <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
       <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
     </a>
     <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
       <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>
   </div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>