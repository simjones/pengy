 <?php 
 // Connects to  Database 
 mysql_connect("localhost", "drmazak_test", "tests") or die(mysql_error()); 
 mysql_select_db("drmazak_secure_login") or die(mysql_error()); 
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
		else { 
			echo "Admin Area<p>"; 
			echo "Your Content<p>"; 
			echo "<a href=logout.php>Logout</a>"; 
 		} 
 	} 
 } 
 //if the cookie does not exist, they are taken to the login screen 
 else {			 
 header("Location: login.php"); 
 } 
 ?>