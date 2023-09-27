<?php
session_start();
include('connect.php');

$full_name = $_REQUEST['fullname'];
$skill = $_REQUEST['skill'];
$contact = $_REQUEST['contact'];
if($full_name ==  '') {
	header('Location:profile.php?msg=Full Name is required.!');
}
else if ($skill == '') {
	header('Location:profile.php?msg=Skill is required.!');
}
else if (strlen($phone) != 10)  {
	header('Location:profile.php?msg=Contact Us should be 10 digit.!.!');
} 
else {

	// file upload code
	$file = $_FILES['photo'];
	$target_dir = "dist/img/";
	$target_file = $target_dir . basename($file["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if($file['name'] != ''){

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) 
		{
			header('Location:profile.php?msg=Sorry, only JPG, JPEG, PNG and GIF files are allowed.');
			return;
		} 	
		else 
		{
				 if (move_uploaded_file($file["tmp_name"], $target_file)) {
							    
				  } else {
				    header('Location:profile.php?msg=Sorry, there was an error uploading your file.!');
				    return;
				  }
		}
	$sql = "UPDATE users SET full_name='$full_name', image='$target_file', skill = '$skill', contact = '$contact'  WHERE id='" . $_SESSION['userId'] . "'";
	} else {

	$sql = "UPDATE users SET full_name='$full_name', skill = '$skill', contact = '$contact' WHERE id='".$_SESSION['userId']."'";
	}
	// var_dump($sql);exit;

	// code to save data in database table
	if ($conn->query($sql) === TRUE) {
		header('Location:profile.php?msg=Profile Updated Successfully.!');
	} else {
	 header('Location:profile.php?msg=Error in Profile Updation.!');
	}
	
}

?>
