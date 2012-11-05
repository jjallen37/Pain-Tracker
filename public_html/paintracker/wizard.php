<?php

function print_page($user_id)
{
    connect_db();
	if( !isset($_POST['step']) )
	{
        ?>
        <div class="ptright">
        <p>The first step is to select a way to measure your daily well-being. You will be recording this measure each day so you can evaluate your progress.</p>
		<p>You will be given options later to be more specific or to include additional measures of well-being.</p>
		<ul>
		<li>For example, within "pain," you might decide to track "migraines," "back pain," "nerve pain," or "arthritis," or any other pains.</li> 
		<p></p>
		<li>You'll also have the option of tracking more than one of these. Under fatigue, for example, you might decide to track "cognitive" <u>and</u> "physical" fatigue.</li> 
		</ul>
		<p>Look at the categories below, and choose the one you most want to understand and change in your life. Select the general category you want to start with:</p>
        <form action="track.php?loc=wizard" method="post">
        <input type="hidden" name="step" value="0">
        <select size=6 name="cat">
			<option value="Pain">Pain</option>
			<option value="Fatigue">Fatigue</option>
			<option value="Mood">Mood</option>
			<option value="Wellbeing">Wellbeing</option>
			</select>
        <input type="submit" value="OK">
        </form>
        </div>
        <?php
    }
    else if($_POST['step'] == 0 )
    {   
        if( $_POST['cat'] == "" )
        {
            ?>
            <div class="ptright">
            <p><b>You must pick a category to track.</b></p>
            <form action="track.php?loc=wizard" method="post">
            <input type="hidden" name="step" value="0">
            <select size=6 name="cat">
                <option value="Pain">Pain</option>
                <option value="Fatigue">Fatigue</option>
                <option value="Mood">Mood</option>
                <option value="Wellbeing">Wellbeing</option>
                </select>
            <input type="submit" value="OK">
            </form>
            </div>
            <?
        }
        else
        {
        ?>
            <div class="ptright">
                <form action="track.php?loc=wizard" method="post">
                <input type="hidden" name="step" value="1" />
				<input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
				<p>Now, select the number of categories that you would like to include in your personal <b><?php echo $_POST['cat'];?></b> scale. Choose a number that feels intuitive to you.</p>
                <p>For example, if you are accustomed to a ten-point scale, select ten. Or, if you think about your days as coming in two types, such as "good" and "horrible," select a two-point scale. Consider for yourself the number that would be easiest for you to track and best represents the variation in your experience. </p>
				<select name="fields" size=10>
				<?php
				$arraykey [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
				while( $arraykey<11 )
				{
                    $displaynumber = $arraykey;                    
					echo "<option value=>$displaynumber</option>\n";
				}
				?>
				</select>
				<input type="submit" value="OK" />
				</form>
                <form action="track.php?loc=wizard" method="post">
                <input type="submit" value="Go Back">
                </form>
                </div>
                <?php
        }
    }
    else if($_POST['step'] == 1 )
    {
    
        if( $_POST['fields'] == "" )
        {
            ?>
            <div class="ptright">
            <p><b>You must first select the number of categories you would like in your scale.  (Please go back one step.)</b></p>
            <form action="track.php?loc=wizard" method="post">
                 <input type="hidden" name="cat" value="<?php echo $_POST['cat'];?>" />
                 <input type="hidden" name="step" value=0 />
                    <input type="submit" value="Go Back">
                    </form>
            </div>
            <?php
        }
        else
        {
                ?>
                <div class="ptright">
                <form action="track.php?loc=wizard" method="post">
                <?php
                switch($_POST['cat'])
                {
                    case "Pain":
                    ?>
                    <p>Next, you have the option of customizing your scale. Instead of "pain," you might decide to measure "headaches," "morning pain," "nerve pain," or any other meaningful way to consider your experience with pain.</p>
					<p>If you would like to rename your pain measure, type in a new name here. <input name="displayname" value="Pain" />
                    <p>You can also decide to create multiple measures of pain by returning to this menu and creating additional customized pain measures.</p>
                    <p>For example, you might create one measure called "morning pain" and then another called "evening pain,"
                    or you might track "headaches" separate from "back pain," or other categories that best capture your experience with pain.
                    (You can track as many personalized "pain" measures as you want.)</p>
					<p>(For guidance on conceptualizing your pain measure, consult chapter 6 on tracking your well-being and specifically pages 44-49 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i>)</p>

                    <?php
                    
                    break;
                    
                    case "Fatigue":
                    ?>
                    <p>Next, you have the option of customizing your scale. Instead of "fatigue," you might decide to measure "exhaustion," "energy," "mental fatigue," or any other meaningful way to consider your experience with fatigue.</p>
					<p>If you would like to rename your fatigue measure, type in a new name here. <input name="displayname" value="Fatigue" /></p>
                    <p>You can also decide to create multiple measures of fatigue by returning to this menu and creating additional customized fatigue measures.</p>
                    <p>For example, you might create one measure called "morning fatigue" and then another called "evening fatigue;"
                    or you might decide to track "sleepiness" separate from "fogginess," or whatever categories best capture your experience with fatigue.
                    (You can track as many personalized measures of "fatigue" as you want.)</p>
					<p>(For guidance on conceptualizing your fatigue measure, consult chapter 6 on tracking your well-being and specifically pages pages 48-50 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i>)</p>

                    
                    <?php
                    break;
                    
                    case "Mood":
                    ?>
                    
					<p>Next, you have the option of customizing your mood scale. Instead of "mood," you might decide to track your "attitude," "outlook," or any other meaningful way to consider your mood.</p>
					<p>If you would like to rename your mood measure, type in a new name here. <input name="displayname" value="Mood" /></p>
                    <p>You can also decide to create additional mood-related measures by returning to this menu and creating additional customized measures of mood.</p>
					For example, you might want to measure your "best mood" of the day and another for your "lowest mood" to capture the range of your experience.</p>
                    <p>(For guidance on considering measures of your mood, consult chapter 6 on tracking your well-being and specifically pages 50-51 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i>)</p>
                  
                    
                    <?php
                    break;
                    
                    case "Wellbeing":
                    ?>
                    
					<p>Next, you have the option of customizing your measre of general well-being. Instead of "well-being," you might decide your "satisfaction," "health," "comfort," "peace," or "mindfulness."</p> 
					<p>If you would like to rename your measure of well-being, type in a new name here. <input name="displayname" value="Wellbeing" /></p>
                    <p>Consider the word that best captures what you would like to experience. </p>
                    <p>You can also decide to track additional measures of your well-being by returning to this menu and creating additional personalized measure of well-being. </p>
                    <p>For example, you might include a measure of your "work comfort" and another for "home comfort," 
                    or measures of "relationship satisfaction," "acceptance," or whatever measures seem most important to you.
                    (You can track as many personalized "well-being" measures as you want.)</p>
                    <p>For guidance on thinking about your well-being, consult chapter 6 on tracking your well-being and specifically pages 51-54 in <i>Paintracking: Your Personal Guide to Living Well with Chronic Pain.</i></p>

		            <?php
                    break;
					//$query = "insert into user_track(user_id, category_id, options, fields, current, sub_category, display_name) values ($user_id, '$_POST[cat]', '$options', $_POST[fields], 1, 'Daily Wellbeing', '$_POST[displayname]')";
                }
            }
    }
}
?>