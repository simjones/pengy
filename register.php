<?php 

include 'database_func.php';

 //This code runs if the form has been submitted
 if (isset($_POST['submit'])) { 
 
 //This makes sure they did not leave any fields blank
 if (!$_POST['firstname'] | !$_POST['lastname'] | !$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] ) {
 	die('You did not complete all of the required fields');
 }
 // checks if the username is in use
if (!get_magic_quotes_gpc()) {
 	$_POST['username'] = addslashes($_POST['username']);
 }
 $usercheck = $_POST['username'];
 $check = mysql_query("SELECT username FROM users WHERE username = '$usercheck'") 
 or die(mysql_error());
 $check2 = mysql_num_rows($check);
 //if the name exists it gives an error
 if ($check2 != 0) {
 	die('Sorry, the username '.$_POST['username'].' is already in use.');
 }
 // this makes sure both passwords entered match
if ($_POST['pass'] != $_POST['pass2']) {
 	die('Your passwords did not match. ');
 }
// here we encrypt the password and add slashes if needed
$_POST['pass'] = md5($_POST['pass']);
if (!get_magic_quotes_gpc()) {
 	$_POST['pass'] = addslashes($_POST['pass']);
 	$_POST['username'] = addslashes($_POST['username']);
 }
 // now we insert it into the database
 $insert = "INSERT INTO users (firstname, lastname, username, password) VALUES ('".$_POST['firstname']."', '".$_POST['username']."', '".$_POST['username']."', '".$_POST['pass']."')";
$add_member = mysql_query($insert);
?>
<html>
<head>
<link rel="stylesheet" media="all" type="text/css" href="main.css" />
</head>
<body>
 <h1>Registered</h1>
 <p>Thank you, you have registered - you may now login</a>.</p>
<script>
setTimeout(function(){location.href='login.php'},2000);
</script>
 <?php } 
 else {	 ?>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 <link rel="stylesheet" media="all" type="text/css" href="main.css" />
 <div id="middle">
 <div id="header">
 <img src="ttlogo.jpg"/>
 </div>
 </div>
 <table border="0">
 <tr><td>First Name:</td><td>
 <input type="text" name="firstname" maxlength="60">
 </td></tr>
 <tr><td>Last Name:</td><td>
 <input type="text" name="lastname" maxlength="60">
 </td></tr>
 <tr><td>Username:</td><td>
 <input type="text" name="username" maxlength="60">
 </td></tr>
 <tr><td>Password:</td><td>
 <input type="password" name="pass" maxlength="10">
 </td></tr>
 <tr><td>Confirm Password:</td><td>
 <input type="password" name="pass2" maxlength="10">
 </td></tr>
 <tr><th colspan=2><input type="submit" name="submit" 
value="Register"></th></tr> </table>
 </form>
 <?php
 } ?> 

 </body>
 </html>