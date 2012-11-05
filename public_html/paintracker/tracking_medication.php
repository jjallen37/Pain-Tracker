<?php


function add_medication($user_id)
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
            ?>
            
            <p>Consider the reasons that you want to track your use of medications. You might want a complete record of what you take each day. While it is important to keep a record of your current medications,
           it may not practical or helpful to include a long list of medications on your daily tracking sheet. As discussed in the book, track only what you need to know to figure out what helps.
           For example, you might track the medications that you take "as needed" to track changes and understand their effects. Or if you are starting a new medication or tapering off of an older one,
           tracking the dosage can be important information in working with your doctor.
            </p>
       
            <p>Enter in the name of each medication you decide to track and how you take each. For example, you may consider your medication in milligrams or the number of tablets you take.
            Each day you will be prompted in your survey to record the dose in the units you selected.</p>
            
            <p>Another option is to enter the name and dose of all of your medication to start with, but then only track daily data when you experience a significant fluctuation (such as when your doctor changes your dosage). </p>
            <p>For guidance, consult chapter 7 on measuring explanatory factors and specifically pages 71-76 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i></p>
            <?php
            
            $query = "select * from user_medications where user_id = $user_id";
            $sql = mysql_query($query) or die(mysql_error());
            if( mysql_num_rows($sql) > 0 )
            {
                echo "<p>You are currently tracking the following medications:</p>";
                echo "<ul>";
                while($row = mysql_fetch_array($sql) )
                {
                    echo "<li>$row[medication]";
                    if( $row['units'] != "")
                        {
                            echo " ($row[units])";
                        }
                    echo "</li>";
                }
                echo "</ul>";
                echo "<p>If you would like to track another medication, please enter information here:</p>";
            }
            else if( !isset($_POST['firsttime'] ) )
            {
                echo "<p>You are not currently tracking any medications.</p>";
            }
            ?>
            
            <input type="hidden" name="action" value="Add Independent">
            <input type="hidden" name="cat" value="Medication">
            <input type="hidden" name="step" value="2">
            Medication name: <input name="med_name"><br />
            Medication units: <select name="units">
            <option value="pills">Pills</option>
            <option value="cc">CCs</option>
            <option value="mg">Milligrams</option>
            <option value="doses">Doses</option>
            <option value="">Other</option>
            </select>
            
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
            if( $_POST['med_name'] == "" )
            {
                $query = "select * from user_medications where user_id = $user_id";
                $sql = mysql_query($query) or die(mysql_error());
                if( mysql_num_rows($sql) > 0 )
                {
                    echo "<p>You are currently tracking the following medications:</p>";
                    echo "<ul>";
                    while($row = mysql_fetch_array($sql) )
                    {
                        echo "<li>$row[medication] ($row[units])</li>";
                    }
                    echo "</ul>";
                }
                else
                {
                    echo "<p>You are not currently tracking any medications.</p>";
                }
                ?>
                
                <p>Please make sure you input a <b>Medication name</b></p>
                <input type="hidden" name="action" value="Add Independent">
                <input type="hidden" name="cat" value="Medication">
                <input type="hidden" name="step" value="2">
                <b>Medication name:</b> <input name="med_name"><br />
                Medication units: <select name="units">
                <option value="pills">Pills</option>
                <option value="cc">CCs</option>
                <option value="mg">Milligrams</option>
                <option value="doses">Doses</option>
                <option value="">Other</option>
                </select>
                
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
            }
            else
            {
                $query = "insert into user_medications(user_id, medication, units) values ($user_id, '$_POST[med_name]', '$_POST[units]')";
                mysql_query($query) or die(mysql_error());
                echo "<p>$_POST[med_name] ($_POST[units]) tracking added!</p>";
                end_form($user_id);
            }
       break;
       
    }
}

function edit_medication($user_id)
{

}

function remove_medication($user_id)
{

}

function display_medication($user_id)
{

}

function end_form($user_id)
{
  
            if( isset($_POST['firsttime'] ) )
            {
            ?>
                <p>Awesome, you've created your second tracking category.  At this point, you can take your survey for the first time <a href="track.php?loc=dailys">here.</a>  Or, if you'd like to continue adding categories, press the button below.</p>
                <input type="hidden" name="action" value="Add Category">
                <input type="submit" name="submit" value="Add More Categories">
                </form>
            
            <?php
            }
            else
            {
                $query = "select * from user_medications where user_id = $user_id";
                $sql = mysql_query($query) or die(mysql_error());
                if( mysql_num_rows($sql) > 0 )
                {
                    echo "<p>You are currently tracking the following medications:</p>";
                    echo "<ul>";
                    while($row = mysql_fetch_array($sql) )
                    {
                        echo "<li>$row[medication] ($row[units])</li>";
                    }
                    echo "</ul>";
                    echo "<p>If you would like to track another medication, please enter information here:</p>";
                }
                ?>
                
                
                
                <input type="hidden" name="action" value="Add Independent">
                <input type="hidden" name="cat" value="Medication">
                <input type="hidden" name="step" value="2">
                Medication name: <input name="med_name"><br />
                Medication units: <select name="units" >
                <option value="pills">Pills</option>
                <option value="cc">CCs</option>
                <option value="mg">Milligrams</option>
                <option value="doses">Doses</option>
                <option value="">Other</option>
                </select>
                
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