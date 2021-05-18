<?php 

require_once("connect.php");

$id = $_POST['id'] ?? null;

// if (!$id) {
// 	header('location: index.php');
// 	exit;
// }

$sql = "DELETE FROM developers WHERE id = $id";

$result = mysqli_query($link, $sql);

if ($result) {
	header('location: index.php');
	exit;
} else {
	echo "error";
}

?>