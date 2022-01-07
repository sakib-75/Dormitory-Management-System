<?php 
include 'header.php'; 
//connectivity
require('config.php');

if(isset($_SESSION["student_id"])){
    
    $student_id = $_SESSION["student_id"];

    if(isset($_POST['submit']))
    {
  	    
        $month = $_POST["month"]; //month bill
        $query = "SELECT * FROM payment WHERE student_id = '$student_id' AND month='$month' AND p_type='Monthly Hall Bill'";
        $query_result = mysqli_query($con,$query);
        if (!$query_result) {
            die("view_add_query_result failed ".mysqli_error($con));
        }
        if(mysqli_num_rows($query_result)==0){
            $status = "Due";
            $statusFull = "<i class='far fa-check-circle'></i> Payment Status: <b style='color:#DC143C'>".$status."</b>" ;
            $MonthFull = "<i class='far fa-calendar-check'></i> Month: ".date('M-Y', strtotime($month));

        }else{
            $status = "Paid";
            $row=mysqli_fetch_assoc($query_result);
            $amount=$row['amount'];
            $p_method=$row['p_method'];
            $Date=$row['date'];
            $Month=$row['month'];

            $statusFull = "<i class='far fa-check-circle'></i> Payment Status: <b style='color:green'>".$status."</b>";
            $amountFull = "<i class='fas fa-hand-holding-usd'></i> Amount:  &#2547; ".$amount;
            $MonthFull = "<i class='far fa-calendar-check'></i> Month: ".date('M-Y', strtotime($Month));
            $p_methodFull = "<i class='fas fa-tasks'></i> Payment Method: ".$p_method;
            $DateFull = "<i class='far fa-calendar-alt'></i> Payment Date: ".date('d-M-Y', strtotime($Date));
            
        }
    }
}
else{
    $_SESSION['message']="Login now for due payment !!";
    $style="#DC143C";
}
?>

<tr>
    <td>
        <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>
        <div class="payBdy">
            <center>
                <h2 style='color:<?php echo $style;?>'><?php echo $_SESSION['message']; ?></h2>
            </center>
            <div class="frm">
                <form method="post" action="" enctype="multipart/form-data">
                    <fieldset style="display:block; padding:30px; background-color: #D8D8D8;">
                        <legend>
                            <font size="+2"><strong>Due payment (Hall Rent) </strong></font>
                        </legend>

                        <p><b>Select Month : </b>
                            <input id="inputBOX" type="month" name="month" required />*
                        </p>
                        <p>
                            <input id="btn" type="submit" name="submit" value="Submit">&nbsp;
                        </p>
                    </fieldset>

                </form>
            </div>

            <div class="status_body">

                <h3><?php echo $MonthFull;?></h3>
                <h3><?php echo $statusFull;?></h3>
                <h3><?php echo $amountFull;?></h3>
                <h3><?php echo $p_methodFull;?></h3>
                <h3><?php echo $DateFull;?></h3>

            </div>

        </div>


    </td>
</tr>







<!--footer-->
<?php include 'footer.php'; ?>


<style type="text/css" media="screen">
    .status_body {
        padding: 20px 30%;
        height: 400px;
    }

    h3 {
        font-family: Arial;
        font-size: 18px;
    }

    .payBdy {
        padding: 10px;
        background-color: #D8D8D8;
        font-size: 18px;
    }

    .frm {
        width: 500px;
        margin: auto;

    }

    #inputBOX {
        border-radius: 10px;
        font-size: 14px;
        outline: none;
        border: none;
        padding: 7px;
        float: right;
    }

    #inputBOXs {
        border-radius: 10px;
        font-size: 14px;
        outline: none;
        border: none;
        padding: 7px;
        float: right;
        background-color: #FFF5EE;
        color: #006400;
    }

    #btn {
        font-size: 18px;
        padding: 8px 40px;
        border-radius: 20px;
        border: none;
        margin-top: 30px;
        background-color: #4E4E4E;
        color: white;
        outline: none;
    }

    #btn:hover {
        background-color: #785DF9;
        transform: scale(1.06);
        cursor: pointer;
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

</tbody>
</table>

</html>