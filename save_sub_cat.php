<?php
include('connect.php');

$catname = $_REQUEST['catname'];
$sub_cat_name = $_REQUEST['sub_cat_name'];

$status = $_REQUEST['status'];

if($catname ==  '') {
	header('Location:sub_category_add.php?msg=Category selection is required.!');
}
else if($sub_cat_name ==  '') {
	header('Location:sub_category_add.php?msg=Sub Category Name is required.!');
}
else {

	// code to save data in database table
if(isset($_REQUEST['edit_id'])) {

	$sql = "UPDATE subcategories SET subcat_name='$sub_cat_name', status='$status', cat_id ='$catname' WHERE id='".$_REQUEST['edit_id']."'";
	if ($conn->query($sql) === TRUE) {
		header('Location:sub_categories.php?msg=Data Updated Successfully.!');
	} else {
	 header('Location:sub_categories.php?msg=Error in Data Updation.!');
	}
}
else {

	$sql = "INSERT INTO subcategories (subcat_name,status,cat_id) VALUES ('$sub_cat_name', '$status','$catname')";
	if ($conn->query($sql) === TRUE) {
	header('Location:sub_categories.php?msg=Data Saved Successfully.!');
	} else {
	 header('Location:sub_categories.php?msg=Error in Data Insertion.!');
	}
}

	
}
