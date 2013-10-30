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
function clock() {
   var now = new Date();
   var outStr = now.getHours()+':'+now.getMinutes()+':'+now.getSeconds();
   var outStrDay = " " + (now.getMonth() + 1) + '/' + now.getDate() + '/' + now.getFullYear();
   var timestamp = outStr + outStrDay;
   document.getElementById("clock").innerHTML=timestamp;
   setTimeout('clock()',1000);
}

  </script>
</head>
<body>
 <div id="header">
    <img src="images/TTDefaultHeader.jpg">
 </div>
    
<nav id="nav">
<ul>
   <li class='active'><a href='members.php'><span>Home</span></a></li>
   <li><a href='#'><span>Add New Tasks</span></a></li>
   <li><a href='#'><span>View Tasks</span></a></li>
   <li><a href='#'><span>Reports</span></a></li>
   <li class='last'><div id="clock"><script>clock(); </script></div></li>
</ul>
</nav>
    <div id="left"><p>Welcome <?php echo($username); ?><br/></p>
        <pre>
        <p><table border="0" class="ViewProjects">
            <tr><td>Project Name<td>Organizer</td><td>Started on:</td><td>Status</td><td>Comments</td></tr>

	<?php
include 'get_active_projects.php';
$projectPosts = GetActiveProjects('active');

foreach ($projectPosts as $post)
{
	echo "<tr>";
	echo "<td><br>" . $post->projectName . "<br></td>";
	echo "<td>" . $post->organizer . "</td><td>" . $post->dateStarted . " </td><td>" . $post->status . "</td>";
	echo "<td>" . $post->comments . "</td></tr>";

}

?>

</pre>

 </table></div>
 <div id="middle">
<table border="0">
 <form action="insert_task.php" method="post" id="form">
 <tr><td>Project Name:</td><td>
 <input type="text" name="projectName" id="projectName" />
 </td></tr>
 <tr><td>Start Date/Time:</td><td>
<input type="text" name="dateStart" id="dateStart" />
 </td></tr>
 <tr><td>End Date/Time:</td><td>
 <input type="text" name="dateEnd" id="dateEnd" />
 </td></tr>
 <tr><td>Assign to:</td><td>
 <input type="text" name="assignTo" id="assignTo" />
 </td></tr>
 <tr><td>Comments:</td>
 <td><textarea cols="30" rows="5" name="comments" id="comments">
</textarea></tr><td>
  <tr><td>
 <input type="submit" id="submit" value="Submit Task" />
 </td>
 <td>
 <input type="button" id="reset" value="Reset" />
 </tr>

 </table>
 
 </form>

 </div>
    <div id="right"><p>This is the right div.</div>
</body>
</html>