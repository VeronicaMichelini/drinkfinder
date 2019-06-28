<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
} else {
	//echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
    //echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
    header("location: http://localhost/PROGETTO/client/html.php");
}
?>

<html>

<body background = 'https://static.vecteezy.com/system/resources/previews/000/401/351/non_2x/vector-background-wallpaper-with-polygons-in-gradient-colors.jpg';

<title><center><big>Ricerca cocktail tramite nome oppure ingrediente</big></center></title><br>

<marquee>Progetto PIATTAFORME DIGITALI PER LA GESTIONE DEL TERRITORIO.  Michelini Veronica</marquee><br><br>

<img src='https://i.gifer.com/5p1E.gif' height="65" width="65"><br><br>

<form action="ListDrinkFound.php" method="GET">

	Nome cocktail:<br><input type="text" name="name"><br>
	<input type="submit" value="Cerca">
	
</form>
<br>
<form action="ListIngredientFound.php" method="GET">

	Nome ingrediente:<br><input type="text" name="name"><br>
	<input type="submit" value="Cerca">
	
</form>
<br><br>

</html>
