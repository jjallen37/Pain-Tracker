<?php


function add_environment($user_id)
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
            <input type="hidden" name="cat" value="Environment">
            <input type="hidden" name="step" value="2">
            
            <p>Select an environment category below to track</p>
            
            <p>You have several choices of how you might track environmental conditions. Consider the choices below to see which would best fit your needs.  </p>
            <p>
			<p>If you want to track temperature, choose between <b>Temperature in degrees</b> in which you would record an approximate daily temperature (as in 45 degrees),
            and <b>Temperature description</b> in which you would select words that range from "burning hot" to "bitter cold."</p>
            <p><b>Humidity</b> allows you to track the dampness of the day, with choices such as "arid," "muggy," "wet," and "pressure." </p>
            <p><b>Weather</b> provides descriptive words about the weather, such as "sunny," "stormy," or "clear." </p>
            <p><b>Day type</b> allows you to track temperature along with other weather conditions, ranging from "hot and dry" to "cold and stormy."</p>
            <p>You also have the option of representing your <b>Environment</b> more generally. You can rename this to represent what you see as most important,
            such as your "home environment," or "work environment." You will have the option to include more than one type of environment on your survey.
            <p>Consider the condition or conditions that seem most relevant to your experience.</p>
            <p>For guidance, consult chapter 7 on measuring explanatory factors and specifically pages 55-58 in Paintracking: Your Personal Guide to Living Well with Chronic Pain.</p>

            
            <select name="subcat" size="6">
            <option>Temperature in degrees</option>
            <option>Temperature description</option>
            <option>Humidity</option>
            <option>Weather</option>
            <option>Day Type</option>
            <option>Environment</option>
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
            <input type="hidden" name="cat" value="Environment">
            <input type="hidden" name="subcat" value="<?php echo $_POST['subcat'];?>">
            <?php
            switch($_POST['subcat'])
            {
                case "":
                ?>
                 <p><b>You must select a sub-category before continuing.</b></p>
                <input type="hidden" name="step" value="2">
            
            <p>Select an environment category below to track</p>
            
            <p>You have several choices of how you might track environmental conditions. Consider the choices below to see which would best fit your needs.  </p>
            <p>
			<p>If you want to track temperature, choose between <b>Temperature in degrees</b> in which you would record an approximate daily temperature (as in 45 degrees),
            and <b>Temperature description</b> in which you would select words that range from "burning hot" to "bitter cold."</p>
            <p><b>Humidity</b> allows you to track the dampness of the day, with choices such as "arid," "muggy," "wet," and "pressure." </p>
            <p><b>Weather</b> provides descriptive words about the weather, such as "sunny," "stormy," or "clear." </p>
            <p><b>Day type</b> allows you to track temperature along with other weather conditions, ranging from "hot and dry" to "cold and stormy."</p>
            <p>You also have the option of representing your <b>Environment</b> more generally. You can rename this to represent what you see as most important,
            such as your "home environment," or "work environment." You will have the option to include more than one type of environment on your survey.
            <p>Consider the condition or conditions that seem most relevant to your experience.</p>
            <p>For guidance, consult chapter 7 on measuring explanatory factors and specifically pages 55-58 in Paintracking: Your Personal Guide to Living Well with Chronic Pain.</p>

            
            <select name="subcat" size="6">
            <option>Temperature in degrees</option>
            <option>Temperature description</option>
            <option>Humidity</option>
            <option>Weather</option>
            <option>Day Type</option>
            <option>Environment</option>
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
                case "Temperature in degrees":
                    ?>
                    <p>Please select whether you wish to track temperature in Fahrenheit or Centigade</p>
                    <p>The goal is to include an approximation of the day (choices are in increments, rather than listing every single degree).</p>
                    <p>You can rename <input name="displayname" value="Temperature in degrees" /> if you want.
                    For example, you might want to rename this "morning temp" or "average temp" or whatever best represents what you desire to track.</p>

                    Fahrenheit <input type="radio" name="tempscale" value="f" selected="selected"><br>
                    Centigrade <input type="radio" name="tempscale" value="c"><br>
                    <input type="submit" value="Done">
                     <input type="hidden" name="step" value="4">
                     </form>
                     
                        <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Independent">
                        <input type="hidden" name="cat" value="Environment">
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
                    
                case "Temperature description":
                    ?>
                    <p>Hold down 'control'ù key (the Ctrl or Apple button) and click on words you want to include on your survey for Temperature description 
                    Keep it simple. Only select those you are likely to use when you describe the temperature.</p>
                    <p>You can rename <input name="displayname" value="Temperature description" /> if you want.
                    For example, you might want to rename this "morning temp" or "high temp" or whatever best represents what you desire to track.</p>
                    <select name="choices[]" multiple="multiple" size="7">
                    <option selected="selected">Burning</option>
                    <option selected="selected">Hot</option>
                    <option selected="selected">Warm</option>
                    <option selected="selected">Cold</option>
                    <option selected="selected">Brisk</option>
                    <option selected="selected">Chilly</option>
                    <option selected="selected">Freezing</option>
                    <option selected="selected">Bitter</option>
                    </select>
                    
                    <input type="submit" value="Done">
                     <input type="hidden" name="step" value="4">
                     </form>
                        <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Independent">
                        <input type="hidden" name="cat" value="Environment">
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
                
                case "Humidity":
                    ?>
                    <p>Hold down 'control'ù key (the Ctrl or Apple button) and click on words you want to include on your survey for Humidity 
                    Keep it simple. Only select those you are likely to use when you describe the dampness of the day.(Fewer choices, faster survey!)</p>
                    <p>You can rename <input name="displayname" value="Humidity" /> if you want.
                    For example, you might want to rename this "morning humidity" or "overall humidity" or whatever best represents what you desire to track.</p>
                    <select name="choices[]" multiple="multiple" size="7">
                    <option selected="selected">Arid</option>
                    <option selected="selected">Dry</option>
                    <option selected="selected">Humid</option>
                    <option selected="selected">Wet</option>
                    <option selected="selected">Pressure</option>
					 <option selected="selected">Barometric</option>
                    <option selected="selected">Damp</option>
                    <option selected="selected">Muggy</option>
                    <option selected="selected">Rain</option>
                    <option selected="selected">Snow</option>
                    </select>
                    
                    <input type="submit" value="Done">
                     <input type="hidden" name="step" value="4">
                     </form>
                       <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Independent">
                        <input type="hidden" name="cat" value="Environment">
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
                
                case "Weather":
                     ?>
                    <p>Hold down 'control'ù key (the Ctrl or Apple button) and click on words you want to include on your survey for Weather
                    Keep it simple. Only select those you are likely to use when you describe the dayís weather.</p>
                    <p>You can rename <input name="displayname" value="Weather" /> if you want.
                    For example, you might want to rename this "morning weather" or "average weather" or whatever best represents what you desire to track.(Fewer choices, faster survey!)</p>
                    <select name="choices[]" multiple="multiple" size="7">
                    <option selected="selected">Sun</option>
                    <option selected="selected">Clear</option>
                    <option selected="selected">Wind</option>
                    <option selected="selected">Cloudy</option>
                    <option selected="selected">Foggy</option>
                    <option selected="selected">Damp</option>
					<option selected="selected">Humid</option>
					<option selected="selected">Rain</option>
                    <option selected="selected">Snow</option>
                    <option selected="selected">Ice</option>
                    <option selected="selected">Storm</option>
                    </select>
                    
                    <input type="submit" value="Done">
                     <input type="hidden" name="step" value="4">
                     </form>
                       <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Independent">
                        <input type="hidden" name="cat" value="Environment">
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
                
                case "Day Type":
                
                                          ?>
                    <p>Hold down 'control'ù key (the Ctrl or Apple button) and click on words you want to include on your survey for Day Type</p>
                    <p>Keep it simple and intuitive. Only select those that you think are important in reporting weather conditions. (Fewer choices, faster survey!)</p>
                    <p>You can rename <input name="displayname" value="Day Type" /> if you want.</p>
                    <select name="choices[]" multiple="multiple" size="7">
                    <option selected="selected">Cold/sunny</option>
					<option selected="selected">Cold/clear</option>
                    <option selected="selected">Cold/dry</option>
                    <option selected="selected">Cold/muggy</option>
                    <option selected="selected">Cold/wet</option>
                    <option selected="selected">Cold/pressure</option>
                    <option selected="selected">Cold/storm</option>
					<option selected="selected">Warm/sunny</option>
                    <option selected="selected">Warm/clear</option>
                    <option selected="selected">Warm/dry</option>
                    <option selected="selected">Warm/muggy</option>
                    <option selected="selected">Warm/wet</option>
                    <option selected="selected">Warm/pressure</option>
                    <option selected="selected">Warm/storm</option>
                    <option selected="selected">Hot/sunny</option>
                    <option selected="selected">Hot/clear</option>
                    <option selected="selected">Hot/dry</option>
                    <option selected="selected">Hot/muggy</option>
                    <option selected="selected">Hot/wet</option>
                    <option selected="selected">Hot/pressure</option>
                    <option selected="selected">Hot/storm</option>
                    </select>
                    
                    <input type="submit" value="Done">
                     <input type="hidden" name="step" value="4">
                     </form>
                       <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Independent">
                        <input type="hidden" name="cat" value="Environment">
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
                
                case "Environment":
                     ?>
                     <p>Select the words that you would like associated with each level of your environment. </p>
                     <p>If you would like to call this something else, such as "home life" or "work life" you can type in a new name here: <input name="displayname" value="Environment" />.</p>  
                     <p>You can track additional environmental measures by returning to this menu and selecting environment, 
                     and then renaming it as desired. For example, you might create one variable to record your "work environment" 
                     and another for "home environment" or "family issues." (You can create as many personalized "environment" measures as you want.)</p>

                     
                     <div class="field" style="float:left; margin-left: 10px;"><p>1</p>
                     <select name="choices[0]" size="12">
                     <option>calm</option>
                    <option>friendly</option>
                    <option>helpful</option>
                    <option>ideal</option>
                    <option>peaceful</option>
                    <option>quiet</option>
                    <option>relaxed</option>
                    <option>serene</option>
                    <option>supportive</option>
                    <option>tranquil</option>
                    <option>gentle</option>
                    <option>soothing</option>

                     </select>
                     </div>
                     
                     <div class="field" style="float:left; margin-left: 10px;"><p>2</p>
                     <select name="choices[1]" size="12">
                    <option>decent</option>
                    <option>fairly calm</option>
                    <option>fairly comfortable</option>
                    <option>fairly peaceful</option>
                    <option>fairly upbeat</option>
                    <option>fine</option>
                    <option>mostly friendly</option>
                    <option>mostly helpful</option>
                    <option>mostly positive</option>
                    <option>pretty good </option>
                    <option>pretty quiet</option>
                    <option>somewhat relaxing</option>

                     </select>
                     </div>
                     
                     <div class="field" style="float:left; margin-left: 10px;"><p>3</p>
                     <select name="choices[2]" size="12">
                      <option>acceptable</option>
                    <option>adequate</option>
                    <option>average</option>
                    <option>medium</option>
                    <option>mixed</option>
                    <option>moderate</option>
                    <option>neutral</option>
                    <option>okay</option>
                    <option>satifactory</option>
                    <option>stimulating</option>
                    <option>up and down</option>
                    <option>variable</option>
                    </select>
                    </div>
                    
                    <div class="field" style="float:left; margin-left: 10px;"><p>4</p>
                     <select name="choices[3]" size="12">
                    <option>busy</option>
                    <option>edgy</option>
                    <option>frazzled</option>
                    <option>frenetic</option>
                    <option>negative</option>
                    <option>noisy</option>
                    <option>rocky</option>
                    <option>strained</option>
                    <option>stressful</option>
                    <option>tense</option>
                    <option>irritating</option>
                    <option>uncomfortable</option>


                     </select>
                     </div>
                     
                     <div class="field" style="float:left; margin-left: 10px;"><p>5</p>
                     <select name="choices[4]" size="12">
                    <option>chaotic</option>
                    <option>frantic</option>
                    <option>frightening</option>
                    <option>grating</option>
                    <option>harsh</option>
                    <option>hostile</option>
                    <option>loud</option>
                    <option>nerve-wracking</option>
                    <option>overwhelming</option>
                    <option>pressured</option>
                    <option>very stressful</option>
                    <option>tumultuous</option>


                     </select>
                     </div>
                     <div style="clear: both;">&nbsp;</div>
                     <input type="submit" value="Done">
                     <input type="hidden" name="step" value="4">
                     </form>
                        <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Independent">
                        <input type="hidden" name="cat" value="Environment">
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
      
       case 4:
   
            if( $_POST['subcat'] == "Environment" )
            {
                $options = "1:".$_POST['choices'][0]."|2:".$_POST['choices'][1]."|3:".$_POST['choices'][2]."|4:".$_POST['choices'][3]."|5:".$_POST['choices'][4];
                $fields = 5;
                
                if( $_POST['choices'][0]=="" || $_POST['choices'][1]=="" || $_POST['choices'][2]=="" || $_POST['choices'][3]=="" || $_POST['choices'][4] == "" )
                {
                    ?>
                    <input type="hidden" name="action" value="Add Independent">
                    <input type="hidden" name="cat" value="Environment">
                    <input type="hidden" name="subcat" value="<?php echo $_POST['subcat'];?>">
                     
                     <p><b>You must select a word for each level</b></p>
                    
                     <p>Select the words that you would like associated with each level of your environment. </p>
                     <p>If you would like to call this something else, such as "home life" you can type in a new name here: <input name="displayname" value="Environment" />.</p>  
                     <p>You can track additional environmental measures by returning to this menu and selecting environment, 
                     and then renaming it as desired. For example, you might want to create one variable for "home life," and another for "work life" 
					or "family stress." (You can create as many personalized "environment" measures as you want.)</p>

                     
                     <div class="field" style="float:left; margin-left: 10px;"><p>1</p>
                     <select name="choices[0]" size="12">
                     <option>calm</option>
                    <option>friendly</option>
                    <option>helpful</option>
                    <option>ideal</option>
                    <option>peaceful</option>
                    <option>quiet</option>
                    <option>relaxed</option>
                    <option>serene</option>
                    <option>supportive</option>
                    <option>tranquil</option>
                    <option>gentle</option>
                    <option>soothing</option>

                     </select>
                     </div>
                     
                     <div class="field" style="float:left; margin-left: 10px;"><p>2</p>
                     <select name="choices[1]" size="12">
                    <option>decent</option>
                    <option>fairly calm</option>
                    <option>fairly comfortable</option>
                    <option>fairly peaceful</option>
                    <option>fairly upbeat</option>
                    <option>fine</option>
                    <option>mostly friendly</option>
                    <option>mostly helpful</option>
                    <option>mostly positive</option>
                    <option>pretty good </option>
                    <option>pretty quiet</option>
                    <option>somewhat relaxing</option>

                     </select>
                     </div>
                     
                     <div class="field" style="float:left; margin-left: 10px;"><p>3</p>
                     <select name="choices[2]" size="12">
                      <option>acceptable</option>
                    <option>adequate</option>
                    <option>average</option>
                    <option>medium</option>
                    <option>mixed</option>
                    <option>moderate</option>
                    <option>neutral</option>
                    <option>okay</option>
                    <option>satifactory</option>
                    <option>stimulating</option>
                    <option>up and down</option>
                    <option>variable</option>
                    </select>
                    </div>
                    
                    <div class="field" style="float:left; margin-left: 10px;"><p>4</p>
                     <select name="choices[3]" size="12">
                    <option>busy</option>
                    <option>edgy</option>
                    <option>frazzled</option>
                    <option>frenetic</option>
                    <option>negative</option>
                    <option>noisy</option>
                    <option>rocky</option>
                    <option>strained</option>
                    <option>stressful</option>
                    <option>tense</option>
                    <option>irritating</option>
                    <option>uncomfortable</option>


                     </select>
                     </div>
                     
                     <div class="field" style="float:left; margin-left: 10px;"><p>5</p>
                     <select name="choices[4]" size="12">
                    <option>chaotic</option>
                    <option>frantic</option>
                    <option>frightening</option>
                    <option>grating</option>
                    <option>harsh</option>
                    <option>hostile</option>
                    <option>loud</option>
                    <option>nerve-wracking</option>
                    <option>overwhelming</option>
                    <option>pressured</option>
                    <option>very stressful</option>
                    <option>tumultuous</option>


                     </select>
                     </div>
                     <div style="clear: both;">&nbsp;</div>
                     <input type="submit" value="Done">
                     <input type="hidden" name="step" value="4">
                     </form>
                        <form action="track.php?loc=create" method="post">
                        <input type="hidden" name="action" value="Add Independent">
                        <input type="hidden" name="cat" value="Environment">
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
            else if ($_POST['subcat'] == "Temperature in degrees" )
            {
                $options = "";
                if( $_POST['tempscale'] == "c" )
                {
                    for( $i = -40; $i < 50; $i += 2 )
                    {
                        $options .= "$i:$i C|";
                    }
                    $fields = -1;
                }
                else
                {   
                    for( $i = -40; $i < 120; $i += 5 )
                    {
                       $options .= "$i:$i F|";
                    }
                    $fields = -1;
                }
            }
            else
            {
                $options = implode($_POST['choices'], "|");
                $fields = 0;
            }
            $query = "insert into user_track(user_id, category_id, options, fields, current, sub_category, display_name ) values ($user_id, '$_POST[subcat]', '$options', $fields, 1, 'Environment', '$_POST[displayname]')";
            mysql_query($query) or die(mysql_error());
            
            
            end_form($_POST['subcat']);
       break;
    }
}

function edit_environment($user_id)
{

}

function remove_environment($user_id)
{

}

function display_environment($user_id)
{

}
function end_form($cat)
{
    //TODO: Filter out already tracked categories
            if( isset($_POST['firsttime'] ) )
            {
            ?>
                <p>You have successfully created a variable to measure <?php echo $cat;?>.</p>
                <p>At this point, you can take your survey for the first time <a href="track.php?loc=dailys">here.</a> Or, if you'd like to continue adding categories, press the button below.</p>
                <input type="hidden" name="action" value="Add Category">
                <input type="submit" name="submit" value="Add More Categories">
                </form>
            
            <?php
            }
            else
            {
                ?>
                
                <input type="hidden" name="action" value="Add Independent">
                <input type="hidden" name="cat" value="Environment">
                <input type="hidden" name="step" value="2">
                <p>You have successfully created a variable to measure <?php echo $cat;?>.</p>
                <p>You can select an Environment category below to track. </p>
                <select name="subcat" size="6">
                <option>Temperature in degrees</option>
                <option>Temperature description</option>
                <option>Humidity</option>
                <option>Weather</option>
                <option>Day Type</option>
                <option>Environment</option>
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