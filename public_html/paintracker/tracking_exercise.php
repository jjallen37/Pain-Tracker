<?php


function add_exercise($user_id)
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
            <input type="hidden" name="cat" value="Exercise">
            <input type="hidden" name="step" value="2">
            
            <p><b>Type</b> of exercise includes a list of types of exercise. It offers a simple way to choose a type of exercise (if any) you engaged in each day.
            If you want greater detail about your exercise, or engage in more than one type of exercise each day, use one of the other measures:</p>
            <p><b>Time exercising</b> allows you to record how long you exercise each day. You can also track how long you spent on <i>any</i> type or types of exercise.
			You can add as many measures as you would like so that you can track the time you spend on any relevant types of exercise.</p>
		    <p>For example, you can decide to create one measure for "walking," and then another for "yoga," "stretching," "swimming," "walking," "kickboxing," or whatever types of exercise you want to track.</p>
			<p>You also have the option of including a scale in your survey to record how you felt <b>during</b> or <b>after</b> exercise.
            These can be important reminders to help you adjust the intensity of your workout. If you want to include multiple measures
            of how you feel during or after exercising, you can rename these to reflect whatever you want.</p> 
			<p>For example, you might decide to record your exerperience with specific exercises, such as "while swimming" and "after swimming."</p>
			<p>Or, you might decide to include multiple measures of how you felt after exercise to see how this changes through the day, such as "right after" and "3 hours after," or any other measure that would be meaningful for you. </p>
            <p>For guidance, consult chapter 7 on measuring explanatory factors and specifically pages 71-76 in Paintracking: Your Personal Guide to Living Well with Chronic Pain.</p>

            
            <p>Select an <b>exercise</b> category below to track</p>
            <select name="subcat" size="6">
            <option>Type</option>
            <option>Time exercising</option>
            <option>Effects during</option>
            <option>After-effects</option>
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
            <input type="hidden" name="cat" value="Exercise">
            <input type="hidden" name="subcat" value="<?php echo $_POST['subcat'];?>">
            <?php
            switch($_POST['subcat'])
            {
                case "":
                ?>
                
                <input type="hidden" name="step" value="2">
                 <p><b>You must select a sub-category before continuing.</b></p>
                <p><b>Type</b> of exercise includes a list of types of exercise. It offers a simple way to choose a type of exercise (if any) you engaged in each day.
                If you want greater detail about your exercise, or engage in more than one type of exercise each day, use one of the other measures:</p>
                <p><b>Time exercising</b> allows you to record how long you exercise each day. You can also track how long you spent on <i>any</i> type or types of exercise.
                You can add as many measures as you would like so that you can track the time you spend on any relevant types of exercise.</p>
                <p>For example, you can decide to create one measure for "walking," and then another for "yoga," "stretching," "swimming," "walking," "kickboxing," or whatever types of exercise you want to track.</p>
                <p>You also have the option of including a scale in your survey to record how you felt <b>during</b> or <b>after</b> exercise.
                These can be important reminders to help you adjust the intensity of your workout. If you want to include multiple measures
                of how you feel during or after exercising, you can rename these to reflect whatever you want.</p> 
                <p>For example, you might decide to record your exerperience with specific exercises, such as "while swimming" and "after swimming."</p>
                <p>Or, you might decide to include multiple measures of how you felt after exercise to see how this changes through the day, such as "right after" and "3 hours after," or any other measure that would be meaningful for you. </p>
                <p>For guidance, consult chapter 7 on measuring explanatory factors and specifically pages 71-76 in Paintracking: Your Personal Guide to Living Well with Chronic Pain.</p>

                
                <p>Select an <b>exercise</b> category below to track</p>
                <select name="subcat" size="6">
                <option>Type</option>
                <option>Time exercising</option>
                <option>Effects during</option>
                <option>After-effects</option>
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
                
                case "Type":
                    ?>
                    
                    <p>This is a simple measure of daily exercise. If you want greater detail about your experience with exercise, Go Back and select <b>time</b> you spent exercising, or how you felt <b>during</b> or <b>afterwards</b>.</p>	
					<p>This measure is perfect if you exercise on some days (and not others) and engage in no more than one type of exercise each day.</p>
					<p>However, if you sometimes engage in more than one type of exercise each day, you can add another variable to capture subsequent types of exercise that day.</p>
					For example, you might call this measure, "First exercise" and then return to this menu and create "Second exercise" and so on. Or you might name them by time of day, such as "Morning exercise," and "Evening exercise, or whatever makes sense to you."
					
				 	<p>You can rename this measure here: <input name="displayname" value="Type"></p>
					
					<p>For each, you can include the same or different choices from the list below.</p>
					
					<p>To select the categories you want in your survey, hold down 'control'ù key (ctrl or Apple button) and click the words you want. (Make sure to select "none" as an option for days without exercise.)</p>
					<select name="choices[]" multiple="multiple" size=10>
                    <option>None</option>
					<option>Bicycling</option>
					<option>Calisthenics</option>
                    <option>Dancing</option>
					<option>Elliptical trainer</option>
                    <option>Free weights</option>
					<option>Gardening</option>
					<option>Hula hooping</option>
                    <option>Jogging</option>
                    <option>Martial arts</option>
                    <option>Pilates</option>
                    <option>Running</option>
					<option>Strength training</option>
					<option>Stretching</option>
                    <option>Stairmaster</option>
                    <option>Swimming</option>
                    <option>Walking</option>
                    <option>Water aerobics</option>
                    <option>Weight machines</option>
                    <option>Yoga</option>
                    </select>
                    
                    <input type="submit" value="Done">
                     <input type="hidden" name="step" value="4">
                     </form>
                        <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Independent">
                        <input type="hidden" name="cat" value="Exercise">
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
                    
                
                case "Time exercising":
                
                    ?>
                    <p>This will allow you to track the amount of time you spend exercising each day.</p>
					<p>If you want to track the time you engage in a particular type of exercise, such as "water aerobics" or "stretching," type in a new name here:<input name="displayname" value="Time exercising"></p>
                    <p>You can track additional types of exercise by returning to this menu and creating and renaming new measures.</p> 
					<p>For example, you might decide to track the time you spend "walking," and then return to create another for "swimming," "stretching," "yoga" or "kickboxing."</p>
					<p>(You can create as many personalized "minutes exercising" variables as you want.)</p>
                    <input type="submit" value="Done">
                     <input type="hidden" name="step" value="4">
                     </form>
                        <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Independent">
                        <input type="hidden" name="cat" value="Exercise">
                        <input type="hidden" name="step" value="1">
                        <input type="submit" value="Go Back" />
                        
                    <?php
                    if( isset($_POST['firsttime'] ) )
                    {
                    ?>
                        <input type="hidden" name="firsttime" value="1" />
                    <?php
                    }
                    
                   
                break;
                
                case "Effects during":

                
                case "After-effects":
                       ?>
                
                <input type="hidden" name="action" value="Add Independent">
                <input type="hidden" name="cat" value="Exercise">
                <input type="hidden" name="subcat" value="<?php echo $_POST['subcat'];?>">
                
                
                
                <?php

                if( $_POST['subcat'] == "Effects during" )
                {
                     ?>
                     
                    <p>How you feel during exercise can be important information to help motivate you to exercise or to adjust your workout.</p>
                    <p>If you want to track how you feel during a specific type of exercise, type in a new name here: <input name="displayname" value="Effects during exercise"></p>
                    <p>If you want to track how you feel when engaging in additional types of exercise, return to this menu and create a new measure. 
					For example, you could include how you feel while "walking," and then return to this menus to create another for "swimming," "stretching," "yoga," "weightlifting," or another other exercise you are doing.</p>
					<p>(You can create as many measures as you want of how you feel during exercise.)</p>

                    <p>Please select words to include in your survey that best represent the range of experiences you may feel while exercising. (One for each number in the scale.)</p>
                    
                     <?php
                }
                else
                {
                    ?>
                    <p>How you feel after exercise is important information to help you adjust your workout.</p>
                    <p>If you want to track how you feel after a specific type of exercise, such as "swimming" or "jogging," type in a new name here:  <input name="displayname" value="Effects after exercise"></p>
                    <p>If you want to record how you felt after different types of exercise, or at different times of the day, return to this menu and create additional measures.</p>  
					<p>For example, you could track after-effects of different types of exercise, as in: "post-swimming," "post-walking," or "post-jogging."</p> 
					<p>Or you might be interested in recording how you feel at specific intervals after exercise, as in "immediately," "after 3 hours," or any other measures that feel meaningful to you. 
					(You can create as many personalized "after effects" variables as you want.)</p>

                    
                    <p>Please select words to include in your survey that best represent the range of experiences you may feel after exercising. (One for each number in the scale.)</p>
					<?php
                }
                ?>
                                           
                        <input type="hidden" name="qscale" value="5">
                         <div class="field" style="float:left; margin-left: 10px;"><p>1</p>
                         <select name="choices[0]" size="7">
						 
                         <option>Great</option>
                         <option>Fantastic</option>
                         <option>Energetic</option>
                         <option>Optimistic</option>
                         <option>Happy</option>
                         <option>Upbeat</option>

                         </select>
                         </div>
                         
                         <div class="field" style="float:left; margin-left: 10px;"><p>2</p>
                         <select name="choices[1]" size="7">
                     
                         <option>Good</option>
                         <option>Agreeable</option>
                         <option>Enjoyable</option>
                         <option>Up</option>
                         <option>Pleased</option>
                         <option>Content</option>
                         </select>
                         </div>
                         
                         <div class="field" style="float:left; margin-left: 10px;"><p>3</p>
                         <select name="choices[2]" size="7">
                    
                         <option>Okay</option>
                         <option>Fine</option>
                         <option>Decent</option>
                         <option>Average</option>
                         <option>Neutral</option>
                         <option>Adequate</option>
                         
                         </select>
                         </div>
                         
                         <div class="field" style="float:left; margin-left: 10px;"><p>4</p>
                         <select name="choices[3]" size="7">
                      
                         <option>Sluggish</option>
                         <option>Tired</option>
                         <option>Weary</option>
                         <option>Down</option>
                         <option>Hard</option>
                         <option>Drowsy</option>
                         
                         </select>
                         </div>
                         
                         <div class="field" style="float:left; margin-left: 10px;"><p>5</p>
                         <select name="choices[4]" size="7">
                         <option>Struggling</option>
                         <option>Exhausted</option>
                         <option>Pained</option>
                         <option>Negative</option>
                         <option>Suffering</option>
                         <option>Drained</option>
                         </select>
                         </div>
                         
                         <div style="clear: both;">&nbsp;</div>
                         <input type="submit" value="Done">
                         <input type="hidden" name="step" value="4">
                         </form>
                         
                        <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Independent">
                        <input type="hidden" name="cat" value="Exercise">
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
            if( $_POST['subcat'] == "After-effects" || $_POST['subcat'] == "Effects during" )
            {
                /*if( $_POST['qscale' ] == 3 )
                {
                    $options = "1:".$_POST['choices'][0]."|2:".$_POST['choices'][1]."|3:".$_POST['choices'][2];
                }
                else*/
                if( $_POST['choices'][0]=="" || $_POST['choices'][1]=="" || $_POST['choices'][2]=="" || $_POST['choices'][3]=="" || $_POST['choices'][4] == "" )
                {
                   ?>
                    <input type="hidden" name="action" value="Add Independent">
                    <input type="hidden" name="cat" value="Exercise">
                    <input type="hidden" name="subcat" value="<?php echo $_POST['subcat'];?>">
                    <p><b>You must select a word from each box before continuing</b></p>
                    <?php
                    if( $_POST['subcat'] == "Effects during" )
                    {
                         echo "<p>Please select words to include in your survey that best represent the range of experiences you may feel while exercising. (One for each number in the scale.)</p>";
                    }
                    else
                    {
                        echo "<p>Please select words to include in your survey that best represent the range of experiences you may feel after exercising. (One for each number in the scale.)</p>";
                    }
                    ?>
                    
                         <input type="hidden" name="qscale" value="5">
                         <div class="field" style="float:left; margin-left: 10px;"><p>1</p>
                         <select name="choices[0]" size="7">
                      
                         <option>Great</option>
                         <option>Fantastic</option>
                         <option>Energetic</option>
                         <option>Optimistic</option>
                         <option>Happy</option>
                         <option>Upbeat</option>

                         </select>
                         </div>
                         
                         <div class="field" style="float:left; margin-left: 10px;"><p>2</p>
                         <select name="choices[1]" size="7">
                      
                         <option>Good</option>
                         <option>Agreeable</option>
                         <option>Enjoyable</option>
                         <option>Up</option>
                         <option>Pleased</option>
                         <option>Content</option>
                         </select>
                         </div>
                         
                         <div class="field" style="float:left; margin-left: 10px;"><p>3</p>
                         <select name="choices[2]" size="7">
                      
                         <option>Okay</option>
                         <option>Fine</option>
                         <option>Decent</option>
                         <option>Average</option>
                         <option>Neutral</option>
                         <option>Adequate</option>
                         
                         </select>
                         </div>
                         
                         <div class="field" style="float:left; margin-left: 10px;"><p>4</p>
                         <select name="choices[3]" size="7">
                     
                         <option>Sluggish</option>
                         <option>Tired</option>
                         <option>Weary</option>
                         <option>Down</option>
                         <option>Hard</option>
                         <option>Drowsy</option>
                         
                         </select>
                         </div>
                         
                         <div class="field" style="float:left; margin-left: 10px;"><p>5</p>
                         <select name="choices[4]" size="7">
                         <option>Struggling</option>
                         <option>Exhausted</option>
                         <option>Pained</option>
                         <option>Negative</option>
                         <option>Suffering</option>
                         <option>Drained</option>
                         </select>
                         </div>
                         
                         <div style="clear: both;">&nbsp;</div>
                         <input type="submit" value="Done">
                         <input type="hidden" name="step" value="4">
                         </form>
                         
                            <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Independent">
                        <input type="hidden" name="cat" value="Exercise">
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
                
                $options = "1:".$_POST['choices'][0]."|2:".$_POST['choices'][1]."|3:".$_POST['choices'][2]."|4:".$_POST['choices'][3]."|5:".$_POST['choices'][4];
                
                $fields = $_POST['qscale'];
            }
            else if( $_POST['subcat'] != "Time exercising" )
            {
                $options = implode($_POST['choices'], "|");
                $fields = 0;
            }
            
            if( $_POST['subcat'] == "Time exercising" )
            {
                    $options = "0:0 min|1:1 min|2:2 min|3:3 min |4:4 min|5:5 min|6:6 min|7:7 min|8:8 min|9:9 min|10:10 min|15:15 min|20:20 min|25:25 min|30:30 min|35:35 min|40:40 min|45:45 min|50:50 min|60:60 min|90:90 min|120:120 min|";
                    $fields = -1;
                    $query = "insert into user_track(user_id, category_id, options, fields, current, sub_category, display_name) values ($user_id, '$_POST[subcat]', '$options', $fields, 1, 'Exercise', '$_POST[displayname]')";
                    mysql_query($query) or die(mysql_error());
                   
                    end_form($_POST['subcat']);
            }
            else
            {
                
                $query = "insert into user_track(user_id, category_id, options, fields, current, sub_category, display_name) values ($user_id, '$_POST[subcat]', '$options', $fields, 1, 'Exercise', '$_POST[displayname]')";
                mysql_query($query) or die(mysql_error());
                
                end_form($_POST['subcat']);
            }
       break;
    }
}

function edit_exercise($user_id)
{

}

function remove_exercise($user_id)
{

}

function display_exercise($user_id)
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
                <input type="hidden" name="cat" value="Exercise">
                <input type="hidden" name="step" value="2">
                
               <p>Select an Exercise category below to track</p>
                <select name="subcat" size="6">
                <option>Type</option>
                <option>Time exercising</option>
                <option>Effects during</option>
                <option>After-effects</option>
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