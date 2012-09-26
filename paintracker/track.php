<?php
include("common_functions.php");
//error_reporting(1);
//start session so we can check the user credentials
session_start();
ob_start();

if( !isset($_SESSION['user']) || !isset($_SESSION['pass']) || !isset($_SESSION['id']) )
{
    header("Location: login.php");
    exit;
}

function print_surveys_right()
{
	return;
}

function print_survey_left()
{
?>
	<div class="ptleft">
	<?php
		
		$name = $_SESSION['name'];
		$id = $_SESSION['id'];

		echo "<p>Welcome $name.<br><br>";
		
        ?>
        <a href="track.php?loc=logout">Log Out</a></p>
        
        <p><a href="donation.html">Support the Paintracker</a></p>
        
        <p><a href="faq.php">FAQ</a></p>
        
        <p><a href="contact.php">Contact the Author</a></p>        
        
        
        <?
        
        
        /*TODO: Number taken and Variables tracked*/
    $loc = $_GET['loc'];
    
	?>
	</div>
<?php
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-Strict.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="site.css" />
<link rel="stylesheet" type="text/css" href="survey.css" />
<link rel="stylesheet" type="text/css" href="tsurvey.css" />
<script src="amcharts.js" type="text/javascript"></script>
<script src="raphael.js" type="text/javascript"></script> 
<title>Paintracking.com - Online Tracking</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
</head>

<body>


<?php
    
    include("header.php");
    include_once("topmenu.php");
    print_top_menu("");
?>
<div class="body">
<div style="clear:both;"></div>
<?php
    $user_id = $_SESSION['id'];
    $db = "";
	
if( !isset($_GET['loc']) )
{
	include("tracking_home.php");
	print_survey_left();
	print_page($user_id);
}
else if( $_GET['loc'] == "help")
{
	include("tracking_help.php");
	print_survey_left();
	print_page($user_id);
}
else if( $_GET['loc'] == "dailys")
{
	include("tracking_survey.php");	print_survey_left();	print_page($user_id);
}
else if( $_GET['loc'] == "table")
{
	include("tracking_report.php");
	print_survey_left();
	print_page($user_id);
}
else if( $_GET['loc'] == "chart")
{
    include("tracking_chart.php");
    print_survey_left();
    print_page($user_id);
}
else if( $_GET['loc'] == "create")
{
	include("tracking_create.php");
	print_survey_left();
	print_page($user_id);
}
else if( $_GET['loc'] == "wizard")
{
	include("wizard.php");
	print_survey_left();
	print_page($user_id);
}
else if( $_GET['loc'] == "logout")
{
	session_destroy();
	?>
	<div class="scentered"><p class="centered">You have been logged out.  Thank you for using the <i>Paintracking</i> Tracking Tools.</p>
	<p class="centered"><a href="http://www.paintracking.com">Return to <i>Paintracking</i> home.</a><br />
	<p>&nbsp;</p>
	<a href="login.php">Log back in to your Paintracker.</a>
	</p>
	</div>
    </div>
	<?php
    include("footer.php");
    ?>
    </body>
    </html>
    <?php
    ob_end_flush();
    exit;
}
else if( $_GET['loc'] == "pref" )
{
	include("tracking_preferences.php");
	print_survey_left();
	print_page($user_id);
}
?>
<div style="clear:both;"></div>
</div>
<?php include("beta_comment.php");?>
<?php include("footer.php");?>
</body>
</html>
<?php
ob_end_flush();
?>