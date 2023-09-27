<?php
include('connect.php');

$sql = "DELETE FROM subjects where id=" . $_REQUEST['id'];
if ($conn->query($sql) === TRUE) {
    header('Location:subjects.php?msg=Data deleted Successfully.!');
} else {
    header('Location:subjects.php?msg=Error in Data Deletion.!');
}
