<?php 
    include('header.php'); 
    if (isset($_POST['submit'])) {
		
        $studentid = $_POST["studentid"];
        $hostelid = $_POST["hostelid"];
        $roomno = $_POST["roomno"];
  	    $rent = $_POST["rent"];
  	   
		$sql1="insert into hostel_booking (hostel_id,student_id,room_number,monthly_rent) values ('$hostelid','$studentid','$roomno','$rent')";
        if (mysqli_query($con, $sql1)) {
            $sql2="update student set is_hall='1' where student_id='$studentid' ";
            $con->query($sql2);   
             
            $sql3="update hostel set seat_no=seat_no-'1' where hostel_id='$hostelid' ";
            $con->query($sql3);    

			$_SESSION['message'] = "Hostel booking succesful !!";
            $style="color:green";
        }
		else {
            $_SESSION['message'] = "Error!!";
            $style="color:red";
        }
        
    }
	 
    
?>
<html>

<head>
    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('navbar.php'); ?>

    <h3 style="<?php echo $style;?>" class='text-center mt-3'><b><?php echo $_SESSION['message']; ?></b>
    </h3>
    <div class="container">
        <h1 class="page-header text-center"> Hostel Booking </h1>

        <div class="container-fluid">
            <form action="hostelbooking.php" method="post">

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3" style="margin-top:7px;">
                            <label class="control-label">Student ID:</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control" name="studentid" required>
                                <option value="">Select Student ID</option>
                                <?php
                                $sql="select * from student where is_hall='0' order by student_id asc ";
                                $query=$con->query($sql);
                                while($row=$query->fetch_array()){
                                    $student_id =$row['student_id'];
                                    ?>
                                <option value="<?php echo $student_id; ?>"><?php echo $student_id; ?> </option>
                                <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>
                <?php 
                   
                ?>
          

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3" style="margin-top:7px;">
                            <label class="control-label">Hall name:</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control" name="hostelid" required>
                                <option value="">Select Hall</option>
                                <?php
                                $sql="select * from hostel order by hostel_id asc";
                                $query=$con->query($sql);
                                while($row=$query->fetch_array()){
                                    $hallname = $row['hall_name'];
                                    $hostelid = $row['hostel_id'];
                                    ?>
                                <option value="<?php echo $hostelid; ?>"><?php echo $hallname; ?> </option>
                                <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3" style="text-align:left;margin-top:7px;">
                            <label class="control-label"> Room Number:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="roomno" placeholder="Enter room no" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3" style="text-align:left;margin-top:7px;">
                            <label class="control-label">Monthly rent (&#2547;):</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="rent" placeholder="Enter monthly hall rent"
                                required>
                        </div>
                    </div>
                </div>

                <center>
                    <button id="btn" type="submit" name="submit" class="btn btn-success"><i
                            class="fas fa-check-circle"></i>
                        Submit</button>
                </center>

            </form>
        </div>
    </div>

</body>
<style>
    .container-fluid {
        margin-top: 50px;
        padding: 0 250px;
    }

    #btn {
        font-size: 17px;
        margin-top: 30px;
        padding: 20 30;
        outline: none;

    }

    #btn:hover {
        transform: scale(1.03);
    }

    .form-control {
        width: 350px;
    }
</style>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</html>