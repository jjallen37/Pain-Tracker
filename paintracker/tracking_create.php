<?php

function print_page($user_id)
{
    connect_db();
    ?>
     <div class="ptright">
    <?php
	if( !isset($_POST['action']) )
	{
	?>
	          
<?php
        $query = "select * from user_track where user_id = $user_id";
        $sql = mysql_query($query) or handle_error(mysql_error());
        $no_tracking = false;
        if( mysql_num_rows($sql) == 0 )
	    {
				$no_tracking = true;
				?>
				<p>Welcome to the custom paintracking tool.</p>
				<p>You will be walked through a process to create a personalized survey to record how you are doing and the factors that affect this.</p>
					
				<ul>
				<li>The goal is create a  survey that takes two minutes or less to fill out and captures the information most relevant to your improvement.</li>
				<p></p>
				<li>You will be able to start tracking your experience once you choose what you would like to include. You will be given many choices. Remember to keep it simple!</li> 
				<p></p>
				<li>You can start out by tracking just two or three things. Then as you become more comfortable with how this works, you can alter your tracking tool. 
				You'll always be able to add, remove, or change the characteristics of anything you are tracking.</li>
				<p></p>
				<li>The information from your surveys will be displayed in a printable table and interactive graph so you can make sense of your experience, look for trends, and analyze the results of deliberate measures to improve how you feel.</li> 
				</ul>
				<p>This approach, including how to make decisions about what to track and how to interpret your findings, is explained in detail in the book <a href="http://paintracking.com/buy.html">PAINTRACKING.</a></p>
				<p>The first step is to create a personalized survey. 
				
				<p>To get started, <a href="track.php?loc=wizard">click here</a>. 
						
				

				</p>
                </div>
				<?php
	    }
	    else
	    {
			if( isset($_GET['action']) )
            {
                $newTz = $_POST['ddtz'];
                $query = "update users set time_zone_offset = $newTz where id = $user_id";
                mysql_query($query) or die(mysql_error());
                $_SESSION['tz'] = $newTz;
                ?>
                <p><b>Timezone Updated!</b></p>
                <?php
            }
            //get Time Zone information
	        $tz = $_SESSION['tz'];
            ?>
            <p>Here you can modify your personalized tracking survey.  Please select an action from the buttons below.</p>
            
                <form action="track.php?loc=create" method="post">
                <p><input type="submit" name="action" value="Add Category" /> 
                <input type="submit" name="action" value="Edit Category" /> 
                <input type="submit" name="action" value="Remove Category" /></p>
                <p><input type="submit" name="action" value="Reactivate Category" /> 
                <input type="submit" name="action" value="Reset Data" /></p>
            </form>
            <p>
            <form action="track.php?loc=create&action=changetz" method="post">
            
            Your current Time Zone is: <select name="ddtz" id="ddtz">
      <option value="-7.0" <?php echo $tz==-7.0?"selected=\"selected\"":"";?>>(GMT -12:00) Eniwetok, Kwajalein</option>
      <option value="-6.0" <?php echo $tz==-6.0?"selected=\"selected\"":"";?>>(GMT -11:00) Midway Island, Samoa</option>
      <option value="-5.0" <?php echo $tz==-5.0?"selected=\"selected\"":"";?>>(GMT -10:00) Hawaii</option>
      <option value="-4.0" <?php echo $tz==-4.0?"selected=\"selected\"":"";?>>(GMT -9:00) Alaska</option>
      <option value="-3.0" <?php echo $tz==-3.0?"selected=\"selected\"":"";?>>(GMT -8:00) Pacific Time: San Francisco, Vancouver</option>
      <option value="-2.0" <?php echo $tz==-2.0?"selected=\"selected\"":"";?>>(GMT -7:00) Mountain Time: Denver, Calgary</option>
      <option value="-1.0" <?php echo $tz==-1.0?"selected=\"selected\"":"";?>>(GMT -6:00) Central Time: Dallas, Winnipeg, Mexico City</option>
      <option value="0.0" <?php echo $tz==0.0?"selected=\"selected\"":"";?>>(GMT -5:00) Eastern Time: New York, Ottawa, Bogota, Lima</option>
      <option value="1.0" <?php echo $tz==1.0?"selected=\"selected\"":"";?>>(GMT -4:00) Atlantic Time: Hallifax, Caracas, La Paz</option>
      <option value="1.5" <?php echo $tz==1.5?"selected=\"selected\"":"";?>>(GMT -3:30) Newfoundland</option>
      <option value="2.0" <?php echo $tz==2.0?"selected=\"selected\"":"";?>>(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
      <option value="3.0" <?php echo $tz==3.0?"selected=\"selected\"":"";?>>(GMT -2:00) Mid-Atlantic</option>
      <option value="4.0" <?php echo $tz==4.0?"selected=\"selected\"":"";?>>(GMT -1:00 hour) Azores, Cape Verde Islands</option>
      <option value="5.0" <?php echo $tz==5.0?"selected=\"selected\"":"";?>>(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
      <option value="6.0" <?php echo $tz==6.0?"selected=\"selected\"":"";?>>(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option>
      <option value="7.0" <?php echo $tz==7.0?"selected=\"selected\"":"";?>>(GMT +2:00) Kaliningrad, South Africa</option>
      <option value="8.0" <?php echo $tz==8.0?"selected=\"selected\"":"";?>>(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
      <option value="8.5" <?php echo $tz==8.5?"selected=\"selected\"":"";?>>(GMT +3:30) Tehran</option>
      <option value="9.0" <?php echo $tz==9.0?"selected=\"selected\"":"";?>>(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
      <option value="9.5" <?php echo $tz==9.5?"selected=\"selected\"":"";?>>(GMT +4:30) Kabul</option>
      <option value="10.0" <?php echo $tz==10.0?"selected=\"selected\"":"";?>>(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
      <option value="10.5" <?php echo $tz==10.5?"selected=\"selected\"":"";?>>(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
      <option value="10.75" <?php echo $tz==10.75?"selected=\"selected\"":"";?>>(GMT +5:45) Kathmandu</option>
      <option value="11.0" <?php echo $tz==11.0?"selected=\"selected\"":"";?>>(GMT +6:00) Almaty, Dhaka, Colombo</option>
      <option value="12.0" <?php echo $tz==12.0?"selected=\"selected\"":"";?>>(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
      <option value="13.0" <?php echo $tz==13.0?"selected=\"selected\"":"";?>>(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
      <option value="14.0" <?php echo $tz==14.0?"selected=\"selected\"":"";?>>(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
      <option value="14.5" <?php echo $tz==14.5?"selected=\"selected\"":"";?>>(GMT +9:30) Adelaide, Darwin</option>
      <option value="15.0" <?php echo $tz==15.0?"selected=\"selected\"":"";?>>(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
      <option value="16.0" <?php echo $tz==16.0?"selected=\"selected\"":"";?>>(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
      <option value="17.0" <?php echo $tz==17.0?"selected=\"selected\"":"";?>>(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
</select><br>
            <input type="submit" value="Change Timezone">
            </form>
            </p>
            <div style="clear:both;"></div>
            </div>
            <?php
        }
	
	}
    else if( $_POST['action'] == "Add Independent" )
    {
        if($_POST['cat'] == "Environment" )
        {
            include("tracking_env.php");
            add_environment($user_id);
        }
        else if ($_POST['cat'] == "Pacing" )
        {
            include("tracking_pacing.php");
            add_pacing($user_id);
        }
        else if( $_POST['cat'] == "Sleep" )
        {
            include("tracking_sleep.php");
            add_sleep($user_id);
        }
        else if( $_POST['cat'] == "Exercise" )
        {
            include("tracking_exercise.php");
            add_exercise($user_id);
        }
        else if( $_POST['cat'] == "Medication" )
        {
            include("tracking_medication.php");
            add_medication($user_id);
        }
        else if( $_POST['cat'] == "Other" )
        {
            include("tracking_other.php");
            add_other($user_id);
        }
        else if( $_POST['cat'] == "" )
        {
            ?>
            <p><b>You must select a category to track to continue.</b></p>
                
                <form action="track.php?loc=create" method="post">
                <input type="hidden" name="action" value="Add Category" />
                <input type="hidden" name="step" value="1" />
                <div style="width: 200px; float:left;">
                    <p>Select another measure of how you are doing:</p>
                    <select size=5 name="cat">
                    <option value="Pain">Pain</option>
                    <option value="Fatigue">Fatigue</option>
                    <option value="Mood">Mood</option>
                    <option value="Wellbeing">Wellbeing</option>
                    </select>
                    <input type="submit" value="OK" />
                    </form>
                </div>
                <div style="width:540px; float:left; padding-left:10px;">
                    <p>You will be able to customize the measure you create. If you select <b>Pain</b>, for example, you will be able to customize a scale to measure any type of pain, such as a ten-point scale of "fibromyalgia" or "nerve pain," or a five-point scale of "arthritis," "headaches," "TMJ," or any other type of pain. For each scale you create, you will have an opportunity to select words to correspond with each level of your scale, such as "mild," “distracting,” “burning,” or “agony.”</p>
                </div>
                <div style="clear:both;"></div>
                
                <div style="width: 200px; float:left;">
                    <form action="track.php?loc=create" method="post">
                    <input type="hidden" name="action" value="Add Independent" />
                    <input type="hidden" name="step" value="1" />
                    <p>Select a category to track:</p>
                    <select size=6 name="cat">
                    <option value="Environment">Environment</option>
                    <option value="Pacing">Pacing</option>
                    <option value="Sleep">Sleep</option>
                    <option value="Exercise">Exercise</option>
                    <option value="Medication">Medications</option>
                    <option value="Other">Other</option>
                    </select>
                    <input type="submit" value="OK" />
                    </form>
                </div>
                <div style="float: left; width: 540px; padding-left:10px;">
                    <p><b>Environment</b> allows you to include a daily measure of the weather or your living environment (such as family or work stress).</p>
                    <p><b>Pacing</b> allows you to track your engagement in activities that require energy, such as work, shopping, gardening, housework, being on your feet, or any other activity you define, as well as recuperative activities such as meditating, napping, massage therapy, or any other ways you pace yourself.</p>
                    <p><b>Sleep</b>, <b>Exercise</b>, and <b>Medication</b> allow you to include these categories in your survey.</p>
                    <p><b>Other</b> is for factors you want to track but are not included here (such as diet).</p>
                </div>
                 <div style="clear:both;"></div>
                
            <?php
        }
        echo "</div>";
    }
	else if( $_POST['action'] == "Add Category" )
	{
		if( !isset($_POST['step']) )
		{
            //TODO: Create list from database and filter out existing categories
			?>
			<form action="track.php?loc=create" method="post">
			<input type="hidden" name="action" value="Add Category" />
			<input type="hidden" name="step" value="1" />
			<div style="width: 200px; float:left;">
            <p>Select another measure of how you are doing:</p>
			<select size=5 name="cat">
			<option value="Pain">Pain</option>
			<option value="Fatigue">Fatigue</option>
			<option value="Mood">Mood</option>
			<option value="Wellbeing">Wellbeing</option>
			</select>
            <input type="submit" value="OK" />
			</form>
            </div>
            <div style="width:540px; float:left; padding-left:10px;">
			<p>You will be able to customize the measure you create. If you select <b>Pain</b>, for example, you will be able to customize a scale to measure any type of pain, such as a ten-point scale of "fibromyalgia" or "nerve pain," or a five-point scale of "arthritis," "headaches," "TMJ," or any other type of pain. For each scale you create, you will have an opportunity to select words to correspond with each level of your scale, such as "mild," "distracting," "burning," or "agony."</p>
            </div>
            <div style="clear:both;"></div>
            
            <div style="width: 200px; float:left;">
            <form action="track.php?loc=create" method="post">
            <input type="hidden" name="action" value="Add Independent" />
            <input type="hidden" name="step" value="1" />
            <p>Select a category to track:</p>
            <select size=6 name="cat">
            <option value="Environment">Environment</option>
            <option value="Pacing">Pacing</option>
            <option value="Sleep">Sleep</option>
            <option value="Exercise">Exercise</option>
            <option value="Medication">Medications</option>
	     <option value="Other">Other</option>
            </select>
            <input type="submit" value="OK" />
            </form>
            </div>
            <div style="float: left; width: 540px; padding-left:10px;">
            <p><b>Environment</b> allows you to include a daily measure of the weather or your living environment (such as family or work stress).</p>
			<p><b>Pacing</b> allows you to track your engagement in activities that require energy, such as work, shopping, gardening, housework, being on your feet, or any other activity you define, as well as recuperative activities such as meditating, napping, massage therapy, or any other ways you pace yourself.</p>
			<p><b>Sleep</b>, <b>Exercise</b>, and <b>Medication</b> allow you to include these categories in your survey.</p>
			<p><b>Other</b> is for factors you want to track but are not included here (such as diet).</p>
            </div>
             <div style="clear:both;"></div>
            </div>
			<?php
		}
		else if($_POST['step'] == "1" ) 
		{
			if( $_POST['cat'] == "" )
			{
				?>
				<p><b>You must select a category to track to continue.</b></p>
                
                <form action="track.php?loc=create" method="post">
                <input type="hidden" name="action" value="Add Category" />
                <input type="hidden" name="step" value="1" />
                <div style="width: 200px; float:left;">
                <p>Select another measure of how you are doing:</p>
                <select size=5 name="cat">
                <option value="Pain">Pain</option>
                <option value="Fatigue">Fatigue</option>
                <option value="Mood">Mood</option>
                <option value="Wellbeing">Wellbeing</option>
                </select>
                <input type="submit" value="OK" />
                </form>
                </div>
                <div style="width:540px; float:left; padding-left:10px;">
                <p>You will be able to customize the measure you create. If you select <b>Pain</b>, for example, you will be able to customize a scale to measure any type of pain, such as a ten-point scale of "fibromyalgia" or "nerve pain," or a five-point scale of "arthritis," "headaches," "TMJ," or any other type of pain. For each scale you create, you will have an opportunity to select words to correspond with each level of your scale, such as "mild," “distracting,” “burning,” or “agony.”</p>
                </div>
                <div style="clear:both;"></div>
                
                <div style="width: 200px; float:left;">
                <form action="track.php?loc=create" method="post">
                <input type="hidden" name="action" value="Add Independent" />
                <input type="hidden" name="step" value="1" />
                <p>Select a category to track:</p>
                <select size=6 name="cat">
                <option value="Environment">Environment</option>
                <option value="Pacing">Pacing</option>
                <option value="Sleep">Sleep</option>
                <option value="Exercise">Exercise</option>
                <option value="Medication">Medications</option>
                <option value="Other">Other</option>
                </select>
                <input type="submit" value="OK" />
                </form>
                </div>
                <div style="float: left; width: 540px; padding-left:10px;">
                <p><b>Environment</b> allows you to include a daily measure of the weather or your living environment (such as family or work stress).</p>
                <p><b>Pacing</b> allows you to track your engagement in activities that require energy, such as work, shopping, gardening, housework, being on your feet, or any other activity you define, as well as recuperative activities such as meditating, napping, massage therapy, or any other ways you pace yourself.</p>
                <p><b>Sleep</b>, <b>Exercise</b>, and <b>Medication</b> allow you to include these categories in your survey.</p>
                <p><b>Other</b> is for factors you want to track but are not included here (such as diet).</p>
                </div>
                 <div style="clear:both;"></div>
                </div>
                    <?
			}
			else
			{
				?>
				<form action="track.php?loc=create" method="post">
				<input type="hidden" name="action" value="Add Category" />
				<input type="hidden" name="step" value="2" />
				<input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
                
				<p>In this step, you will decide how many categories you would like to include in your rating scale.</p> 
				<p>Once you do this, you will have additional options to customize the name and characteristics of this measure in your survey.</p>
				<p>First, choose a number that feels intuitive to you.</p>
                <p>For example, if you are accustomed to a ten-point scale, select ten. Or, if you think about your days as coming in two types, such as "good" and "horrible," select a two-point scale. Consider for yourself the number that would be easiest for you to track and best represents the variation in your experience. </p>
				
				<select name="fields" size=10>
				<?php
				$query = "select fields from categories where category = '$_POST[cat]' group by fields order by fields asc";
				$sql = mysql_query($query) or handle_error(mysql_error());
				while( $row = mysql_fetch_array($sql) )
				{
                    $displaynumber = $row['fields'];                    
					echo "<option value=$row[fields]>$displaynumber</option>\n";
				}
				?>
				</select>
				<input type="submit" value="OK" />
				</form>
                <form action="track.php?loc=create" method="post">
             <input type="hidden" name="action" value="Add Category" />
				
                <input type="submit" value="Go Back">
                </form>
            </div>
                 <div style="clear:both;"></div>
                </div>
				<?php
			}
		}
		else if($_POST['step'] == "2" )
		{
			?>
			<form action="track.php?loc=create" method="post">
			<input type="hidden" name="action" value="Add Category" />
			<input type="hidden" name="step" value="3" />
			<input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
            <input type="hidden" name="fields" value="<?php echo $_POST['fields'];?>" />
            
            <?php
            
            if( $_POST['fields'] == "" )
            {
                ?>
                <p><b>You must first select the number of categories you would like in your scale.  (Please go back one step.)</b></p>
                <form action="track.php?loc=create" method="post">
                <input type="hidden" name="action" value="Add Category" />
                <input type="hidden" name="step" value="1" />
                <input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
                <input type="submit" value="Go Back" />
                </form>
                </div>
                <?php
            }
            else
            {
            
                switch($_POST['cat'])
                {
                    case "Pain":
                    ?>
                    <p>Next, you have the option of customizing your scale. Instead of "pain," you might decide to measure "headaches," "morning pain," "nerve pain," or any other meaningful way to consider your experience with pain.</p>
					<p>If you would like to rename your pain measure, type in a new name here. <input name="displayname" value="Pain" />
                    <p>You can also decide to create multiple measures of pain by returning to this menu and creating additional customized pain measures.</p>
                    <p>For example, you might create one measure called "morning pain" and then another called "evening pain,"
                    or you might track "headaches" separate from "back pain," or other categories that best capture your experience with pain.
                    (You can track as many personalized "pain" measures as you want.)</p>
					<p>(For guidance on conceptualizing your pain measure, consult chapter 6 on tracking your well-being and specifically pages 44-49 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i>)</p>

                    <?php
                    
                    break;
                    
                    case "Fatigue":
                    ?>
                    <p>Next, you have the option of customizing your scale. Instead of "fatigue," you might decide to measure "exhaustion," "energy," "mental fatigue," or any other meaningful way to consider your experience with fatigue.</p>
					<p>If you would like to rename your fatigue measure, type in a new name here. <input name="displayname" value="Fatigue" /></p>
                    <p>You can also decide to create multiple measures of fatigue by returning to this menu and creating additional customized fatigue measures.</p>
                    <p>For example, you might create one measure called "morning fatigue" and then another called "evening fatigue;"
                    or you might decide to track "sleepiness" separate from "fogginess," or whatever categories best capture your experience with fatigue.
                    (You can track as many personalized measures of "fatigue" as you want.)</p>
					<p>(For guidance on conceptualizing your fatigue measure, consult chapter 6 on tracking your well-being and specifically pages pages 48-50 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i>)</p>
                  
                    <?php
                    break;
                    
                    case "Mood":
                    ?>
                    <p>Next, you have the option of customizing your mood scale. Instead of "mood," you might decide to track your "attitude," "outlook," or any other meaningful way to consider your mood.</p>
					<p>If you would like to rename your mood measure, type in a new name here. <input name="displayname" value="Mood" /></p>
                    <p>You can also decide to create additional mood-related measures by returning to this menu and creating additional customized measures of mood.</p>
					For example, you might want to measure your "best mood" of the day and another for your "lowest mood" to capture the range of your experience.</p>
                    <p>(For guidance on considering measures of your mood, consult chapter 6 on tracking your well-being and specifically pages 50-51 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i>)</p>
                   
                    <?php
                    break;
                    
                    case "Wellbeing":
                    ?>
                    <p>Next, you have the option of customizing your measre of general well-being. Instead of "well-being," you might decide your "satisfaction," "health," "comfort," "peace," or "mindfulness."</p> 
					<p>If you would like to rename your measure of well-being, type in a new name here. <input name="displayname" value="Wellbeing" /></p>
                    <p>Consider the word that best captures what you would like to experience. </p>
                    <p>You can also decide to track additional measures of your well-being by returning to this menu and creating additional personalized measure of well-being. </p>
                    <p>For example, you might include a measure of your "work comfort" and another for "home comfort," 
                    or measures of "relationship satisfaction," "acceptance," or whatever measures seem most important to you.
                    (You can track as many personalized "well-being" measures as you want.)</p>
                    <p>For guidance on thinking about your well-being, consult chapter 6 on tracking your well-being and specifically pages 51-54 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i></p>

                    <?php
                    break;
                }
                
                
                    ?>
                
                <p>Finally, select the word that best describes your experience with each number in your scale. 
                These words will be the ones that appear in your survey, along with the numbers, to rate your <b><?php echo $_POST['cat']?></b> level.</p>
                <?
                $query = "select options, rank from categories where fields = $_POST[fields] and category = '$_POST[cat]' order by rank asc";
                $sql = mysql_query($query) or die(mysql_error());
                if( $_POST['fields'] > 5 )
                {
                    //If there's 11 ranks (mainly for pain) then split them 6-5 instead of 5-6.
                    if( mysql_num_rows($sql) == 11 )
                    {
                        $end = 6;
                    }
                    else
                    {
                        $end = 5;
                    }
                    ?>
                    <div class="fieldstop" style="clear:both;">
                    <?php
                    for( $i=0; $i<$end; $i++ )
                    {
                        $row = mysql_fetch_array($sql);
                        $options = explode(";", $row['options']);
                        echo "<div class=\"field\" style=\"float:left; margin-left: 10px;\"><p>$row[rank]</p><select size=10 name=\"rank$row[rank]\">";
                        foreach( $options as $option )
                        {
                            if( $option != "" )
                            {
                                echo "<option value=\"$option\">$option</option>";
                            }
                        }
                        echo "</select></div>";
                    }
                    echo "</div>";
                    
                }
                ?>
                <div class="fieldsbottom" style="clear:both;">
                <?php
                
                while($row = mysql_fetch_array($sql))
                {
                    $options = explode(";", $row['options']);
                    echo "<div class=\"field\" style=\"float:left; margin-left: 10px;\"><p>$row[rank]</p><select size=10 name=\"rank$row[rank]\">";
                    foreach( $options as $option )
                    {
                        if( $option != "" )
                        {
                            echo "<option value=\"$option\">$option</option>";
                        }
                    }
                    echo "</select></div>";
                }
                ?>
                </div><div style="clear:both;" ><input type="submit" value="Finish"></form>
                <form action="track.php?loc=create" method="post">
                <input type="hidden" name="action" value="Add Category" />
                <input type="hidden" name="step" value="1" />
                <input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
                <input type="submit" value="Go Back" />
                </form>
                </div>
                </div>
                <?php
            }
		}
        else if( $_POST['step'] == "3" )
        {
            $cat_id = $_POST['cat'];
            $query = "select options, rank from categories where fields = $_POST[fields] and category = '$_POST[cat]' order by rank asc";
			$sql = mysql_query($query) or die(mysql_error());
            $options = "";
            $empty = false;
            while( $row = mysql_fetch_array($sql) )
            {
                $rank_name = "rank$row[rank]";
                $options .= "$row[rank]:".$_POST[$rank_name]."|";
                if( $_POST[$rank_name] == "" )
                {
                    $empty = true;
                    echo "<p><b>You must select a word for each level</b></p>";
                    break;
                }
            }
            if( $_POST['displayname'] == "" )
            {
                $empty = true;
                echo "<p><b>You must enter a name for your tracking category</b></p>";
            }
            
            //echo $options;
            if( $empty )
            {
            
                
                ?>
                
                <form action="track.php?loc=create" method="post">
                <?php
                switch($_POST['cat'])
                {
                    case "Pain":
                    ?>
                    <p>Next, you have the option of customizing your scale. Instead of "pain," you might decide to measure "headaches," "morning pain," "nerve pain," or any other meaningful way to consider your experience with pain.</p>
					<p>If you would like to rename your pain measure, type in a new name here. <input name="displayname" value="Pain" />
                    <p>You can also decide to create multiple measures of pain by returning to this menu and creating additional customized pain measures.</p>
                    <p>For example, you might create one measure called "morning pain" and then another called "evening pain,"
                    or you might track "headaches" separate from "back pain," or other categories that best capture your experience with pain.
                    (You can track as many personalized "pain" measures as you want.)</p>
					<p>(For guidance on conceptualizing your pain measure, consult chapter 6 on tracking your well-being and specifically pages 44-49 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i>)</p>

                    <?php
                    
                    break;
                    
                    case "Fatigue":
                    ?>
                    <p>Next, you have the option of customizing your scale. Instead of "fatigue," you might decide to measure "exhaustion," "energy," "mental fatigue," or any other meaningful way to consider your experience with fatigue.</p>
					<p>If you would like to rename your fatigue measure, type in a new name here. <input name="displayname" value="Fatigue" /></p>
                    <p>You can also decide to create multiple measures of fatigue by returning to this menu and creating additional customized fatigue measures.</p>
                    <p>For example, you might create one measure called "morning fatigue" and then another called "evening fatigue;"
                    or you might decide to track "sleepiness" separate from "fogginess," or whatever categories best capture your experience with fatigue.
                    (You can track as many personalized measures of "fatigue" as you want.)</p>
					<p>(For guidance on conceptualizing your fatigue measure, consult chapter 6 on tracking your well-being and specifically pages pages 48-50 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i>)</p>

                    
                    <?php
                    break;
                    
                    case "Mood":
                    ?>
                    
					<p>Next, you have the option of customizing your mood scale. Instead of "mood," you might decide to track your "attitude," "outlook," or any other meaningful way to consider your mood.</p>
					<p>If you would like to rename your mood measure, type in a new name here. <input name="displayname" value="Mood" /></p>
                    <p>You can also decide to create additional mood-related measures by returning to this menu and creating additional customized measures of mood.</p>
					For example, you might want to measure your "best mood" of the day and another for your "lowest mood" to capture the range of your experience.</p>
                    <p>(For guidance on considering measures of your mood, consult chapter 6 on tracking your well-being and specifically pages 50-51 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i>)</p>
                  
                    
                    <?php
                    break;
                    
                    case "Wellbeing":
                    ?>
                    
					<p>Next, you have the option of customizing your measre of general well-being. Instead of "well-being," you might decide your "satisfaction," "health," "comfort," "peace," or "mindfulness."</p> 
					<p>If you would like to rename your measure of well-being, type in a new name here. <input name="displayname" value="Wellbeing" /></p>
                    <p>Consider the word that best captures what you would like to experience. </p>
                    <p>You can also decide to track additional measures of your well-being by returning to this menu and creating additional personalized measure of well-being. </p>
                    <p>For example, you might include a measure of your "work comfort" and another for "home comfort," 
                    or measures of "relationship satisfaction," "acceptance," or whatever measures seem most important to you.
                    (You can track as many personalized "well-being" measures as you want.)</p>
                    <p>For guidance on thinking about your well-being, consult chapter 6 on tracking your well-being and specifically pages 51-54 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i></p>
                    
                    <?php
                    break;
                }
            
            
                ?>
                <input type="hidden" name="action" value="Add Category" />
                <input type="hidden" name="step" value="3" />
                <input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
                <input type="hidden" name="fields" value="<?php echo $_POST['fields'];?>" />
                <p>Scales are often easier to use when they have words associated with them.
                Please choose a word that best describes your experience at each level of your <b><?php echo $_POST['cat']?></b> scale.
                These words will be the ones used in your survey to rate your pain level.</p>
                <?
                $query = "select options, rank from categories where fields = $_POST[fields] and category = '$_POST[cat]' order by rank asc";
                $sql = mysql_query($query) or die(mysql_error());
                if( $_POST['fields'] > 6 )
                {
                    ?>
                    <div class="fieldstop" style="clear:both;">
                    <?php
                    for( $i=0; $i<6; $i++ )
                    {
                        $row = mysql_fetch_array($sql);
                        $options = explode(";", $row['options']);
                        echo "<div class=\"field\" style=\"float:left; margin-left: 10px;\"><p>$row[rank]</p><select size=10 name=\"rank$row[rank]\">";
                        foreach( $options as $option )
                        {
                            if( $option != "" )
                            {
                                echo "<option value=\"$option\">$option</option>";
                            }
                        }
                        echo "</select></div>";
                    }
                    echo "</div>";
                    
                }
                ?>
                <div class="fieldsbottom" style="clear:both;">
                <?php
                
                while($row = mysql_fetch_array($sql))
                {
                    $options = explode(";", $row['options']);
                    echo "<div class=\"field\" style=\"float:left; margin-left: 10px;\"><p>$row[rank]</p><select size=10 name=\"rank$row[rank]\">";
                    foreach( $options as $option )
                    {
                        if( $option != "" )
                        {
                            echo "<option value=\"$option\">$option</option>";
                        }
                    }
                    echo "</select></div>";
                }
                ?>
                </div><div style="clear:both;" ><input type="submit" value="Finish"></form>
                <form action="track.php?loc=create" method="post">
                <input type="hidden" name="action" value="Add Category" />
                <input type="hidden" name="step" value="1" />
                <input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
                <input type="submit" value="Go Back" />
                </form>
                </div>
                </div>
                <?php
            
            }
            else
            {
                $query = "insert into user_track(user_id, category_id, options, fields, current, sub_category, display_name) values ($user_id, '$cat_id', '$options', $_POST[fields], 1, 'Daily Wellbeing', '$_POST[displayname]')";
                //echo $query;
                mysql_query($query) or die(mysql_error());
                ?>
                

                <form action="track.php?loc=create" method="post">
                <input type="hidden" name="action" value="Add Category" />
                <input type="hidden" name="step" value="1" />
                <p>You've successfully created a way to track how you are doing each day. If you wish, you can create another measure of daily well-being below.</p>
                
                <select size=10 name="cat">
                <option value="Pain">Pain</option>
                <option value="Fatigue">Fatigue</option>
                <option value="Mood">Mood</option>
                <option value="Wellbeing">Wellbeing</option>
                </select>
                <input type="submit" value="OK" />
                </form>
                
                <p>Or you can start taking your tracking survey by <a href="track.php?loc=dailys">clicking here.</a></p>
                
                 <div style="clear:both;"></div>
                </div>
                <?php
            }
            
        }
		
	}
	else if( $_POST['action'] == "Edit Category" )
	{   
    
        $query = "select * from user_track where user_id = $user_id";
        $sql = mysql_query($query) or handle_error(mysql_error());
        if( !isset($_POST['cat'] ) )
        {
            ?>
            <p>Below are the categories you are currently tracking.  Select the one you wish to edit.</p>
            <form action="track.php?loc=create" method="post">
            <input type="hidden" name="action" value="Edit Category">
            <?php
            
            
           
			echo "<select size=8 name=\"cat\">";
			while($row = mysql_fetch_array($sql) )
			{  
                $category = $row['display_name'];
                if( $row['current'] != 1 )
                {
                    echo "<option value=$row[id]>$category (inactive)</option>\n";
                }
                else
                {
                    echo "<option value=$row[id]>$category</option>";
                }
			}
			?></select>
            <input type="submit" value="OK">
            </form>
             <div style="clear:both;"></div>
            </div>
            <?php
        
        }
        else if( !isset($_POST['step'] ) )
        {
            $cat_id = $_POST['cat'];
            //get Category information from database
            $query = "select * from user_track where id = $cat_id";
            $sql = mysql_query($query) or die(mysql_error());
            $row = mysql_fetch_array($sql);
            if( $row['sub_category'] == "Daily Wellbeing" )
            {
                $options = explode("|", $row['options']);
                //print_r($options);
                echo "<p>You are currently tracking $row[display_name] with $row[fields] number of options.  These options are:</p><ul>";
                foreach( $options as $option )
                {
                    $opt = explode(":", $option);
                    if( $opt[0] != "" )
                    {
                        echo "<li>$opt[0] - $opt[1]</li>";
                    }
                }
                echo "</ul>";
                echo "<p>If you just wish to change the labels with this category, click the change labels button below.  If you wish to change the number of options as well as the labels, click the Change Number button below.</p>";
                echo "<p>Changing just the labels will keep all previous data intact.  However, if you change the number of options for this category, the old data will be saved as an inactive category and a new category will be created.</p>";
                echo "<p>If you decided you liked the old number of labels better, you can always delete or inactivate the new category, and reactivate the old one.</p>";
                ?>
                <form action="track.php?loc=create" method="post">
                <input type="hidden" name="cat" value="<?php echo $cat_id;?>" />
                <input type="hidden" name="step" value="1">
                <input type="hidden" name="action" value="Edit Category">
                <input type="submit" name="change" value="Change Labels">
                <input type="submit" name="change" value="Change Number">
                </form>
                 <div style="clear:both;"></div>
                </div>
                <?php
            }
            else
            {
                ?>
                <p>We are sorry, editting this variable is currently not supported.  Please remove the variable, and then re-add with the new options.</p></div>
                <?php
            }
        }
        else if( $_POST['step'] == 1 )
        {
            $cat_id = $_POST['cat'];
            if( $_POST['change'] == "Change Labels" )
            {
                ?>
                <form action="track.php?loc=create" method="post">
                <input type="hidden" name="cat" value="<?php echo $cat_id;?>" />
                <input type="hidden" name="step" value="3">
                <input type="hidden" name="action" value="Edit Category">
                <input type="hidden" name="change" value="Change Labels">
                <?php
                //get user labels from DB
                $query = "select * from user_track where id = '$cat_id'";
                $sql = mysql_query($query) or die(mysql_error());
                $row = mysql_fetch_array($sql);
                ?>
                <input type="hidden" name="catname" value="<?php echo $row['category_id'];?>">
                
                <input type="hidden" name="fields" value="<?php echo $row['fields'];?>">
                <?php
                $options = explode("|",$row['options']);
                $optarray = array();
                
                foreach( $options as $option )
                {
                    $opt = explode(":",$option);
                    if( $opt[0] != "" )
                        $optarray[$opt[0]]=$opt[1];
                }
;
                //get all labels from DB for this category/fields info
                ?>
                    <p>Please select the word you wish to use for each level of <input name="displayname" value="<?php echo $row['display_name'];?>"></p>
                <?
                $query = "select options, rank from categories where fields = $row[fields] and category = '$row[category_id]' order by rank asc";
                $sql = mysql_query($query) or die(mysql_error());
                if( $_POST['fields'] > 6 )
                {
                    ?>
                    <div class="fieldstop" style="clear:both;">
                    <?php
                    for( $i=0; $i<6; $i++ )
                    {
                        $row = mysql_fetch_array($sql);
                        $options = explode(";", $row['options']);
                        echo "<div class=\"field\" style=\"float:left; margin-left: 10px;\"><p>$row[rank]</p><select size=10 name=\"rank$row[rank]\">";x;
                        foreach( $options as $option )
                        {
                            if( trim($optarray[$row['rank']]) == trim($option) )
                            {
                                echo "<option selected=\"selected\" value=\"$option\">$option</option>";
                            }
                            else
                            {
                                echo "<option value=\"$option\">$option</option>";
                            }
                        }
                        echo "</select></div>\n";
                    }
                    echo "</div>";
                    
                }
                ?>
                <div class="fieldsbottom" style="clear:both;">
                <?php
                
                while($row = mysql_fetch_array($sql))
                {
                    $options = explode(";", $row['options']);
                    echo "<div class=\"field\" style=\"float:left; margin-left: 10px;\"><p>$row[rank]</p><select size=10 name=\"rank$row[rank]\">";
                    foreach( $options as $option )
                    {
                        if( trim($optarray[$row['rank']]) == trim($option) )
                        {
                            echo "<option selected=\"selected\" value=\"$option\">$option</option>";
                        }
                        else
                        {
                            echo "<option value=\"$option\">$option</option>";
                        }
                    }
                    echo "</select></div>";
                }
                ?>
                </div><div style="clear:both;" ><input type="submit" value="Finish"></div></form>
                </div>
                <?php
            }
            else
            {   
                //change number and labels

                $query = "select * from user_track where id = $cat_id";
                $sql = mysql_query($query) or die(mysql_error());
                $row = mysql_fetch_array($sql);
                ?>
                <form action="track.php?loc=create" method="post">
				<input type="hidden" name="action" value="Edit Category" />
				<input type="hidden" name="step" value="2" />
				<input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
                <input type="hidden" name="catname" value="<?php echo $row['category_id'];?>" />
                <input type="hidden" name="displayname" value="<?php echo $row['display_name'];?>">
				<p>How many categories would you like to include in your personal <b><?php echo $_POST['cat'];?></b> scale?  Choose a number that feels intuitive to you. </p>
                <p>For example, if you are accustomed to a ten-point scale, select ten. Or, if you think about your days as coming in two types, such as "good" and "horrible," select a two-point scale. Consider for yourself the number that would be easiest for you to track and best represents the variation in your experience. </p>
				
				<select name="fields" size=6>
				<?php
				$query = "select fields from categories where category = '$row[category_id]' group by fields order by fields asc";
				$sql = mysql_query($query) or handle_error(mysql_error());
				while( $row = mysql_fetch_array($sql) )
				{
                    $displaynumber = $row['fields']+1;                    
					echo "<option value=$row[fields]>$displaynumber</option>\n";
				}
				?>
				</select>
				<input type="submit" value="OK" />
				</form>
                 <div style="clear:both;"></div>
                </div>
                <?php
            }
        }
        else if( $_POST['step'] == 2 )
        {
            $cat_id = $_POST['cat'];
            ?>
			<form action="track.php?loc=create" method="post">
			<input type="hidden" name="action" value="Edit Category" />
			<input type="hidden" name="step" value="3" />
            <input type="hidden" name="change" value="Change Number" />
			<input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
            <input type="hidden" name="fields" value="<?php echo $_POST['fields'];?>" />
            <input type="hidden" name="catname" value="<?php echo $_POST['catname'];?>" />
			<p>Please select the new words you wish to use for each level of <input type="hidden" name="displayname" value="<?php echo $row['display_name'];?>"></p>
			<?
			$query = "select options, rank from categories where fields = $_POST[fields] and category = '$_POST[catname]' order by rank asc";
			$sql = mysql_query($query) or die(mysql_error());
			if( $_POST['fields'] > 6 )
			{
				?>
				<div class="fieldstop" style="clear:both;">
				<?php
				for( $i=0; $i<6; $i++ )
				{
					$row = mysql_fetch_array($sql);
					$options = explode(";", $row['options']);
					echo "<div class=\"field\" style=\"float:left; margin-left: 10px;\"><p>$row[rank]</p><select size=10 name=\"rank$row[rank]\">";x;
					foreach( $options as $option )
					{
						echo "<option value=\"$option\">$option</option>";
					}
					echo "</select></div>";
				}
				echo "</div>";
				
			}
			?>
			<div class="fieldsbottom" style="clear:both;">
			<?php
			
			while($row = mysql_fetch_array($sql))
			{
				$options = explode(";", $row['options']);
				echo "<div class=\"field\" style=\"float:left; margin-left: 10px;\"><p>$row[rank]</p><select size=10 name=\"rank$row[rank]\">";
				foreach( $options as $option )
				{
					echo "<option value=\"$option\">$option</option>";
				}
				echo "</select></div>";
			}
			?>
            </div><div style="clear:both;" >
            <p>Reminder: This change will set the current tracking category to inactive, and replace it with the newly defined labels.  If you wish to undo this change, you will have to reactivate the old category.</p>
            <input type="submit" value="Finish"></div></form>
            </div>
			<?php
        }
        else if( $_POST['step'] == 3 )
        {   
            $cat_id = $_POST['cat'];
            //update database with new category or new category labels.
            if( $_POST['change'] == "Change Labels")
            {
                $cat_id = $_POST['cat'];
                $query = "select options, rank from categories where fields = $_POST[fields] and category = '$_POST[catname]' order by rank asc";
                $sql = mysql_query($query) or die(mysql_error());
                $options = "";
                while( $row = mysql_fetch_array($sql) )
                {
                    $rank_name = "rank$row[rank]";
                    $options .= "$row[rank]:".$_POST[$rank_name]."|";
                }
                $query = "update user_track set options='$options', display_name='$row[display_name]' where id = $cat_id and user_id = $user_id";
                mysql_query($query) or die(mysql_error());
                ?>
                <p>Category Updated!</p>
                 <div style="clear:both;"></div>
                </div>
                <?php
            }
            else
            {
                $cat_id = $_POST['cat'];
                $query = "select options, rank from categories where fields = $_POST[fields] and category = '$_POST[catname]' order by rank asc";
                $sql = mysql_query($query) or die(mysql_error());
                $options = "";
                while( $row = mysql_fetch_array($sql) )
                {
                    $rank_name = "rank$row[rank]";
                    $options .= "$row[rank]:".$_POST[$rank_name]."|";
                }
                //echo $options;
                
                $query = "insert into user_track(user_id, category_id, options, fields, current, sub_category, display_name) values ($user_id, '$_POST[catname]', '$options', $_POST[fields], 1, 'Daily Wellbeing', '$row[display_name]')";
                //echo $query;
                mysql_query($query) or die(mysql_error());
                $query = "update user_track set current = 0 where id = $cat_id and user_id = $user_id";
                mysql_query($query) or die(mysql_error());
                ?>
                <p>Old Category Deactivated!</p>
                <p>New Category Added!</p>
                 <div style="clear:both;"></div>
                </div>
                <?php
            }
        }
	}
    else if( $_POST['action'] == "Remove Medication" )
    {
        foreach($_POST['med'] as $med_id )
        {
            $query = "delete from user_medications_answers where medication_id=$med_id";
            mysql_query($query) or die(mysql_error());
            $query = "delete from user_medications where user_id = $user_id and id = $med_id";
            mysql_query($query) or die(mysql_error());
        }
        ?>
        <p>Medications Removed!</p>
        
        <div style="clear:both;"></div>
        </div>
        <?php
    }
	else if( $_POST['action'] == "Remove Category" )
	{   
        if( !isset($_POST['cat']) )
        {
            $query = "select * from user_track where user_id = $user_id";
        $sql = mysql_query($query) or handle_error(mysql_error());
            ?>
            <p>Below are the categories you are currently tracking.  Select the one you wish to remove.</p>
            <form action="track.php?loc=create" method="post">
            <input type="hidden" name="action" value="Remove Category">
            <?php
            
            
           
			echo "<select size=8 name=\"cat\">";
			while($row = mysql_fetch_array($sql) )
			{  
                $category = $row['display_name'];
                if( $row['current'] != 1 )
                {
                    echo "<option value=$row[id]>$category (inactive)</option>\n";
                }
                else
                {
                    echo "<option value=$row[id]>$category</option>";
                }
			}
			?></select>
            <input type="submit" value="OK">
            </form>
            <?php
                $query = "select * from user_medications where user_id = $user_id";
                $sql = mysql_query($query) or die(mysql_error());
                if( mysql_num_rows($sql) > 0 )
                {
                   ?><p>You are also currently tracking the following medications.  If you'd like to remove medications, select them from below and click Remove.</p>
                     <p>This will remove all medication information, including past data.  Medication removal is not recoverable.</p>
                    <form action="track.php?loc=create" method="post">
                    <input type="hidden" name="action" value="Remove Medication">
                    <select name="med[]" size=8 multiple='multiple'>
                    <?php
                    while($row = mysql_fetch_array($sql) )
                    {
                        echo "<option value='$row[id]'>$row[medication]";
                        if( $row['units'] != "")
                        {
                            echo " ($row[units])";
                        }
                        echo "</option>";
                    }
                    ?>
                    </select>
                    <input type="submit" value="Remove">
                    </form>
                    <?php
                }
            ?>
             <div style="clear:both;"></div>
            </div>
            <?php
        }
        else if( !isset($_POST['submit']) )
        {
        ?><p>There are two ways to remove a category. You can completely remove it by clicking "Remove," this will remove the category from your profile entirely, including all data and label settings. Or, you can select "Inactive," and the category will no longer show up in your questionnaire, but previously collected data will be left intact in case you wish to track this category in the future. Please select the appropriate option below.</p>
          <form action="track.php?loc=create" method="post">
		  <input type="hidden" name="action" value="Remove Category" />
          <input type="hidden" name="step" value="1" />
          <input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
          <input type="Submit" name="submit" value="Remove"> <input type="Submit" name="submit" value="Make Inactive">
          </form>
           <div style="clear:both;"></div>
          </div>
        <?php
        }
        else
        {
            $cat_id = $_POST['cat'];
            if( $_POST['submit'] == "Remove" )
            {
                
                //remove category
                $query = "delete from user_track where user_id=$user_id and id = $cat_id";
                mysql_query($query) or die(mysql_error());
                if( mysql_affected_rows() == 0 )
                {
                    //category doesn't match user_id, abort
                    echo "<p>You do not have permission to delete this category.  If you feel this is in error, please contact the administrator at admin@paintracking.com</p>";
                }
                else
                {
                    $query = "delete from user_survey_answers where category_id = $cat_id";
                    mysql_query($query) or die(mysql_error());
                    ?>
                    <p>Category has been completely removed!</p>
                     <div style="clear:both;"></div>
                    </div>
                    <?php
                }
            }
            else
            {
                //inactivate category
                $query = "update user_track set current = 0 where id = $cat_id and user_id = $user_id";
                mysql_query($query) or die(mysql_error());
                ?>
                
                <p>Category has been set to inactive.</p>
                 <div style="clear:both;"></div>
                </div>
                <?php
            }
        }
	}
    else if( $_POST['action'] == "Reactivate Category" )
    {
        if( !isset($_POST['step']) )
        {
             $query = "select * from user_track where user_id = $user_id and current = 0";
                $sql = mysql_query($query) or handle_error(mysql_error());
        ?><p>Please select a deactivated category from the list below to reactivate:</p>
          <form action="track.php?loc=create" method="post">
          
          <input type="hidden" name="action" value="Reactivate Category">
          <input type="hidden" name="step" value=1>
          <select name="cat" size=10>
          <?php
          while($row = mysql_fetch_array($sql) )
          {
            echo "<option value=$row[id]>$row[display_name]</option>";
          }
          ?>
          <input type="submit" value="Yes, reactivate"> | <a href="track.php?loc=create">No, take me back to the editor</a>
          </form>
           <div style="clear:both;"></div>
          </div>
          <?php
        }
        else
        {
            if( $_POST['cat'] != "" )
            {
                $query = "select category_id from user_track where user_id = $user_id and id = $_POST[cat]";
                $sql = mysql_query($query) or die(mysql_error());
                $row = mysql_fetch_array($sql);
                $catname = $row['category_id'];
                $query = "update user_track set current = 1 where user_id = $user_id and id=$_POST[cat]";
                mysql_query($query) or die(mysql_error());
                ?>
                <p>Category Reactivated!</p>
                 <div style="clear:both;"></div>
                </div>
                <?php
            }
            else
            {
                ?><p>Please select a deactivated category from the list below to reactivate:</p>
                  <form action="track.php?loc=create" method="post">
                  
                  <input type="hidden" name="action" value="Reactivate Category">
                  <input type="hidden" name="step" value=1>
                  <select name="cat" size=10>
                  <?php
                  while($row = mysql_fetch_array($sql) )
                  {
                    echo "<option value=$row[category_id]>$row[display_name]</option>";
                  }
                  ?>
                  <input type="submit" value="Yes, reactivate"> | <a href="track.php?loc=create">No, take me back to the editor</a>
                  </form>
                   <div style="clear:both;"></div>
                  </div>
                  <?php
            }
        }
    }
	else if( $_POST['action'] == "Reset Data" )
	{
        if( !isset($_POST['step']) )
        {
        ?><p>Are you certain you want to reset your data?  This will remove all created categories and all survey data from your user profile.  This action is not reversible.  The site administrators will be unable to recover your data, for security reasons.</p>
          <form action="track.php?loc=create" method="post">
          <input type="hidden" name="step" value=1 />
          <input type="hidden" name="action" value="Reset Data" />
          <input type="submit" value="DELETE all my data!"> | <a href="track.php?loc=create">No, return me to the editor</a>
          </form>
           <div style="clear:both;"></div>
          </div><?php
        }
        else
        {
            $query = "select * from user_surveys where user_id = $user_id";
            $sql = mysql_query($query) or die(mysql_error());
            echo "<p>Deleting survey responses...</p>";
            while( $row = mysql_fetch_array($sql) )
            {
                $query = "delete from user_survey_answers where survey_id = $row[id]";
                mysql_query($query) or die(mysql_error());
                $query = "delete from user_medications_answers where survey_id = $row[id]";
                mysql_query($query) or die(mysql_error());
                
            }
            $query = "delete from user_surveys where user_id = $user_id";
            mysql_query($query) or die(mysql_error());
            echo "<p>Deletion complete!</p>";
            echo "<p>Deleting categories...</p>";
            $query = "delete from user_track where user_id = $user_id";
           
            mysql_query($query) or die(mysql_error());
            $query = "delete from user_medications where user_id = $user_id";
            mysql_query($query) or die(mysql_error());
            echo "<p>Deletion complete!</p>";
            echo "<p>All data reset!</p>";
            echo "</div>";
        }
	}

}



?>