<!DOCTYPE HTML>
<html>
	<head>
		<title> Login utente </title>
	</head>
	<body>
<?php
//Recupero dati form
$name = $_POST['name'];
$password = sha1($_POST['password']);
//Preparazione della query
$query = "SELECT username, password
		  FROM user
		  WHERE username = '$name' AND password = '$password'";
//Connessione al server
$conn = mysql_connect("localhost", "root", "")
	or die("Impossibile connettersi al server");
//Selezione del database
$db = mysql_select_db("photography", $conn)
		or die("Impossibile selezionare il database");
//Esecuzione della query
$result = mysql_query($query)
	or die("query fallita: ".mysql_error());
//Verifica se l'utente � presente nella tabella
// mysql_num_row conta il numero di tuple lette
   $count = mysql_num_rows($result);
// Se vi � un utente registrato con quel nome e con quella password pu� effettuare il login
if ($count == 1){
	//  REDIRECTS TO A PAGE IF LOGIN WORKS
	header("Location: http://localhost/SitoFotografico/PhotoUpload/INDEX.html");
	echo "</br> L'utente "."$name"." e' il benvenuto nella nostra pagina web riservata</br>";
	// lo mandiamo nella home page riservata
	echo "</br> <a href='generic.html'>Vai alla pagina riservata ai nostri utenti</a> </br>";
	}
else{
	echo "</br> Impossibile connettersi al database </br>";


	echo "</br> </br> <a href='http://localhost/SitoFotografico/FrontPage.html'>Ritorna alla pagina principale</a> </br>";
	}
mysql_close($conn);
?>
</body>
</html>
