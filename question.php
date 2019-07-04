<!DOCTYPE html>
<html>
<head>
	<title>Ask Question</title>
</head>
<body style="width: 50%">
	<img src="Capture.PNG" style="width: 100%">
	<div>
		<form name="myForm" method="post" action="question.php">
			<input type="text" name="search" placeholder="  Search Queries" style="height: 25px; width: 80%;border-radius: 10px;border-color: black;margin-left: 20px	">
			<button type="submit" name="search_button" style="height: 30px; width: 10%;border-color: black;background: #3de5d7">Search</button><br>
			<button type="submit" name="ask_question" style="height: 37px; width: 90%;border-color: black;background: #3de5d7 ;margin-top: 10px;margin-left: 20px">Ask Question</button>
		</form>
		
	</div>
	<hr>



<?php
session_start();
$conn=mysqli_connect("localhost","root","",'mini_editor');
if (!$conn){
	die("connection_aborted".mysql_connect_error());
	echo "Connection refuse";
}
if (isset($_POST['search_button'])) {
	$question = $_POST['search'];
	$sql="SELECT * from post where title like '%$question%'";
	$result=mysqli_query($conn,$sql);
	$i=0;
    while($row = mysqli_fetch_assoc($result)) { ?>
        <div>
        	<p>
	        	<span style="font-size: 30px;margin-left: 20px"><b><?php echo $row['title']; ?></b></span><br>
	        	<span style="font-size: 20px;margin-left: 60%"><label>Answer by : "</label></span>
	        	<span style="font-size: 20px"><b><?php echo $row['post_by']; ?> "</b></span><br>
	        	<span style="font-size: 20px;margin-left: 20px"><label>Solution </label><br><textarea style="width: 80%;border-color: black;border-radius: 10px;margin-left: 20px"><?php echo $row['post']; ?></textarea></span><br>
        	</p>
        </div>
        <hr>
    <?php
	$i+=1;
	}
	if ($i<1){ ?>
		<div style="margin-left: 20px">
		<h2>Sorry......!!!<br>No record Found......!!! <br>Try to ask question......!!!</h2>
		</div>
		<hr>
	<?php }
	
}



if (isset($_POST['ask_question'])) {
	header('Location: ask_question.php');
}



$sql="SELECT * from question limit 25";
$result=mysqli_query($conn,$sql);
$result=mysqli_query($conn,$sql); ?>
<span style="margin-left: 20px;font-size: 30px"><b>Previous Asked Question</b></span>
<?php
while($row = mysqli_fetch_assoc($result)) { ?>
        <div >
	    	<form action="reply.php" method="post" style="border-color: black;border:2px">
	    		<span style="font-size: 20px;margin-left: 20px;"><b><?php echo $row['p_title']; ?></b></span>
	    		<input type="submit" value="View" style="margin-left: 5%;background: #e8a935;width: 80px;height: 30px">
	    		<input type="hidden" name="p_title" value="<?php echo $row['p_title']; ?>">
	    		<input type="hidden" name="title" value="<?php echo $row['title']; ?>">
	    		<input type="hidden" name="code" value="<?php echo $row['post']; ?>">
	    	</form>
    </div>
    <hr>

    <?php
	}

?>


</body>
</html>