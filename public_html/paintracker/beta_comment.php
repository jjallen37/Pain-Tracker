<?php
?>
<script>
function submit_comment()
{
            
            if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari
                var request2 = new XMLHttpRequest();
            }
            else {
                // code for IE6, IE5
                var request2 = new ActiveXObject('Microsoft.XMLHTTP');
            }
            // load
            comment = document.getElementById("comment").value;
            comment = encodeURI(comment);
            request2.open('GET', "comment.php?comment="+comment, false);
            request2.send();
            document.getElementById("comment").value = "Comment Submitted";
}
</script>
<div style="width:700px; margin-left:auto; margin-right:auto;"><p><b>Comments to share?</b> (This will not interfere with your current activity.)</p><textarea cols="60" rows="3" name="comment" id="comment"></textarea><input type="button" value="Submit Comment" onClick="submit_comment()"></div>