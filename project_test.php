<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title>drew mazak dot com</title>
<link rel="stylesheet" href="css/main.css" type="text/css" media="all" />
<style type="text/css" media="all">@import url("css/main.css");</style>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="MSSmartTagsPreventParsing" content="TRUE" />
<meta http-equiv="expires" content="-1" />
<meta http-equiv= "pragma" content="no-cache" />
<meta name="robots" content="all" />
</head><body>
<div id="top">
<p>1</p>
</div>
<div id="left">
<p>1</p>
</div>
<div id="middle">
<pre>
	<?php
include 'get_active_projects.php';
$projectPosts = GetActiveProjects();

foreach ($projectPosts as $post)
{
	echo "&nbsp;";
	echo "<br>" . $post->projectName . "<br>";
	echo "<p>" . $post->comments . "</p>";
	  echo "<span>Organizer: " . $post->organizer . " Started On: " . $post->dateStarted . " Status: " . $post->status . "</span><br><br>";

}

?>

</pre>
</div>
<div id="right">
<p>1</p>
</div>
</body>
</html>

 