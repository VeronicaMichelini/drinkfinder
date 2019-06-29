<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: profile.php"); // Redirecting To Profile Page
}
?> 
<!DOCTYPE html>
<html>
<body background = 'https://static.vecteezy.com/system/resources/previews/000/401/351/non_2x/vector-background-wallpaper-with-polygons-in-gradient-colors.jpg';

<head>
  <title>Login </title>
</head>
<body>
 <div id="login">
  <h2>Login</h2>
  <form action="" method="post">
   Username :<br><input id="name" name="username" placeholder="username" type="text"><br><br>
   Password :<br><input id="password" name="password" placeholder="**********" type="password"><br><br>
   <input name="submit" type="submit" value=" Login ">
   <span><?php echo $error; ?></span>
  </form>
 </div>
</body>
</html>