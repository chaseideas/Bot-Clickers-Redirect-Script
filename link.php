<?php
//	Bot Clicker Redirect Script
//		by Chase Ideas
//	  www.chaseideas.com


//settings
$debug=0; 			//set to 0 to disable, 1 to enable debug output
$logging = 1; 		//set to 0 to disable, 1 to enable logging function

$usr_link = "http://chaseclicks.com"; 		// url where real users are directed to
$bot_link = "http://google.com"; 			// url where detected bots will be redirected

//include the bot detection script to search user agent headers
include ("bot_detection.php");


//if enabled, log all actions for detecting new bots later
if($logging==1){
	try{
	$myFile = "log.txt";
	$theDate = date('l jS \of F Y h:i:s A');
	$fh = fopen($myFile, 'a');
		if (detect_bot()){
				$stringData = $theDate . " " . $_SERVER['HTTP_USER_AGENT'] . "<<<This is a BOT \n";
			}else{
				$stringData = $theDate . " " . $_SERVER['HTTP_USER_AGENT'] . "This is a USER \n";
		}
		fwrite($fh, $stringData);
		fclose($fh);

	}
	//catch exception & print to screen
	catch(Exception $e){ echo 'Error: ' .$e->getMessage(); }
} 
//end logging



//handle the traffic, direct or redirect as necessary
if (detect_bot()) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $bot_link");
} else {
    header("Location: $usr_link");
}

?>