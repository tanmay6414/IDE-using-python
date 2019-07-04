<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body style="width: 50%">
	<img src="Capture.PNG" style="width: 100%">
	<div style="margin-left: 33.33%">
		<h1>Register User</h1>
		<form name="myForm" action="register.php" method="post">
			<label style="font-size: 20px"><b>Username</b> </label><br>
			<input type="text" name="username" style="height: 20px;width: 200px;border-radius: 5px;border-color: black"	><br>
			<label style="font-size: 20px"><b>Email</b> </label><br>
			<input type="text" name="email" style="height: 20px;width: 200px;border-radius: 5px;border-color: black"><br>
			<label style="font-size: 20px"><b>Password</b> </label><br>
			<input type="password" name="password" style="height: 20px;width: 200px;border-radius: 5px;border-color: black"><br>
			<button type="submit" name="reg" style="margin-top: 10px;width: 200px;height: 25px">Register</button><br>
			<button type="submit" name="login" style="margin-top: 10px;width: 200px;height: 25px">Login</button>
			
		</form>
	</div>

</body>
</html>


<?php
$conn=mysqli_connect("localhost","root","",'mini_editor');
if (!$conn){
	die("connection_aborted".mysql_connect_error());
	echo "Connection refuse";
}
if (isset($_POST['reg'])) {
  // receive all input values from the form
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  
	$query = "INSERT INTO users (name, email, password) VALUES ('$username', '$email', '$password')";
	mysqli_query($conn, $query);
	header('Location: index.php');

}
if (isset($_POST['login'])) {
	header('Location: index.php');
}

?>