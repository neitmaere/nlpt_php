<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lan_party_2017";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$gamers = json_decode(file_get_contents("php://input"));

	$sql = "";
	$error = false;

	foreach ($gamers as $gamer) {
		$sql ="UPDATE `gamers` SET `firstname` = '$gamer->firstname', `lastname` = '$gamer->lastname', `nickname` = '$gamer->nickname', `gamer_number` = $gamer->gamer_number WHERE `gamers`.`gamer_id` = $gamer->gamer_id; ";
		if ($conn->query($sql) === false) {
			echo "Error updating record: " . $conn->error;
			$error=true;
			break;
		} 
	}
}

if($error !== true){
	echo json_encode($gamers);
}

$conn->close();

?>