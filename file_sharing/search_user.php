<?php
include 'connection.php';
error_reporting(0);
$search_term = $_GET['term'];
// echo $search_term;

$query = "SELECT username FROM USERS WHERE username = '$search_term'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);

// echo "<pre>";
// print_r($result['username']);

?>

<style type="text/css">
	*
	{
		font-family: sans-serif;
	}
	.container
	{
		width: auto;
		height: auto;
		display: inline-block;
		border: 2px solid;
		padding: 20px;
		position: absolute;
		top: 50px;
		left: 400px;
	}
	.container p
	{
		font-size: 25px;
	}

</style>
<div class="container">
	<h1>Search Result:</h1>
	<?php if ($result)
	{
		echo "<p><a href='profile.php?name={$result['username']}'>".$result['username']."</a></p>";
	} else{echo "No results Found.";} ?>
</div>

