<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="dashboard.php">Admin Setup</a>

        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse" style="width:310px;">
            <ul class="nav navbar-nav">
                <li>
                    <a href="dashboard.php"> <i class="menu-icon fa fa-dashboard fa-2x"></i>
                        <h5 style="margin-top:10px"> Dashboard </h5>
                    </a>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="add-users.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-edit fa-2x"></i>
                        <h5 style="margin-top:10px">Hostel Maintenance </h5>
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-edit "></i><a href="addhostel.php">
                                <h6 style="margin-top:4px">Add hostel </h6>
                            </a></li>

                        <li><i class="fa fa-edit "></i><a href="hostel.php">
                                <h6 style="margin-top:4px">View hostel </h6>
                            </a></li>

                    </ul>
                </li>



                <li>
                    <a href="hostelbooking.php"> <i class="menu-icon fa fa-tags fa-2x"></i>
                        <h5 style="margin-top:10px"> Hostel Booking </h5>
                    </a>
                </li>

                <li>
                    <a href="studentpayment.php"> <i class="menu-icon fa fa-dollar fa-2x"></i>
                        <h5 style="margin-top:10px"> Students Payment </h5>
                    </a>
                </li>
                <li>
                    <a href="notice.php"> <i class="menu-icon fa fa-book fa-2x"></i>
                        <h5 style="margin-top:10px"> Manage Notice </h5>
                    </a>
                </li>


                <li class="menu-item-has-children dropdown">
                    <a href="add-users.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-wrench fa-2x"></i>
                        <h5 style="margin-top:10px">Settings </h5>
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-user-circle "></i><a href="adminprofile.php">
                                <h6 style="margin-top:4px">Admin Profile </h6>
                            </a></li>
                        <li><i class="fa fa-key "></i><a href="change-password.php">
                                <h6 style="margin-top:4px">Change Password </h6>
                            </a></li>


                    </ul>
                </li>



            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
