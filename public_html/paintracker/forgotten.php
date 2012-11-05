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
<div class="body">
<div class="center">
<?php
    if( isset($_POST['remember'] ))
    {
        if( $_POST['remember'] == "yes" )
        {
            connect_db();
            if( invalid_chars($_POST['username'] ) )
            {
                print_username_form("Sorry, the username you have entered contains invalid characters.");
            }
            else
            {
                $query = "select * from users where username='$_POST[username]'";
                $sql = mysql_query($query) or handle_error(mysql_error());
                if( mysql_num_rows($sql) != 1 )
                {
                    print_username_form("Sorry, that username does not exist.");
                }
                else
                {
                    $row = mysql_fetch_array($sql);
                    $name = $row['name'];
                    $from = "Paintracking Admin <admin@paintracking.com>";
                    $to = "$row[name] <$row[email]>";
                    $subject = "Paintracking.com Password Reset";
                    
                    //generate link
                    $link_body = "http://www.paintracking.com/beta/reset.php?token=";
                    
                    //generate token
                    $tries = 0;
                    do
                    {
                        $tries++;
                        $success = false;
                        $guid = uniqid("", true);
                        $guid = sha1($guid.$_POST['username']);
                        $query = "select * from password_reset where id='$guid'";
                        $sql = mysql_query($query);
                        if(mysql_num_rows($sql) == 0 )
                        {
                            $success = true;
                        }
                    }
                    while($tries < 5 && $success == false);
                    
                    if( !$success )
                    {
                        echo("<p>We are sorry, but an error occured while sending the password reset email.  Please contact the administrator at <a href=\"email:admin@paintracking.com\">admin@paintracking.com</a></p>");
                    }
                    else
                    {
                        $query = "insert into password_reset values('$guid', '$_POST[username]', NOW())";
                        if( !mysql_query($query) )
                        {
                            echo("<p>We are sorry, but an error occured while processing your request.  Please contact the administrator at <a href=\"email:admin@paintracking.com\">admin@paintracking.com</a> to initiate the password reset process.</p>");
                        }
                        else
                        {
                            $link = $link_body.$guid;
                            
                            $body = "Hello $name,\n\nPaintracking.com received a request to initiate the password reset process for your account.  If you initiated this request, please continue with the instructions below to reset your account.\n\n".
                                    "If you didn't make this request, you can safely ignore this email.  Your account information is still secure.\n\n".
                                    "Click the link below to continue reset your password.  If the link is not clickable, copy and paste the link into your web browser.  Be sure to copy the entire link.\n\n".
                                    $link."\n\n".
                                    "Thank you for using Paintracking.com.";
                            
                            $headers = "From: $from" . "\r\n" .
                            "Reply-To: $from" . "\r\n" .
                            "X-Mailer: PHP/" . phpversion();

                            mail($to , $subject, $body, $headers);

                            echo "<p>Please check your email to continue with the password reset process.</p>";
                            
                        }
                    }
                }
            }
        }
        else
        {
            if( isset( $_POST['email'] ))
            {
                connect_db();
                if( invalid_chars($_POST['email']) )
                {
                    print_username_form("Sorry, the email address you have entered contains invalid characters.  Please try again.");
                }
                else
                {
                    $query = "select * from users where email = '$_POST[email]'";
                    $sql = mysql_query($query) or handle_error(mysql_error());
                    if( mysql_num_rows($sql) != 1 )
                    {
                        print_username_form("We could not find an account with that email address.  Please try again.");
                    }
                    else
                    {
                        $row = mysql_fetch_array($sql);
                        $from = "Paintracking Admin <admin@paintracking.com>";
                        $to = "$row[name] <$row[email]>";
                        $subject = "Paintracking.com Username Retrieval";
                        $name = $row['name'];
                        $username = $row['username'];
                        $body = "Hello $name,\n\nPaintracking.com recieved a request to retrieve the username for your account.  If you initiated this request, please read below for your username.\n\n".
                                        "If you didn't make this request, you can safely ignore this email.  Your account information is still secure.\n\n".
                                        "Your username at Paintracking.com is:\n\n".
                                        $username."\n\n".
                                        "Thank you for using Paintracking.com.";
                                
                        $headers = "From: $from" . "\r\n" .
                            "Reply-To: $from" . "\r\n" .
                            "X-Mailer: PHP/" . phpversion();

                        mail($to , $subject, $body, $headers);
                        echo "<p>Please check your email for your username.  Thank you for using Paintracking.com</p>";
                        
                    }
                }
            }
            else
            {
                print_email_form("");
            }
        }
    }
    else
    {
        print_username_form("");
    }
    ?>
</div>
</div>
<?php include("footer.php");?>
</body>
</html>
<?php
function print_email_form($error)
{
    if( $error != "" )
        echo "<p style=\"text-align: center; text-indent:0px\">$error</p>";
        
    ?>
            <form style="text-align: center;" action="forgotten.php" method="post">
            <input type="hidden" name="remember" value="no" />
            <table class="forgotten">
            <tr><td style="width:200px;">Please enter the email address you signed up with and we will send you your username.</td><td style="text-align: left"><input name="email" type="text" /></td></tr>
            <tr><td></td><td style="text-align: left"><input type="submit" value="Send Email" /></td></tr>
            </table>
            </form>
    <?php
}
function print_username_form($error)
{
    if( $error != "" )
        echo "<p style=\"text-align: center; text-indent:0px\">$error</p>";
        
    ?>
            <form style="width:400px; margin-right:auto; margin-left:auto;" action="forgotten.php" method="post">
            <table class="forgotten">
            <tr><td style="font-size: 1.25em; ">Do you remember <br /> your username?</td><td style="text-align: left"><input type="radio" name="remember" value="yes" checked="checked">Yes, my username is: <br /> <input name="username" type="text"><br /><br />
                                                           <input type="radio" name="remember" value="no">No, I don't remember.</td></tr>
            <tr><td></td><td style="text-align: left"><input type="submit" value="Next" /></td></tr>
            </table>
            </form>
    
    <?php
}
