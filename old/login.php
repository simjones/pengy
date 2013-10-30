<!DOCTYPE html>
<html>
    <head>
        <title>IWP: Assignment 2 by Drew Mazak</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<script type="text/javascript" src="sha512.js"></script>
<script type="text/javascript" src="forms.js"></script>

</head>
<body>
<?php
if(isset($_GET['error'])) { 
   echo 'Error Logging In!';
}
?>
<form action="process_login.php" method="post" name="login_form">
   Email: <input type="text" name="email" /><br />
   Password: <input type="password" name="p" id="password"/><br />
   <input type="button" value="Login" onclick="formhash(this.form, this.form.password);" />
</form>

</body>

</html>