
<html>
	<!-- Para fazer a pagina de login -->

<head>

	<meta name="descricao" content="Sistema de Login do Vestibular X" />
	<meta name="palavraschaves" content="cursinho, pre-vestibular, esutdos, gratis," />
	<meta name="autor" content="João Vítor Demaria Venâncio" />

	<title>Login de Aluno:</title>

</head>

<body>

	<p align="center"><span style="color: #3f7ebe;"><span style="font-family: Arial, sans-serif;">LOGIN DE ALUNO</span></span></p>
	<p align="center">&nbsp;</p>

	<!-- Enviar as informações inseridas para a verificação: -->

<form name = "fazerlogin" method = "post" action = "processamentoBanco.php">

	<p style="text-align: center;"><strong>RA:</strong><br /> <input name="ra" type="text" /></p>
	<p style="text-align: center;">&nbsp;</p>
	<p style="text-align: center;"><strong>Senha de login:</strong><br /> <input name="senha" type="password" /></p>
	<p style="text-align: center;"><br /> <input type="submit" value="Entrar" /></p>

</form >

</body>

</html>