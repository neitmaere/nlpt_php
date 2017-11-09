<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nlpt_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$shooters = json_decode(file_get_contents("php://input"));

	$sql = "";
	$error = false;

	foreach ($shooters as $shooter) {
		//print_r($shooter->gamer_number);
		if($shooter->gamer_number === null){
			$sql ="UPDATE points SET gamer_id = null WHERE point_id = $shooter->point_id";
		} else {
			$sql ="UPDATE points SET gamer_id = (SELECT gamer_id from gamer_year_map WHERE gamer_number = $shooter->gamer_number and year= ".$_GET['year'].") WHERE point_id = $shooter->point_id";
            
            
		}
		if ($conn->query($sql) === false) {
			echo "Error updating record: " . $conn->error;
			$error=true;
			break;
		} 
	}
}

if($error !== true){
	echo json_encode($shooters);
}

$conn->close();

?>