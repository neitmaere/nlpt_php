<?php

include('db_connection.php');

$query = "SELECT gamers.*, SUM(points.points) as total_points FROM gamers as gamers LEFT OUTER JOIN points as points on gamers.gamer_id = points.gamer_id GROUP BY gamers.gamer_id order by total_points desc";
$result = mysql_query($query);

$arrPoints = array();

while($row = mysql_fetch_object($result)){
	$asoPoints = array("lastname"=>$row->lastname, "firstname"=>$row->firstname, "nickname"=>$row->nickname, "gamer_number"=>$row->gamer_number, "total_points"=>$row->total_points);
	array_push($arrPoints,$asoPoints); 
}

$json = json_encode($arrPoints);

echo $json;
?>