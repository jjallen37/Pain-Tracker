<?php

include("common_functions.php");
connect_db();
if( isset($_POST['cat'] ) )
{
	$rows = explode("\n",$_POST['cat']);
	foreach($rows as $row)
	{
		/*$cells = explode("\t", $row);
		print_r($cells);
		if( count($cells) == 1 )
		{
			//this is a new category set
			$cells = explode("_", $cells);
			$category = $cells[0];
			$fields = $cells[1];
			echo "Creating ranks for $category with $fields fields<br>";
			$nextRanks = true;
		}
		else if( $nextRanks )
		{
			$nextRanks = false;
			echo "Creating rank: ";
			foreach($cells as $cell)
			{
				$query = "insert into categories(category, fields, rank, options) values ('$category', $fields, $cell, '')";
				mysql_query($query) or die(mysql_error()."<br>".$query);
				echo $cell;
			}
		}
		else
		{
			$i = 0;
			foreach($cells as $cell)
			{
				echo "Adding options:";
				if(trim($cell) != "")
				{
					$query = "update categories set options = concat_ws(';', options, '$cell') where category = '$category' and fields='$fields' and rank='$i'";
					mysql_query($query) or die(mysql_error()."<br>".$query);
					echo "option $cell to rank $i<br>";
				}
				$i++;
			}
		}*/

		$cells = explode("\t", $row);
			$category = $cells[0];
			$fields = $cells[1];
			$rank = $cells[2];
			$options = $cells[3];
			echo "Creating ranks for $category with $fields fields<br>";
			$nextRanks = true;

		$query = "insert into categories(category, fields, rank, options) values ('$category', $fields, $rank, '$options')";
				mysql_query($query) or die(mysql_error()."<br>".$query);
				echo $rank;

	}
}
?>
<form action="populate.php" method="post">
<textarea name="cat" cols=80 rows=20> </textarea>
<input type="submit" value="Submit">
</form>