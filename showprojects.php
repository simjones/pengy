<?php 
include 'database_func.php';
session_start();
 //checks cookies to make sure they are logged in 
if(isset($_COOKIE['ID_my_site'])) { 
$username = $_COOKIE['ID_my_site']; 
$pass = $_COOKIE['Key_my_site']; 
$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
$name = mysql_query("SELECT firstname, lastname FROM users WHERE username = '$username'")or die(mysql_error()); 

$_SESSION['username'] = $username;
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
<!-- https://code.google.com/p/datejs/wiki/APIDocumentation -->
  <script src="date.js"></script>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="jquery-ui-timepicker-addon.js"></script>
  <script>/*
 $(document).ready(function(){
   var $form = $('form');
   $form.submit(function(){
      $.post($(this).attr('action'), $(this).serialize(), function(response){
            
      },'json');
      return false;
   });
});*/
  $(function() {
    $( "#dateStart" ).datetimepicker({
    dateFormat: "yy-mm-dd",
    timeFormat: "hh:mm:ss"
    });
  });
    $(function() {
    $( "#dateEnd" ).datetimepicker({
    dateFormat: "yy-mm-dd",
    timeFormat: "hh:mm:ss"
    });
  });

  </script>
</head>
<body>
 <div id="header">
    <img src="images/TTDefaultHeader.jpg">
 </div>
    <p>Welcome <?php echo($username); ?></p>
<nav id="nav">
<ul>
   <li class='active'><a href='members.php'><span>Home</span></a></li>
   <li><a href='insert_task.php'><span>Add New Project</span></a></li>
   <li><a href='showprojects.php'><span>View Projects</span></a></li>
   <li class='last'><a href='logtime.php'><span>Log Time</span></a></li>
</ul>
</nav>
<div id="middle">
<table border="0" class="ViewProjects">
<pre>
	<?php
include 'get_active_projects.php';
$projectPosts = GetActiveProjects(active);

foreach ($projectPosts as $post)
{
	echo "&nbsp;";
	echo "<tr><th><br>" . $post->projectName . "<br></th></tr>";
	echo "<tr><td>Organizer: " . $post->organizer . "</td><td> . Started On: " . $post->dateStarted . " </td><td>Status: " . $post->status . "</td></tr>";
	echo "<td>" . $post->comments . "</td></tr>";

}

?>

</pre>

 </table>
 
 </form>

 </div>

</body>
</html>