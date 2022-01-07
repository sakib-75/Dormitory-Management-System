<?php 
include 'header.php'; 
//connectivity
require('config.php');

if(isset($_SESSION["student_id"])){
    
    $student_id = $_SESSION["student_id"];
    $query = "SELECT * FROM student WHERE student_id = '$student_id' ";
    $query_result = mysqli_query($con,$query);
    if (!$query_result) {
		die("view_add_query_result failed ".mysqli_error($con));
    }
    $row=mysqli_fetch_assoc($query_result);
    $Name=$row['name'];
	$Dept=$row['dept'];


    if(isset($_POST['submit']))
    {
  	    $amount = $_POST["amount"];
        $p_method = $_POST["p_method"];
        $p_type = $_POST["p_type"]; 
        $month = $_POST["month"]; //month bill
	    $date = date("Y-m-d"); //payment day
	    $query = "INSERT INTO payment(student_id,amount,p_method,p_type,date,month) VALUES ('$student_id','$amount','$p_method','$p_type','$date','$month')";
	    mysqli_query($con,$query);
        $_SESSION['message']=" Details Saved!";
        $style="green";
  
    }else{
        $_SESSION['message']="";
        $style="#DC143C";
    }
}else{
    $_SESSION['message']="Login now for payment !!";
    $style="#DC143C";
}
?>

<tr>
    <td>
        <div class="payBdy">
            <center>
                <h2 style='color:<?php echo $style;?>'><?php echo $_SESSION['message']; ?></h2>
            </center>
            <div class="frm">
                <form method="post" action="" enctype="multipart/form-data">
                    <fieldset style="display:block; padding:30px; background-color: #D8D8D8;">
                        <legend>
                            <font size="+2"><strong>Add payment</strong></font>
                        </legend>
                        <p><b>Student ID : </b>
                            <input id="inputBOXs" type="text" name="s_id" value="<?php echo $student_id; ?>" required
                                readonly />*
                        </p>
                        <p><b>Name : </b>
                            <input id="inputBOXs" type="text" value="<?php echo $Name; ?>" required readonly />*
                        </p>
                        <p><b>Dept : </b>
                            <input id="inputBOXs" type="text" value="<?php echo $Dept; ?>" required readonly />*
                        </p>
                        <p><b>Amount (&#2547;): </b>
                            <input id="inputBOX" type="text" placeholder="Enter Amount" name="amount" required />*
                        </p>
                        <p><b>Payment Method : </b>
                            <select name="p_method" id="inputBOX">
                                <option value="">Select Payment Method</option>
                                <option value="Bank"> Bank </option>
                                <option value="Credit card"> Credit card </option>
                                <option value="Mobile Banking"> Mobile Banking </option>
                                <option value="Bkash">-Bkash</option>
                                <option value="Nagad">-Nagad</option>
                                <option value="Rocket">-Rocket</option>
                                
                            </select>
                        </p>
                        <p><b>Payment Type : </b>
                            <select name="p_type" id="inputBOX">
                                <option value="">Select Payment Type</option>
                                <option value="Monthly Hall Bill">Monthly Hall Bill </option>
                                <option value="Others"> Others </option>

                            </select>
                        </p>
                        <p><b>Month : </b>
                            <input id="inputBOX" type="month" name="month" required />*
                        </p>


                        <p>
                            <input id="btn" type="submit" name="submit" value="Submit">&nbsp;
                            <input style="margin-left:20px;" id="btn" type="reset" onClick="refresh()">
                        </p>
                    </fieldset>

                </form>
            </div>
        </div>

        <table border="1" class="tblBody">
            <center><h2>All Payment</h2></center>

            <?php
            $sql="select * from payment where student_id='$student_id' order by payment_id DESC";
            $query=$con->query($sql);
            if(mysqli_num_rows($query)==0){
                echo "<h3 style='text-align:center;color:red'>No data available</h3>";

            }
            else{?>

            <thead>
                <th id="tableth">Amount (&#2547;)</th></th>
                <th id="tableth">Payment Method</th>
                <th id="tableth">Payment Type</th>
                <th class="text-center" id="tableth">Month (Bill)</th>
                <th class="text-center" id="tableth">Payment Date</th>
            </thead>

            <?php
                while($row=$query->fetch_array()){
        
                    $amount = $row['amount'];
                    $p_method = $row['p_method'];  
                    $p_type = $row['p_type']; 
                    $date = $row['date'];
                    $month = $row['month'];
                    

            ?>

            <tbody>
                <tr>
                    <td id="tablethtr">&#2547; <?php echo $amount; ?></td>
                    <td id="tablethtr"><?php echo $p_method; ?></td>
                    <td id="tablethtr"><?php echo $p_type; ?></td>
                    <td id="tablethtr"><?php echo date('M-Y', strtotime($month)); ?></td>
                    <td id="tablethtr"><?php echo date('d-M-Y', strtotime($date)); ?></td>

                </tr>
            </tbody>

            <?php
                }
            }
        ?>
        </table>

    </td>
</tr>







<!--footer-->
<?php include 'footer.php'; ?>


<style type="text/css" media="screen">
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

    .tblBody {
        margin: 20px;
        width:96%;
    }
    #tablethtr{
        padding: 10px;
        text-align:center;
        font-size:18px;
    }
    #tableth{
        background-color:#F5DEB3;
        padding: 10px;
        text-align:center;
        font-size:18px;
    }



</style>

</tbody>
</table>

</html>