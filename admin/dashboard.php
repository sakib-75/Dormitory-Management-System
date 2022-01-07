<!doctype html>
<html class="no-js" lang="en">
<head>

    <title>Admin Dashboard</title>

    <link rel="apple-touch-icon" href="apple-icon.png">


    <link rel="stylesheet" href="dashboardcss/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboardcss/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="dashboardcss/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="dashboardcss/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="dashboardcss/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="dashboardcss/vendors/jqvmap/dist/jqvmap.min.css">
  
    
    <link rel="stylesheet" href="dashboardcss/assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <?php include_once('includes/sidebar.php');
          include ('../config.php');
    ?>

    <div id="right-panel" class="right-panel">

        <?php include_once('includes/header.php');?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dormitory Management System</h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title" style="margin-top:12px;">
                        <iframe src="http://free.timeanddate.com/clock/i7d3fsyp/n73/fs18/tct/pct/ahr/tt0/tw1/th2" frameborder="0" width="380" height="23" allowTransparency="true"></iframe>

                    </div>
                </div>
            </div>

        </div>

        <div class="content mt-3">

            <style>
                #hov:hover {

                    -webkit-box-shadow: 0px 0px 20px 0px #000000;
                    box-shadow: 0px 0px 20px 0px #000000;

                }

            </style>


            <div class="col-sm-6 col-lg-6">
                <div id="hov" class="card text-white bg-flat-color-1" style="background-Color:#D2691E;border-radius:25px;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4" style="border-radius:15px">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="students.php">View students</a>

                                </div>
                            </div>
                        </div>
                        <?php
                            $sql1="select count(student_id) as total from student  ";
                            $result1 =  mysqli_query($con,$sql1);
                            $value1 = mysqli_fetch_assoc($result1);
                            $totalstudent = $value1['total'];
                             
                         ?>
                        <h1 class="mb-0">
                            <span class="count"><?php echo $totalstudent;?></span>
                        </h1>
                        <br>
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <h4 class="text-center">Total Students</h4>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-6">
                <div id="hov" class="card text-white bg-flat-color-5" style="background-Color:#483D8B;border-radius:25px;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style="border-radius:15px">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="hostel.php">Manage hostel</a>

                                </div>
                            </div>
                        </div>
                        <?php
                            $sql2="select count(hostel_id) as total from hostel  ";
                            $result2 =  mysqli_query($con,$sql2);
                            $value2 = mysqli_fetch_assoc($result2);
                            $totalhostel = $value2['total'];

                             
                         ?>
                        <h1 class="mb-0">
                            <span class="count"><?php echo $totalhostel ;?></span>
                        </h1>
                        <br>
                        <div class="col-xs-3">
                            <i class="fa fa-home fa-5x"></i>

                        </div>
                        <h4 class="text-center">Total Hostel</h4>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-lg-6">
                <div id="hov" class="card text-white bg-flat-color-4" style="background-Color:#228B22;border-radius:25px;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style="border-radius:15px">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="hostelbooking.php"> Book seat </a>

                                </div>
                            </div>
                        </div>
                        <?php
                            $sql3="select sum(seat_no) as total from hostel  ";
                            $result3 =  mysqli_query($con,$sql3);
                            $value3 = mysqli_fetch_assoc($result3);
                            $availavail_seat = $value3['total'];


                             
                         ?>

                        <h1 class="mb-0">
                            <span class="count"><?php echo $availavail_seat;?></span>
                        </h1>
                        <br>
                        <div class="col-xs-3">
                            <i class="fa fa-tags fa-5x"></i>
                        </div>
                        <h4 class="text-center">Available seat</h4>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-lg-6">
                <div id="hov" class="card text-white bg-flat-color-4" style="background-Color:#008B8B;border-radius:25px;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style="border-radius:15px">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="studentpayment.php">View payments</a>

                                </div>
                            </div>
                        </div>

                        <?php
                            $month = date("Y-m"); 
                            $sql4="select sum(amount) as total from payment WHERE month='$month'";
                            $result4 =  mysqli_query($con,$sql4);
                            $value4 = mysqli_fetch_assoc($result4);
                            $pay = $value4['total'];

                        ?>

                        <h1 class="mb-0">
                            <h1> &#2547; <span class="count"> <?php echo $pay;?></span></h1>
                        </h1>
                        <br>
                        <div class="col-xs-3">
                            <i class="fa fa-dollar fa-4x"></i>
                        </div>
                        <h4 class="text-center">Students payment (<?php echo date('M-Y', strtotime($month)); ?>)</h4>
                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>




        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="dashboardcss/vendors/jquery/dist/jquery.min.js"></script>
    <script src="dashboardcss/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="dashboardcss/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dashboardcss/assets/js/main.js"></script>


    <script src="dashboardcss/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="dashboardcss/assets/js/dashboard.js"></script>
    <script src="dashboardcss/assets/js/widgets.js"></script>
    <script src="dashboardcss/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="dashboardcss/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="dashboardcss/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);

    </script>

</body>

</html>
