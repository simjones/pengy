<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title>drew mazak dot com</title>
<link rel="stylesheet" href="main.css" type="text/css" media="all" />
<style type="text/css" media="all">@import url("css/main.css");</style>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="MSSmartTagsPreventParsing" content="TRUE" />
<meta http-equiv="expires" content="-1" />
<meta http-equiv= "pragma" content="no-cache" />
<meta name="robots" content="all" />
<script type="text/javascript">
function clock() {
   var now = new Date();
   var outStr = now.getHours()+':'+now.getMinutes()+':'+now.getSeconds();
   var outStrDay = " " + (now.getMonth() + 1) + '/' + now.getDate() + '/' + now.getFullYear();
   var timestamp = outStr + outStrDay;
   document.getElementById("clock").innerHTML=timestamp;
   setTimeout('clock()',1000);
}
</script>
</head><body>
 <div id="header">
    <img src="images/TTDefaultHeader.jpg">
 </div>
    
<nav id="nav">
<ul>
   <li class='active'><a href='members.php'><span>Home</span></a></li>
   <li><a href='addnew.php'><span>Add New Tasks</span></a></li>
   <li><a href='showprojects.php'><span>View Tasks</span></a></li>
   <li><a href='reports.php'><span>Reports</span></a></li>
   <li class='last'><div id="clock"><script>clock(); </script></div></li>
</ul>
</nav>
    <!---
<div id="top">

</div>
<div id="left">

</div>
<div id="middle">
<pre>-->
<?php

?>

</pre>
</div>
</body>
</html>
