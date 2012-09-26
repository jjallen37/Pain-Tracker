<?php
error_reporting(0);
include_once("common_functions.php");
session_start();
ob_start();

if( isset($_SESSION['user']) && isset($_SESSION['pass']) && isset($_SESSION['id']) )
{
    header("Location: track.php");
    exit;
}
	sanitize($_POST);
	if( isset($_POST[username]))
	{
        connect_db();
		if( $_POST[username] == "" or $_POST[password] == "")
		{
			$missing=1;
		}
        else if( invalid_chars($_POST['username']) || invalid_chars($_POST['password']) )
        {
            $invalid = 1;
        }
		else
		{
			$query = "select * from users where username = '$_POST[username]' and active=1";
			$sql = mysql_query($query) or handle_error(mysql_error());
            if( mysql_num_rows($sql) == 0 )
            {
                $incorrect =1 ;
            }
            else
            {
                $row = mysql_fetch_array($sql);
                $pass = stripslashes($_POST['password']);
    			if( !check_pass($row['username'], $pass, $row['md5_pass']))
    			{
    				$incorrect = 1;
    			}
    			else
                {
    				$_SESSION['user']="$_POST[username]";
    				$_SESSION['pass']="$_POST[password]";
                    $_SESSION['name']=$row['name'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['tz'] = $row['time_zone_offset'];
                    $id = $row['id'];
                    $query = "select UNIX_TIMESTAMP(datetaken) as stamp from dailysurvey where users_id='$id' order by datetaken desc limit 1";
                    $sql = mysql_query($query) or handle_error(mysql_error());
                    
                    $query = "update users set lastlogin=NOW() where id='$id'";
                    mysql_query($query);
                    if( mysql_num_rows($sql) == 0 )
                    {
                        $_SESSION['last'] = "";
                    }
                    else
                    {
                        $row = mysql_fetch_array($sql);
                        $_SESSION['last'] = $row['stamp'];
                    }
    				echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=track.php'> ";
    				echo "If you're not redirected, please click <a href=\"track.php\">here</a>";
                    exit();
    			}
            }
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-Strict.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="site.css" />
<link rel="stylesheet" type="text/css" href="survey.css" />
<title>Paintracking - Online Tracking</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
</head>

<body>

<?php include("header.php");?>
<?php include_once("topmenu.php");
      print_top_menu("tools");
?>
<div class="body">

<div class="scentered">
	<?php
    if( $missing == 1 || $incorrect == 1 || $invalid == 1)
        echo "<p style=\"text-align: center; text-indent:0px\">";
	if( $missing == 1 )
	{
		echo "Missing username/password!<br />";
	}
	if( $incorrect == 1)
	{
		echo "Incorrect username/password! <br />";
	}
    if( $invalid == 1 )
    {
        echo "Invalid characters in username/password! <br />";
    }
    if( $missing == 1 || $incorrect == 1 || $invalid == 1)
    {
        echo "</p>";
    }
?>


	<form name="login" method="post" action="login.php">
	Username: <br />
	<input name="username"> <br />
	Password: <br />
	<input type="password" name="password"><br />
	<input type="submit" value="Login">
    <br />
    <a href="forgotten.php">I have forgotten my username/password</a>
    <br />
    Not signed up yet?  Sign up <a href="signup.php">here.</a>
	
	<p>The PAINTRACKER is a free, interactive tool that allows you to see trends in your experience and learn what helps (and hurts) so that you can continue to improve.</p>
	
	<p>You will be walked through a process to set up a customized tracking survey. You will have choices about recording pain, fatigue, mood, or other measure of how you are doing, along with factors such as activities, rest breaks, exercise, medication, environment, and anything you consider important.</p> 
	
	<p>Start simply. You can always add more or make changes once you are more comfortable with how this works.</p>
	
	<p>Once you start recording data, you will be able to see it displayed in table and interactive graph forms.</P>
	
	<p>To get started, set up an account with your name and email. All information will be kept confidentail (see privacy policy).</p>
	
	<p>Wishes for many signficant discoveries!</P>
	 
	
	</form>
    </div>
    </div>
<?php include("footer.php");?>
    </body>
    </html>
