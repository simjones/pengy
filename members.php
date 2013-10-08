<?php 
include 'database_func.php';

 //checks cookies to make sure they are logged in 
if(isset($_COOKIE['ID_my_site'])) { 
$username = $_COOKIE['ID_my_site']; 
$pass = $_COOKIE['Key_my_site']; 
$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error()); 
while($info = mysql_fetch_array( $check )) 	 
{ 
 //if the cookie has the wrong password, they are taken to the login page 
if ($pass != $info['password']) {
header("Location: login.php"); 
} 
//otherwise they are shown the admin area
/*	 
else { 
echo "Admin Area<p>"; 
echo "Your Content<p>"; 
echo "<a href=logout.php>Logout</a>"; 
} 
*/
} 
} 
//if the cookie does not exist, they are taken to the login screen 
else {			 
header("Location: login.php"); 
} 
?>
<!DOCTYPE html>
 
<html>
<head>
  <meta charset="utf-8" />
  <title>TimeTracker Administrative Console</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" media="all" type="text/css" href="main.css" />

  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="jquery-ui-timepicker-addon.js"></script>
  <script>
 
  $(function() {
    $( "#datepicker" ).datetimepicker();
  });
  </script>
</head>
<body>
 
<p>Start Date: <input type="text" id="datepicker" /></p>
<br/><br/>
<p>End Date: <input type="text" id="datepicker" /></p>


</body>
</html>