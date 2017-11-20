<?php

include('db_connection.php');


$query = "SELECT gamers.*, gamer_year_ranking.* FROM gamers as gamers LEFT OUTER JOIN gamer_year_ranking as gamer_year_ranking on gamer_year_ranking.gamer_id = gamers.gamer_id group by gamer_year_ranking.gamer_id order by gamers.nickname asc";

$result = mysql_query($query);

$arrPoints = array();

while($row = mysql_fetch_object($result)){
	$asoPoints = array("gamer_id"=>$row->gamer_id, "lastname"=>$row->lastname, "firstname"=>$row->firstname, "nickname"=>$row->nickname, "2018"=>$row->nlpt_18, "2017"=>$row->nlpt_17, "2016"=>$row->nlpt_16, "2015"=>$row->nlpt_15);
	array_push($arrPoints,$asoPoints); 
}

$json = json_encode($arrPoints);

echo $json;
?>