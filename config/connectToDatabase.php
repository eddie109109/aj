<?php

// the whole part below is to connect to MySQL database
// ob_start(); // turns on output buffering
// session_start(); // start the session

date_default_timezone_set("America/Vancouver");

$serverName = "127.0.0.1";
$userName = "root";
$password = ""; // no password for now;
$databaseName = "Aj";

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

try {
  $conn = new PDO("mysql:host=$serverName;dbname=$databaseName", $userName, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch(PDOException $e) {
  echo  "<br> failed" . $e->getMessage();
}

?>
