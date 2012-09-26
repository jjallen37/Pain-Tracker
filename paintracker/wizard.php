<?php

function print_page($user_id)
{
    connect_db();
	if( !isset($_POST['step']) )
	{
        ?>
        <div class="ptright">
        <p>The first step is to select a way to measure your daily well-being. You will be recording this measure each day so you can evaluate your progress.</p>
		<p>You will be given options later to be more specific or to include additional measures of well-being.</p>
		<ul>
		<li>For example, within "pain," you might decide to track "migraines," "back pain," "nerve pain," or "arthritis," or any other pains.</li> 
		<p></p>
		<li>You'll also have the option of tracking more than one of these. Under fatigue, for example, you might decide to track "cognitive" <u>and</u> "physical" fatigue.</li> 
		</ul>
		<p>Look at the categories below, and choose the one you most want to understand and change in your life. Select the general category you want to start with:</p>
        <form action="track.php?loc=wizard" method="post">
        <input type="hidden" name="step" value="0">
        <select size=6 name="cat">
			<option value="Pain">Pain</option>
			<option value="Fatigue">Fatigue</option>
			<option value="Mood">Mood</option>
			<option value="Wellbeing">Wellbeing</option>
			</select>
        <input type="submit" value="OK">
        </form>
        </div>
        <?php
    }
    else if($_POST['step'] == 0 )
    {   
        if( $_POST['cat'] == "" )
        {
            ?>
            <div class="ptright">
            <p><b>You must pick a category to track.</b></p>
            <form action="track.php?loc=wizard" method="post">
            <input type="hidden" name="step" value="0">
            <select size=6 name="cat">
                <option value="Pain">Pain</option>
                <option value="Fatigue">Fatigue</option>
                <option value="Mood">Mood</option>
                <option value="Wellbeing">Wellbeing</option>
                </select>
            <input type="submit" value="OK">
            </form>
            </div>
            <?
        }
        else
        {
        ?>
            <div class="ptright">
                <form action="track.php?loc=wizard" method="post">
                <input type="hidden" name="step" value="1" />
				<input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
				<p>Now, select the number of categories that you would like to include in your personal <b><?php echo $_POST['cat'];?></b> scale. Choose a number that feels intuitive to you.</p>
                <p>For example, if you are accustomed to a ten-point scale, select ten. Or, if you think about your days as coming in two types, such as "good" and "horrible," select a two-point scale. Consider for yourself the number that would be easiest for you to track and best represents the variation in your experience. </p>
				<p>In the next step, you will select words to correspond with your numeric scale. You will also have the option to specify what you want to measure.</p> 
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
                <form action="track.php?loc=wizard" method="post">
                <input type="submit" value="Go Back">
                </form>
                </div>
                <?php
        }
    }
    else if($_POST['step'] == 1 )
    {
    
        if( $_POST['fields'] == "" )
        {
            ?>
            <div class="ptright">
            <p><b>You must first select the number of categories you would like in your scale.  (Please go back one step.)</b></p>
            <form action="track.php?loc=wizard" method="post">
                 <input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
                 <input type="hidden" name="step" value=0 />
                    <input type="submit" value="Go Back">
                    </form>
            </div>
            <?php
        }
        else
        {
                ?>
                <div class="ptright">
                <form action="track.php?loc=wizard" method="post">
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
                <p>Finally, select the word that best describes your experience with each number in your scale. 
                These words will be the ones that appear in your survey, along with the numbers, to rate your <b><?php echo $_POST['cat']?></b> level.</p>
                       
                <input type="hidden" name="step" value="2">
                <input type="hidden" name="fields" value="<?php echo $_POST['fields'];?>" />
                <input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
                <?php
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
                </div><div style="clear:both;" ><input type="submit" value="OK"></form>
                <form action="track.php?loc=wizard" method="post">
                 <input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
                 <input type="hidden" name="step" value=0 />
                    <input type="submit" value="Go Back">
                    </form>
                </div>
                </div>
                <?php
            }
    }
    else if( $_POST['step'] == 2 )
    {
            ?>
            <div class="ptright">
            <form action="track.php?loc=wizard" method="post">
            <?php
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
              
                
                <?php
                switch($_POST['cat'])
                {
                    case "Pain":
                    ?>
                    <p>>Next, you have the option of customizing your scale. Instead of "pain," you might decide to measure "headaches," "morning pain," "nerve pain," or any other meaningful way to consider your experience with pain.</p>
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
                    
                    case "Fatigue":
                    ?>
                    <p>If you would like to call this something else, such as "energy" or "exhaustion," you can type in a new name here. <input name="displayname" value="Fatigue" /></p>
                    <p>You can track additional personalized measures of your experience with fatigue by returning to this menu
                    and clicking on “fatigue” to create a new measure. </p>
                    <p>For example, you might create one measure called "morning fatigue" and then another called "evening fatigue;"
                    or you might decide to track "sleepiness" separate from "fogginess," or whatever categories best capture your experience with fatigue.
                    (You can track as many personalized measures of "fatigue" as you want.)</p>
                    <p>For guidance, consult chapter 6 on tracking your well-being and specifically pages 48-50 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i></p>

                    
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
               
	   			<p>Finally, select the word that best describes your experience with each number in your scale. These words will be the ones that appear in your survey, along with the numbers, to rate your <b><?php echo $_POST['cat']?></b> level.</p>
                <input type="hidden" name="step" value="2">
                <input type="hidden" name="fields" value="<?php echo $_POST['fields'];?>" />
                <input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
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
                <form action="track.php?loc=wizard" method="post">
             <input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
             <input type="hidden" name="step" value=0 />
                <input type="submit" value="Go Back">
                </form>
           
                </div>
                </div>
                <?php
            
            }
            else
                {
                $query = "insert into user_track(user_id, category_id, options, fields, current, sub_category, display_name) values ($user_id, '$_POST[cat]', '$options', $_POST[fields], 1, 'Daily Wellbeing', '$_POST[displayname]')";
                //echo $query;
                mysql_query($query) or die(mysql_error());
                //TODO: Pull categories from database
                ?>
                </form>
                <p>You've successfully created a way to track how you are doing each day.</p>
				<p>You now have the opportunity to create another customizable measure of well-being from the list.</p>
				<p>Or, if you are ready to move on to the factors that affect how you feel (such as sleep quality, medications, and activity level), click "Move on to other factors" at the bottom.</p>
				
                <form action="track.php?loc=wizard" method="post">
                <input type="hidden" name="step" value="0">
                <select size=10 name="cat">
                    <option value="Pain">Pain</option>
                    <option value="Fatigue">Fatigue</option>
                    <option value="Mood">Mood</option>
                    <option value="Wellbeing">Wellbeing</option>
                    </select>
                <input type="submit" value="OK">
                </form>
                <p> <form action="track.php?loc=wizard" method="post"><input type="hidden" name="step" value="3"><input type="submit" value="Move on to other factors"></form> </p></div>
                <?php
            }
    }
    else if( $_POST['step'] == 3 )
    {
        ?> 
        <div class="ptright">
            <p>Now, consider the factors that you suspect are associated with how you feel. Begin by selecting the category of greatest interest. You will have opportunities to customize measures within any category you choose.</p>
			<p><b>Environment</b> variables include measures of temperature, weather conditions, and your living environment.</p>
			<p><b>Pacing</b> includes ways to measure your involvement in activities (such as work, errands, or socializing) and/or rest breaks (naps, meditation, massage, or other rejuvenating measures.)</p>
			<p><b>Sleep</b> allows you to record measures of your sleep quality and quantity.</p>
			<p><b>Exercise</b> allows you to record the extent to which in you engage in any exercise.</p>
			<p><b>Medication</b> allows you to record your use of medications.</p>
			<p><b>Remember: Start simply!</b> You can always add additional measures and edit the ones you have. Select what you most want to understand at this time. You can always amend your survey.</p>
			
			
            <form action="track.php?loc=create" method="post">
            <input type="hidden" name="action" value="Add Independent" />
            <input type="hidden" name="step" value="1" />
            <input type="hidden" name="firsttime" value="1" />
            <select size=10 name="cat">
            <option value="Environment">Environment</option>
            <option value="Pacing">Pacing</option>
            <option value="Sleep">Sleep</option>
            <option value="Exercise">Exercise</option>
            <option value="Medication">Medications</option>
            </select>
            <input type="submit" value="OK" />
            </form>
            </div>
            <?php
    }
}