<?php
	include('../config.php');

	$hostelid=$_GET['hostel'];

	$hname=$_POST['hname'];
	$rno=$_POST['rno'];
	$capacity=$_POST['capacity'];
	$rtype=$_POST['rtype'];
	
	
	
	//Update food 
	
		
    $sql="update hostel set hall_name='$hname', room_no='$rno',seat_no='$capacity', room_type='$rtype' where hostel_id ='$hostelid'";
    $con->query($sql);
	
    header("Location: hostel.php?id=3");
    
	
	
?>