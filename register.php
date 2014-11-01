<?php
require './class.user.php';

if (isset($_POST['submit'])){
	if(user::register($_POST['password'], $_POST['password_confirm'], $_POST['email'], $_POST['username'])){
		header('Location: startpagina.php');
	}
}
?>

<!doctype html>
<html>
	<head>
		<title>My World of Warcraft character's.</title>
		<link rel='stylesheet' type='text/css' href="css/startpagina.css">
		<script src="js/jquery-2.1.1.js" type="text/javascript"></script>
		<script src="js/register.js" type="text/javascript"></script>
	</head>
	<body>
		<?php
		echo '<form action="#" method="POST">
					<fieldset>
						<div class="inputcontainer">
							<label for="username">Username:</label>
							<input id="username" type="text" name="username">
						</div>
						<div claas="inputcontainer">
							<label for="email">E-mail:</label></br>
							<input id="email" type="text" name="email">
						</div>
						<div class="inputcontainer">
							<label for="password">Password:</label>
							<input class="check" id="password" type="password" name="password">
						</div>
						<div class="inputcontainer">
							<label for="password_confirm">Password confirm:</label>
							<input class="check" id="password_confirm" type="password" name="password_confirm">
							<div id="checkmark" style="display:none;float: right;margin-right: 50px;">&#x2713;</div>
						</div>
						<input class="submitbutton" disabled id="submitform" name="submit" type="submit" value="submit">
					</fieldset>
				</form>
				';
		?>
	</body>
</html>

