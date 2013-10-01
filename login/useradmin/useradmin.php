<?php
//sees if you have the right access level cookie by god! 
$authlevel = $HTTP_COOKIE_VARS["author"];
if ($authlevel == "Useradmin")
{ 
?>
<?php require_once('Connections/sqltest.php'); ?>
<?php
mysql_select_db($database_sqltest, $sqltest);
$query_users = "SELECT * FROM auth";
$users = mysql_query($query_users, $sqltest) or die(mysql_error());
$row_users = mysql_fetch_assoc($users);
$totalRows_users = mysql_num_rows($users);
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<p>To Add A User Click <a href="http://ihatelearning.powercalling.net/useradmin/useradd.php">Here</a>.
</p>
<p>
<form name="req" method="post" action="delete.php" onSubmit="return test()">
 <p>Delete Record by ID 
   <input type="text" name="id">
   <input type="submit" name="Submit" value="Delete">
 </p>
 <p>&nbsp; </p>
</form>
</p>
<table border="1">
  <tr>
    <td>name</td>
    <td>password</td>
    <td>id</td>
    <td>access</td>
  </tr>
  <?php do { ?>
  <tr>
    <td><?php echo $row_users['name']; ?></td>
    <td><?php echo $row_users['password']; ?></td>
    <td><?php echo $row_users['id']; ?></td>
    <td><?php echo $row_users['access']; ?></td>
  </tr>
  <?php } while ($row_users = mysql_fetch_assoc($users)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($users);
 } else {
//and if you ain't got the right cookie get the damn hell outta here
				echo "You must first login.";
				}
?>