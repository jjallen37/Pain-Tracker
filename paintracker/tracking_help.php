<?php

function print_page($user_id)
{
    connect_db();
	?>
	    <div class="ptright">
<p><b>Welcome!</b></p>
<p>You are invited to create your own customized PAINTRACKING tool. The goal is to devise a personalized tool that helps you understand and improve your experience. </p>
<ul>
<li><b>You will create a daily measure of how you are doing.</b> You will be creating a personal scale to track your pain, fatigue, mood, or other measures of wellbeing. Viewing this data over time (in table or graph form) will provide you with a realistic assessment of how you are doing.</li>
<li><b>You will be testing your personal hypotheses.</b> You will also track behaviors and other factors (such as exercise, medication, sleep, and activity), which you think may be influencing how you feel. This will reveal important patterns and trends to help you understand what makes you feel better and worse. Improvement with chronic pain requires making adjustments in different realms of your life. By engaging in deliberate experiments you can test the effects of the strategies. Your paintracker will reveal the results of these changes. This will enable to figure out what matters most in helping you improve and adjust accordingly. </li>
</ul>
<p>Once you finish creating the tool, you will be able to create fully customizable tracking surveys as outlined in the <a href="book.html">book</a>.</p>
<p><b>Keep it simple!</b> It’s important you select measures that will be quick and easy for you to record each day. Resist any temptation to “track everything.” You will always be able to add, edit, or remove measures later. The best surveys take two minutes or less to fill out each day and capture the things that you find most relevant. </p>
<p><b>Information on this approach</b> including how to make decisions about what to track, how to conduct experiments, and how to interpret your findings are explained in detail in the book <a href="book.html">PAINTRACKING.</a></p>
<p>The first step is to create a personalized survey. You will be given choices about what you want to track and how you want to represent each of these. </p>
<p><a href="track.php?loc=create">Create your personalized survey.</a>  <a href="track.php">Return to Paintracker Home</a></p> 

</div>
<div style="clear:both;">&nbsp;</div>
<p style="text-align:center"><img src="pen.gif"></p>
</div>
<?php
}