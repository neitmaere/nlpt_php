<?php

include('db_connection.php');

if($_GET['year'] == "0000"){
    $query = "SELECT gamers.*, gamer_year_map.*, gamer_year_ranking.* FROM gamers as gamers, gamer_year_map as gamer_year_map LEFT OUTER JOIN gamer_year_ranking as gamer_year_ranking on gamer_year_ranking.gamer_id = gamer_year_map.gamer_id  WHERE gamer_year_map.gamer_id = gamers.gamer_id group by gamer_year_map.gamer_id order by gamers.gamer_id asc";
} else {
    $query = "SELECT gamers.*, gamer_year_map.*, gamer_year_ranking.* FROM gamers as gamers, gamer_year_map as gamer_year_map LEFT OUTER JOIN gamer_year_ranking as gamer_year_ranking on gamer_year_ranking.gamer_id = gamer_year_map.gamer_id WHERE gamer_year_map.gamer_id = gamers.gamer_id and gamer_year_map.year = ".$_GET['year']." order by gamer_number asc";
}
$result = mysql_query($query);

$arrPoints = array();

while($row = mysql_fetch_object($result)){
	$asoPoints = array("gamer_id"=>$row->gamer_id, "lastname"=>$row->lastname, "firstname"=>$row->firstname, "nickname"=>$row->nickname, "gamer_number"=>$row->gamer_number, "2018"=>$row->nlpt_18, "2017"=>$row->nlpt_17, "2016"=>$row->nlpt_16, "2015"=>$row->nlpt_15);
	array_push($arrPoints,$asoPoints); 
}

$json = json_encode($arrPoints);

echo $json;
?>