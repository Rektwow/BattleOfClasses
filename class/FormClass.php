<?php
require("../config/prefs/credentials.php");
// Die Klasse erbt von der Superklasse PDO
session_start();
class FormClass extends PDO {

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
	
	
// Method to create a new account
	public function createMethod($faction,$first_name,$last_name,$username,$email,$email_hash,$password) {
		$query = "INSERT INTO users (faction, first_name, last_name, username, email, email_hash, password, date, status) VALUES (:faction, :first_name, :last_name, :username, :email, :email_hash, :password, NOW(), 'pending' )";
		$securePassword= password_hash($password,PASSWORD_DEFAULT);
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':faction', $faction);
		$stmt -> bindParam(':first_name', $first_name);
		$stmt -> bindParam(':last_name', $last_name);
		$stmt -> bindParam(':username', $username);
		$stmt -> bindParam(':email', $email);
		$stmt -> bindParam(':email_hash', $email_hash);
		$stmt -> bindParam(':password', $securePassword);
		$stmt -> execute();
		return true;
	}
	// Method to get data out od Db
	public function ValidMethodCheck($valEmail,$valHash) {
		$query = "SELECT * FROM users WHERE email = :email AND email_hash = :email_hash";
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':email', $valEmail);
		$stmt -> bindParam(':email_hash', $valHash);
		$stmt -> execute();
		$result = $stmt -> rowCount();
		return $result;
	}
// Method to check if a user already exists
	public function checkUserExists($username) {
		$query = "SELECT * FROM users WHERE username = :username";
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':username', $username);
		$stmt -> execute();
		$result = $stmt -> fetch();
		if ($result) {
			//user doesnt exists
			return false;
		}else{
			//user exists
			return true;
		}
	}	
// Method to check if a email already exists
	public function checkEmailExists($email) {
		$query = "SELECT * FROM users WHERE email = :email";
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':email', $email);
		$stmt -> execute();
		$result = $stmt -> fetch();
		if ($result) {
			//email doesnt exists
			return false;
		}else{
			//email exists
			return true;
		}
	}	
// Method for Login check	
	public function checkUserLogin($username,$password) {
		$query = "SELECT * FROM users WHERE username = :username";
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':username', $username);
		//$stmt -> bindParam(':email', $email);
		$stmt -> execute();
		$result = $stmt -> fetch();
		if ($result) {
		if(password_verify($password, $result['password'])){
			// password correct
			return true;
		}else{
			//password false
			return false;
		}
	}else{
		//password false
		return false;
}}
// Method for to get session
	public function GetSession($username,$password) {
		$query = "SELECT * FROM users WHERE username = :username";
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':username', $username);
		//$stmt -> bindParam(':email', $email);
		$stmt -> execute();
		$result = $stmt -> fetch();
		if ($result) {
		// Password Verify
		if(password_verify($password, $result['password'])){
			// password correct
			$_SESSION["username"] = $result["username"];
		}else{
			//password false
			return false;
		}
	}else{
		//username false
		return false;
}}
// Method to update the status of a user (verified or not)
	public function ValidMethod($valEmail, $status) {
		$query = "UPDATE users SET ";
		$query .= "status = :status WHERE email = :email ";
		//$query .= "WHERE email = :email ";
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':email', $valEmail);
		$stmt -> bindParam(':status', $status);
		$stmt -> execute();
	}
// not used		
	public function deleteMethod($input) {
		$query = "DELETE FROM * WHERE ID = :ID";
		$stmt = $this -> prepare($query);
		$stmt -> bindParam(':ID', $input, PDO::PARAM_INT);
		$stmt -> execute();
	}
// Method to check is password is valid
	public function checkPassword($password){
		$search= '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/';
		if (preg_match($search, $password)) {
			return true;
		}
		else {
			return false;
		}
	}
}
// sanitize 
function sanitize($str){
	$step_1 = strip_tags($str); //removes tags 
	$step_2 = htmlspecialchars($step_1); //disable tags
	$step_3 = trim($step_2); //removes spaces left and right

	$step_4= preg_replace('/\x00|<[^>]*?/', '', $step_3);
	return str_replace(["'", '"'], ['&#39;', '&#34;'],$step_4);
}
 // password validity check
if(isset($_POST['password'])  && isset($_POST['passwordTestCheck'])){
	$password =sanitize($_POST['password']);
	$dbInst = new FormClass($dbHost,$database,$dbUser,$dbPassword);
	$passwordCheck=$dbInst->checkPassword($password);
	header('Content-Type: application/json');
	echo json_encode($passwordCheck); 
}
// checks if username exists 
if(isset($_POST['username']) && isset($_POST['userTestCheck'])){
	$username =sanitize($_POST['username']);
	$dbInst = new FormClass($dbHost,$database,$dbUser,$dbPassword);
	$userCheck=$dbInst->checkUserExists($username);
	header('Content-Type: application/json');
	echo json_encode($userCheck);
}
// checks if email exists 
if(isset($_POST['email']) && isset($_POST['emailTestCheck'])){
	$email =filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	// Ist die E-Mail-Adresse gültig?
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$emailChecker = true;
		$dbInst = new FormClass($dbHost,$database,$dbUser,$dbPassword);
		$emailCheck=$dbInst->checkEmailExists($email);
		header('Content-Type: application/json');
		echo json_encode($emailCheck);
	}
	else {
		$emailCheck = true;
	}
} 

// login
if(isset($_POST['submitBtnLg']) && isset($_POST['loginTestCheck'])){
	$username =sanitize($_POST['usernameLg']);
	//$email =filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$password =sanitize($_POST['passwordLg']);
	$dbInst = new FormClass($dbHost,$database,$dbUser,$dbPassword);
	$login=$dbInst->checkUserLogin($username,$password);
	$testSession=$dbInst->GetSession($username,$password);
  	header('Content-Type: application/json');
	echo json_encode($login);  
}

// email validation 
if((isset($_GET['m'])) && (isset($_GET['h']))){
	$valEmail = $_GET['m'];
	$valHash = $_GET['h'];
	$status = "verified";
	$dbInst = new FormClass($dbHost,$database,$dbUser,$dbPassword);
	$verify=$dbInst->ValidMethodCheck($valEmail,$valHash);
	header('Content-Type: application/json');
	echo json_encode($verify);

	if($verify==1){
		$verifyCheck=$dbInst->ValidMethod($valEmail,$status);
		header("Location:../index.php?validate=true");
	}
	else{
		header("Location:../index.php?validate=false");
	}
}


if(isset($_POST['submitBtn'])){
	$faction =$_POST['faction'];
	$first_name =sanitize($_POST['first_name']);
	$last_name =sanitize($_POST['last_name']);
	$username =sanitize($_POST['username']);
	$email =filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$email_hash =uniqid('ml',TRUE);
	$password =sanitize($_POST['password']);

	$dbInst = new FormClass($dbHost,$database,$dbUser,$dbPassword);
	$userCheck=$dbInst->checkUserExists($username);
	if($userCheck){
	
		$dbInst = new FormClass($dbHost,$database,$dbUser,$dbPassword);
		$emailCheck=$dbInst->checkEmailExists($email);
		if($emailCheck){

			$dbInst = new FormClass($dbHost,$database,$dbUser,$dbPassword);
			$passwordCheck=$dbInst->checkPassword($password);
			if($passwordCheck){
				
				include '../PHPMailer/sendmail.php';
				$dbInst = new FormClass($dbHost,$database,$dbUser,$dbPassword);
				$insert=$dbInst->createMethod($faction,$first_name,$last_name,$username,$email, $email_hash, $password); 
				$resu = true;
				
			}else{
				$resu = false;
			}
		}else{
			$resu = false;
		}
	}else{
		$resu = false;
	}
	
	header('Content-Type: application/json');
	echo json_encode($resu);
}
?>