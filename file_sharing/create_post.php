<?php
include 'connection.php';
error_reporting(0);
session_start();
$username = $_SESSION['user'];
$pwd = $_SESSION['pwd'];


if (isset($_FILES['post']))
{
	$file_name = $_FILES['post']['name'];
	$file_temp = $_FILES['post']['tmp_name'];
	$moveFile = move_uploaded_file($file_temp, 'file_shared/'.$file_name);

	if ($moveFile == 1)
	{

	# code...
	$query = "INSERT INTO USER_POSTS (uname, password, post) VALUES ('$username',$pwd,'$file_name')";
	$data = mysqli_query($conn, $query);
		if ($data)
		{
			header('location: home.php');
		}

		else
		{
			echo "No Upload";
		}
	}	
	

}




?>


<div>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="post"><br><br>
		<input type="submit" name="submit" value="Upload">
	</form>
</div>
