<?php

include('db_connection.php');

$query = "SELECT * FROM gamers order by gamer_number asc";
$result = mysql_query($query);

$arrPoints = array();

while($row = mysql_fetch_object($result)){
	$asoPoints = array("gamer_id"=>$row->gamer_id, "lastname"=>$row->lastname, "firstname"=>$row->firstname, "nickname"=>$row->nickname, "gamer_number"=>$row->gamer_number);
	array_push($arrPoints,$asoPoints); 
}

$json = json_encode($arrPoints);

echo $json;
?>