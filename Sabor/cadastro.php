<html>
	<head>
		<title>Cadastro</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet"href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script language="javascript"> 
			//Código para adicionar uma máscara ao campo de telefone, no index e no Alterar
			function mascara(t, mask)
			{
				var i = t.value.length;
				var saida = mask.substring(1,0);
				var texto = mask.substring(i)
				if (texto.substring(0,1) != saida)
				{
					t.value += texto.substring(0,1);
				}
			}
		</script>
	</head>
	<?php
		session_start();
		
		include("classe_cliente.php");
		$objCliente = new Cliente();
		
		if(isset($_POST["enviar"]))
		{
			if($_POST["senha"] === $_POST["senhaC"])
			{
				$objCliente->nome = $_POST["nome"];
				$objCliente->email = $_POST["email"];
				$objCliente->cpf = $_SESSION["cpf"];
				$objCliente->dt_nasc = $_POST["data"];
				$objCliente->telefone = $_POST["telefone"];
				$objCliente->senha = $_POST["senha"];				
				
				if($objCliente->inserir())
				{
					header('location: exibe.php');
				}
				else
				{
					echo "<script>alert('Error');</script>";
				}
			}
			else
			{
				echo "<script>alert('As senhas não são iguais, por favor, insira novamente.');</script>";
			}			
		}
	?>	
	<body>
		<form name="formulario" method="POST" action="">
			<div class="jumbotron text-center">
				<h1> Cadastro de clientes</h1>
				<p>Seja bem vindo! Para continuar, complete seu cadastro antes de aproveitar nosso cardápio!<p> 
			</div>
			<div class="container">
				<div class="row">
				
					<div name="nome" id="nome" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Insira seu nome: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="nome" required placeholder="Nome" class='form-control' autofocus minlength="3">
						</div>
					</div>
					
					<div name="cpf" id="cpf" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Insira seu CPF: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user">
								</i>
							</span>
							<input type="text" name="cpf" value="<?php echo $_SESSION["cpf"];?>" required placeholder="123.456.789.10" class='form-control' autofocus minlength="11" maxlength="11">
						</div>
					</div>
					
					<div name="email" id="email" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Insira seu E-mail: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input type="email" name="email" required placeholder="Ex: teste@teste.com" class='form-control'>
						</div>
					</div>
					
					<div name="telefone" id="telefone" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Insira se telefone: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
							<input type="text" name="telefone" required class='form-control' onkeypress="mascara(this, '## ####-####')" maxlength="12">
						</div>
					</div>
					
					<div name="senha" id="senha" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Insira sua senha: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" name="senha" required class='form-control' minlength="8">
						</div>
					</div>
					
					<div name="senhaC" id="senhaC" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Confirme a sua senha: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" name="senhaC" required class='form-control' minlength="8">
						</div>
					</div>
					
					<div name="data" id="data" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Insira sua data de nascimento: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<input type="date" name="data" required class='form-control' min="1900-01-01" max="2016-11-28">
						</div>
					</div>
					
					<div class='col-md-6'>
						<br>
						<br>
						<div align="center">
							<input type="submit" name="enviar" value="Finalizar" class="lead btn">
						</div>
					</div>
					
					<div class='col-md-6'>
						<br>
						<br>
						<div align="center">
							<input type="reset" name="enviar" value="Limpar" class="lead btn">
						</div>
					</div>
					
				</div>
			</div>
			<br>
			<br>
			
			<div class="jumbotron text-center">
				<h1>Obrigado por se cadastrar!</h1>
			</div>
		</form>
	</body>
</html>