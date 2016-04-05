<?php
session_start ();

// print_r($_SESSION["host"] );

$host = $_SESSION ["host"];
$port = $_SESSION ["port"];
$dbname = $_SESSION ["db"];
$credentials = $_SESSION ["credentials"];


$db = pg_connect ( "$host $port $dbname $credentials" );


function insertHotel($db, $name, $no, $city) {
	$sql = <<<EOF
		INSERT INTO HOTELDB.Hotel(hotelname, hotelno, city) 
		VALUES ('$name', '$no', '$city');
EOF;
	
	$ret = pg_query($db, $sql);
	if (! $ret) {
		echo "Insertion error " + pg_last_error ( $db );
	} else {
		echo "Records created successfully\n";
	}
}

if(isset($_POST['submit']))
{
	insertHotel ($db, $_POST['hotelname'], $_POST['hotelno'], $_POST['city']);
}

pg_close ( $db );
?>