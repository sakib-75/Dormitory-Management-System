<?php
session_start();

//connectivity
require('config.php');

//marquee display
$disp = "Dormitory Management System";

//change colg name
$colgdisp = "ABC Group Of Institutions"


?>

<html>

<head>
    <title>DMS Project</title>
    <link rel="stylesheet" type="text/css" href="engine/css/slideshow.css" media="screen" />
    <style type="text/css">
        .slideshow a#vlb {
            display: none
        }
    </style>
    <script type="text/javascript" src="engine/js/mootools.js"></script>
    <script type="text/javascript" src="engine/js/visualslideshow.js"></script>
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>

</head>

<style type="text/css" media="screen">
    #list {
        text-decoration: none;
        color: #FFFFFF;
    }

    #list:hover {
        color: #353535;
    }

    #horizontalmenu ul {
        padding: 1;
        margin: 1;
        list-style: none;
    }

    #horizontalmenu li {
        float: left;
        position: relative;
        padding-right: 50px;
        padding-left: 10px;
        display: block;
        border: 0px solid #CC55FF;
        border-style: inset;
    }

    #horizontalmenu li ul {
        display: none;
        position: absolute;
       
    }

    #horizontalmenu li:hover ul {
        display: block;
        background: #C4C4C4;
        height: auto;
        width: 8em;
    }

    #horizontalmenu li ul li {
        clear: both;
        border-style: none;
    }
</style>

<table width="1050px" align="center" border="1">
    <tbody>
        <tr>
            <th height="39" colspan="2" style="background-color:#4E4E4E">
                <div style="text-align:left;color:#FFFFFF"><b>
                        <font size="+3"><a href="index.php"
                                style="text-decoration:none ; color:#FFFFFF"><?php echo $colgdisp?></a></font>
                    </b>
                    <marquee direction="left" height="100%">
                        <?php echo $disp; ?></marquee>
                </div>
            </th>
        </tr>
        <tr>
            <th height="317" colspan="2">
                <!--Slider-->
                <div id="wowslider-container1">
                    <div class="ws_images">
                        <ul>
                            <li><img src="data1/images/banner_01.jpg" alt="Multispeciality College Campus"
                                    title="Multispeciality College Campus" id="wows1_0" /></li>
                            <li><img src="data1/images/highlightnews.jpg" alt="International Accredition"
                                    title="International Accredition" id="wows1_1" /></li>
                            <li><img src="data1/images/img21644.jpg" alt="Best Overall Employement"
                                    title="Best Overall Employement" id="wows1_2" /></li>
                            <li><img src="data1/images/url.jpg" alt="Best Of Class Infrastructure"
                                    title="Best Of Class Infrastructure" id="wows1_3" /></li>
                        </ul>
                    </div>
                    <div class="ws_bullets">
                        <div>
                            <a href="#" title="Multispeciality College Campus"><img src="data1/tooltips/banner_01.jpg"
                                    alt="Multispeciality College Campus" />1</a>
                            <a href="#" title="International Accredition"><img src="data1/tooltips/highlightnews.jpg"
                                    alt="International Accredition" />2</a>
                            <a href="#" title="Best Overall Employement"><img src="data1/tooltips/img21644.jpg"
                                    alt="Best Overall Employement" />3</a>
                            <a href="#" title="Best Of Class Infrastructure"><img src="data1/tooltips/url.jpg"
                                    alt="Best Of Class Infrastructure" />4</a>
                        </div>
                    </div>
                    <span class="wsl"></span>
                    <a href="#" class="ws_frame"></a>
                </div>
                <script type="text/javascript" src="engine1/wowslider.js"></script>
                <script type="text/javascript" src="engine1/script.js"></script>
                <!--slider end-->

            </th>
        </tr>

        <tr>
            <td height="38" colspan="2" style="background-color:#6E68FF;">
                <div id="horizontalmenu">
                    <ul>
                        <li><a href="index.php" id="list"><b>HOME</b></a></li>
                        <li><a href="index.php?option=contact" id="list"><b>CONTACT</b></a></li>
                        <li><a href="notice.php" id="list"><b>NOTICE</b></a></li>
                        <li><a href="payment.php" id="list"><b>PAYMENT</b></a> </li>
                        <li><a href="due_payment.php" id="list"><b>DUE BILL</b></a> </li>
                        
                        <?php 
                            if(!isset($_SESSION["student_id"])){
                                echo '<li><a href="index.php?option=regs" id="list"><b>REGISTRATION</b></a></li>';
                                echo '<li><a href="index.php?option=login" id="list"><b>LOGIN</b></a> </li>';
                     
                            }
                            else{
                                echo '<li><a href="profile.php" id="list"><b>PROFILE</b></a> </li>';
                                echo '<li><a href="logout.php" id="list"><b>LOGOUT</b></a> </li>';
                            }
                        ?>
                    </ul>
                </div>
            </td>
        </tr>