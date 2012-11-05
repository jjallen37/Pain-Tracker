<?php

function print_page($user_id)
{
   
    connect_db();
    $query = "select * from user_track where user_id = $user_id and current = 1 order by sub_category asc";
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
                if( $current_header != $row['sub_category'] )
                {
                    $current_header = $row['sub_category'];
                    echo "<tr><td colspan='2'><b>$current_header</b></td></tr>";
                }
		  if( $current_header == "Other" )
                {
		      echo "<tr><td>$row[display_name]</td><td><textarea name='cat$row[id]' cols=30 rows=1></textarea>";
                    continue;
                }
                echo "<tr><td>$row[display_name]</td><td><select name='cat$row[id]'><option value=\"\"></option>";
                $options = explode("|", $row['options']);
                foreach( $options as $option )
                {
                    if( $option != "" )
                    {
                        if( $row['fields'] == 0 )
                        {
                            echo "<option value=\"$option\">$option</option>";
                        }
                        else if ( $row['fields'] == -1 )
                        {
                            $opt = explode(":", $option);
                            
                            echo "<option value=\"$opt[0]\">$opt[1]</option>";
                            
                        }
                        else
                        {
                            $opt = explode(":", $option);
                            if( $row['category_id'] == "Temperature" )
                            {
                                if( $opt[1] == "70 F" || $opt[1] == "20 C" )
                                {
                                     echo "<option value=\"$opt[0]\" selected='selected'>$opt[0] - $opt[1]</option>";
                                }
                                else
                                {
                                    echo "<option value=\"$opt[0]\">$opt[0] - $opt[1]</option>";
                                }
                            }
                            else
                            {
                                echo "<option value=\"$opt[0]\">$opt[0] - $opt[1]</option>";
                            }
                        }
                    }
                }
                echo "</select></td></tr>";
               
            }
            $query = "select * from user_medications where user_id = $user_id";
            $sql = mysql_query($query) or die(mysql_error());
            if( mysql_num_rows($sql) > 0 )
            {
                echo "<tr><td colspan=2><b>Medications</b></td></tr>";
                while($row=mysql_fetch_array($sql))
                {
                    echo "<tr><td>$row[medication]</td><td><input name='med$row[id]' /> $row[units]</td></tr>";
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
            $query = "insert into user_surveys(user_id, surveydt, note) values ($user_id, now() + Interval $tz hour, '$_POST[note]')";
            mysql_query($query) or die(mysql_error());
            $survey_id = mysql_insert_id();
            
            while( $row = mysql_fetch_array($sql) )
            {
                $value = $_POST["cat$row[id]"];
                $query = "insert into user_survey_answers(survey_id, category_id, value) values ($survey_id, $row[id], '$value')";
                mysql_query($query) or die(mysql_error());
            }
            
            $query = "select * from user_medications where user_id = $user_id";
            $sql = mysql_query($query) or die(mysql_error());
            if( mysql_num_rows($sql) > 0 )
            {
                while($row = mysql_fetch_array($sql))
                {
                    $value = $_POST["med$row[id]"];
                    $query = "insert into user_medications_answers(survey_id, medication_id, answer) values ($survey_id, $row[id], '$value')";
                    mysql_query($query) or die(mysql_error());
                }
            }
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