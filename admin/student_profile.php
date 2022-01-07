<?php 
    include('header.php'); 
    include('../config.php');

    if (isset($_GET['id'])) {
        $studentID = $_GET['id'];

        $query = "SELECT * FROM student WHERE student_id = '$studentID' ";
        $query_result = mysqli_query($con,$query);
        if (!$query_result) {
		    die("view_add_query_result failed ".mysqli_error($con));
        }
        $row=mysqli_fetch_assoc($query_result);
        
        $id=$row['student_id'];
        $name=$row['name'];
	    $dept=$row['dept'];
	    $gender=$row['gender'];
	    $mobile=$row['mobile'];
	    $address=$row['address'];
	    $is_hall=$row['is_hall'];
	    $image=$row['image'];

        if($is_hall == 1){
            $query2 = "SELECT * FROM hostel join hostel_booking WHERE hostel_booking.student_id = '$studentID' and hostel_booking.hostel_id = hostel.hostel_id";
            $query_result2 = mysqli_query($con,$query2);
            if (!$query_result2) {
                die("view_add_query_result failed ".mysqli_error($con));
            }
            $row2 =mysqli_fetch_assoc($query_result2);
            
            $hallName = $row2['hall_name'];
            $hallType = $row2['room_type'];
            $roomNo= $row2['room_number'];
            $rent= $row2['monthly_rent'];
        }

    }

?>
<html>

<head>
    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <script src="../jquery-3.2.1.min.js"></script>

</head>

<body>
    <?php include('navbar.php'); ?>

    <h3 style="<?php echo $style;?>" class='text-center mt-3'> <b
            style="font-family:Verdana;color:#ff6600"><?php echo $foodmessage; ?></b><b><?php echo $_SESSION['message']; ?></b>
    </h3>
    <div class="container">
        <h1 class="page-header text-center">Student Full Information</h1>

        <div class="row">
        <div class="well well-sm" style="margin:0px 120px">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<img id="profileimg" src="../<?php echo $image; ?>" alt="" class="img-rounded img-responsive" />
				</div>
				<div class="col-sm-6 col-md-8">
					<h3 style="color:#B8860B"><b>Profile Information</b></h3>
					<h4>Name: <b style="color:#2E8B57"><?php echo $name; ?></b></h4>
					<p><cite title="<?php echo $address; ?>"><i class="fas fa-map-marker-alt"></i> 
							<?php echo $address; ?></p>
					<p><i class="fas fa-phone"></i> <?php echo $mobile; ?></p>
					<p><i class="far fa-address-card"></i> ID: <?php echo $id; ?></p>
					<p><i class="fa fa-graduation-cap"></i> Department: <?php echo $dept; ?></p>
					<?php
				    if($is_hall==0){
						echo '<p><i class="fas fa-hotel"></i> Hall Name:<b style="color:red"> No Hall Yet</b></p>';
					}
					else{
						echo '<p><i class="fas fa-hotel"></i> Hall Name: '.$hallName.' </p>';
                        echo '<p><i class="fas fa-bed"></i> Room Type: '.$hallType.' </p>';
                        echo '<p><i class="fas fa-tasks"></i> Room No: '.$roomNo .' </p>';
						echo '<p><i class="fas fa-dollar-sign"></i> Monthly Rent: &#2547; '. $rent .'</p>';
					}
					?>


				</div>
			</div>
		</div>


        </div>

    </div>


</body>

<script type="text/javascript">
    $(document).ready(function () {
        $('.filterable .btn-filter').click(function () {
            var $panel = $(this).parents('.filterable'),
                $filters = $panel.find('.filters input'),
                $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });

        $('.filterable .filters input').keyup(function (e) {
            /* Ignore tab key */
            var code = e.keyCode || e.which;
            if (code == '9') return;
            /* Useful DOM data and selectors */
            var $input = $(this),
                inputContent = $input.val().toLowerCase(),
                $panel = $input.parents('.filterable'),
                column = $panel.find('.filters th').index($input.parents('th')),
                $table = $panel.find('.table'),
                $rows = $table.find('tbody tr');
            /* Dirtiest filter function ever ;) */
            var $filteredRows = $rows.filter(function () {
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });
            /* Clean previous no-result if exist */
            $table.find('tbody .no-result').remove();
            /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
            $rows.show();
            $filteredRows.hide();
            /* Prepend no-result row if all rows are filtered */
            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' +
                    $table.find('.filters th').length + '">No result found</td></tr>'));
            }
        });
    });
</script>
<style>
#profileimg {
		height: 300px;
		border-radius: 10%;
		margin: 5px;
        padding:10px;
	}
    #myTable {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
        font-size: 18px;
    }

    #myTable th,
    #myTable td {

        padding: 12px;
    }

    #myTable tr {
        border-bottom: 1px solid #ddd;
    }


    .filterable {
        margin-top: 15px;
    }

    .filterable .panel-heading .pull-right {
        margin-top: -20px;
    }

    .filterable .filters input[disabled] {
        background-color: transparent;
        border: none;
        cursor: auto;
        box-shadow: none;
        padding: 0;
        height: auto;
    }

    .filterable .filters input[disabled]::-webkit-input-placeholder {
        color: #333;
    }

    .filterable .filters input[disabled]::-moz-placeholder {
        color: #333;
    }

    .filterable .filters input[disabled]:-ms-input-placeholder {
        color: #333;
    }
</style>

</html>