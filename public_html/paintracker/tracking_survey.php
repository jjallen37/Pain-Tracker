<?php

function print_page($user_id)
{
   
    connect_db();
	
    $query = "select * from User_Survey where userid = $user_id ORDER by categoryid";
	$sql = mysql_query($query) or handle_error(mysql_error());
	$no_tracking = false;
    
	if( mysql_num_rows($sql) == 0 )
	{
		$no_tracking = true;
		?>
                <div class="ptright">
        <p>Before you start recording daily data, you need to create your customized PAINTRACKING tool. The goal is to create a survey that:
        <ul>
        <li>takes two minutes or less to fill out each day;</li>
        <li>reveals patterns in your wellbeing;</li>
		<li>provides reasons for the fluctuations you find; and</li>
        <li>allows you to experiment to find what helps you most.</li>
		</ul>
        <p>This approach, including how to make decisions about what to track and how to interpret your findings, is explained in detail in the book <a href="http://paintracking.com/buy.html">PAINTRACKING.</a></p>
        <p>To create a personalized survey, you will be walked through a process and given choices about what you want to track.
		<ul>
		<li>You can start out by tracking just two or three things. Then as you become more comfortable with how this works, you can alter your tracking tool.</li> 
		<li>You'll always be able to add, remove, or change the characteristics of anything you are tracking.</li> 
		<li>The information from your surveys will be displayed in a printable table and interactive graph so you can make sense of your experience, look for trends, and analyze the results of deliberate experiments to improve how you feel.</li>
		<ul>
		<p>To start creating your survey, <a href="track.php?loc=wizard">click here</a>.</p> 
		
        <p><a href="track.php">Return to Paintracker Home.</a></p> 
 	 	
		
    <?php
	}
    else
    {
       ?>
        <div class="ptright">
        <?php
        if( !isset($_POST['taken']) )
        {
            ?>
            <form action="track.php?loc=dailys" method="post">
            <input type="hidden" name="taken" value="1">
            <table>
            <?php
            $current_header = "";
            while($row = mysql_fetch_array($sql) )
            {
            	if($row['categoryid']!=0){
            	echo "<div class=\"wrapper\" style=\"border-style: solid; border-color: red; width: 550px;\">
	    		<div class=\"left1\">";
				?>
				<h3 style="text-align:center;"> 
				<?php
				echo $row['category_name'] . "<br>";
				?>
				</h3>
				<?php
				for ($i=1; $i <= $row['fields']; $i++) { 
					$catScaleX = "category_scale".$i;
					echo "<input type=\"radio\" name=".$row['category_name']." value=\"".$catScaleX."\">".$row[$catScaleX]."<br>";
				}
				echo "</div></div>";
            }    
            }

            ?>
            <tr><td><b>Daily Note:</b><br>(optional note to capture your experience)</td><td></td></tr>
            <tr><td colspan=2><textarea name="note" cols=40 rows=2></textarea></td></tr>
            <tr><td></td><td><input type="submit" name="submit" value="Submit My Data" /></td></tr>
            </table>
            </form>
            <?php
            
        }
        else
        {
            
            
            //create a survey ID
            $tz = $_SESSION['tz'];
			if( $tz == "")
			{
				$tz = 0;
			}
		
			$query = "select * from User_Survey where userid = $user_id ORDER by categoryid";
			while($row = mysql_fetch_array($sql)){
				$catID = $row['categoryid'];
				
				$rowNumber = ereg_replace("[^0-9]", "",$_POST[$row['category_name']]);
				$category = $_POST[$row['category_name']];
				if ($row[$category]!="") {$actualVal = "".$rowNumber." - ".$row[$category];}
				$relativeVal = 100*($rowNumber/$row['fields']);
				
				$query = "insert into User_Data(userid, categoryid, relativevalue, actualvalue, datetime) values ($user_id, $catID , $relativeVal, '$actualVal', now() + Interval $tz hour)";
				
				// $query = "insert into User_Data(userid, categoryid, relativevalue, actualvalue, datetime) values ($user_id, $row['categoryid'], $relativeVal, $actualVal,  now() + Interval $tz hour)";
				mysql_query($query) or die(mysql_error());
				// echo "Category:".$row['category_name']."<br> catid:".$row['categoryid'] . "<br>ActualValue:" . $actualVal . "<br>Datetime now() + Interval $tz hour";
			}
						
            // $query = "insert into user_surveys(user_id, surveydt, note) values ($user_id, now() + Interval $tz hour, '$_POST[note]')";

            // $survey_id = mysql_insert_id();
//             
            // while( $row = mysql_fetch_array($sql) )
            // {
                // $value = $_POST["cat$row[id]"];
                // $query = "insert into user_survey_answers(survey_id, category_id, value) values ($survey_id, $row[id], '$value')";
                // mysql_query($query) or die(mysql_error());
            // }
//             
            // $query = "select * from user_medications where user_id = $user_id";
            // $sql = mysql_query($query) or die(mysql_error());
            // if( mysql_num_rows($sql) > 0 )
            // {
                // while($row = mysql_fetch_array($sql))
                // {
                    // $value = $_POST["med$row[id]"];
                    // $query = "insert into user_medications_answers(survey_id, medication_id, answer) values ($survey_id, $row[id], '$value')";
                    // mysql_query($query) or die(mysql_error());
                // }
            // }
            ?>
            <p>Survey saved!  You can view your reports <a href="track.php?loc=table">in table form</a> or you can create a <a href="track.php?loc=chart">chart.</a></p>
            <?php
        }
    }
    ?>
    
    </div>
<div style="clear:both;">&nbsp;</div>
<p style="text-align:center"><img src="pen.gif"></p>
</div>
<?php
}