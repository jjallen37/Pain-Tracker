<?php
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename=paintracking.csv'); 

include("common_functions.php");
//error_reporting(1);
//start session so we can check the user credentials
session_start();

function csv($str) {
        $sep = ",";
        $quot = false;
        $si = 0;
        $slen = strlen($str);
        $ret = '';
        while ($si < $slen) {
            $ch = $str[$si];
            if ($ch == $sep)
                $quot = true;
            if ($ch == '"') {
                $quot = true;
                $ret .= '"';
            }
            if ($ch == "\n")
            {
                $quot = true;
            }
            $ret .= $ch;
            $si++; 
        }      
        if ($quot)
            return '"' . $ret . '"';
        return $str;
    } 
    $user_id = $_SESSION['id'];
    connect_db();
    $query = "select id, date_format(surveydt, '%M %e, %Y') as survdt, date_format(surveydt, '%l:%i %p') as survtime, note from user_surveys where user_id=$user_id order by surveydt desc";
    $sql = mysql_query($query) or die(mysql_error());
    $query3 = "select * from user_medications where user_id = $user_id";
    $sqlmed = mysql_query($query3) or die(mysql_error());
    $has_med = false;
    $medications = array();
    if( mysql_num_rows($sqlmed) > 0 )
    {
        $has_med = true;
        while( $row = mysql_fetch_array($sqlmed) )
        {
            $medications[$row['id']] = $row['medication'];
        }
    }

        
        //get list of all categories for the user
        $query = "select * from user_track where user_id = $user_id and current = 1 order by sub_category asc";
        $sql1 = mysql_query($query) or die(mysql_error());
        
        //build up array of categories
        $categories = array();
        $fields = array();
        $labels = array();
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
        
        //table header
        
        echo "Date,Time";
        foreach( $categories as $id => $category )
        {
            echo ",".csv($category);
        }
        if( $has_med )
        {
            echo ",Medications";
        }
        echo ",Note\n";
        
        while( $row = mysql_fetch_array($sql) )
        {
            $query = "select category_id, value from user_survey_answers where survey_id = $row[id];";
            $sql2 = mysql_query($query) or die(mysql_error());
            echo csv($row['survdt']);
            echo ",".csv($row['survtime']);
            $datapoints = array();
            while( $row2 = mysql_fetch_array($sql2) )
            {
                $datapoints[$row2['category_id']] = array();
                if( $fields[$row2['category_id']] == 0 )
                {
                    $datapoints[$row2['category_id']][0] = $row2['value'];
                }
                else if( $fields[$row2['category_id']] > 0 )
                {
                    $datapoints[$row2['category_id']][0] = $row2['value'];
                    $datapoints[$row2['category_id']][1] = $labels[$row2['category_id']][$row2['value']];
                }
                else
                {
                    $datapoints[$row2['category_id']][0] = $labels[$row2['category_id']][$row2['value']];
                }
            }
           
            foreach($categories as $id => $category)
            {
                if( $fields[$id] > 0 && $_GET['labels'] == 1 )
                {
                    $dp = $datapoints[$id][0];
                    $label = $datapoints[$id][1];
                    echo ",".csv(trim($dp." - ".$label));
                }   
                else
                {
                     $dp = $datapoints[$id][0];
                     echo ",".csv($dp);
                }
            }
            
            if( $has_med )
            {
                $query = "select medication, units, answer from user_medications, user_medications_answers where user_medications_answers.survey_id = $row[id] and user_medications.id = user_medications_answers.medication_id";
               
                $sql2 = mysql_query($query) or die(mysql_error());
                echo ",";
                $meds = "";
                while($row2 = mysql_fetch_array($sql2) )
                {
                    $meds .= "$row2[medication]: $row2[answer] $row2[units] \n";
                }
                echo csv(trim($meds));
            }
            echo ",".csv($row['note']);
            echo "\n";
        }