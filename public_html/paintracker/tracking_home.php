<?php

function print_page($user_id)
{
    connect_db();

?>
<link rel="stylesheet" type="text/css" href="comments/css/stylesheet.css"/>
<div class="ptright">

</div>
<div>
		<?php

	$cmtx_page_id = "1";
	$cmtx_reference = "Page One";
	$cmtx_path = "comments/";
	define('IN_COMMENTICS', 'true');
	//no need to edit this line
	require $cmtx_path . "includes/commentics.php";
	//no need to edit this line
	?>
</div>
<div style="clear:both;">
	&nbsp;
</div>
<p style="text-align:center"><img src="pen.gif">
</p>
</div> <?php
}
