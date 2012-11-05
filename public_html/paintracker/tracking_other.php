<?php


function add_other($user_id)
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
            
            
            <p>You can use this category to track anything else you'd like to track on a daily basis. You can give this tracking category a name here: <input name="displayname" value="Other" />.
            </p>
       
            
           
            
            <input type="hidden" name="action" value="Add Independent">
            <input type="hidden" name="cat" value="Other">
            <input type="hidden" name="step" value="2">
            
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
                
                $query = "insert into user_track(user_id, category_id, options, fields, current, sub_category, display_name) values ($user_id, '$_POST[cat]', '', 0, 1, 'Other', '$_POST[displayname]')";
                mysql_query($query) or die(mysql_error());
                
                end_form($user_id, $_POST['displayname']);
            
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

function end_form($user_id, $displayname)
{
  
           ?>
            <p>You have created a custom tracking category to track <?php echo $displayname;?>.</p>
           
            <p>You can use this category to track anything else you'd like to track on a daily basis.  You can give this tracking category a name here: <input name="displayname" value="Other" />.
            </p>
       
            
           
            
            <input type="hidden" name="action" value="Add Independent">
            <input type="hidden" name="cat" value="Other">
            <input type="hidden" name="step" value="2">
            
            <input type="submit" value="OK" />
            </form>
           
                    <form action="track.php?loc=create" method="post">
                    <input type="hidden" name="action" value="Add Category">
                    <input type="submit" value="Go Back to Categories" />
                    </form>
                    
                    <p>Or you can start taking your tracking survey by <a href="track.php?loc=dailys">clicking here.</a></p>
                    
                <?php

            
}