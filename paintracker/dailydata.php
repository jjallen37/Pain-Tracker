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
$query = "select date_format(surveydt, '%M %e, %Y') as survdt, note from user_surveys where user_id=$user_id and id=$_GET[survid]";
    $sql = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($sql);
    $survdt = $row['survdt'];
    $note = $row['note'];
//get list of all categories for the user
        $query = "select * from user_track where user_id = $user_id";
        $sql1 = mysql_query($query) or die(mysql_error);
        
        //build up array of categories and labels
        $categories = array();
        $labels = array();
        $fields = array();
        while( $row = mysql_fetch_array($sql1) )
        {
            $categories[$row['id']] = $row['display_name'];
            $fields[$row['id']] = $row['fields'];
            if( $row['fields'] != 0 )
            {
                $labels[$row['id']] = array();
                $options = explode("|", $row['options']);
                foreach( $options as $option )
                {
                    $label = explode(":",$option);
                    $labels[$row['id']][$label[0]] = $label[1];
                }
            }
        }
        
        
            $query = "select category_id, value from user_survey_answers where survey_id = $_GET[survid];";
            $sql2 = mysql_query($query) or die(mysql_error());
            echo "<b>Full Results for $survdt</b><br>";
            while( $row2 = mysql_fetch_array($sql2) )
            {
                
                if( $fields[$row2['category_id']] > 0 )
                {
                    echo $categories[$row2['category_id']]." - ".$row2['value'];
                    $label = $labels[$row2['category_id']][$row2['value']];
                    echo " ($label)";
                }
                else if( $fields[$row2['category_id']] < 0 )
                {
                    $label = $labels[$row2['category_id']][$row2['value']];
                    echo $categories[$row2['category_id']]." - ".$label;
                }
                else
                {
                    echo $categories[$row2['category_id']]." - ".$row2['value'];
                }
                echo "<br>";
            }
             $query = "select medication, units, answer from user_medications, user_medications_answers where user_medications_answers.survey_id = $_GET[survid] and user_medications.id = user_medications_answers.medication_id";
               
                $sql2 = mysql_query($query) or die(mysql_error());
                if( mysql_num_rows($sql2) > 0 )
                {
                    echo "<p><b>Medications</b><br>";
                    while($row2 = mysql_fetch_array($sql2) )
                    {
                        echo "$row2[medication]: $row2[answer] $row2[units] <br>";
                    }
                    echo "";
                }
                
                echo "<p><b>Note:</b> $note</p>";
            
            
        


?>