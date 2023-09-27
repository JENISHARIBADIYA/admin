<?php
include('connect.php');

$sql = "DELETE FROM categories where id=" . $_REQUEST['id'];
if ($conn->query($sql) === TRUE) {
	header('Location:categories.php?msg=Data deleted Successfully.!');
} else {
	header('Location:categories.php?msg=Error in Data Deletion.!');
}

?>