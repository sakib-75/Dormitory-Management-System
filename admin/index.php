<?php
session_start();
//connectivity
require('../config.php');
if(isset($_POST['admlogin']))
{
	$u = $_POST['admname'];
	$pass = $_POST['admpass'];
	$_SESSION['admin']=$u;
	$p = md5($pass);
	$q = "SELECT * FROM admin WHERE auser='$u' AND apass='$p'";
	$cq = mysqli_query($con,$q);
	$ret = mysqli_num_rows($cq);
	if($ret == true)
	{
		header('location:backend.php');
	}
	else
	{
		echo "<script>alert('Wrong Login Details, Try Again!')</script>";
	}
}
?>
<div align="center">
    <form method="post" action="dashboard.php">
        <table width="1067" border="1">
            <tbody>
                <tr>
                    <td width="1057" height="59" bgcolor="#4D4C94">
                        <center>
                            <h1><strong style="color: #FFFFFF">ADMINISTRATOR LOGIN</strong></h1>
                        </center>
                    </td>
                </tr>
                <tr>
                    <th height="426" bgcolor="#D8D8D8">
                        <fieldset id="field">
                            <legend>
                                <font size="+2">Admin Login</font>
                            </legend>
                            <p>Username : <input id="inpt" type="text" name="admname"><br>
                            <p>Password : <input id="inpt" type="password" name="admpass">
                            <p><input id="sbt" type="submit" value="Login" name="admlogin">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input id="sbt" type="reset" value="Reset">
                            </p>
                            <p style="font-size:16px;"><a href="dashboard.php">Signup...</a></p>
                        </fieldset>
                    </th>
                </tr>
            </tbody>
        </table>
    </form>
</div>


<style>
    #field {
        display: block;
        margin: 0px 200px;
        padding: 30px;
        font-size: 20px;
    }

    #inpt {
        font-size: 18px;
        padding: 7px;
        border: none;
        outline: none;
        border-radius: 10px;
    }

    #sbt {
        font-size: 18px;
        padding: 8px 40px;
        border-radius: 20px;
        border: none;
        margin-top: 10px;
        background-color: #4E4E4E;
        color: white;
        outline: none;


    }

    #sbt:hover {
        background-color: #785DF9;
        transform: scale(1.06);
        cursor: pointer;
    }

</style>
