<?php 

    include('header.php'); 

    if (isset($_POST['submit'])) {
		
        $hallname = $_POST["hname"];
        $roomno = $_POST["roomno"];
        $capacity = $_POST["capacity"];
  	    $roomtype = $_POST["rmtype"];
  	   
	   
        $query = "select * from hostel where hall_name='$hallname' ";
        $query_result = mysqli_query($con,$query);
		if (!$query_result) {
			die("query_result failed ".mysqli_error($mysqli));
		}
			
		if (mysqli_num_rows($query_result)>0){
		    $_SESSION['message'] = "This hostel already exist!";
		}
        else{
			$sql="insert into hostel (hall_name,room_no,seat_no,room_type) values ('$hallname','$roomno','$capacity','$roomtype')";
            if (mysqli_query($con, $sql)) {
				$_SESSION['message'] = "Hostel added succesfully !!";
                $style="color:green";
            }
			else {
                $_SESSION['message'] = "Error!!";
                $style="color:red";
            }
        }
    }
	 
?>

<html>

<head>
    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <h3 style="<?php echo $style;?>;text-align:center"> <b><?php echo $_SESSION['message']; ?></b></h3>

        <h1 class="page-header text-center">Add Hostel</h1>

        <div class="container-fluid">
            <form action="addhostel.php" method="post">

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3" style="text-align:left;margin-top:7px;">
                            <label class="control-label">Hall name:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="hname" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3" style="text-align:left;margin-top:7px;">
                            <label class="control-label">Number of rooms:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="roomno" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3" style="text-align:left;margin-top:7px;">
                            <label class="control-label">Number of seat:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="capacity" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3" style="text-align:left;margin-top:7px;">
                            <label class="control-label">Room Type:</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control" name="rmtype" required>

                                <option value="Single"> Single</option>
                                <option value="Non single"> Non single</option>

                            </select>

                        </div>
                    </div>
                </div>
                <center>
                    <button id="btn" type="submit" name="submit" class="btn btn-success"><i class="fas fa-check-circle"></i> Submit</button>
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
