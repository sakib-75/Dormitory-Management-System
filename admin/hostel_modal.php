<!-- Edit hostel -->
<div class="modal fade" id="edithostel<?php echo $row['hostel_id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Edit Hall</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="edithostel.php?hostel=<?php echo $row['hostel_id']; ?>"
                        enctype="multipart/form-data">
                        <div class="form-group" style="margin-top:10px;">
                            <div class="row">
                                <div class="col-md-3" style="text-align:left;margin-top:7px;">
                                    <label class="control-label">Hall Name:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $row['hall_name']; ?>"
                                        name="hname">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3" style="text-align:left;margin-top:7px;">
                                    <label class="control-label">Room Number:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $row['room_no']; ?>"
                                        name="rno">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-3" style="text-align:left;margin-top:7px;">
                                    <label class="control-label"> Seat number:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $row['seat_no']; ?>"
                                        name="capacity">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3" style="text-align:left;margin-top:7px;">
                                    <label class="control-label">Room type:</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control" name="rtype">
                                        <option value="<?php echo $row['room_type']; ?>">
                                            <?php echo $row['room_type']; ?>
                                        </option>
                                        <?php
                                        
                                        if($row['room_type']=="Non single"){
                                            echo '<option value="Single"> Single</option>';
                                        }else{
                                            echo '<option value="Non single"> Non single</option>';
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span
                        class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span>
                    Update</button>
                </form>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Delete hostel -->
<div class="modal fade" id="deletehostel<?php echo $row['hostel_id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Delete Hall</h4>
                </center>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><?php echo $row['hall_name']; ?></h3>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal"><span
                        class="glyphicon glyphicon-remove"></span> Close</button>
                <a href="delete_hostel.php?hostel=<?php echo $row['hostel_id']; ?>" class="btn btn-danger"><span
                        class="glyphicon glyphicon-trash"></span> Yes</a>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>