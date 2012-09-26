<?php

function print_page($user_id)
{
    connect_db();
    ?>
    <div class="ptright">
    <p>Welcome to the online paintracker tool. Please select an option from the above menu to get started.</p>
    <p>Below are comments from users of the paintracker.</p>
    
    <?php
     $query = "select moderator, comment, username, name, submitted, accepted, beta_comments.id as bcid from beta_comments, users where user_id = users.id and accepted = 1 order by submitted desc";
    $sql = mysql_query($query) or die(mysql_error());


    ?><table style="border-collapse:collapse; border-bottom: 1px solid gray; border-top: 1px solid gray;"><tr style="border-bottom: 1px solid gray; border-top: 1px solid gray;"><td>Name</td><td>Submitted</td><td style='width:500px;'>Comment</td></tr>
    <?php
    while( $row = mysql_fetch_array($sql) )
    {
        echo "<tr style=\"border-top: 1px solid gray;\"><td style=\"padding-right:10px;\">$row[name]</td><td >$row[submitted]</td><td style='width:500px;'>$row[comment]</td></tr>";
        if( $row['moderator'] != "" )
        {
            echo "<tr style=\"border-bottom: 1px solid gray;\"><td colspan=2 style=\"text-align: center; padding-right:2px; padding-top:10px; padding-bottom:10px; font-weight:bold;\">Paintracking (Debbie)</td><td style='padding-left:15px; width:500px; font-style:italic;'>$row[moderator]</td></tr>";
        }
    }
    echo "</table>";
    ?>
    
</div>
<div style="clear:both;">&nbsp;</div>
<p style="text-align:center"><img src="pen.gif"></p>
</div>
<?php
}