<!DOCTYPE HTML>
<html>
	<head>
		<title> Registrazione di un nuovo utente </title>

	</head>
	<body>
<?php
//Recupero dati form
$name = $_POST['name'];
$email = $_POST['email'];
$password = sha1($_POST['password']);
$confirmpass = sha1($_POST['confirmpass']);
if($password == $confirmpass)
{
//Preparazione della query
$query = "SELECT username
		  FROM user
		  WHERE username = '$name'";
//Connessione al server
$conn = mysql_connect("localhost", "root", "")
	or die("Impossibile connettersi al server");
//Selezione del database
$db = mysql_select_db("photography", $conn)
		or die("Impossibile selezionare il database");
//Esecuzione della query
$result = mysql_query($query)
	or die("query fallita: ".mysql_error());
//Verifica se l'utente � gi� presente nella tabella
// mysql_num_row conta il numero di tuple lette
   $count = mysql_num_rows($result);
   // Se vi � almeno una corrispondenza nella tabella user significa che c'� gi� un utente registrato con quel nome
if ($count == 1){
	echo "L'utente e' gia presente nel database";
	mysql_close($conn);
	// lo rimandiamo nella home page
	echo "</br> <a href='index.html'>Ritorna nella home page</a> </br>";
	}
else{
	echo "</br> Si procede con l'inserimento nel database </br>";
	//Chiusura della connessione
	mysql_close($conn);
	//Preparazione della query
	$query = "INSERT INTO user (username, email, password)
			VALUES ('$name', '$email', '$password')";
	//Connessione al server
	$conn = mysql_connect("localhost", "root", "")
	or die("Impossibile connettersi al server");
	//Selezione del database
	$db = mysql_select_db("photography", $conn)
		or die("Impossibile selezionare il database");
	//Esecuzione della query
	$result = mysql_query($query)
		or die("query fallita: ".mysql_error());
	//Chiusura della connessione
	mysql_close($conn);
	echo "</br> Utente inserito correttamente nel database </br>";
	echo "</br> <a href='signin.html'>Accedi alla pagina di LOGIN</a> </br>";
	}
}
else {
echo "La password e la conferma password hanno valori differenti, si prega di ripetere procedura di registrazione nuovo utente";
	// lo rimandiamo nella pagina di signup
	echo "</br> <a href='signup.html'>Ritorna nella pagina di registrazione</a> </br>";
	}
?>
</body>
</html>
