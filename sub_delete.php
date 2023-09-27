<?php
include('connect.php');

$sql = "DELETE FROM subcategories where id=" . $_REQUEST['id'];
if ($conn->query($sql) === TRUE) {
	header('Location:sub_categories.php?msg=Data deleted Successfully.!');
} else {
	header('Location:sub_categories.php?msg=Error in Data Deletion.!');
}
