<?php


function add_sleep($user_id)
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
            <form action="track.php?loc=create" method="post">
            <input type="hidden" name="action" value="Add Independent">
            <input type="hidden" name="cat" value="Sleep">
            <input type="hidden" name="step" value="2">
            
            <p>Consider the aspects of your sleep that you want to record and as discussed in the book, choose something that will not interfere with your sleep quality (for example, avoid getting up in the middle of the night to record sleep difficulties).</p>
            <p>You may decide to include in your survey the approximate time you went to bed or awoke, or both. Or you may prefer to estimate the time you spent asleep or note the quality of your sleep. </p>
            <p>For guidance, consult chapter 7 on measuring explanatory factors and specifically pages 71-76 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i></p>

            
            <select name="subcat" size="6">
            <option>Time to bed</option>
            <option>Awake</option>
            <option>Hours of sleep</option>
            <option>Quality of sleep</option>
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
            <form action="track.php?loc=create" method="post">
            <input type="hidden" name="action" value="Add Independent">
            <input type="hidden" name="cat" value="Sleep">
            <input type="hidden" name="subcat" value="<?php echo $_POST['subcat'];?>">
            <?php
            switch($_POST['subcat'])
            {
                case "":
                ?>
                <p><b>You must select a sub-category before continuing.</b></p>
                <input type="hidden" name="step" value="2">
            
            <p>Consider the aspects of your sleep that you want to record and as discussed in the book, choose something that will not interfere with your sleep quality (for example, avoid getting up in the middle of the night to record sleep difficulties).</p>
            <p>You may decide to include in your survey the approximate time you went to bed or awoke, or both. Or you may prefer to estimate the time you spent asleep or note the quality of your sleep. </p>
            <p>For guidance, consult chapter 7 on measuring explanatory factors and specifically pages 71-76 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i></p>

            
            <select name="subcat" size="6">
            <option>Time to bed</option>
            <option>Awake</option>
            <option>Hours of sleep</option>
            <option>Quality of sleep</option>
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
               
                case "Time to bed":
                    $options = "7:30 PM|8:00 PM|8:30 PM|9:00 PM|9:30 PM|10:00 PM|10:30 PM|11:00 PM|11:30 PM|12:00 AM|12:30 AM|1:00 AM|1:30 AM|2:00 AM|2:30 AM|3:00 AM|4:00 AM|4:30 AM|5:00 AM|5:30 AM|6:00 AM|6:30 AM|7:00 AM|7:30 AM|8:00 AM|8:30 AM|9:00 AM|9:30 AM|10:00 AM|10:30 AM|11:00 AM|11:30 AM|12:00 PM|12:30 PM|1:00 PM|1:30 PM|2:00 PM|2:30 PM|3:00 PM|3:30 PM|4:00 PM|4:30 PM|5:00 PM|5:30 PM|6:00 PM|6:30 PM|7:00 PM";
                    $fields = 0;
                    $query = "insert into user_track(user_id, category_id, options, fields, current, sub_category, display_name) values ($user_id, '$_POST[subcat]', '$options', $fields, 1, 'Sleep', '$_POST[subcat]')";
                    mysql_query($query) or die(mysql_error());
                    
                    end_form($_POST['subcat']);
                break;
                    
                case "Awake":
                    $options = "5:00 AM|5:30 AM|6:00 AM|6:30 AM|7:00 AM|7:30 AM|8:00 AM|8:30 AM|9:00 AM|9:30 AM|10:00 AM|10:30 AM|11:00 AM|11:30 AM|12:00 PM|12:30 PM|1:00 PM|1:30 PM|2:00 PM|2:30 PM|3:00 PM|3:30 PM|4:00 PM|4:30 PM|5:00 PM|5:30 PM|6:00 PM|6:30 PM|7:00 PM|7:30 PM|8:00 PM|8:30 PM|9:00 PM|9:30 PM|10:00 PM|10:30 PM|11:00 PM|11:30 PM|12:00 AM|12:30 AM|1:00 AM|1:30 AM|2:00 AM|2:30 AM|3:00 AM|3:30 AM|4:00 AM|4:30 AM|";
                    $fields = 0;
                    $query = "insert into user_track(user_id, category_id, options, fields, current, sub_category, display_name) values ($user_id, '$_POST[subcat]', '$options', $fields, 1, 'Sleep', '$_POST[subcat]')";
                    mysql_query($query) or die(mysql_error());
                   
                    end_form($_POST['subcat']);
                break;
                
                case "Hours of sleep":
                    $options = "0:0|1:1|2:2|3:3|4:4|5:5|6:6|7:7|8:8|9:9|10:10|11:11|12:12|13:13|14:14|15:15|16:16|17:17|18:18|19:19|20:20|21:21|22:22|23:23|24:24|";
                    $fields = -1;
                    $query = "insert into user_track(user_id, category_id, options, fields, current,sub_category, display_name) values ($user_id, '$_POST[subcat]', '$options', $fields, 1, 'Sleep', '$_POST[subcat]')";
                    mysql_query($query) or die(mysql_error());
                   
                    end_form($_POST['subcat']);

                break;
                
                case "Quality of sleep":
                    ?>
                 
                    <input type="hidden" name="action" value="Add Independent">
                    <input type="hidden" name="cat" value="Sleep">
                    <input type="hidden" name="subcat" value="<?php echo $_POST['subcat'];?>">
                    
                            <p>Please select the word you wish to use for each level of Quality of sleep</p>  
                            <input type="hidden" name="qscale" value="5">
                             <div class="field" style="float:left; margin-left: 10px;"><p>1</p>
                             <select name="choices[0]" size="7">
                     
                             <option>insomnia</option>
                             <option>poor</option>
                             <option>lousy</option>
                             <option>light</option>
                             <option>exhausted</option>
                             <option>non-restorative</option>
							 <option>up, most of night</option>

                             </select>
                             </div>
                             
                             <div class="field" style="float:left; margin-left: 10px;"><p>2</p>
                             <select name="choices[1]" size="7">
                     
                             
                             <option>fair</option>
                             <option>restless</option>
                             <option>troubled</option>
                             <option>unrefreshed</option>
                             <option>insufficient</option>
							 <option>interrupted</option>
							 <option>up, frequently</option>
                             </select>
                             </div>
                             
                             <div class="field" style="float:left; margin-left: 10px;"><p>3</p>
                             <select name="choices[2]" size="7">
                     
                             <option>decent</option>
							 <option>fair</option>
                             <option>okay</option>
                             <option>adequate</option>
                             <option>sufficient</option>
                             <option>average</option>
							 <option>up, occasionally</option>
                             
                             </select>
                             </div>
                             
                             <div class="field" style="float:left; margin-left: 10px;"><p>4</p>
                             <select name="choices[3]" size="7">
                     
                             <option>acceptable</option>                            
                             <option>good</option>
                             <option>fine</option>
                             <option>reasonable</option>
                             <option>rested</option>
                             <option>satisfactory</option>
							 <option>up, once or twice</option>
                             
                             </select>
                             </div>
                             
                             <div class="field" style="float:left; margin-left: 10px;"><p>5</p>
                             <select name="choices[4]" size="7">
                                 
							 <option>fantastic</option>
                             <option>solid</option>
                             <option>great</option>
                             <option>restful</option>
                             <option>deep</option>
                             <option>restorative</option>
                             <option>slept!</option>
                             </select>
                             </div>
                             
                             <div style="clear: both;">&nbsp;</div>
                             <input type="submit" value="Done">
                             <input type="hidden" name="step" value="4">
                             </form>
                             
                             <form action="track.php?loc=create" method="post">
                            <input type="hidden" name="action" value="Add Independent">
                            <input type="hidden" name="cat" value="Sleep">
                            <input type="hidden" name="step" value="1">
                            <input type="submit" value="Go Back" />
                            </form>
                             
                            <?php
                        
                break;
                           
                
            }
       break;
       case 3:
                

       break;
       case 4:
            
                if( $_POST['qscale' ] == 3 )
                {
                    $options = "1:".$_POST['choices'][0]."|3:".$_POST['choices'][1]."|5:".$_POST['choices'][2];
                }
                else
                {
                    $options = "1:".$_POST['choices'][0]."|2:".$_POST['choices'][1]."|3:".$_POST['choices'][2]."|4:".$_POST['choices'][3]."|5:".$_POST['choices'][4];
                }
                $fields = $_POST['qscale'];
            if( $_POST['choices'][0]=="" || $_POST['choices'][1]=="" || $_POST['choices'][2]=="" || $_POST['choices'][3]=="" || $_POST['choices'][4] == "" )
            {
                ?>
                    <p><b>You must select a word for each level</b></p>
                    <form action="track.php?loc=create" method="post">
            <input type="hidden" name="action" value="Add Independent">
            <input type="hidden" name="cat" value="Sleep">
            <input type="hidden" name="subcat" value="<?php echo $_POST['subcat'];?>">
                    <input type="hidden" name="action" value="Add Independent">
                    <input type="hidden" name="cat" value="Sleep">
                    <input type="hidden" name="subcat" value="<?php echo $_POST['subcat'];?>">
                    
                            <p>Please select the word you wish to use for each level of Quality of sleep</p>  
                            <input type="hidden" name="qscale" value="5">
                             <div class="field" style="float:left; margin-left: 10px;"><p>1</p>
                             <select name="choices[0]" size="7">
                      <option></option>
							<option>insomnia</option>
                            <option>poor</option>
                            <option>lousy</option>
                            <option>light</option>
                            <option>exhausted</option>
                            <option>non-restorative</option>
							<option>up, most of night</option>
                            <option>Non-restorative</option>

                             </select>
                             </div>
                             
                             <div class="field" style="float:left; margin-left: 10px;"><p>2</p>
                             <select name="choices[1]" size="7">
                      <option></option>
                             <option>fair</option>
                             <option>restless</option>
                             <option>troubled</option>
                             <option>unrefreshed</option>
                             <option>insufficient</option>
							 <option>interrupted</option>
							 <option>up, frequently</option>
                             </select>
                             </div>
                             
                             <div class="field" style="float:left; margin-left: 10px;"><p>3</p>
                             <select name="choices[2]" size="7">
                      <option></option>
                             <option>decent</option>
							 <option>fair</option>
                             <option>okay</option>
                             <option>adequate</option>
                             <option>sufficient</option>
                             <option>average</option>
							 <option>up, occasionally</option>
                             
                             </select>
                             </div>
                             
                             <div class="field" style="float:left; margin-left: 10px;"><p>4</p>
                             <select name="choices[3]" size="7">
                      <option></option>
                             <option>acceptable</option>                            
                             <option>good</option>
                             <option>fine</option>
                             <option>reasonable</option>
                             <option>rested</option>
                             <option>satisfactory</option>
							 <option>up, once or twice</option>                            
                             </select>
                             </div>
                             
                             <div class="field" style="float:left; margin-left: 10px;"><p>5</p>
                             <select name="choices[4]" size="7">
                      <option></option>
            				 <option>fantastic</option>
                             <option>solid</option>
                             <option>great</option>
                             <option>restful</option>
                             <option>deep</option>
                             <option>restorative</option>
                             <option>slept!</option>
                             </select>
                             </div>
                             
                             <div style="clear: both;">&nbsp;</div>
                             <input type="submit" value="Done">
                             <input type="hidden" name="step" value="4">
                             </form>
                             
                             <form action="track.php?loc=create" method="post">
                            <input type="hidden" name="action" value="Add Independent">
                            <input type="hidden" name="cat" value="Sleep">
                            <input type="hidden" name="step" value="1">
                            <input type="submit" value="Go Back" />
                            </form>
                            <?php
            }
            else
            {
                
                $query = "insert into user_track(user_id, category_id, options, fields, current, sub_category, display_name) values ($user_id, '$_POST[subcat]', '$options', $fields, 1, 'Sleep', '$_POST[subcat]')";
                mysql_query($query) or die(mysql_error());
                
                
                end_form($_POST['subcat']);
                }
       break;
    }
}

function edit_sleep($user_id)
{

}

function remove_sleep($user_id)
{

}

function display_sleep($user_id)
{

}

function end_form($cat)
{
    //TODO: Filter out already tracked categories
            if( isset($_POST['firsttime'] ) )
            {
                if($cat == "Awake" )
                {
                    echo "<p><b>You have successfully created a variable to measure the Time You Awake..</b></p>";
                }
                else
                {
                    echo "<p><b>You have successfully created a variable to measure your $cat.</b></p>";
                }
            ?>
                
                
                
                <p>At this point, you can take your survey for the first time <a href="track.php?loc=dailys">here.</a> Or, if you'd like to continue adding categories, press the button below.</p>
                <input type="hidden" name="action" value="Add Category">
                <input type="submit" name="submit" value="Add More Categories">
                </form>
            
            <?php
            }
            else
            {
            
                 if($cat == "Awake" )
                    {
                        echo "<p><b>You have successfully created a variable to measure the Time You Awake.</b></p>";
                    }
                    else
                    {
                        echo "<p><b>You have successfully created a variable to measure your $cat.</b></p>";
                    }
                ?>
            
                

                <input type="hidden" name="action" value="Add Independent">
                <input type="hidden" name="cat" value="Sleep">
                <input type="hidden" name="step" value="2">
                
                <p>You can select a Sleep category below to track. 
                
                <p>Consider the aspects of your sleep that you want to record and as discussed in the book, choose something that will not interfere with your sleep quality (such as getting up in the middle of the night to record sleep difficulties).</p>
                <p>You may decide to include in your survey the approximate time you went to bed or awoke, or both. Or you may prefer to estimate the time you spent asleep or note the quality of your sleep. </p>
                <p>For guidance, consult chapter 7 on measuring explanatory factors and specifically pages 71-76 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i></p>

            
                <select name="subcat" size="6">
                <option>Time to bed</option>
                <option>Awake</option>
                <option>Hours of sleep</option>
                <option>Quality of sleep</option>
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