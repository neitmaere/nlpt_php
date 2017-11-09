<?php

include('db_connection.php');

$year = $_GET['year'];
$round = $_GET['round'];

if($round != 0){
  $query = "SELECT *, gamer_year_map.gamer_number FROM `points` as points left OUTER JOIN gamers as gamers on gamers.gamer_id = points.gamer_id left OUTER JOIN gamer_year_map as gamer_year_map on gamer_year_map.gamer_id = gamers.gamer_id and gamer_year_map.year = ".$year." WHERE points.category_id = 5 and points.nlpt_year = ".$year." and points.round = ".$round." order by points.points desc";  
} else {
  $query = "SELECT *, gamer_year_map.gamer_number FROM `points` as points left OUTER JOIN gamers as gamers on gamers.gamer_id = points.gamer_id left OUTER JOIN gamer_year_map as gamer_year_map on gamer_year_map.gamer_id = gamers.gamer_id and gamer_year_map.year = ".$year." WHERE points.category_id = 5 and points.nlpt_year = ".$year." order by points.points desc";
}

$result = mysql_query($query);

$arrPoints = array();

while($row = mysql_fetch_object($result)){
	$asoPoints = array("point_id"=>$row->point_id, "rank"=>$row->rank, "gamer_number"=>$row->gamer_number, "nickname"=>$row->nickname, "points"=>$row->points, "category"=>$row->category_id, "round"=>$row->round);
	array_push($arrPoints,$asoPoints); 
}

$json = json_encode($arrPoints);

echo $json;
?>