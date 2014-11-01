<?php
require './class.user.php';
require_once './class.character.php';


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
			$sTable = "<table>";
			
			foreach(character::getCharactersFromServer($_GET['server']) as $k => $v){
				$sTable .= "<tr>";
				$sTable .= "<td>".$v['character']."</td>";
				$sTable .= "<td>".$v['server']."</td>";
				$sTable .= "</tr>";
			}
			$sTable .= "</table>";
			echo $sTable;
			echo "<a href='startpagina.php'>Back</a>";
		} 
		?>
	</body>
</html>