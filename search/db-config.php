<?php 
// Define variables sce database.
define("DB_HOST", "localhost");
define("DB_USER", "x");
define("DB_PASS", "x");
define("DB_BASE", "x");
// Global MySQL Database Connection.
global $mysqli;
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_BASE);
if ($mysqli->connect_error || $mysqli->connect_errno) {
  exit ("<h1 class='text-danger'>Database Connection Error (" . $mysqli->connect_errno . "): " . $mysqli->connect_error . "</h1>");
}

global $mysql1;
$mysql1 = new mysqli('locahost','x', 'x', 'x');
if ($mysql1->connect_error || $mysql1->connect_errno) {
  exit ("<h1 class='text-danger'>Database Connection Error (" . $mysql1->connect_errno . "): " . $mysql1->connect_error . "</h1>");
}
