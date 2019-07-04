<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body style="width: 50%">
	<img src="Capture.PNG" style="width: 100%">
	<div style="margin-left: 33.33%;">
		<h1>User Login</h1>
		<form name="myForm" action="index.php" method="post" style="margin-top: 30px;">
			<label style="font-size: 20px"><b>Username</b> </label><br>
			<input type="text" name="username" style="height: 20px;width: 200px;border-radius: 5px;border-color: black"><br>
			<label style="font-size: 20px"><b>Password</b> </label><br>
			<input type="password" name="password" style="height: 20px;width: 200px;border-radius: 5px;border-color: black"><br>
			<button type="submit" name="login_user" style="margin-top: 10px;width: 200px;height: 25px"><b> Submit</b> </button><br>
			<button type="submit" name="sign" style="margin-top: 10px;width: 200px;height: 25px"><b> Sign Up</b> </button>	
		</form>
		
	</div>

</body>
</html>

<?php
session_start();
$conn=mysqli_connect("localhost","root","",'mini_editor');
if (!$conn){
	die("connection_aborted".mysql_connect_error());
	echo "Connection refuse";
}
if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  
$query = "SELECT * FROM users WHERE name='$username' AND password='$password'";
$results = mysqli_query($conn, $query);
if (mysqli_num_rows($results) == 1) {
  $_SESSION['username'] = $username;
  $_SESSION['success'] = "You are now logged in";
  echo $username;
  header('Location: question.php');

}
else{
	echo "<span style='margin-left:33.33%;margin-top:20px;font-size:20px'>Incoreect Username or password</span><br><span style='margin-left:33.33%;font-size:20px'>Please enter correct data...!!!</span>";
}
  
}


if (isset($_POST['sign'])) {
	header('Location: register.php');
}
?>