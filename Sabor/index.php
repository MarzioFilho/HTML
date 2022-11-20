<?php
	session_start();
	
	include("classe_cliente.php");
	
	$objCliente = new Cliente();
	
	if(isset($_POST["enviar"]))
	{
		$objCliente->Login($_POST["cpf"]);
		
		if($objCliente->cpfLogin == null)
		{
			$_SESSION["cpf"] = $_POST["cpf"];
			header('location: cadastro.php');
		}
		else
		{
			$_SESSION["cpf"] = $_POST["cpf"];
			header('location: login.php');
		}
	}
?>

<html>
	<head lang="pt-BR" hreflang="pt-br">
		<title>Sabor e Arte</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="estilo.css">
		<script language="javascript"> 

			var countDownDate = new Date("Jan 8, 2023 12:00:00").getTime();
			var x = 
			setInterval
			(
				function() 
				{
					var now = new Date().getTime();
					var distance = countDownDate - now;
					var days = Math.floor(distance / (1000 * 60 * 60 * 24));
					var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
					var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
					var seconds = Math.floor((distance % (1000 * 60)) / 1000);

					document.getElementById("dias").innerHTML = days;
					document.getElementById("horas").innerHTML = hours;
					document.getElementById("minutos").innerHTML = minutes;
					document.getElementById("segundos").innerHTML = seconds;
					
					if (distance < 0) 
					{
						clearInterval(x);
						document.getElementById("dias").innerHTML = "EXPIRED";
						document.getElementById("horas").innerHTML = "EXPIRED";
						document.getElementById("minutos").innerHTML = "EXPIRED";
						document.getElementById("segundos").innerHTML = "EXPIRED";
					}
				}, 
				1000
			);
			
			function ValidaCPF()
			{	
				var RegraValida=document.getElementById("RegraValida").value; 
				var cpfValido = /^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{11}))$/;	 
				if (cpfValido.test(RegraValida) == true)	{ 
				console.log("CPF Válido");	
				} else	{	 
				console.log("CPF Inválido");	
				}
			}
			
			function fMasc(objeto,mascara) 
			{
				obj=objeto
				masc=mascara
				setTimeout("fMascEx()",1)
			}

			function fMascEx() 
			{
				obj.value=masc(obj.value)
			}

			function mCPF(cpf)
			{
				cpf=cpf.replace(/\D/g,"")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
				return cpf
			}
		</script>
	</head>
	
	<body class="body">
		<div class="topnav">
			<a href="#home">Início</a>
			<a href="#news">Novidades</a>
			<a href="#contact">Contato</a>
			<a href="#about">Sobre nós</a>
		</div>
		<div class="row">
			<div class="column-2">
				<div class="row">
					<div class="column-1 text-center">
						<p class="text">
							<b style="font-weight: bolder;">
								SABOR &
							</b> 
								<br> 
							ARTE
						</p>
					</div>					
				</div>
					<hr>
				<div class="row">
					<div class="column-2">
						<iframe class="map"
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d937.7161282064906!2d-43.978573729239706!3d-19.930113487549768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa696ff215ab53d%3A0x6f66625e27c8ccc1!2sCentro%20Federal%20de%20Educa%C3%A7%C3%A3o%20Tecnol%C3%B3gica%20de%20Minas%20Gerais%20(CEFET-MG)!5e0!3m2!1spt-BR!2sbr!4v1667160107206!5m2!1spt-BR!2sbr" 
							allowfullscreen="" 
							loading="lazy" 
							referrerpolicy="no-referrer-when-downgrade">
						</iframe>
					</div>
				</div>
			</div>
			
			<div class="column-3">
				<div class="form">
					<form name="form" method="POST" action="">
						<div class="row">
							<p class="titulo">
								Cadastre-se ou faça login e descubra nosso cardápio!
							</p>
						</div>
						<div class="row">
							<p class="label">
								CPF
							</p>
							<input type="text" name="cpf" required placeholder="" class="form-control">
						</div>
						<br>
						<br>
						<br>
						<div class="row">
							<div class="column">
								<input type="submit" name="enviar" value="Vamos lá" class="lead btn">
							</div>
							<div class="column">
								<input type="reset" name="reset" value="corrigir" class="lead btn">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<hr>
		<div class="linha">
			<div class="column">
				<div id="clockdiv" class="clockdiv d-flex-row">
					<div class="clock-item">
					  	<span class="days number" id="dias"></span>
					  	<div class="smalltext">
							Dias
						</div>
					</div>
					<div class="clock-item">
					  	<span class="hours number" id="horas"></span>
					  	<div class="smalltext">
							Hrs
						</div>
					</div>
					<div class="clock-item">
					  	<span class="minutes number" id="minutos"></span>
						  	<div class="smalltext">
								Min
							</div>
					</div>
					<div class="clock-item">
					  	<span class="seconds number" id="segundos"></span>
					  	<div class="smalltext">
							Seg
						</div>
					</div>
				</div>
			</div>
			<div class="column">
				<p class="PText">
					Novos cadastros feitos neste período ganharão um cupom de 10% de desconto!
				</p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="column-mid3">
				<p class="par1" style="font-weight: bolder;">
					Atendemos por:
				</p>
				<ul class="par1" style="font-weight: bolder;">
					<li>
						Telefone
					</li>
					<li>
						Site
					</li>
					<li>
						App
					</li>
					<li>
						Presencial
					</li>
				</ul>
			</div>
			<div class="column-mid3">
				<p class="par1" style="font-weight: bolder;">
					Entregamos em:
				</p>
				<ul class="par1" style="font-weight: bolder;">
					<li>
						Belo Horizonte
					</li>
					<li>
						Contagem
					</li>
					<li>
						Nova Lima
					</li>
				</ul>
			</div>
			<div class="column-mid3">
				<p class="par1" style="font-weight: bolder;">
					Contatos:
				</p>
				<ul class="par1" style="font-weight: bolder;">
					<li>
						(31) 3154-8276
					</li>
					<li>
						Saborearte@gmail.com
					</li>
				</ul>
			</div>
		</div>
	</body>
</html>