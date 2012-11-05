<?php
connect_db();

$id = 1;
// $id = $_SESSION['id'];


$categorySQL = mysql_query("SELECT * FROM User_Survey WHERE userid = $id ORDER by categoryid" );
	
echo "<center>
<table border='1'>
<tr>
<th>Date</th>";
while($row1 = mysql_fetch_array($categorySQL)){
	echo "<th>" . $row1['category_name'] . "</th>";
}
echo "</tr>";

//number of columns
$dateSQL = mysql_query("SELECT DISTINCT datetime FROM User_Data WHERE userid = $id ORDER by datetime" );

while($row2 = mysql_fetch_array($dateSQL))
  {
  	$datetime = $row2['datetime'];
	echo "<tr>";
	echo "<td>" .$row2['datetime'] . "</td>";
	
	$categorySQL = mysql_query("SELECT actualValue FROM User_Data WHERE userid = $id AND datetime = '$datetime' ORDER by categoryid");
	while($row3 = mysql_fetch_array($categorySQL)){
		echo "<td>" . $row3['actualValue'] . "</td>";
	}
	echo "</tr>";

  }
echo "</table>";
echo "</center>";
mysql_close($con);
?>

<!-- <?php

function print_page($user_id)
{
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
	?>
    <script src="jquery.js"></script>
    <script>
    function labels()
    {
        if( document.getElementById("label_check").checked )
        {
            $(".Label").show("fast");
            $("#excel").attr("href","tracking_excel.php?labels=1");
        }
        else
        {
            $(".Label").hide("fast");
            $("#excel").attr("href","tracking_excel.php?labels=0");
        }
    }
    
    </script>
    <div class="ptright">
    <?php
    
    if( mysql_num_rows($sql) == 0 )
    {
        ?>
        <p>You haven't taken any surveys yet.  To take a survey, click the Daily Survey link above.</p>
        <?php
    }
    else
    {
        ?>

	 <p><b>How are you doing? What seems to help? Test out all your theories!</b></p>


<input type="checkbox" onclick="labels()" name="label_check" id="label_check"> <label for="label_check">Show Labels</label> | <a id="excel" href="tracking_excel.php?labels=0">Download as Excel spreadsheet</a> to keep your data on your computer.
<p></p>
        <table class="surveytable">
        <?php
        
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
        
        echo "<tr><th>Date</th><th>Time</th>";
        foreach( $categories as $id => $category )
        {
            echo "<th>$category</th>";
        }
        if( $has_med )
        {
            echo "<th>Medications</th>";
        }
        echo "<th>Note</th>";
        echo "</tr>";
        while( $row = mysql_fetch_array($sql) )
        {
            $query = "select category_id, value from user_survey_answers where survey_id = $row[id];";
            $sql2 = mysql_query($query) or die(mysql_error());
            echo "<tr><td>$row[survdt]</td>";
            echo "<td>$row[survtime]</td>";
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
                if( $fields[$id] > 0 )
                {
                    $dp = $datapoints[$id][0];
                    $label = $datapoints[$id][1];
                    echo "<td>$dp<div class='Label'>$label</div></td>";
                }   
                else
                {
                     $dp = $datapoints[$id][0];
                     echo "<td>$dp</td>";
                }
            }
            
            if( $has_med )
            {
                $query = "select medication, units, answer from user_medications, user_medications_answers where user_medications_answers.survey_id = $row[id] and user_medications.id = user_medications_answers.medication_id";
               
                $sql2 = mysql_query($query) or die(mysql_error());
                echo "<td>";
                while($row2 = mysql_fetch_array($sql2) )
                {
                    echo "$row2[medication]: $row2[answer] $row2[units] <br>";
                }
                echo "</td>";
            }
            echo "<td>$row[note]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
    }?> -->
    
    
<p>Explore the columns on the left to assess trends in your personal measure(s) of well-being over time. When you see changes, look to the right for clues about these fluctuations.</p>
<ul><li>For example, when you observe a cluster of days in which you felt particularly well or poorly, see what else was going on. How was the weather? Your activity level? Look for patterns.</ul>
<p>Once you have a theory based on your observed data, conduct experiments to test it out.</p> 
<ul><li>For example, if you notice your best days come after an earlier bedtime, go to bed at that time all week and see if this helps. Or, if your best days include a hot bath, water aerobics, frequent rest breaks, or any other activity, engage in these deliberately, and test their effects.</ul> 
<p>By approaching each day as an experiment, you gain valuable data that can bring continued improvements. For more on this approach and how to benefit from collected data, see chapter eight in <i>Paintracking: Your Personal Gide to Living Well with Chronic Pain</i>.</p>
	
</div>
<div style="clear:both;">&nbsp;</div>
<p style="text-align:center"><img src="pen.gif"></p>
</div>
<?php
}