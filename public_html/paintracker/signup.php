<?php
    error_reporting(0);
    require("lib/captchasdotnet.php");
    include_once("common_functions.php");
    ob_start();
    session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-Strict.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="site.css" />
<link rel="stylesheet" type="text/css" href="survey.css" />
<title>Paintracking.com - Signup</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
</head>
<body>
<?php include("header.php");?>

<div class="body">

<?php


if( isset($_POST['username']) )
{

    //process signup form
    $failure = 0;
    $fail_string = "";
    
    //really really first things first,  check for invalid characters for all textual inputs
    if( invalid_chars($_POST['username']) || invalid_chars($_POST['pass1']) || 
        invalid_chars($_POST['pass2']) || invalid_chars($_POST['email1']) ||
        invalid_chars($_POST['email2']) || invalid_chars($_POST['displayname']) ||
        invalid_chars($_POST['zip']) )
    {
        
        $failure++;
        $fail_string .= "Your signup contains invalid characters.<br>Valid characters for Username, Password, Email, ZIP, and Display name: <br>";
        $fail_string .= "Capital and lowercase A through Z<br />";
        $fail_string .= "Numbers 0 through 9 and spaces<br />";
        $fail_string .= 'Symbols: ~`!@#$%^&*()_+=-,./\';][\\<>?":}{<br>';
    }
    else
    {
        //really first things first, make sure we have a username
        if( $_POST['username'] == "")
        {
            $failure++;
            $fail_string .= "Username is empty.  Please enter a username.<br>";
        }
        else
        {    
            //first things first, check if there is this username is taken
            connect_db();

            $query = "select * from User where username = '$_POST[username]'";
            $sql = mysql_query($query) or handle_error(mysql_error()."\n".$query);
            if( mysql_num_rows($sql) != 0 )
            {
                $failure++;
                $fail_string .= "Username already taken. Choose a different username.<br>";
            }
        }
        //check if passwords match
        if( $_POST['pass1'] != $_POST['pass2'] )
        {
            $failure++;
            $fail_string .= "Passwords do not match.  Make sure passwords are correct.<br>";
        }
        //if they match, make sure not empty
        else if( $_POST['pass1'] == "" )
        {
            $failure++;
            $fail_string .= "Password is empty.  Please enter a password.<br>";
        }
        //check if email matches
        if( $_POST['email1'] != $_POST['email2'] )
        {
            $failure++;
            $fail_string .= "Email addresses do not match.  Ensure that both email fields are correct.<br>";
        }
        else if( $_POST['email1'] == "" )
        {
            $failure++;
            $fail_string .= "Email address is empty.  Please enter an email address.<br>";
        }
        else
        {
            connect_db();

            $query = "select * from User where email = '$_POST[email1]'";
            $sql = mysql_query($query) or handle_error(mysql_error()."\n".$query);
            if( mysql_num_rows($sql) != 0 )
            {
                $failure++;
                $fail_string .= "Account already exists for this email address.<br>";
            }
        }
        
        if( $_POST['policy'] != "on")
        {
            $failure++;
            $fail_string .= "You must agree to the privacy policy to receive an account.<br>";
        }
        
        // $captchas = new CaptchasDotNet ('positivityratio', 'SRRIRu3WdWBppqDMJOq2XUWrf7aGg3feJRzQZqPm',
                                    // './tmp/captchasnet-random-strings','3600',
                                    // 'abcdefghkmnopqrstuvwxyz','6',
                                    // '240','80');
        // $password      = $_POST['password'];
        // $random_string = $_POST['random'];
        // if( !$captchas->validate ($random_string) )
        // {
            // $failure++;
            // $fail_string .= "Each image can only be used one.  Please try again. <br>";
        // }
//         
        // if (!$captchas->verify ($password))
        // {
            // $failure++;
            // $fail_string .= "The characters you entered did not match the image.  A new image has been generated. <br>";
        // }
    }
    
    if( $failure == 0 )
    {
        connect_db();
        $hash = generate_hash($_POST['username'], stripslashes($_POST['pass1']));
        $query = "insert into User(username, name, email, md5_pass, time_zone) values( '$_POST[username]', '$_POST[displayname]', '$_POST[email1]', '$hash', $_POST[ddtz])";
        if( !mysql_query($query) )
        {
            $fail_string = "An error occured while processing your information.  Please try again.<br>";
            $failure = 1;
        }
        else
        {
            $_SESSION['id'] =  mysql_insert_id();
            $_SESSION['user'] = $_POST['username'];
            $_SESSION['pass'] = $_POST['pass1'];
            $_SESSION['name'] = stripslashes($_POST['displayname']);
            $_SESSION['tz'] = stripslashes($_POST['ddtz']);
        }
    }
    if( $failure != 0 )
    {
        print_signup($fail_string, $_POST['username'] , $_POST['displayname'],  $_POST['email1'], $_POST['email2'], $_POST['zip']);
    }
    else
    {
        ?>
            <div class="scentered">
            <p>Thank you for joining the <b><u>Paintracking</u></b> interactive website.  If you are not redirected, please <a href="track.php">click here.</a></p>
            </div>
            </div>
            <?php include("footer.php");?>
            </body>
            </html>
            <META HTTP-EQUIV=Refresh CONTENT='0; URL=track.php'>
        <?php
    }
}
else
{
    //display signup form
    print_signup("", "", "", "", "", "");
}
function print_signup($failure, $username, $displayname, $email1, $email2, $zip)
{
    $username = stripslashes($username);
    $displayname = stripslashes($displayname);
    $email1 = stripslashes($email1);
    $email2 = stripslashes($email2);
    $zip = stripslashes($zip);
    $captchas = new CaptchasDotNet ('positivityratio', 'SRRIRu3WdWBppqDMJOq2XUWrf7aGg3feJRzQZqPm',
                                'tmp/captchasnet-random-strings','3600',
                                'abcdefghkmnopqrstuvwxyz','6',
                                '240','80');

?>
    <div class="scentered">
    <p>Welcome to the <i>Paintracking</i> signup.  To use the online paintracker, you'll need an account.  Please fill out the following form:</p>
    <?php if( $failure != "" )
            echo "<p class=\"failure\">$failure</p>";
    ?>
    <form name="signup" method="post" action="signup.php">
    <input type="hidden" name="random" value="<?php echo $captchas->random(); ?>" />
    <table>
    <tr><td style="">Username (to log on):</td><td><input value="<?php echo $username;?>" type="text" name="username" /></td></tr>
    <tr><td style="">Password:</td><td><input type="password" name="pass1" /></td></tr>
    <tr><td style="">Verify password:</td><td><input type="password" name="pass2" /></td></tr>
    <tr><td style="">Display Name (for comments):</td><td><input value="<?php echo $displayname;?>" type="text" name="displayname" /></td></tr>
    <tr><td style="">Email address:</td><td><input value="<?php echo $email1;?>" type="text" name="email1" /></td></tr>
    <tr><td style="">Verify email address:</td><td><input value="<?php echo $email2;?>" type="text" name="email2" /></td></tr>
    <tr><td style="">Time zone</td><td><select name="ddtz" id="ddtz">
      <option value="-7.0">(GMT -12:00) Eniwetok, Kwajalein</option>
      <option value="-6.0">(GMT -11:00) Midway Island, Samoa</option>
      <option value="-5.0">(GMT -10:00) Hawaii</option>
      <option value="-4.0">(GMT -9:00) Alaska</option>
	  <option value="-3.0">(GMT -8:00) Pacific Time: San Francisco, Vancouver</option>
      <option value="-2.0">(GMT -7:00) Mountain Time: Denver, Calgary</option>
      <option value="-1.0">(GMT -6:00) Central Time: Dallas, Winnipeg, Mexico City</option>
      <option value="0.0" selected="selected">(GMT -5:00) Eastern Time: New York, Ottawa, Bogota, Lima</option>
      <option value="1.0">(GMT -4:00) Atlantic Time: Hallifax, Caracas, La Paz</option>
      <option value="1.5">(GMT -3:30) Newfoundland</option>
      <option value="2.0">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
      <option value="3.0">(GMT -2:00) Mid-Atlantic</option>
      <option value="4.0">(GMT -1:00 hour) Azores, Cape Verde Islands</option>
      <option value="5.0">(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
      <option value="6.0">(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option>
      <option value="7.0">(GMT +2:00) Kaliningrad, South Africa</option>
      <option value="8.0">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
      <option value="8.5">(GMT +3:30) Tehran</option>
      <option value="9.0">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
      <option value="9.5">(GMT +4:30) Kabul</option>
      <option value="10.0">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
      <option value="10.5">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
      <option value="10.75">(GMT +5:45) Kathmandu</option>
      <option value="11.0">(GMT +6:00) Almaty, Dhaka, Colombo</option>
      <option value="12.0">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
      <option value="13.0">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
      <option value="14.0">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
      <option value="14.5">(GMT +9:30) Adelaide, Darwin</option>
      <option value="15.0">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
      <option value="16.0">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
      <option value="17.0">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
</select>
    <tr><td>Please enter the text<br>from the image below:</td><td><input name="password" size="6" /></td></tr>
    <tr><td></td><td><?php echo $captchas->image ();?><br><a href="<?php echo $captchas->audio_url();?>" target="_blank">Phonetic spelling (mp3)</a></td></tr>
    </table>
    <p><input type="checkbox" name="policy"> I have read and agree to the terms of the <b><u>Paintracking</u></b> interactive website <a href="policy.php" target="_blank">privacy policy.</a></p>
    <input type="submit" value="Sign up!" />
    </form>
    </div>
    </div>
    <?php include("footer.php");?>
    </body>
    </html>
<?php
}
