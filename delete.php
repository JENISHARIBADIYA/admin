<?php
include('connect.php');

$sql = "DELETE FROM students where id=" . $_REQUEST['id'];
if ($conn->query($sql) === TRUE) {
	header('Location:students.php?msg=Data deleted Successfully.!');
} else {
	header('Location:students.php?msg=Error in Data Deletion.!');
}
