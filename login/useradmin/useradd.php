<?php 
$authlevel = $HTTP_COOKIE_VARS["author"];
if ($authlevel == "Useradmin")
{ 
?>

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
<p>Add A User Here
</p>
<p></p>
<form name="req" method="post" action="post.php">
<p>Username:   
    <input type="text" name="name">
  </p>
<p>Password: 
  <input type="password" name="password"> 
</p>
<p>Access Level: 
  <select name="access">
  <option value="Full">Full</option>
  <option value="View">View</option>
  </select>
</p>
<p>
  <input type="submit" name="Submit" value="Add User">
</p>
</form>
</body>
</html>
<?php } else {
			echo "You must first login.";
			}
?>