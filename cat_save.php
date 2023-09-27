<?php
include('connect.php');


$fname = $_REQUEST['fname'];
$status = $_REQUEST['status'];

if ($fname == '') {
	header('Location:cat_add.php?msg=categories Name is required.!');
} else {

	// code to save data in database table
	if (isset($_REQUEST['edit_id'])) {

		$sql = "UPDATE categories SET cat_name='$fname', status='$status' WHERE id='" . $_REQUEST['edit_id'] . "'";
		if ($conn->query($sql) === TRUE) {
			header('Location:categories.php?msg=Data Updated Successfully.!');
		} else {
			header('Location:categories.php?msg=Error in Data Updation.!');
		}
	} else {

		$sql = "INSERT INTO categories (cat_name,status) VALUES ('$fname', '$status')";
		if ($conn->query($sql) === TRUE) {
			header('Location:categories.php?msg=Data Saved Successfully.!');
		} else {
			header('Location:categories.php?msg=Error in Data Insertion.!');
		}
	}


}