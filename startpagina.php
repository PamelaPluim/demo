<?php
require './class.user.php';


if (isset($_GET['logout'])) {
	user::logout();
	header('Location: /week2/startpagina.php');
}

if (isset($_POST['username'])) {
	user::login($_POST['username'], $_POST['password']);
}
?>

<!doctype html>
<html>
	<head>
		<title>My World of Warcraft character's.</title>
		<link rel='stylesheet' type='text/css' href="css/startpagina.css">
	</head>
	<body>
		<?php
		if (user::isLogedin()) {
			echo 'Hello '. ucfirst($_SESSION['username']) . '<br>';
			echo "<a href='?logout=true'>logout</a>";
		} else {
			echo '
					<form action="#" method="POST">
					<fieldset>
						<div class="inputcontainer">
							<label for="username">Username/E-mail:</label>
							<input id="username" type="text" name="username">
						</div>
						<div class="inputcontainer">
							<label for="password">Password:</label>
							<input id="password" type="password" name="password">
						</div>
						<input class="submitbutton" type="submit" value="submit">
					</fieldset>
				</form>
				';
		}
		?>
	</body>
</html>