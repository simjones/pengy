<?php
// ini_set('display_errors', 1); 
// error_reporting(-1);
$connection = mysql_connect('localhost', 'drmazak_test', 'tests') or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
$database = "drmazak_test";
mysql_select_db($database, $connection) or die ("<p class='error'>Sorry, we were unable to connect to the database.</p>");
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
$_POST[id] = "null";

$sql = "INSERT INTO projects (projectName, dateStart, dateEnd, assignTo, comments) VALUES ('" . $_POST[projectName] . "', '" . $_POST[dateStart] . "', '" . $_POST[dateEnd] . "', '" . $_POST[assignTo] . "', '" . $_POST[comments] . "');";


echo($sql);
if(isset($_POST[lastName]))
{

mysql_query($sql) or die(mysql_error());;

mysql_close($connection);

}

?>