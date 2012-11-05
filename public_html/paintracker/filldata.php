<?php
include("common_functions.php");
error_reporting(1);
//start session so we can check the user credentials
session_start();
ob_start();
connect_db();

    for( $i = 1; $i < 15; $i++ )
    {
    $query = "select * from user_track where user_id = 11411";
	$sql = mysql_query($query) or handle_error(mysql_error());
	$no_tracking = false; 
    $query = "insert into user_surveys(user_id, surveydt) values (11411, '2012-02-$i')";
            mysql_query($query) or die(mysql_error());
            $survey_id = mysql_insert_id();
            
            while( $row = mysql_fetch_array($sql) )
            {
                $value = rand(1,5);
                $query = "insert into user_survey_answers(survey_id, category_id, value) values ($survey_id, $row[id], '$value')";
                mysql_query($query) or die(mysql_error());
            }
    }
            
?>