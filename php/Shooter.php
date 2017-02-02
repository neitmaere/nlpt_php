<?php

include('db_connection.php');

$query = "SELECT * FROM `points` as points left OUTER JOIN gamers as gamers on gamers.gamer_id = points.gamer_id WHERE points.category_id = 1 order by points.rank asc";
$result = mysql_query($query);

$arrPoints = array();

while($row = mysql_fetch_object($result)){
	$asoPoints = array("point_id"=>$row->point_id, "rank"=>$row->rank, "gamer_number"=>$row->gamer_number, "nickname"=>$row->nickname, "points"=>$row->points, "category"=>$row->category_id, "round"=>$row->round);
	array_push($arrPoints,$asoPoints); 
}

$json = json_encode($arrPoints);

echo $json;
?>