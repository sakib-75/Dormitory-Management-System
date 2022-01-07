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
    <?php include('navbar.php'); 
        $sql1="select count(student_id) as total from student  ";
        $result1 =  mysqli_query($con,$sql1);
        $value1 = mysqli_fetch_assoc($result1);
        $totalstudent = $value1['total'];

        $month = date("Y-m"); 
        $sql2="select  COUNT(DISTINCT student_id) as total from payment WHERE month='$month' and p_type='Monthly Hall Bill'";
        $result2 =  mysqli_query($con,$sql2);
        $value2 = mysqli_fetch_assoc($result2);
        $StudentPayCount = $value2['total'];
        $StudentDueCount = $totalstudent-$StudentPayCount;
    
    ?>

    <div class="container">
        <h1 class="page-header text-center">Student Payment Information</h1>
        <h4 class="text-center"> Month: <?php echo date('M-Y', strtotime($month)); ?> </h4>
        <h4 class="text-center" style="color:#228B22"> Total Paid Student: <?php echo $StudentPayCount; ?> </h4>
        <h4 class="text-center" style="color:#FF0000"> Total Due Student: <?php echo $StudentDueCount; ?> </h4>
                        
        <div class="row">

            <div class="panel panel-primary filterable">
                <div class="panel-heading" style="height:50px">
                    <h3 class="panel-title" style="font-size:18px">Last 100 Payment Details</h3>
                    <div class="pull-right">
                        <button style="font-size:17px" class="btn btn-default btn-xs btn-filter"><span
                                class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>

                <table class="table table-hover table-bordered" id="myTable">

                    <?php
              
			
				$sql="select * from payment join student where payment.student_id = student.student_id order by payment_id desc LIMIT 100 ";
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
                            <th><input style="font-size:18px" type="text" class="form-control" placeholder="Amount"
                                    disabled></th>
                            <th><input style="font-size:18px" type="text" class="form-control" placeholder="Pay Method" disabled></th>
                            <th><input style="font-size:18px" type="text" class="form-control" placeholder="Payment Type" disabled></th>
                            <th><input style="font-size:18px" type="text" class="form-control" placeholder="Month Bill" disabled></th>
                            <th><input style="font-size:18px" type="text" class="form-control" placeholder="Payment Date" disabled></th>
                        </tr>
                    </thead>

                    <?php
					
					while($row=$query->fetch_array()){
                        
                        
						
					 ?>

                    <tbody>
                        <tr>
                            <td style="<?php echo $style; ?>"><?php echo $row['student_id']; ?></td>
                            <td style="<?php echo $style; ?>"><?php echo $row['name']; ?></td>
                            <td style="<?php echo $style; ?>"> &#2547; <?php echo $row['amount']; ?>
                            <td style="<?php echo $style; ?>"><?php echo $row['p_method']; ?></td>
                            <td style="<?php echo $style; ?>"><?php echo $row['p_type']; ?></td>
                            <td style="<?php echo $style; ?>">
                                <?php echo date('M, Y', strtotime($row['month'])) ?></td>
                            </td>
                            <td style="<?php echo $style; ?>">
                                <?php echo date('M d, Y', strtotime($row['date'])) ?></td>
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