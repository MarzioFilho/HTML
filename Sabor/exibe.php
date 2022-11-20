<?php
	session_start();
	
	include("classe_cliente.php");
	
	$objCliente = new Cliente();
	
	$objCliente->cpf = $_SESSION["cpf"];
	$objCliente->Pesquisar();
?>
<html lang="pt-BR" hreflang="pt-br">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<title>Sabor e Arte</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Playfair+Display"/>
		<link rel="stylesheet" href="estilo.css">
	</head>

	<body bgcolor="#ecd8c6">
		<form method="POST" action="" id="" name="">
			<nav class="navbarnavbar-inverse">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Sabor e Arte</a>
					</div>
					<div class="collapsenavbar-collapse" id="myNavbar">
						<ul class="navnavbar-nav">
							<li class="activedropdown">
								<a class="dropdown-toggleglyphiconglyphicon-home" data-toggle="dropdown" href="#">
									Usuario
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="#">
											Alterar Dados do Perfil
										</a>
									</li>
									<li>
										<a href="#">
											Apagar Perfil de Usuario
										</a>
									</li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggleglyphiconglyphicon-heart" data-toggle="dropdown">
									Pedidos
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="#">
											Apagar pedido
										</a>
									</li>
									<li>
										<a href="#">
											Novo pedido
										</a>
									</li>
									<li>
										<a href="#">
											Mostrar pedidos realizados
										</a>
									</li>
								</ul>
							</li>
						</ul>
						<ul class="navnavbar-navnavbar-center">
							<li>
								<a href="#">
									<span class="glyphiconglyphiconglyphicon-log-out"></span>
									Sair
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<form name="" method="POST" action="">
				<div>
					<div class="text-centerimg-responsive">
						<img src="img/">
					</div>
					<h1 class="text-center">
						Bem Vindo
						<?php
							echo $objCliente->nome;
						?>! Esse é o seu perfil.
					</h1>
					<br>
					<br>
					<div class='col-md-6'align='center'style='border:2pxblack;'>
						<p>
							<?php
								echo "Nome:".$objCliente->nome;
							?>
						</p>
					</div>
					<div class='col-md-6'align='center'>
						<p>
							<?php
								echo "Email:".$objCliente->email;
							?>
						</p>
					</div>
					<br>
					<div class='col-md-6'align='center'>
						<p>
							<?php
								echo "CPF:".$objCliente->cpf;
							?>
						</p>
					</div>
					<br>
					<div class='col-md-6'align='center'>
						<p>
							<?php
								echo "Data de nascimento:".$objCliente->dt_nasc;
							?>
						</p>
					</div>
					<div class='col-md-6'align='center'>
						<p>
							<?php
								echo "Telefone:".$objCliente->telefone;
							?>
						</p>
					</div>
				</div>
			</form>
		</form>
	</body>
</html>