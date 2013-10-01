<?php
//checks to see if you have the right access level for this page
$authlevel = $HTTP_COOKIE_VARS["author"];
if ($authlevel == "Full")
{ 
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Refresh" content="3;
url=http://ihatelearning.powercalling.net/full.php">
</head>

<body>
<?php
//connects to database, selects it, then deletes the record by id # then brings you back to table
	$db = mysql_connect("localhost", "root");
	mysql_select_db("test",$db);
	$sql = "DELETE FROM car WHERE ID = $_POST[id]";
	$result = mysql_query($sql);
	if(isset($sql))
	{
	echo "Thank You! Information Deleted.\n <br>You will be redirected back to the table shortly.\n";
	}
?>
</body>
</html>
<?php } else {
//says eat shit if you dont have the right access level cookie
	echo "You must first login.";
	}
?>
