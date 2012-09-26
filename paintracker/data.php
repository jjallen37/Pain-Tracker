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
$user_id=$_SESSION['id'];
$query = "select id, date_format(surveydt, '%Y-%m-%e') as survdt, date_format(surveydt, '%k-%i') as survtime from user_surveys where user_id=$user_id order by surveydt asc";
    $sql = mysql_query($query) or die(mysql_error());
	    
    if( mysql_num_rows($sql) == 0 )
    {
        ?>
        <p>You haven't taken any surveys yet. To take a survey, click the Daily Survey link above.</p>
        <?php
    }
    else
    {
        
        //get list of all categories for the user
        $query = "select * from user_track where user_id = $user_id and fields != 0 order by sub_category asc";
        $sql1 = mysql_query($query) or die(mysql_error);
        
        //build up array of categories
        $categories = array();
        while( $row = mysql_fetch_array($sql1) )
        {
            $categories[$row['id']] = $row['display_name'];
            echo "$row[id],$row[display_name],$row[sub_category]|";
        }
        echo "\n";
        while( $row = mysql_fetch_array($sql) )
        {
            $query = "select category_id, value from user_survey_answers where survey_id = $row[id];";
            $sql2 = mysql_query($query) or die(mysql_error());
            echo "$row[id],$row[survdt], $row[survtime]:";
            $datapoints = array();
            while( $row2 = mysql_fetch_array($sql2) )
            {
                if( array_key_exists($row2['category_id'], $categories ) && $row2['value'] != "")
                    echo $row2['category_id'].",".$row2['value']."|";
            }
            echo "\n";
            /*foreach($categories as $id => $category)
            {
                echo "<td>$datapoints[$id]</td>";
            }*/
            
            
        }
       
    }
?>