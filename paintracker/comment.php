<?php

include("common_functions.php");
error_reporting(1);
//start session so we can check the user credentials
session_start();
ob_start();
connect_db();


if( !isset($_SESSION['user']) || !isset($_SESSION['pass']) || !isset($_SESSION['id']) )
{
    //figure out how to output 'error' condition to graph
    exit;
}
$user_id = $_SESSION['id'];

$comment = $_GET['comment'];

$query = "insert into beta_comments(user_id, comment, submitted) values ($user_id, '$comment', NOW())";
mysql_query($query) or die(mysql_error());
?>