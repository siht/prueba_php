<?php
function connect()
{
	$servername = "db";
	$database = "mio";
	$username = "root";
	$password = "1234";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);
	// Check connection
	if ($mysqli->connect_errno) {
	    echo("Connection failed: " . $mysqli->error());
	}
	return $conn;
}