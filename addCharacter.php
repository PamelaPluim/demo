<?php
require_once './class.user.php';
require_once './class.character.php';

if( ! user::isLogedin()){
	header("Location: startpagina.php");
}

if (isset($_POST['submit'])) {
	character::add($_POST['characterName'], $_POST['server'], $_SESSION['userId']);
	echo "You're character has been added you can add more if you want.";
}
?>

<!doctype html>
<html>
	<head>
		<title>My World of Warcraft character's.</title>
		<link rel='stylesheet' type='text/css' href="css/startpagina.css">
	</head>
	<body>
		<form name="addCharacter" action="#" method="POST">
			<div class="inputcontainer">
				<label for="characterName">Character Name:</label></br>
				<input id="characterName" type="text" name="characterName">
			</div>
			<div class="inputcontainer">
				<label for="server">Server:</label></br>
				<input id="server" type="text" name="server">
			</div>
			<input type="submit" name="submit">
		</form>
		<a href="startpagina.php">
			<button>Back</button>
		</a>
	</body>
</html>