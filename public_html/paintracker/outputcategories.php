<?php

include("common_functions.php");
error_reporting(1);
//start session so we can check the user credentials
session_start();
ob_start();
connect_db();

$query = "select * from categories order by id asc";
$sql = mysql_query($query) or die(mysql_error());

$cat = "";
$fields = "";

echo "<table>";
while( $row = mysql_fetch_array($sql) )
{
	if( $row['category'] != $cat || $row['fields'] != $fields )
	{
		echo "<tr><td>&nbsp</td></tr>";
		$cat = $row['category'];
		$fields = $row['fields'];
	}
	echo "<tr><td>$row[category]</td><td>$row[fields]</td><td>$row[rank]</td>";
	$options = explode(";", $row['options']);
	foreach( $options as $option )
	{
		if ($option != "")
		{
			echo "<td>$option</td>";
		}
	}
	echo "</tr>";
}

echo "</table>";