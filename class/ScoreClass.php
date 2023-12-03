<?php
require("../config/prefs/credentials.php");
// Die Klasse erbt von der Superklasse PDO
session_start();
class ScoreClass extends PDO {

	// Konstruktormethode: Stelle die Verbindung zur DB her
    public function __construct($dbHost,$database,$dbUser,$dbPassword) {
    	$dsn = 'mysql:host=' . $dbHost . ';dbname=' . $database .';charset=utf8';
    	
        // Array für Optionen für PDO anlegen
        $options = array(
        	// Wir wollen in der Testphase wissen, ob es Fehler gibt.
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // Mit dieser Option werden die Resultate in Form von assoziativen Arrays retour kommen.
            // In den meisten Fällen ist das der effizienteste Weg, die Resultate in HTML auszugeben ...
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        try {
        	// Konstruktor der PDO-Klasse (Superklasse) aufrufen
			parent::__construct($dsn, $dbUser, $dbPassword, $options);
		}
		catch (PDOException $e) {
			die("Verbindung zur Datenbank fehlgeschlagen: ".$e->getMessage());
		}
	}
   
public function createScore($username,$playerName,$enemyName,$battleEnd) {
  $query = "INSERT INTO score (username, player, enemy, result) VALUES (:username, :player, :enemy, :result)";
  $stmt = $this -> prepare($query);
  $stmt -> bindParam(':username', $username);
  $stmt -> bindParam(':player', $playerName);
  $stmt -> bindParam(':enemy', $enemyName);
  $stmt -> bindParam(':result', $battleEnd);
  $stmt -> execute();
  return true;
}
}
if(isset($_POST['submitGo'])){
  $username =$_SESSION["username"];
  $playerName =$_POST['playerName'];
  $enemyName =$_POST['enemyName'];
  $battleEnd =$_POST['battleEnd'];
  $dbInst = new ScoreClass($dbHost,$database,$dbUser,$dbPassword);
  $add=$dbInst->createScore($username,$playerName,$enemyName,$battleEnd); 
  header('Content-Type: application/json');
  echo json_encode($add);
}
?>