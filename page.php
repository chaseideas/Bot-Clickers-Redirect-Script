<?php
// PAGE CLOAKER
  
// Description / Usage:
//	use this file to insert into any page you'd like to cloak
//	by inserting this into your pages, you're able to redirect 
//	real users to another page, while showing bots the original page
//
// 	insert into pages using  "include ("/full/path/to/page.php");"
 
//redirect real users to...
$usr_link = "http://chaseclicks.com"; // This time it will be where USERS are redirected.

//include the bot detection file
include ("./bot_detection.php");
//include the full path so you dont have to have multiple versions
// eg. /home/user/sitename.com/public_html/inc/bot_detection.php 


//check if visitor is NOT a bot, if they are a real visitor, redirect them to the link!
if (!(detect_bot())) { header("Location: $usr_link"); } 

?>