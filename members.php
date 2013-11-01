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
  <script type="text/javascript" src="jquery.timer.js"></script>
  <script type="text/javascript" src="timer_demo.js"></script>
  <script>/*
 $(document).ready(function(){
   var $form = $('form');
   $form.submit(function(){
      $.post($(this).attr('action'), $(this).serialize(), function(response){
            
      },'json');
      return false;
   });
});*/
$(document).ready(function(){
Example1.Timer.toggle();
});

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
    
<div id='cssmenu'>
<ul>
   <li class='active'><a href='index.html'><span>Home</span></a></li>
   <li class='has-sub'><a href='#'><span>Log</span></a>
      <ul>
         <li><a href='#'><span>Clock In</span></a></li>
         <li><a href='#'><span>Clock Out</span></a></li>
         <li class='last'><a href='#'><span>Log Task</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Tasks</span></a>
      <ul>
         <li><a href='#'><span>Current</span></a></li>
         <li><a href='#'><span>Completed</span></a></li>
         <li class='last'><a href='#'><span>All</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Graph</span></a>
   	<ul>
   	   <li><a href='#'><span>By Hours</span></a></li>
   	   <li class='last'><a href='#'><span>By Task</span></a></li>
   	</ul>
   </li>
   <li class='has-sub'><a href='#'><span>Messages</span></a>
   	<ul>
   	   <li><a href='#'><span>Inbox</span></a></li>
   	   <li class='last'><a href='#'><span>Compose</span></a></li>
   	</ul>
   </li>
   <li><a href='index.html'><span>Account</span></a></li>
   <li><a href='index.html'><span>Help</span></a></li>
  <li class='last'><div id="clock"><script>clock(); </script></div></li>
</ul>
</div>
<!-- <nav id="nav">
<ul>
   <li class='active'><a href='members.php'><span>Home</span></a></li>
   <li><a href='addnew.php'><span>Add New Tasks</span></a></li>
   <li><a href='showprojects.php'><span>View Tasks</span></a></li>
   <li><a href='reports.php'><span>Reports</span></a></li>
   <li class='last'><div id="clock"><script>clock(); </script></div></li>
</ul>
</nav> -->

<!--
    <div id="left"><p>Welcome <?php echo($username); ?><br/></p>
        <pre>
        <p><table border="0" class="ActiveProjects">
            <tr><td>Active Projects</td></tr>

	<?php
include 'get_active_projects.php';
$projectPosts = GetActiveProjects('active');

foreach ($projectPosts as $post)
{
	echo "<tr>";
	echo "<td><br>" . $post->projectName . "<br></td>";
	/*
	echo "<td>" . $post->organizer . "</td><td>" . $post->dateStarted . " </td><td>" . $post->status . "</td>";
	echo "<td>" . $post->comments . "</td></tr>";
	*/

}

?>

</pre>

-->
    <span id="stopwatch">00:00:00</span>
    <p>
        <input type='button' value='Play/Pause' onclick='Example1.Timer.toggle();' />
        <input type='button' value='Stop/Reset' onclick='Example1.resetStopwatch();' />
    </p>
 
 </form>

 </div>
    <div id="right"><p>This is the right div.</div>
</body>
</html>