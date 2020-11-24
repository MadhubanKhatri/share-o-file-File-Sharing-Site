<?php
include 'connection.php';
session_start();
?>


<style type="text/css">
	*
	{
		font-family: sans-serif;
		margin: 0;
	}
	.container
	{
		width: 100%;
		height: auto;
		background-color: dodgerblue;
		padding: 10px;
	}
	.container nav
	{
		/*border: 1px solid;*/
		display: inline-block;
		padding: 10px;
	}
	.container nav li
	{
		display: inline;
		margin-right: 100px;
		/*border:1px solid;*/
		font-size: 20px;
	}
	.container a
	{
		text-decoration: none;
		color: black;
	}
	.container .user_name a
	{
		color: white;
		border: 1px solid;
		padding: 10px;
		border-radius: 20px;
	}
	
	.container input[type='search']
	{
		padding: 10px;
	}
	.container input[type='submit']
	{
		padding: 10px;
		font-size: 14px;
		border:1px solid;
	}
	.container input[type='submit']:hover
	{
		background-color: green;
		color: white;
	}
	.main
	{
		width: 100%;
		height: 500px;
		display: inline-block;
		background-color: grey;
		opacity: 0.8;
		margin-top: 10px;
	}
	
	.main header
	{
		width: 50%;
		height: 300px;
		margin-left: 20px;
	}
	.data
	{
		width: 100%;
		height: auto;
		border:2px solid;
		padding: 15px;
	}
</style>


<div class="container">
	<nav>
		<li style="font-size: 35px;">Share-O-File</li>
		<li><a href="home.php">Home</a></li>
		<?php
		if (isset($_SESSION['user'])) {
			echo "<li><a href='logout.php'>Log Out</a></li>";
			echo "<li><a href='create_post.php'>Create A Post</a></li>";
			echo "<li class='user_name'><a href='#'>@".$_SESSION['user']."</a></li>";
			echo "<form action='search_user.php' method='GET'>";
			echo "<input type='search' name='term' placeholder='Search...' >";	
			echo "<input type='submit' name='submit' value='Search'>";
			echo "</form>";
		}
		else
		{
			echo "<li><a href='login.php'>Log In</a></li>";
			echo "<li><a href='signup.php'>Sign Up</a></li>";
		}
		?>
	</nav>
</div>

<div class="data">
	<header>
		<?php
if (isset($_SESSION['user']))
{
	$username = $_GET['name'];
	

	$query = "SELECT * FROM USER_POSTS WHERE uname = '$username'";
	$data = mysqli_query($conn, $query);
	$result = mysqli_fetch_all($data);
	$row = mysqli_num_rows($data);
	// echo "<pre>";
	// print_r($result);
	if ($row)
	{
		echo "<div class='main' style='background: white; padding: 20px 0px 20px 10px;'>";
		for ($i=$row-1; $i >=0 ; $i--) { 
			
			if ($username == $_SESSION['user'])
			{
				echo ($i+1).") <a target='_blank' href='file_shared/{$result[$i][3]}'>".$result[$i][3]."</a> <a style='color:red;' href='delete.php?post_id={$result[$i][0]}'>Delete</a><br><br>";
			}
			else
			{
				echo ($i+1).") <a target='_blank' href='file_shared/{$result[$i][3]}'>".$result[$i][3]."</a><br><br>";
			}
			

		}
		echo "</div>";
		
	}
	else
	{

		echo "<div class='main'>";
		echo "<h2>No Posts Yet.</h2>";
		echo "</div>";
	}
}
else
{
	echo "<div class='main'>";
	echo "<header><h1>Create Account In Easy steps.</h1>";
	echo "<h3>And Share your Files here.</h3><hr>";
	echo "<h4>Create Your Account: <a href='signup.php'>Sign Up</a></h4>";
	echo "<h4>Login Here: <a href='login.php'>Login</a></h4>";
	echo "</header>";
	echo "</div>";
}
?>
	</header>

</div>
