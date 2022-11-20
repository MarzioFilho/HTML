<?php
	session_start();
	
	include("classe_cliente.php");
	$objCliente = new Cliente();
	
	if(isset($_POST["enviar"]))
	{
		$objCliente->ValidarSenha($_POST["cpf"]);
		
		if($objCliente->senha === md5($_POST["senha"]))
		{
			header('location: exibe.php');
		}
		else
		{
			echo "<script>alert('senha incorreta, por favor, insira novamente.');</script>";
		}
	}
?>
<html>
	<head>
	</head>
	
	<body>
		<form name="form" method="POST" action="">
			<h2>insira sua senha para terminar login</h2>
			<label>
				CPF:
			</label>
			<br>
			<input type="text" name="cpf" required value="<?php echo $_SESSION["cpf"];?>">
			<br>
			<label>
				Senha:
			</label>
			<br>
			<input type="password" name="senha" required>
			<br>
			<br>
			<input type="submit" name="enviar" value="Login">
		</form>
	</body>
</html>