<?php

include("common_functions.php");
error_reporting(1);
//start session so we can check the user credentials
session_start();
ob_start();
connect_db();


if (!isset($_SESSION['user']) || !isset($_SESSION['pass']) || !isset($_SESSION['id'])) {
    //figure out how to output 'error' condition to graph
    exit;
}
$user_id = $_SESSION['id'];
$query = "select id, date_format(surveydt, '%Y-%m-%e') as survdt, date_format(surveydt, '%k-%i') as survtime from user_surveys where user_id=$user_id order by surveydt asc";
$sql = mysql_query($query) or die(mysql_error());

if (mysql_num_rows($sql) == 0) {
    ?>
    <p>You haven't taken any surveys yet. To take a survey, click the Daily Survey link above.</p>
    <?php

} else {

    // Get list of all categories for the user
    $query = "select category_name from User_Survey where userid = 1";
    $categories = mysql_query($query) or die(mysql_error);
    $categoryString = "";

    // Put each category, comma-separated, into a string
    while ($row = mysql_fetch_array($categories)) {
        $categoryString = $categoryString . "$row[category_name],";
    }
    $categoryString = substr($categoryString, 0, -1); // remove trailing ,
    // Output first row of categories
    echo $categoryString;
    echo "\n";

    // Get list of survey data for the user
    $query = "select categoryid, relativevalue, actualvalue, datetime FROM User_Data where userid = 1";
    $values = mysql_query($query) or die(mysql_error);
    $surveyData = "";
    
    // Set up string with survey data
    while ($row = mysql_fetch_array($values)) {
        $surveyData = $surveyData . "$row[categoryid],$row[relativevalue],$row[actualvalue],$row[datetime] \n";
    }
    $surveyData = substr($surveyData, 0, -1); // remove trailing newline
    echo $surveyData;
    
}
?>