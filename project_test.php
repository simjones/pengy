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
</div>
<div id="right">
<p>1</p>
</div>
</body>
</html>

 