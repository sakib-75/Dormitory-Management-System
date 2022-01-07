<?php
	include('../config.php');

	$hostel_id = $_GET['hostel'];
	
    $sql="delete from hostel where hostel_id='$hostel_id'";
	$con->query($sql);
	
	header("Location: hostel.php?id=4");
?>