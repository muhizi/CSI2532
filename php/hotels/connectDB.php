<?php

session_start();

$host = "host=localhost";
$port = "port=5432";
$dbname = "dbname=hotel";
$credentials = "user=postgres password=admin";

function connectDB($host, $port, $dbname, $credentials) {
	$db = pg_connect("$host $port $dbname $credentials");
	if (! $db) {
		echo "Error : Unable to open database\n";
	}

    return $db;
}

$db = connectDB($host, $port, $dbname, $credentials);

?>