
<!DOCTYPE html>
<html>
<head>
	<title>Ask Question</title>
</head>
<body style="width: 50%">
	<img src="Capture.PNG" style="width: 100%">	
	<hr>
	<div>
		<form name="myForm" action="ask_question.php" method="post">
			<label style="margin-left: 20px;font-size: 30px"><b>Question Title</b></label><br>
			<input type="text" name="q_title" style="margin-left: 20px;height: 30px;width: 80%;margin-top: 10px"><br><br>
			<label style="margin-left: 20px;font-size: 30px"><b>Code</b></label><br>
			<textarea name="code" style="height: 300px;width: 80%;margin-left: 20px"></textarea><br><br>
			<button name="ask_question" style="height: 37px; width: 20%;border-color: black;background: #cec6b7 ;margin-top: 10px;margin-left: 20px;border-radius: 10px">Ask Question</button>
		</form>

	</div>
	<hr>

</body>
</html>

<?php
session_start();
$title= $_SESSION['username'];
$conn=mysqli_connect("localhost","root","",'mini_editor');
if (!$conn){
	die("connection_aborted".mysql_connect_error());
	echo "Connection refuse";
}
if (isset($_POST['ask_question'])) {
	$q_title = $_POST['q_title'];
	$code = htmlspecialchars($_POST['code'],ENT_QUOTES);
	//$code=nl2br($code);
	$sql = "INSERT INTO question VALUES ('$title','$q_title','$code')";
	if (mysqli_query($conn, $sql)) {
		$_SESSION['q_title']=$q_title;
	    header('Location: question.php');
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
?>