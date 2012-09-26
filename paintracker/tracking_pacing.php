<?php


function add_pacing($user_id)
{
    $step = $_POST['step'];
    ?>
       <form action="track.php?loc=create" method="post">
       
       <?php
       if( isset($_POST['firsttime'] ) )
       {
        ?>
            <input type="hidden" name="firsttime" value="1" />
        <?php
       }
    switch($step)
    {
        
       case 1:
            //TODO: Filter out already tracked categories
            ?>
            
            <input type="hidden" name="action" value="Add Independent">
            <input type="hidden" name="cat" value="Pacing">
            <input type="hidden" name="step" value="2">
            
            <p>Think about what is most important for you to know about how you pace yourself.</p> 
            <p>Select <b>Activity</b> if you want to track your activity level in general, or in specific kinds of activity (such as walking, work, standing, running errands).</p>
			<p>
            <p>If you want to record <b>Rest Breaks</b>, consider what matters most:</p>
			<ul>
			<p><li>If you are most interested in counting the times a day you rest, select <b>number</b>.</li></p> 
			<p><li>If you are most interested in the effect of how long you rested, select <b>length</b>. This gives you the options of measuring rest breaks in general or  time spent in specific types of breaks, such as naps, meditation, watching television, or hot baths.</p></li>
			<p><li>If you are most interested in when you take breaks, select <b>time of day</b>. This gives you the options of noting the time of day you spent resting, or in specific restful activities, such as napping, meditating, in a hot bath.</p></li>
			</ul><p>
			<p>There are many ways to record pacing.</p>
			<p>Start simply, and adjust the categories to see what works for you.</p>
		
            <p>For guidance, consult chapter 7 on measuring explanatory factors and specifically pages 64-71 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i></p>

            <select name="subcat" size="6">
            <option>Activity</option>
			<option>Rest Breaks (number)</option>
            <option>Rest Breaks (length)</option>            	
            <option>Rest Breaks (time of day)</option>
            </select><br>
            <input type="submit" value="OK" />
            </form>
            
            <?php
            if( !isset($_POST['firsttime'] ) )
            {
            ?>
                <form action="track.php?loc=create" method="post">
                <input type="hidden" name="action" value="Add Category">
                <input type="submit" value="Go Back" />
                </form>
            <?php
            }
            
            
       break;
       
       case 2:
            ?>
            
            <input type="hidden" name="action" value="Add Independent">
            <input type="hidden" name="cat" value="Pacing">
            <input type="hidden" name="subcat" value="<?php echo $_POST['subcat'];?>">
            <?php
            switch($_POST['subcat'])
            {
                case "":
                    ?>
                    <input type="hidden" name="step" value="2">
                    <p><b>You must select a sub-category before continuing.</b></p>
                    <p>Think about what is most important for you to know about how you pace yourself.</p> 
                    <p>Select <b>Activity</b> if you want to track your activity level in general, or in specific kinds of activity (such as walking, work, standing, running errands).</p>
                    <p>
                    <p>If you want to record <b>Rest Breaks</b>, consider what matters most:</p>
                    <ul>
                    <p><li>If you are most interested in counting the times a day you rest, select <b>number</b>.</li></p> 
                    <p><li>If you are most interested in the effect of how long you rested, select <b>length</b>. This gives you the options of measuring rest breaks in general or  time spent in specific types of breaks, such as naps, meditation, watching television, or hot baths.</p></li>
                    <p><li>If you are most interested in when you take breaks, select <b>time of day</b>. This gives you the options of noting the time of day you spent resting, or in specific restful activities, such as napping, meditating, in a hot bath.</p></li>
                    </ul><p>
                    <p>There are many ways to record pacing.</p>
                    <p>Start simply, and adjust the categories to see what works for you.</p>
                
                    <p>For guidance, consult chapter 7 on measuring explanatory factors and specifically pages 64-71 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i></p>

                    <select name="subcat" size="6">
                    <option>Activity</option>
                    <option>Rest Breaks (number)</option>
                    <option>Rest Breaks (length)</option>            	
                    <option>Rest Breaks (time of day)</option>
                    </select><br>
                    <input type="submit" value="OK" />
                    </form>
                    
                    <?php
                    if( !isset($_POST['firsttime'] ) )
                    {
                    ?>
                        <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Category">
                        <input type="submit" value="Go Back" />
                        </form>
                    <?php
                    }
                break;             
                
                case "Activity":
                     ?>
                    
                    <p>You can use this scale to measure your activity level in general.
                    Or, if you would like to rename this to represent more specific activity, type in a new name here: <input name="displayname" value="Activity">.</p>  
                    <p>You can also create additional measures of "activity," renaming each to correspond with the activities you want to track,
                    such as "socializing," "standing," "housework," "errand," "writing," "gardening," "driving," or "working."</p>
                    <p>(You can create as many personalized measures of activities as you want.)</p>

                    
                    <p>Please select the word you wish to use for each level of Activity</p>  
                    <input type="hidden" name="actscale" value="5">
                     <div class="field" style="float:left; margin-left: 10px;"><p>0</p>
                     <select name="choices[0]" size="7">
                    
                     <option>none</option>
                     <option>in bed</option>
                     <option>negligible</option>
                     <option>avoidant</option>
                     <option>inactive</option>
					 <option>inert</option>
					 <option>couldn't</option>

                     </select>
                     </div>
                     
                     <div class="field" style="float:left; margin-left: 10px;"><p>1</p>
                     <select name="choices[1]" size="7">
                    
                     <option>minimal</option>
                     <option>low</option>
                     <option>budged</option>
                     <option>little</option>
					 <option>not much</option>
					 <option>tried, but couldn't</option>
					 <option>wouldn't</option>

                     </select>
                     </div>
                     
                     <div class="field" style="float:left; margin-left: 10px;"><p>2</p>
                     <select name="choices[2]" size="7">
                     
                     <option>some</option>
                     <option>moderate</option>
                     <option>reasonable</option>
                     <option>average</option>
                     <option>engaged</option>
                     <option>active</option>
					 <option>struggled</option>
                     
                     </select>
                     </div>
                     
                     <div class="field" style="float:left; margin-left: 10px;"><p>3</p>
                     <select name="choices[3]" size="7">
                   
                     <option>a lot</option>
                     <option>active</option>
                     <option>full</option>
                     <option>busy</option>
                     <option>high</option>
                     <option>push</option>
                     <option>very active</option>
                     
                     </select>
                     </div>
                     
                     <div class="field" style="float:left; margin-left: 10px;"><p>4</p>
                     <select name="choices[4]" size="7">
                    
                     <option>tons!</option>
                     <option>in motion</option>
                     <option>too much</option>
                     <option>super</option>
                     <option>excess</option>
                     <option>pushed!!</option>
                     <option>too active</option>
                     </select>
                     </div>
                     
                     <div style="clear: both;">&nbsp;</div>
                     <input type="submit" value="Done">
                     <input type="hidden" name="step" value="4">
                     </form>
                   
                        <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Independent">
                        <input type="hidden" name="cat" value="Pacing">
                        <input type="hidden" name="step" value="1">
                        <input type="submit" value="Go Back" />
                        
                    <?php
                    if( isset($_POST['firsttime'] ) )
                    {
                    ?>
                        <input type="hidden" name="firsttime" value="1" />
                    <?php
                    }
                    echo "</form>";
                         
                
                break;
                    
                case "Rest Breaks (length)":
                    ?>
                    
                    <p>If you would like to rename this to measure time spent on a more specific use of down time,
                    such as "nap" or "meditation" or other rejuvenating activity, type in a new name here: <input name="displayname" value="Rest Breaks (length)">.</p>   
                    <p>If you want to measure the length of time of additional rest breaks, you can create as additional "length" measures,
                    renaming each to reflect what matters to you. For example, you could record the length of each short naps you take throughout the day by creating "nap1" and then "nap2," and so on.</p>
                    <p>Or if you want to record the amount of time you spend on various restorative activities, you could create and rename variables to reflect uses of down time,
                    such as "nap," "visualization," "slow breath," "meditation," "TV," "massage," "hot bath," or whatever you want to try to feel better. </p>   
                    <p>(You can create as many personalized measures of time spent on rest breaks as you want.)</p>

                    
                    <p>Hold down 'control'ù key (the Ctrl or Apple button) and click on times you want to include on your survey for the length of rest breaks. 
					<p>Select only those that are reasonable for you -- the fewer options, the faster the survey! (Make sure you include zero.)</p>
                    <select name="choices[]" multiple="multiple" size=10>
                    <option selected="selected">none</option>
                    <option selected="selected">30 seconds</option>
                    <option selected="selected">1 min</option>
                    <option selected="selected">2 min</option>
                    <option selected="selected">5 min</option>
                    <option selected="selected">10 min</option>
                    <option selected="selected">15 min</option>
                    <option selected="selected">20 min</option>
                    <option selected="selected">30 min</option>
                    <option selected="selected">45 min</option>
                    <option selected="selected">1 hour</option>
                    <option selected="selected">1.5 hours</option>
                    <option selected="selected">2 hours</option>
					<option selected="selected">2.5 hours</option>
                    <option selected="selected">3 hours</option>
                    <option selected="selected">4 hours</option>
					<option selected="selected">5 hours</option>
					<option selected="selected">6 hours</option>				
                    </select>
                    
                    <input type="submit" value="Done">
                     <input type="hidden" name="step" value="4">
                    </form>
                        <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Independent">
                        <input type="hidden" name="cat" value="Pacing">
                        <input type="hidden" name="step" value="1">
                        <input type="submit" value="Go Back" />
                    <?php
                    if( isset($_POST['firsttime'] ) )
                    {
                    ?>
                        <input type="hidden" name="firsttime" value="1" />
                    <?php
                    }
                    echo "</form>";
                    
                break;
                
                case "Rest Breaks (number)":
                    ?>
                    <p>This will allow you to record the number of rest breaks that you take. If you would like to rename this to count a more specific use of down time,
                    such as "nap" or "meditate" you can type in a new name here: <input name="displayname" value="Rest Breaks (number)">.</p>        

                    
                    <p>Hold down 'control'ù key (the Ctrl or Apple button) and click on numbers you want to include on your survey for the number of rest breaks you might take in a day.</p>
					<p>Select only those that are reasonable for you -- the fewer options, the faster the survey! (Make sure you include zero.)</p>
                    <select name="choices[]" multiple="multiple" size="10">
                    <option selected="selected">0</option>
                    <option selected="selected">1</option>
                    <option selected="selected">2</option>
                    <option selected="selected">3</option>
                    <option selected="selected">4</option>
                    <option selected="selected">5</option>
                    <option selected="selected">6</option>
                    <option selected="selected">7</option>
                    <option selected="selected">8</option>
                    <option selected="selected">9</option>
                    <option selected="selected">10</option>
                    </select>
                    
                    <input type="submit" value="Done">
                     <input type="hidden" name="step" value="4">
                     </form>
                    
                        <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Independent">
                        <input type="hidden" name="cat" value="Pacing">
                        <input type="hidden" name="step" value="1">
                        <input type="submit" value="Go Back" />
                     <?php
                    if( isset($_POST['firsttime'] ) )
                    {
                    ?>
                        <input type="hidden" name="firsttime" value="1" />
                    <?php
                    }
                    echo "</form>";
                    
                break;
                
                case "Rest Breaks (time of day)":
                     ?>
                    <p>If you would like to rename this to measure a more specific use of down time, such as "nap,"
                    "meditation" or other rejuvenating activity, type in a new name here: <input name="displayname" value="Rest Breaks (time of day)" >.</p>   
                    <p>If you want to include the time of day for more than one rest break, you can create additional "time of day" measures,
                    and then rename them to reflect what matters to you. For example, you could record the time of day you devote to "napping,"
                    "visualization," "slow breath," "meditation," "TV," "massage," "hot bath," or whatever you would like to try to feel better.</p> 
                    <p>(You can create as many personalized measures of the time of day of your rest breaks as you want.)</p.>

                     
                    <p>Hold down 'control' key ù(the Ctrl or Apple button) and click on the words you want to include on your survey for the times of day you might take a rest break.</p>
                    <p>Select only those categories that you want on your tracking tool. </p>
                    <select name="choices[]" multiple="multiple" size="7">
                    <option selected="selected">none</option>
					<option selected="selected">morning</option>
                    <option selected="selected">noon</option>
                    <option selected="selected">afternoon</option>
                    <option selected="selected">evening</option>
                    <option selected="selected">night</option>
                    
                    </select>
                    
                    <input type="submit" value="Done">
                     <input type="hidden" name="step" value="4">
                     </form>
                    
                    
                        <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Independent">
                        <input type="hidden" name="cat" value="Pacing">
                        <input type="hidden" name="step" value="1">
                        <input type="submit" value="Go Back" />
                    <?php
                    if( isset($_POST['firsttime'] ) )
                    {
                    ?>
                        <input type="hidden" name="firsttime" value="1" />
                    <?php
                    }
                    echo "</form>";
                    
                break;
                
                
            }
       break;
       case 3:
           

       break;
       case 4:
            if( $_POST['subcat'] == "Activity" )
            {
                if( $_POST['actscale' ] == 3 )
                {
                    $options = "0:".$_POST['choices'][0]."|1:".$_POST['choices'][1]."|2:".$_POST['choices'][2];
                }
                else
                {
                    $options = "0:".$_POST['choices'][0]."|1:".$_POST['choices'][1]."|2:".$_POST['choices'][2]."|3:".$_POST['choices'][3]."|4:".$_POST['choices'][4];
                }
                $fields = $_POST['actscale'];
                if( $_POST['choices'][0]=="" || $_POST['choices'][1]=="" || $_POST['choices'][2]=="" || $_POST['choices'][3]=="" || $_POST['choices'][4] == "" )
                {
                    ?>
                    
                    
                    <p><b>You must select a word for each level</b></p>
                    
                    <p>You can use this scale to measure your activity level in general.
                    Or, if you would like to rename this to represent more specific activity, type in a new name here: <input name="displayname" value="Activity">.</p>  
                    <p>You can also create additional measures of "activity," by returning to this menu and renaming "activity" to correspond with each specific activity you want to track,
                    such as "socializing," "standing," "housework," "errand," "writing," "gardening," "driving," or "working."</p>
                    <p>(You can create as many personalized measures of activities as you want.)</p>
                    
                    <input type="hidden" name="action" value="Add Independent">
                    <input type="hidden" name="cat" value="Pacing">
                    <input type="hidden" name="subcat" value="<?php echo $_POST['subcat'];?>">
                    
                    <input type="hidden" name="actscale" value="5">
                    <p>Please select the word you wish to use for each level of Activity</p>  
                     <div class="field" style="float:left; margin-left: 10px;"><p>0</p>
                     <select name="choices[0]" size="7">
                    
					 <option>none</option>
                     <option>in bed</option>
                     <option>negligible</option>
                     <option>avoidant</option>
                     <option>inactive</option>
					 <option>inert</option>
					 <option>couldn't</option>

                     </select>
                     </div>
                     
                     <div class="field" style="float:left; margin-left: 10px;"><p>1</p>
                     <select name="choices[1]" size="7">
                    
                     <option>minimal</option>
                     <option>low</option>
                     <option>budged</option>
                     <option>little</option>
					 <option>not much</option>
					 <option>tried, but couldn't</option>
					 <option>wouldn't</option>
                     </select>
                     </div>
                     
                     <div class="field" style="float:left; margin-left: 10px;"><p>2</p>
                     <select name="choices[2]" size="7">
                    
                     <option>some</option>
                     <option>moderate</option>
                     <option>reasonable</option>
                     <option>average</option>
                     <option>engaged</option>
                     <option>active</option>
					 <option>struggled</option>
                     
                     </select>
                     </div>
                     
                     <div class="field" style="float:left; margin-left: 10px;"><p>3</p>
                     <select name="choices[3]" size="7">
                    
                     <option>a lot</option>
                     <option>active</option>
                     <option>full</option>
                     <option>busy</option>
                     <option>high</option>
                     <option>push</option>
                     <option>very active</option>
                     
                     </select>
                     </div>
                     
                     <div class="field" style="float:left; margin-left: 10px;"><p>4</p>
                     <select name="choices[4]" size="7">
                     
                     <option>tons!</option>
                     <option>in motion</option>
                     <option>too much</option>
                     <option>super</option>
                     <option>excess</option>
                     <option>pushed!!</option>
                     <option>too active</option>
                     </select>
                     </div>
                     
                     <div style="clear: both;">&nbsp;</div>
                     <input type="submit" value="Done">
                     <input type="hidden" name="step" value="4">
                     </form>
                    
                        <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Independent">
                        <input type="hidden" name="cat" value="Pacing">
                        <input type="hidden" name="step" value="1">
                        <input type="submit" value="Go Back" />
                     <?php
                    if( isset($_POST['firsttime'] ) )
                    {
                    ?>
                        <input type="hidden" name="firsttime" value="1" />
                    <?php
                    }
                    echo "</form>";
                    
                
                    return;
                }
            }
            else if( $_POST['subcat'] == "Rest Breaks (number)")
            {
                $i = 0;
                $options = "";
                foreach( $_POST['choices'] as $choice )
                {
                    $options .= "$choice:$choice|";
                    $i++;
                }
                $fields = -1;
            }
            else
            {
                $options = implode($_POST['choices'], "|");
                $fields = 0;
            }
            $query = "insert into user_track(user_id, category_id, options, fields, current, sub_category, display_name) values ($user_id, '$_POST[subcat]', '$options', $fields, 1,  'Pacing', '$_POST[displayname]')";
            mysql_query($query) or die(mysql_error());
            
            end_form($_POST['displayname']);
       break;
    }
}

function edit_pacing($user_id)
{

}

function remove_pacing($user_id)
{

}

function display_pacing($user_id)
{

}

function end_form($cat)
{
    //TODO: Filter out already tracked categories
            if( isset($_POST['firsttime'] ) )
            {
            ?>
                <p>You have successfully created a variable to measure your <?php echo $cat;?>.</p>
                <p>At this point, you can take your survey for the first time <a href="track.php?loc=dailys">here.</a> Or, if you'd like to continue adding categories, press the button below.</p>
                <input type="hidden" name="action" value="Add Category">
                <input type="submit" name="submit" value="Add More Categories">
                </form>
            
            <?php
            }
            else
            {
                ?>
                <p>You have successfully created a variable to measure your <?php echo $cat;?>.</p>
                <input type="hidden" name="action" value="Add Independent">
                <input type="hidden" name="cat" value="Pacing">
                <input type="hidden" name="step" value="2">
                
                <p>Select a pacing category below to track</p>
                <select name="subcat" size="6">
                <option>Activity</option>
                <option>Rest Breaks (number)</option>
				<option>Rest Breaks (length)</option>              
				<option>Rest Breaks (time of day)</option>
                </select><br>
                <input type="submit" value="OK" />
                </form>

                
                <?php
            if( !isset($_POST['firsttime'] ) )
            {
            ?>
                <form action="track.php?loc=create" method="post">
                <input type="hidden" name="action" value="Add Category">
                <input type="submit" value="Go Back to Categories" />
                </form>
                <p>Or you can start taking your tracking survey by <a href="track.php?loc=dailys">clicking here.</a></p>
                
            <?php
            }
            }
}