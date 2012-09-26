<HTML>  
<HEAD>
  <TITLE>Paintracking Interactive Tracker</TITLE>
  <link rel="StyleSheet" href="site.css" type="text/css">
</HEAD>
<BODY BGCOLOR="#ffffff">
<div class="top">
<div class="leftmenu">
<ul>
<li><a href="index.html">Home</a></li>
<li><a href="book.html">About the book</a></li>
<li><a href="archives.html">Article Archives</a></li>
</ul>
</div>

<div class="header"><img src="header.gif"></div>
<div class="rightmenu">
<ul>
<li><a href="fms06.html">About the Author</a></li>
<li><a href="buy.html">Buy the book</a></li>
<li><a href="tracker.php">Paintracker</a></li>
</ul>
</div>
</div>
<div class="body">
<p>Thank you for signing up for the testing the beta version of the Paintracker.  We will contact you with more information once the beta begins.
</p>
<p style="text-align:center"><img src="pen.gif"></p>
</div>
<div class="footer">

Copyright Deborah A. Barrett, PhD 2011
</div>
</body>
</html>
<?php
$headers = "From: $_POST[name] <$_POST[email]>" . "\r\n" .
    "Reply-To: $_POST[name] <$_POST[email]>" . "\r\n" .
    "BCC: mike.kok@gmail.com" . "\r\n".
    "X-Mailer: PHP/" . phpversion();
if($_POST['subject'] != "" && $_POST['message'] != "" && $_POST['email'] != "")
{
	mail("dbarrett@unc.edu", $_POST['subject'], $_POST['message'], $headers);
}

?>