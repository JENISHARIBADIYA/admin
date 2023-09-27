<?php
include('connect.php');

$email = $_REQUEST['email'];
$fname = $_REQUEST['fname'];
$mname = $_REQUEST['mname'];
$lname = $_REQUEST['lname'];
$phone = $_REQUEST['phone'];
$dob = date('Y-m-d',strtotime($_REQUEST['dob']));
$city = $_REQUEST['city'];
$state = $_REQUEST['state'];
$country = $_REQUEST['country'];
$status = $_REQUEST['status'];

$sql = "SELECT * FROM students where email = '".$email."'";
$result = $conn->query($sql);

if($fname ==  '') {
	header('Location:add.php?msg=First Name is required.!');
}
else if($lname ==  '') {
	header('Location:add.php?msg=Last Name Id is required.!');
}
else if($email ==  '') {
	if(isset($_REQUEST['edit_id'])) {
	header('Location:edit.php?msg=Email Id is required.!');
	}
	else {
		header('Location:add.php?msg=Email Id is required.!');
	}
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	header('Location:add.php?msg=Invalid email format.!');
}
else if($result->num_rows > 0) {
	header('Location:add.php?msg=Email Id already exist.!');	
}
else if(strlen($phone) != 10) {
	header('Location:add.php?msg=Phone should be 10 digit.!');
}
else {

	// code to save data in database table
if(isset($_REQUEST['edit_id'])) {

	$sql = "UPDATE students SET firstname='$fname', middleName = '$mname',lastname = '$lname',email='$email',phone='$phone',dob='$dob',country='$country',status='$status' WHERE id='".$_REQUEST['edit_id']."'";
	if ($conn->query($sql) === TRUE) {
		header('Location:students.php?msg=Data Updated Successfully.!');
	} else {
	 header('Location:students.php?msg=Error in Data Updation.!');
	}
}
else {

	$sql = "INSERT INTO students (firstname,middleName,lastname,email,phone,dob,city,state,country,status) VALUES ('$fname', '$mname','$lname','$email','$phone','$dob','$city','$state','$country','$status')";
	if ($conn->query($sql) === TRUE) {
	header('Location:students.php?msg=Data Saved Successfully.!');
	} else {
	 header('Location:students.php?msg=Error in Data Insertion.!');
	}
}

	
}
