<?php
function connect_db()
{
    global $db;
    if( $db == "" )
    {
        /*$db = mysql_connect("mysql.onemonkeyway.com","mikewk","makeshift") or handle_error(mysql_error());
        mysql_select_db("paintracking",$db) or handle_error(mysql_error());
        sanitize($_POST);*/
        
        $db = mysql_connect("mydb.cs.unc.edu","jjallen","CH@ngemenow99Please!jjallen") or handle_error(mysql_error());
        mysql_select_db("trackerdb",$db) or handle_error(mysql_error());
        sanitize($_POST);
    }
}

function check_pass($username, $password, $hash)
{
      return $hash == hash("sha256", $username.$password."positivityratiosalt");
}

function generate_hash($username, $password)
{
    return hash("sha256", $username.$password."positivityratiosalt");
}

function invalid_chars($string)
{
    return !preg_match('|^[a-zA-z0-9 ~`!@#\$%\^&\*\(\)_+=\-,./\';\]\[\\<>\?":{}]*$|', $string );
}

function strip_invalid($string)
{
    preg_match_all('|[a-zA-z0-9 ~`!@#\$%\^&\*\(\)_+=\-,./\';\]\[\\<>\?":{}]*|', $string, $matches);
    $returnstring = "";
    $matches = $matches[0];
    foreach( $matches as $match )
    {
        $returnstring .= $match;
    }
    return $returnstring;
}

function sanitize($var) {
    if (is_array($var)) {   //run each array item through this function (by reference)        
        foreach ($var as &$val) {
            $val = sanitize($val);
        }
    }
    else if (is_string($var)) { //clean strings
        if( get_magic_quotes_gpc() )
        {
            $var = stripslashes($var);
        }
        $var = mysql_real_escape_string($var);

    }
    else if (is_null($var)) {   //convert null variables to SQL NULL
        $var = "NULL";
    }
    else if (is_bool($var)) {   //convert boolean variables to binary boolean
        $var = ($var) ? 1 : 0;
    }
    return $var;
}

function full_url(){
$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
$protocol = substr(strtolower($_SERVER["SERVER_PROTOCOL"]), 0, strpos(strtolower($_SERVER["SERVER_PROTOCOL"]), "/")) . $s;
$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
}

function handle_error($msg)
{	echo $msg;	exit;
    global $db;
    ob_end_clean();
    $url = strip_invalid(full_url());
    $userid = $_SESSION['id'];
    $msg = strip_invalid($msg);
    $msg = sanitize($msg);
    if( $userid == "" )
    {
        $userid = -1;
    }
    $fullpost = "";
    if( isset($_POST) )
    {
        foreach( $_POST as $key=>$value )
        {
            $fullpost .= strip_invalid("$key => $value").":";
        }
    }
    else
    {
        $fullpost = "No Post Data";
    }
    
    if( $db == "" )
    {
        $db = mysql_connect("mysql.onemonkeyway.com","mikewk","makeshift");
        mysql_select_db("paintracking",$db);
    }
    $query = "insert into errors(occured, post, url, message, userid) values(NOW(), '$fullpost', '$url', '$msg', $userid)";
    mysql_query($query);
    
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-Strict.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="site.css" />
<link rel="stylesheet" type="text/css" href="survey.css" />
<link rel="stylesheet" type="text/css" href="tsurvey.css" />
<title>Paintracking</title>

</head>

<body>
<?php
include("header.php");
include_once("topmenu.php");
print_top_menu("tools");
?>
<div class="body_test">
    <div class="error"><p>An error has occurred while processing your request. We are sorry for the inconvience. The error has been logged and we will look at it as soon as possible. If you continue to get this error and wish to contact us, please email admin@paintracking.com with the URL this error is occuring on, as well as any information about what you were trying to do at the time of the error.</p></div>
    </div>
</div>
<div class="footer"><p class="centered"><a href="track.php">Home</a> | <a href="http://www.paintracking.com/terms.php" target="_blank">Terms and Conditions</a>  <a href="http://www.paintracking.com/policy.php" target="_blank">Privacy Policy</a></p>
<p class="copyright">Copyright Dr. Deborah Barrett</p>
</div>
</body>
</html>
    <?php
    exit;
}


function log_unhandled($query2)
{
    global $db;
    if( $db == "" )
    {
        $db = mysql_connect("mysql.onemonkeyway.com","mikewk","makeshift") or handle_error(mysql_error());
        mysql_select_db("paintracking",$db) or handle_error(mysql_error());
    }
    $query2 = sanitize($query2);
    $query2 = strip_invalid($query2);
    $query = "insert into errors(occured, post, url, message, userid) values(NOW(), 'unknown', 'unknown', 'Unhandled Error Occurred: $query2', 0)";
    mysql_query($query);
}

?>