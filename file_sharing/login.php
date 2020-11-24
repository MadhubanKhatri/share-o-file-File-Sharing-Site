<?php
include 'connection.php';
include 'login.html';
session_start();

if (isset($_POST['login']))
{
	$uname = $_POST['username'];
	$pwd = $_POST['password'];

	$query = "SELECT * FROM USERS WHERE username = '$uname' and password = '$pwd'";
	$data = mysqli_query($conn, $query);
	$arr = mysqli_fetch_assoc($data);
	

	if ($arr)
	{
		$_SESSION['user'] = $uname;
		$_SESSION['pwd'] = $pwd;
		header('location: home.php');
	}
	else
	{
		echo "<script>alert('Invalid Username or Password')</script>";
	}
}
?>