<?php
include 'connection.php';
include 'signup.html';
error_reporting(0);

if ($_POST['username']!=NULL or $_POST['password']!=NULL or $_POST['mail']!=NULL)
{
	$uname = $_POST['username'];
	$pwd = $_POST['password'];
	$mail = $_POST['mail'];

	$query = "SELECT * FROM users WHERE username = '$uname'";
	$result = mysqli_query($conn,$query);
	if ($result) 
	{
  		if (mysqli_num_rows($result) > 0)
  		{
    		echo "<script>alert('Username already taken.')</script>";
  		}

  		else 
  		{
    		$insert_query = "INSERT INTO USERS (username, password, mail) VALUES ('$uname','$pwd','$mail')";
	

			$data = mysqli_query($conn, $insert_query);
			if ($data)
			{
				echo "<script>alert('Account Creatd.')</script>";

			}

			else
			{
				echo "Not Inserted";
			}
  		}
	}

	
}

?>