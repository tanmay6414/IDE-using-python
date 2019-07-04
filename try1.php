<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['button1'])) {
	$errors = htmlspecialchars($_POST['code']);
	$errors=nl2br($errors);
	$sql = "INSERT INTO try1 (errors)
	VALUES ('$errors')";

	if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

if (isset($_POST['button2'])) {
	$sql="SELECT * from try1";
	$result=mysqli_query($conn,$sql);
	

	 while ($row=mysqli_fetch_row($result)){
	 	$id = "";
	 	$id .= "<br>";
	 	$strlen = strlen($row[0]);
	 	for( $i = 0; $i <= $strlen; $i++ ) {
	 		$char = substr( $row[0], $i, 1 );
	 		if ($char=="\n"){
	 			$id.="<br>".$char;
	 		}else{
	 			$id.=$char;
	 		}
	 	}
	 	echo $id;

	 }
	
	

}
// $errors = htmlspecialchars($_POST['code']);
	// echo nl2br($errors);

mysqli_close($conn);
?>




<!DOCTYPE html>
<html>
<head>
	<title>TRY</title>
</head>
<body>
	<form action="try1.php" method="post">
		<label>Enter Code</label><br>
		<textarea type="text" name="code"></textarea><br>
		<button type="submit" name="button1">PUSH</button>
		<button type="submit" name="button2">Show Code</button>
	</form>

</body>
</html>