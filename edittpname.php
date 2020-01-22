<?php include("adminheader.php"); ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            <h4 class="title">รายการข้อมูล ธนาคาร</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>หมายเลขห้อง</th>
                                    	<th>ประเภทห่้อง</th>
                                    	
                                    </thead>
                                    <tbody>
  <?php 
    require 'mysql/config.php';
    $rmid = $_POST['rmid'];
    $sql="SELECT * FROM rooms INNER JOIN roomtype ON rooms.rmtype = roomtype.rmtype WHERE rmid=$rmid ";
        
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
    ?>
                                        <tr> <form action="tpnameinsert.php" method="POST">
                <input type="hidden" class="form-control" name="rmtype" value="<?php echo $row['rmtype']; ?>" >
                                        	<td><input type="text" class="form-control" name="rmid" value="<?php echo $row['rmid']; ?>" readonly ></td>
                                        	<td><input type="text" class="form-control" name="tpname" value="<?php echo $row['tpname']; ?>" ></td>
                                            
                                            
                                            <td> <button type="submit" class="btn btn-info btn-fill pull-right">Update Banks</button></form></td>
                                        </tr>
        <?php } ?>
                                    </tbody>
                                </table>

                                
                            </div>
                        </div>
                    </div>

               
                </div>
            </div>
        </div>

    </div>
</div>


<?php include("adminfooter.php"); ?>