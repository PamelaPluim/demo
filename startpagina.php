<?php
session_start();
if (isset($_GET['logout'])) {
	session_destroy();
	header('Location: startpagina.php');
}

if (isset($_POST['username'])) {
	$con = mysqli_connect("localhost", "root", "welkompamela", "demo");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST["password"]);
	$query = "select * from `users` where `username` = '" . $username . "' and `password` = '" . $password . "'";
	if (!$result = $con->query($query)) {
		die("error");
	}
	while ($row = $result->fetch_assoc()) {
		if ($row['password'] == $password) {
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $row['username'];
		}
	}
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
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE) {
			echo 'Hello '. ucfirst($_SESSION['username']) . '<br>';
			echo "<a href='?logout=true'>logout</a>";
		} else {
			echo '
					<form action="#" method="POST">
					<fieldset>
						<div class="inputcontainer">
							<label for="username">Username:</label>
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