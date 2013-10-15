<?php
include 'database_func.php';
include 'project_post.php';
/*
$connection = mysql_connect('localhost', 'drmazak_die', 'diedie') or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
$database = "drmazak_blog";
mysql_select_db($database, $connection) or die ("<p class='error'>Sorry, we were unable to connect to the database.</p>");
*/ 
function GetActiveProjects($inStatus=null)
{
	if (!empty($inStatus))
	{
		$query = mysql_query("SELECT * FROM projects ORDER BY id DESC"); 
	}
	
	$postArray = array();
	while ($row = mysql_fetch_assoc($query))
	{
		$myPost = new ProjectPost($row["id"], $row['projectName'], $row['organizer'], $row['dateStart'], $row["dateEnd"], $row['assignTo'], $row['comments'], $row['status']);
		array_push($postArray, $myPost);
	}
	return $postArray;
}
?>
