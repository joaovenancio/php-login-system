
<?php

	//Para retirar a advertência sobre o uso da função mysql_connect:

	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

	//Para se conectar no banco de dados ficticio, digitando as informações para acessar ao banco de dados desejados (faça as alterações nescessárias):

	$nomedoserver = "localhost";
	$username = "root";
	$senha = "";

	mysql_connect($nomedoserver, $username, $senha) or die (mysql_error());

	//Para selecionar a tabela do banco de dados (o nome dele seria infoLogin):

	mysql_select_db("infoLogin") or die (mysql_error());

?>

<!-- Para a parte do redirecionamento caso a pessoa erre seus dados (usando o JavaScript) -->

<!DOCTYPE html>

<html>

<head>
	<title>Redirecionando</title>

	<!-- Função para redirecionar para a pagina de login novamente (ele espera 3000 milisegundos antes de redirecionar) -->
	<script type="text/javascript">

		function loginfailled()  {
			setTimeout("window.location='login.php'", 3000);
		}
	</script>

</head>

<body>

<?php

	//Para pegar os valores do login.php e coloca-los aqui

	$ra = $_POST ['ra'];
	$senha = $_POST ['senha'];

	//Para previnir aproveitamento nas falhas de sistemas do banco de dados do SQL (SQL injection):

	$ra = stripcslashes($ra);
	$senha = stripcslashes($senha);
	$ra = mysql_real_escape_string($ra);
	$senha = mysql_real_escape_string($senha);

	//Procurar pelas informações no banco de dados (na tabela infologin):

	$sql = mysql_query("SELECT * FROM infoLogin WHERE ra = '$ra' and senha = '$senha'");

	//Checagem das informações de login e a inicialização da sessão:

	$ehIgual = mysql_num_rows($sql);

	if ($ehIgual > 0) {

		session_start();

	//Configurar a sessão com as informações digitadas:

		$_SESSION['ra'] = $_POST ['ra'];
		$_SESSION['senha'] = $_POST ['senha'];

		echo "<center>Login realizado! Redirecionando...</center>";

		//Redirecionamento para a página do usuario

		header("Location: pagDoUsuario.php");

	} else {

		//Caso não consiga logar, a mensagem de erro seria:

		echo "<center>Informações incorretas, tente novamente.</center>";

		//Para redirecionar para a página de login, assim a pessoa pode tentar novamente (depois de 3000 milisegundos):

		echo "<script>loginfailled()</script>";

	}
?>

</body>

</html>