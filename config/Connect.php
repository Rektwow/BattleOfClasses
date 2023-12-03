<?php
require("prefs/credentials.php");
class Connect extends PDO{
	
	public function __construct($dbHost, $dbUser, $dbPassword, $database){
		$dsn = 'mysql:host=' . $dbHost . ';dbname=' . $database .';charset=utf8';

		// Array für Optionen für PDO anlegen
		$options = array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		);
		try {
			parent::__construct($dsn, $dbUser, $dbPassword, $options);
		}
		catch (PDOException $e) {
			die("Connection to the database failed: ".$e->getMessage());
		} 
	}
}
?>