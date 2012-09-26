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
<li><a href="track.php">Paintracker</a></li>
</ul>
</div>
</div>
<div class="body">
<?php
if( isset($_POST['name'] ))
{
$headers = "From: $_POST[name] <$_POST[email]>" . "\r\n" .
    "Reply-To: $_POST[name] <$_POST[email]>" . "\r\n" .
    "BCC: mike.kok@gmail.com" . "\r\n".
    "X-Mailer: PHP/" . phpversion();
    if( $_POST['message'] != "" && $_POST['email'] != "")
    {
        mail("dbarrett@unc.edu", $_POST['subject'], $_POST['message'], $headers);
    }
    ?>
    <p><b>Thank you for your email.</b></p>
    <?php
}

?>


<div style="width: 450px; float:left;">
<form action="contact.php" method="post">
<p>
Your Name:  <input name="name" size="25"><br>
Your Email: <input name="email" size="25"><br>
Subject:    <input name="subject" size="25" value=""><br>
Your Message:<br>
<textarea name="message" rows="5" cols="50"></textarea><br>
<input type="submit" value="Send">
</p>
</form>
</div>

<div style="width:350px; float:left;">
<p>You can use this form to contact the author of <u><b>Paintracking</b></u></p>
<p>Comments, suggestions, "bug reports," or any sharing of your experiences are all welcome.</p>
</p>
</div>
<div style="clear: both;"></div>



<p style="text-align:center"><img src="pen.gif"></p>
</div>
<div class="footer">

Copyright Deborah A. Barrett, PhD 2011
</div>
</body>
</html>