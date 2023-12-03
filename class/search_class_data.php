<?php
require('../config/Connect.php');
require('SearchClass.php');

$connected = new Connect($dbHost, $dbUser, $dbPassword, $database);
$search = new SearchClass($connected);
if(!empty($_POST['search']) && $_POST['search'] == 'search') {
	$search->getClasses();
}

?>