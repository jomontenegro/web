<?php
session_start();
require_once 'config_db.php';

	// Create connection
	$con = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($con->connect_error) {
	  die("Connection failed: " . $con->connect_error);
	}
	//echo "Connected to $dbname at $servername successfully.";
	//$con->close();
/*try {
    $db = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    echo "Connected to $dbname at $host successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}*/

?>