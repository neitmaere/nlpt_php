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
	$gamers = json_decode(file_get_contents("php://input"));

	$sql = "";
	$error = false;

	foreach ($gamers as $gamer) {
		$sql ="UPDATE gamer_year_map, gamers
                SET gamer_year_map.gamer_number = $gamer->gamer_number,
                gamers.firstname = '$gamer->firstname', gamers.lastname = '$gamer->lastname', gamers.nickname = '$gamer->nickname'
                WHERE gamer_year_map.gamer_id = $gamer->gamer_id AND
                gamer_year_map.year = ".$_GET['year']." AND
                gamers.gamer_id = $gamer->gamer_id";
		
        
        
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