<?php 

include('header.php'); 
include "../config.php";


if(isset($_GET['id'])){  // message color code
    $idd=$_GET['id'];
    
	if($idd==3){
		$_SESSION['message'] = "Update successfully !!";
		$style="color:green";
	}
    if($idd==4){
	    $_SESSION['message'] = "Delete successfully!!";
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

    <h3 style="<?php echo $style;?>" class='text-center mt-3'> <b><?php echo $_SESSION['message']; ?></b></h3>
    <div class="container">
        <h1 class="page-header text-center">All Hostel Details </h1>
        <div style="margin-top:10px;">
            <style>
                th {
                    background: #FAEBD7;
                    position: sticky;
                    top: 0;
                    box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);

                }
            </style>
            <table class="table table-striped table-bordered">

            <?php
				$sql="select * from hostel";
				$query=$con->query($sql);
                if(mysqli_num_rows($query)==0){
                    echo "<h3 class='text-center mt-3' style='color:red'>No hall available</h3>";
                        
                }
                else{?>
                <thead>
                    <th style="font-size:17px">Hall Name</th>
                    <th style="font-size:17px">Number of Room</th>
                    <th style="font-size:17px">Number of seat</th>
                    <th style="font-size:17px">Room Type</th>
                    <th class="text-center" style="font-size:17px">Action</th>
                </thead>

                <?php
					while($row=$query->fetch_array()){
				        $hostel_id = $row['hostel_id'];  
                        $hall_name = $row['hall_name'];
				        $room_no = $row['room_no'];
				        $capacity = $row['seat_no'];
				        $room_type = $row['room_type'];
						
                        
					?>

                <tbody>
                    <tr>
                        <td style="font-size:17px"><?php echo $hall_name; ?></td>
                        <td style="font-size:17px"><?php echo $room_no; ?></td>
                        <td style="font-size:17px"><?php echo $capacity; ?></td>
                        <td style="font-size:17px"><?php echo $room_type; ?></td>
                        <td class="text-center">
                            <a href="#edithostel<?php echo $row['hostel_id']; ?>" data-toggle="modal"
                                class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                            ||
                            <a href="#deletehostel<?php echo $row['hostel_id']; ?>" data-toggle="modal"
                                class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                            <?php include('hostel_modal.php'); ?>
                        </td>
                    </tr>
                </tbody>

                <?php
					}
                }
				?>
            </table>
        </div>
    </div>


    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>