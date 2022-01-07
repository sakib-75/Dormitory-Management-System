<?php include 'header.php'; ?>


<tr>
    <td width="974" height="647" bgcolor="#D9D9D9" style="vertical-align:text-top">
        <?php
	@$opt = $_GET['option'];
	if($opt=="")
	{
	?>
        <center>
            <h2><b>
                    <font size="+3"><?php echo $colgdisp;?>
                    </font>
                </b></h2>
        </center>
        <center><img src="images/colg.jpg" width="696" height="488"></center>
        <p>
            <center>
                <p>&nbsp;</p>
                <p><strong>
                        <font size="+2"><?php echo $colgdisp;?></font>
                    </strong> <b>-</b>
                    <font size="+1"> a pioneer educational institute of Bangladesh. Our College is dedicated to preparing students with the knowledge, skills and training needed for meaningful employment. Through education, we create opportunities, change lives and impact futures.</font>
                </p>
            </center>
        </p><br>
        <?php
    error_reporting(1);
	}
	else{
	switch($opt)
	{
		case 'regs':
		include('registration.php')	;
		break;
		case 'login':
		include('login.php');
		break;
        case 'about':
		include('about.php');
		break;
		case 'contact':
		include('contact.php');
		break;
		case 'gallery':
		include('gallery.php');
		break;
		case 'course':
		include ('course.php');
		break;
		case 'cdrive':
		include('cdrive.php');
		break;
		case 'news':
		include('news.php');
		break;
		case 'sports':
		include('sports.php');
		break;
		case 'admission':
		include ('admission.php');
		break;
		case 'sdp':
		include('sdp.php');
		break;
		case 'wevents':
		include('wevents.php');
		break;
		
	}}

	?>


    </td>
    <td width="350"  style="background-color:#468EFF">
        <center>
            <font size="+2"><b style="color:#191B7E">
                    <div style="background-color:#969BFB">College Updates</div><br>
                </b></font>
        </center>
        <marquee direction="down" height="100%" onMouseOver="stop()" onMouseOut="start()">
            <center><a href="index.php?option=cdrive" style="text-decoration:none">
                    <font size="+1"><b>Campus Drive</b></font>
                </a></center><br>
            <center><a href="index.php?option=news" style="text-decoration:none">
                    <font size="+1"><b>News</b></font>
                </a></center><br>
            <center><a href="index.php?option=sports" style="text-decoration:none">
                    <font size="+1"><b>Sports Fest</b></font>
                </a></center><br>
            <!--<center><a href="" style="text-decoration:none"><font size="+1"><b>Quiz Competition</b></font></a></center><br>-->
            <center><a href="index.php?option=admission" style="text-decoration:none">
                    <font size="+1"><b>Admission 2014</b></font>
                </a></center><br>
            <center><a href="index.php?option=sdp" style="text-decoration:none">
                    <font size="+1"><b>Student Development Programme</b></font>
                </a></center><br>
            <center><a href="index.php?option=wevents" style="text-decoration:none">
                    <font size="+1"><b>Weekend Events</b></font>
                </a></center><br>
            <center><a href="index.php?option=notice" style="text-decoration:none">
                    <font size="+1"><b>Notice Board</b></font>
                </a></center><br>
            <!--<center><a href="" style="text-decoration:none"><font size="+1"><b>Summer Vacation</b></font></a></center><br>-->
            <!--<center><a href="index.php?option=course" style="text-decoration:none"><font size="+1"><b>Courses Offered</b></font></a></center><br>
            <center><a href="index.php?option=gallery" style="text-decoration:none"><font size="+1"><b>Gallery</b></font></a></center><br>-->
        </marquee>
    </td>
</tr>

<!--footer-->
<?php include 'footer.php'; ?>

</tbody>
</table>


</html>
