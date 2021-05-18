<?php

define("db_server", "localhost");
define("db_username", "root");
define("db_password", "");
define("db_name", "fireswitch_db");

$link = mysqli_connect(db_server, db_username, db_password, db_name);

if ($link === false) {
	die("ERROR: could not connect " . mysqliconnect_error());
}

?>