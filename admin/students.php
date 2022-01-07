<?php 
    include('header.php'); 
    include('../config.php')

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
        <h1 class="page-header text-center">All Students Information</h1>

        <div class="row">

            <div class="panel panel-primary filterable">
                <div class="panel-heading" style="height:50px">
                    <h3 class="panel-title" style="font-size:18px">Last 50 Details</h3>
                    <div class="pull-right">
                        <button style="font-size:17px" class="btn btn-default btn-xs btn-filter"><span
                                class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>

                <table class="table table-hover table-bordered" id="myTable">

                    <?php
              
			
				$sql="select * from student order by student_id desc LIMIT 50 ";
				$query=$con->query($sql);
				if(mysqli_num_rows($query)== 0 ){
												
					echo "<br><br><h3 style='color:red;text-align:center'><i class='fa fa-ban'></i><b> No record found</b></h3><br><br>";
      
				}
				else{
					?>

                    <thead>
                        <tr class="filters" style="background-color:#FAEBD7">
                            <th><input style="font-size:18px" type="text" class="form-control" placeholder="Student ID"
                                    disabled></th>
                            <th><input style="font-size:18px" type="text" class="form-control"
                                    placeholder="Student Name" disabled></th>
                            <th><input style="font-size:18px" type="text" class="form-control" placeholder="Department"
                                    disabled></th>
                            <th><input style="font-size:18px" type="text" class="form-control" placeholder="Mobile" disabled></th>
                            <th><input style="font-size:18px" type="text" class="form-control" placeholder="Address" disabled></th>
                            <th><input style="font-size:18px" type="text" class="form-control" placeholder="Hall Status" disabled></th>
                        </tr>
                    </thead>

                    <?php
					
					while($row=$query->fetch_array()){
                        
                        $id=$row['student_id'];
                        $isHall = $row['is_hall'];
                        if($isHall == 1){
                            $Hall_Status = "Booked";
                            $style = "style='color:green'";
                        }
                        else{
                            $Hall_Status = "No Hall";
                            $style = "style='color:red'";
                        }
						
					 ?>

                    <tbody>
                        <tr>
                            <td style="<?php echo $style; ?>"><?php echo $id; ?></td>
                            <td style="<?php echo $style; ?>"> <a href="student_profile.php?id=<?php echo $id;?>"> <?php echo $row['name']; ?> </a></td>
                            <td style="<?php echo $style; ?>"><?php echo $row['dept']; ?>
                            <td style="<?php echo $style; ?>"><?php echo $row['mobile']; ?></td>
                            <td style="<?php echo $style; ?>"><?php echo $row['address']; ?></td>
                            <td <?php echo $style; ?>> <b><?php echo $Hall_Status; ?></b></td>
                           
                        </tr>
                    </tbody>

                    <?php					
				    }				
				}				
			?>

                </table>
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