<?php
include 'connection.php';

$post_id = $_GET['post_id'];
// echo $post_id;
$delete_query = "DELETE FROM USER_POSTS WHERE id='$post_id'";
$data = mysqli_query($conn,$delete_query);

if ($data)
{
	header('location: home.php');

}
else
{
	echo "Not Deleted";
}

?>