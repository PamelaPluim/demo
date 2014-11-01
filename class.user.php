<?php
session_start();
require_once 'class.database.php';

class user {
	public static function logout(){
		session_destroy();
	}
	public static function isLogedin(){
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE){
			return TRUE;
		} else {
			return FALSE;	
		}
	}

	public static function login($username, $password) {
		$oDatabase = mysql::getInstance();
		$con = $oDatabase::getStaticDatabase();
		$username = mysqli_real_escape_string($con, $username);
		$password = mysqli_real_escape_string($con, $password);
		$query = "select * from `users` where (`username` = '" . $username . "' or `email` = '" . $username . "') and `password` = '" . md5($password) . "'";
		$result = $con->query($query);
		if (!$result) {
			die("error");
		}
		if ($result->num_rows > 1) {
			echo "Verkeerde usernaam of password";
		}
		while ($row = $result->fetch_assoc()) {
			if ($row['password'] == md5($password)) {
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $row['username'];
				$_SESSION['userId'] = $row['id'];
			}
		}
	}
	
	public static function register($password, $password_confirm, $email, $username) {
		if ($password != $password_confirm){
			die("passwords dont match");
		}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			die("email is not valid");
		}
		$database = mysql::getInstance();
		$con = $database::getStaticDatabase();
		$email = mysqli_real_escape_string($con, $email);
		$username = mysqli_real_escape_string($con, $username);
		$usernameQuery = "select * from `users` where `username` = '".$username."'";
		$usernameResult = $con->query($usernameQuery);
		if($usernameResult->num_rows != 0){
			die('username already exists');
		}
		$userRegisterQuery = "INSERT INTO `users`(`username`, `password`, `email`) VALUES('".$username."', '".md5($password)."', '".$email."')";
		$userRegisterResult = $con->query($userRegisterQuery);
		if(!$userRegisterResult){
			die('error in register query');
		}
		self::login($username, $password);
		return true;
	}
}
