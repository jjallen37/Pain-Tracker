<?php
error_reporting(0);
include_once("common_functions.php");
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-Strict.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="site.css" />
<link rel="stylesheet" type="text/css" href="survey.css" />
</head>
<body>
<?php include("header.php");?>
<?php include("topmenu.php");
      print_top_menu("tools");
?>
<div class="body">
<div class="scentered">
<?php
    if( isset($_POST['pass1'] ))
    {
        if( $_POST['pass1'] == "" )
        {
            print_password_form("Password is empty, please enter a password.");
        }
        else if( $_POST['pass1'] != $_POST['pass2'] )
        {
            print_password_form("Passwords do not match.  Please try again.");
        }
        else if( invalid_chars($_POST['pass1'] ))
        {
            print_password_form("Password contains invalid characters.  Please try again.");
        }
        else
        {
            //verify guid
            $db = connect_db();
            $token = $_GET['token'];
            $pass = $_POST['pass1'];
            $query = "select * from password_reset where id = '$token' and timestamp >= NOW()-Interval 7 day";
            $sql = mysql_query($query) or handle_error(mysql_error());
            if( mysql_num_rows($sql) != 1 )
            {
                ?>
                <p>We are sorry, but the link you have followed is invalid and/or expired.  Restart the password reset process <a href="forgotten.php">here.</a>  Or, contact the administrator at <a href="email:admin@paintracking.com">admin@paintracking.com</a></p>
                <?php
            }
            else
            {
                $row = mysql_fetch_array($sql);
                $username = $row['username'];
               
                $hash = generate_hash($username, $pass);
                $query = "update users set md5_pass = '$hash' where username = '$username' limit 1";
                if( mysql_query($query) )
                {
                    $query = "delete from password_reset where id='$token'";
                    mysql_query($query);
                    ?>
                    <p>Your password has successfully been changed.  <a href="login.php">Click here</a> to log in.</p>
                    <?php
                }
                else
                {
                   echo("<p>We are sorry, but an error occured while reseting your password.  Please reply to the email we sent you to continue the password reset process.</p>");
                }
            }
           
        }
    }
    else
    {
        print_password_form("");
    }
    ?>
</div>
</div>
<?php include("footer.php");?>
</body>
</html>
<?php
function print_password_form($error)
{
    ?>
    <?php
    if( $error != "" )
        echo "<p style=\"text-align: center; text-indent:0px\">$error</p>";
        
    ?>
            <form style="text-align: center;" action="reset.php?token=<?php echo $_GET['token'];?>" method="post">
            <table class="forgotten">
            <tr><td>Enter new password:</td><td><input name="pass1" type="password"></tr>
            <tr><td>Verify new password:</td><td><input name="pass2" type="password"></tr>
            <tr><td></td><td><input type="submit" value="Change Password" /></td></tr>
            </table>
            </form>
    
    <?php
}
