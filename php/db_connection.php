<?php

$verbindung = mysql_connect ("localhost",
		"root", "")
		or die ("keine Verbindung möglich.
 Benutzername oder Passwort sind falsch");

mysql_select_db("lan_party_2017")
or die ("Die Datenbank existiert nicht.");

?>