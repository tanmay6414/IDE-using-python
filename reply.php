<?php

$conn=mysqli_connect("localhost","root","",'mini_editor');
if (!$conn){
	die("connection_aborted".mysql_connect_error());
	echo "Connection refuse";
}
session_start();
$post_by =$_SESSION['username'];
$title = $_POST['title'];
$p_title = $_POST['p_title'];
$code = $_POST['code'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Reply</title>
</head>
<body style="width: 50%">
	<img src="Capture.PNG" style="width: 100%">
	<hr>
	<div>
		<span style="font-size: 30px;margin-left: 20px"><b><?php echo $p_title ?></b></span><br>
		<span style="font-size: 20px;margin-left: 60%"><label><b>Asked by : "</b></label></span>
		<span style="font-size: 20px"><b><?php echo $title ?> "</b></span><br>
		<textarea style="margin-left:20px;width: 80%;height: 300px"><?php echo $code ?></textarea>
	</div><br>
	<hr>





<?php
$sql1="SELECT * from post where question like '%$p_title%'";
//$result1=mysqli_query($conn,$sql1);
if ($result1=mysqli_query($conn,$sql1)){
	while ($row1=mysqli_fetch_row($result1)){ 
		?>
	<div >
		<span style="font-size: 30px;margin-left: 20px"><b><?php echo $row1[1]; ?></b></span><br>
		<span style="font-size: 20px;margin-left: 60%"><label><b>Answer by : "</b></label></span>
		<span style="font-size: 20px"><b><?php echo $row1[0]; ?> "</b></span><br>
		<textarea style="width: 80%;height: 300px;margin-left: 20px"><?php echo $row1[2]; ?></textarea>

	</div>
	<hr>
<?php }
}
?>

	<div style="margin-left: 20px;margin-top: 50px">
		<span style="font-size: 50px;margin-top: 20px"><b>Give Reply :</b></span><br>
		
		<form method="post" action="reply.php">
			<input type="hidden" name="post_by" value="<?php echo $post_by; ?>" >
			<input type="hidden" name="question" value="<?php echo $p_title; ?>"><br>
			<label style="font-size: 30px"><b>Question Title</b></label><br>
			<input type="text" name="title1" style="width: 80%;height: 30px;margin-top: 10px;margin-bottom:20px "><br>
			<label style="font-size: 30px;"><b>Code</b></label><br>
			<textarea name="code1" style="width: 80%;height: 300px;margin-top: 10px"></textarea><br>
			<button type="submit" name="give_reply" style="height: 37px; width: 20%;border-color: black;background: #cec6b7 ;margin-top: 20px;margin-left: 20px;border-radius: 10px">Submit</button>
		</form>
	</div>
	<hr>
<?php
if (isset($_POST['give_reply'])) {
	$post_by=$_POST['post_by'];
	$question = $_POST['question'];
	$title1 = $_POST['title1'];
	$code1 = $_POST['code1'];

	$sql="INSERT INTO post values ('$post_by','$title1','$code1','$question')";
	$result=mysqli_query($conn,$sql);
	header('Location: question.php');
}
?>
</body>
</html>