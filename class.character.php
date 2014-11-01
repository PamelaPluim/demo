<?php
require_once './class.database.php';

class character {
	public static function add($sCharacterName, $sServerName, $iId){
		$oDatabase = mysql::getInstance();
		$con = $oDatabase::getStaticDatabase();
		
		$sCharacterName = mysqli_real_escape_string($con, $sCharacterName);
		$sServerName = mysqli_real_escape_string($con, $sServerName);

		$sInsertQuery = "INSERT INTO `characters`(`character`, `server`, `fk_users_id`) VALUES('".$sCharacterName."', '".$sServerName."', '".$iId."')";
		$con->query($sInsertQuery);
	}
	
	public static function getCharactersFromUser($iId){
		$oDatabase = mysql::getInstance();
		$con = $oDatabase::getStaticDatabase();
		
		$sSelectQuery = "SELECT * FROM `characters` WHERE `fk_users_id` = '".$iId."'";
		$rResult = $con->query($sSelectQuery);
		$aTmp = array();
		while($aCharater = $rResult->fetch_assoc()){
			$aTmp[] = $aCharater;
		}
		return $aTmp;
	}
	
	public static function getCharactersFromServer($sServername){
		$oDatabase = mysql::getInstance();
		$con = $oDatabase::getStaticDatabase();
		
		$sSelectQuery = "SELECT * FROM `characters` WHERE `server` = '".$sServername."'";
		$rResult = $con->query($sSelectQuery);
		$aTmp = array();
		while($aCharater = $rResult->fetch_assoc()){
			$aTmp[] = $aCharater;
		}
		return $aTmp;
	}
}
