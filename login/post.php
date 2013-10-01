<?php
//checks cookie to make sure user has right access level for this page
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
//connects to database, selects it, runs the insert statement to add data, then redirects you back to the table
	$db = mysql_connect("localhost", "root");
	mysql_select_db("test",$db);
	$sql = "INSERT INTO car (year,make,model,miles,mods) VALUES ('$_POST[year]','$_POST[make]','$_POST[model]','$_POST[miles]','$_POST[mods]')";
	$result = mysql_query($sql);
	if(isset($sql))
	{
	echo "Thank You! Information Entered.\n <br>You will be redirected back to the table shortly.\n";
	}
?>

</body>
</html>
<?php } else {
//says go to hell if you haven't logged in
	echo "You must first login.";
	}
?>
