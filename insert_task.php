<?php

include 'database_func.php';
session_start();
// ini_set('display_errors', 1); 
// error_reporting(-1);
/*
echo($_POST[submit]);
echo("<br/>");
echo($_POST[firstName]);
echo("<br/>");
echo($_POST[lastName]);
echo("<br/>");
echo($_POST[text]);
echo("<br/>");
echo($_POST[id]);
*/
// $_POST['id'] = "null";
$username = $_SESSION['username'];
$userid = mysql_query("SELECT id FROM users WHERE username = '$username'")or die(mysql_error());
$id = mysql_result($userid, 0, 'id');

$sql = "INSERT INTO projects (projectName, organizer, dateStart, dateEnd, assignTo, comments) VALUES ('".$_POST['projectName'] . "', '" . $id . "', '" . $_POST['dateStart'] . "', '" . $_POST['dateEnd'] . "', '" . $_POST['assignTo'] . "', '" . $_POST['comments'] . "');";


echo($sql);
echo($id);

if(isset($_POST['lastName']))
{

mysql_query($sql) or die(mysql_error());;

mysql_close($connection);

}

?>