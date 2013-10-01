
<?php
//$auth is set to false for security until login is complete
$auth = false;
//makes sure something was entered into both boxes
if (isset($_POST[name]) && isset($_POST[password])) {
//conects to server or dies
	mysql_connect('localhost', 'root')
		or die ('Unable to connect to server.');
//selects database or dies		
	mysql_select_db('test')
		or die ('Unable to select database.');
//sets up the select statement		
	$sql = "SELECT * FROM auth WHERE name = '$_POST[name]' AND password = '$_POST[password]'";
//executes the select statement and puts it in $result	
	$result = mysql_query($sql)
		or die ('Unable to execute query.');
//gets the number of rows found from $result		
	$num = mysql_numrows($result);
//says if there were rows found, then the user us valid so set $auth to true	
	if ($num != 0) {
		$auth = true;
		}
		
	}
//if auth is false, tell to go to hell	
if (! $auth) {

	echo "Authorization Failed";
	exit;
	}
//if auth is true, find out which user level they get
else if ($auth = true) {
//these take the username and sees what access level is attached to it
$sql2 = "SELECT ACCESS FROM auth WHERE name = '$_POST[name]'";
$result2 = mysql_query($sql2);
$row = mysql_fetch_array($result2, MYSQL_BOTH);
//if its a certain level, do this
if ($row[0] == "Full")
	{
	$auth = "Full";
	?>
	<meta http-equiv="refresh" content="2;URL=http://ihatelearning.powercalling.net/full.php">
	<?php
	}
	
elseif ($row[0] == "View")
	{
	?>
	<meta http-equiv="refresh" content="2;URL=http://www.dogpile.com">
	<?php
	}
	
elseif ($row[0] == "Useradmin")
	{
	$auth = "Useradmin";
	?>
	<meta http-equiv="refresh" content="2;URL=http://ihatelearning.powercalling.net/useradmin/useradmin.php">
	<?php 
	}

}
//set cookie for security on all other pages
setcookie("author", $auth);

?>

