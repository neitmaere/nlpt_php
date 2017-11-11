<?php

include('db_connection.php');

if($_GET['year'] == "0000"){
    $query = "SELECT gamers.*, gamer_year_map.* FROM gamers as gamers, gamer_year_map as gamer_year_map WHERE gamer_year_map.gamer_id = gamers.gamer_id group by gamer_year_map.gamer_id order by gamers.gamer_id asc";
} else {
    $query = "SELECT gamers.*, gamer_year_map.* FROM gamers as gamers, gamer_year_map as gamer_year_map WHERE gamer_year_map.gamer_id = gamers.gamer_id and gamer_year_map.year = ".$_GET['year']." order by gamer_number asc";
}
$result = mysql_query($query);

$arrPoints = array();

while($row = mysql_fetch_object($result)){
	$asoPoints = array("gamer_id"=>$row->gamer_id, "lastname"=>$row->lastname, "firstname"=>$row->firstname, "nickname"=>$row->nickname, "gamer_number"=>$row->gamer_number);
	array_push($arrPoints,$asoPoints); 
}

$json = json_encode($arrPoints);

echo $json;
?>