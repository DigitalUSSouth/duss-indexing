<?php
/**
 * @file index.php
 * This file lays out the structure of the website.
 * Test edit.
 */

//check protocol
if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    $protocol = 'https://';
  }
  else {
    $protocol = 'http://';
  }


//redirect to www
if ($_SERVER['HTTP_HOST']=="digitalussouth.org" || $protocol=='http://'){
	$request = $_SERVER['REQUEST_URI'];
	header("HTTP/1.1 302 Found"); 
    header("Location: https://www.digitalussouth.org".$request);
	die();
}


error_reporting(E_ALL);
ini_set("display_errors", true);
ini_set("display_startup_errors", true);

if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])) {
	$name    = trim($_POST["name"]);
	$email   = trim($_POST["email"]);
	$message = trim($_POST["message"]);

	$body = "Name: " . $name;
	$body .= "\nEmail: " . $email;
	$body .= "\nMessage: " . $message;

	$mail = mail("collinhaines@me.com", $name . " has contacted you through the DUSS website", $body , "From: $email");

	if ($mail) {
		die(json_encode(array("type" => "success", "text" => "Hey " . $name . ", your message has been sent!")));
	} else {
		die(json_encode(array("type" => "error", "text" => "Something went wrong. Please try again.")));
	}

	exit();
}
require "config.php";

require "layout/head.php";

require "layout/splash.php";

require "layout/nav.php";

require "layout/home.php";

require "layout/about.php";

require "layout/projects.php";

require "layout/contact.php";

require "layout/footer.php";

require "layout/scripts.php";
