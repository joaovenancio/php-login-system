
<?php

	//Para retirar a advertência sobre o uso da função mysql_connect:

	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

	//Para se conectar no banco de dados ficticio novamente:

	$nomedoserver = "localhost";
	$username = "root";
	$senha = "";

	mysql_connect($nomedoserver, $username, $senha) or die (mysql_error());
	mysql_select_db("infoLogin") or die (mysql_error());

?>

<?php

	//Para evitar que a pessoa escreva o pagDoUsario no link e acabe acessando a página sem precisar fazer o login:

	session_start();
	if (!isset($_SESSION["ra"]) || !isset($_SESSION["senha"])) {

		//Caso ele não estiver logado, vai ser redirecionar para a pagina de login:

		header("Location: login.php");
		exit;

	} else {

		echo "<center>Você está logado!</center>";

	}

?>

<!DOCTYPE html>

	<!-- Pagina do usuario: -->

<html>

<head>

	<meta name="descricao" content="Sistema de Login do Vestibular X" />
	<meta name="palavraschaves" content="cursinho, pre-vestibular, esutdos, gratis," />
	<meta name="autor" content="João Vítor Demaria Venâncio" />

	<title>Pagina Do Usuário</title>

</head>

<body>

	<p style="text-align: center;"><span style="color: #0000ff;">P&aacute;gina do usuario:</span></p>
	<p style="text-align: center;">&nbsp;</p>


	<!-- Tabela mostrando as informações relacionadas ao usuario: -->

	<table width="800" border="1" cellpadding="1" cellspacing="1">

	<tr>

	<!-- Modifique os valores abaixo (RA, NOME, TELEFONE) para as informações das colunas do seu banco de dados :-->

	<th>RA</th>
	<th>NOME</th>
	<th>TELEFONE</th>

	<!-- / Editar os valores acima/ -->

	<?php

	// Para puxar as informações do banco de dados, no intuito de mostrar as informações do usuario logado na tabela sendo construida:

	$sql = "SELECT * FROM infoLogin";
	$estud = mysql_query($sql);

	while ($estudante = mysql_fetch_assoc($estud)) {

		if ($_SESSION['ra'] == $estudante ['ra'] && $_SESSION['senha'] == $estudante['senha']) {

			echo "<tr>";

			//Repita essa estrutura de código abaixo, mudando os valores dentro dos [''] para os EXATOS nomes das colunas da tabela no seu banco de dados (serve para mostrar essa informação do usuario):
			//É importante salientar que esse processo é parecido com o da linha 69 a 71, a diferença é que esse aqui mostra os dados do usuario, o outro apenas escreve o titulo da coluna da tabela;
			//Podem ser escritos mais linhas, desde que haja dados para serem mostrados

			echo "<td>" . $estudante ['ra'] . "</td>";
			echo "<td>" . $estudante ['nome'] . "</td>";
			echo "<td>" . $estudante ['telefone'] . "</td>";

			//Mudar a estrutura de código acima

			echo "</tr>";

		}
	}

	?>

</tr>

<p></p>

<body>

	<p style="text-align: center;">Foto:</p>
	<!-- Me inspiro nesse cara para programar: -->
	<p style="text-align: center;"><img src="https://i.ytimg.com/vi/KEkrWRHCDQU/maxresdefault.jpg" alt="hackerman" width="576" height="324" /></p>
	<p style="text-align: center;">Dados Cadastrais:</p>

</body>

<!-- Fim da pagina do Usuario -->

</html>