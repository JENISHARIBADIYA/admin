<?php
include('connect.php');

$sname = $_REQUEST['sname'];
$scode = $_REQUEST['scode'];

if($sname ==  '') {
	header('Location:subject_add.php?msg=Subject Name is required.!');
}
else if($scode ==  '') {
	header('Location:subject_add.php?msg=Subject Code is required.!');
}
else {

	// code to save data in database table
if(isset($_REQUEST['edit_id'])) {
	$sql = "UPDATE subjects SET subject_name='$sname', subject_code = '$scode' WHERE id='".$_REQUEST['edit_id']."'";
	if ($conn->query($sql) === TRUE) {
		header('Location:subjects.php?msg=Data Updated Successfully.!');
	} else {
	header('Location:subjects.php?msg=Error in Data Updation.!');
	}
}
else {
	$sql = "INSERT INTO subjects (subject_name,subject_code) VALUES ('$sname', '$scode')";
	if ($conn->query($sql) === TRUE) {
	header('Location:subjects.php?msg=Data Saved Successfully.!');
	} else {
	header('Location:subjects.php?msg=Error in Data Insertion.!');
	}
}	
}
