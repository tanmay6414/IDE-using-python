<?php
$conn=mysqli_connect("localhost","root","",'mini_editor');
if (!$conn){
	die("connection_aborted".mysql_connect_error());
	echo "Connection refuse";
}
session_start();

$sql="SELECT * FROM question";
if ($result=mysqli_query($conn,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    { ?>
    <div>
    	<h1><?php echo $row[0]; ?></h1>
    </div>
  <?php
}
}
?>
https://www.youtube.com/watch?v=xQOnhY2GfqA