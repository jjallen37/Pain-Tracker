<?php

function print_page($user_id)
{
    connect_db();
	$query0 = "insert into User_Survey(userid, categoryid, category_name, category_min, category_max) values ($user_id, 0, 'Note', 0, 10)";
	mysql_query($query0);
	$query1 = "INSERT INTO User_Survey(userid, categoryid, category_name, category_min, category_max, category_data, category_scale1, category_scale2, category_scale3, category_scale4, category_scale5, category_scale6, category_scale7, category_scale8, category_scale9, category_scale10, category_scale11, fields) VALUES ($user_id, 1, 'Pain', 0, 10, 'data', 'no pain', 'minor', 'mild', 'annoying', 'irritating', 'significant', 'challenging', 'high', 'severe', 'disabling', 'highest', 11)";
	mysql_query($query1);
	$query2 = "insert into User_Survey(userid, categoryid, category_name, category_min, category_max, category_data, category_scale1, category_scale2, category_scale3, category_scale4, category_scale5, category_scale6, category_scale7, category_scale8, category_scale9, category_scale10, category_scale11, fields) values ($user_id, 2, 'Fatigue', 0, 10, 'data', 'refreshed', 'present', 'slow-minded', 'low energy', 'sleepy', 'foggy', 'tired', 'lethargic', 'exhuasted', 'depleted', 'all-consuming', 11)";
	mysql_query($query2);
	$query3 = "insert into User_Survey(userid, categoryid, category_name, category_min, category_max, category_data, category_scale1, category_scale2, category_scale3, category_scale4, category_scale5, category_scale6, category_scale7, category_scale8, category_scale9, category_scale10, category_scale11, fields) values ($user_id, 3, 'Mood', 0, 10, 'data', 'bitter', 'awful', 'exasperated', 'agitated', 'anxious', 'adequate', 'agreeable', 'happy', 'very good', 'elated', 'extremely happy', 11)";
	mysql_query($query3);
	$query4 = "insert into User_Survey(userid, categoryid, category_name, category_min, category_max, category_data, category_scale1, category_scale2, category_scale3, category_scale4, category_scale5, category_scale6, category_scale7, category_scale8, category_scale9, category_scale10, category_scale11, fields) values ($user_id, 4, 'Well-Being', 0, 10, 'data', 'hopeless', 'drained', 'irritable', 'discontent', 'average', 'decent', 'satisfied', 'pleasant', 'content', 'thriving', 'amazing', 11)";
	mysql_query($query4);
	?>
	<p> Created successfully! </p>
	<?php
}
?>