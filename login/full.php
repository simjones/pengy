
<?php
//makes sure you have the right access level for this page 
$authlevel = $HTTP_COOKIE_VARS["author"];
if ($authlevel == "Full")
{ 
//crap that is needed for the dynamic table
require_once('Connections/sqltest.php'); 
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($HTTP_GET_VARS['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $HTTP_GET_VARS['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_sqltest, $sqltest);
$query_Recordset1 = "SELECT * FROM car";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $sqltest) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($HTTP_GET_VARS['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $HTTP_GET_VARS['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="javascript">
<!--

function test()
{
   if (document.req.id.value =="")
          { alert("Please enter an id number.");
      return false;}
   
      {
      return true;
      }
}

//-->
</script>

</head>

<body>
<p>Click <a href="form.php">here</a> to add a record.</p>
 

<form name="req" method="post" action="delete.php" onSubmit="return test()">
 <p>Delete Record by ID 
   <input type="text" name="id">
   <input type="submit" name="Submit" value="Delete">
 </p>
 <p>&nbsp; </p>
</form>
<table border="1">
  <tr>
    <td width="115">year</td>
    <td width="122">make</td>
    <td width="126">model</td>
    <td width="119">miles</td>
    <td width="122">mods</td>
    <td width="119">ID</td>
  </tr>
  <?php do { ?>
  <tr>
    <td><?php echo $row_Recordset1['year']; ?></td>
    <td><?php echo $row_Recordset1['make']; ?></td>
    <td><?php echo $row_Recordset1['model']; ?></td>
    <td><?php echo $row_Recordset1['miles']; ?></td>
    <td><?php echo $row_Recordset1['mods']; ?></td>
	<td><?php echo $row_Recordset1['id']; ?></td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
mysql_free_result($Recordset1);
}
else 
	{
//if you ain't logged in, go to hell
	echo "You must first login.";
	}
?>
</body>
</html>
