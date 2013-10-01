<?php 
$authlevel = $HTTP_COOKIE_VARS["author"];
if ($authlevel == "Useradmin")
{ 
?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Refresh" content="3;
url=http://ihatelearning.powercalling.net/useradmin/useradmin.php">

</head>

<body>
<?php
	$db = mysql_connect("localhost", "root");
	mysql_select_db("test",$db);
	$sql = "INSERT INTO auth (name,password,access) VALUES ('$_POST[name]','$_POST[password]','$_POST[access]')";
	$result = mysql_query($sql);
	if(isset($sql))
	{
	echo "Thank You! Information Entered.\n <br>You will be redirected back to the table shortly.\n";
	}
?>

</body>
</html>
<?php } else {
			echo "You must first login.";
			}
?>