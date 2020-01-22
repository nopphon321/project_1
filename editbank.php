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
                                        <th>ID</th>
                                    	<th>ธนาคาร</th>
                                    	<th>เลขบัญชี</th>
                                    </thead>
                                    <tbody>
  <?php 
    require 'mysql/config.php';
    $bank_id = $_POST['bank_id'];
    $sql="SELECT * FROM bank WHERE bank_id=$bank_id";
        
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
    ?>
                                        <tr> <form action="bankupdate.php" method="POST">
                                        	<td><input type="text" class="form-control" name="bank_id" value="<?php echo $row['bank_id']; ?>" ></td>
                                        	<td><input type="text" class="form-control" name="bank_name" value="<?php echo $row['bank_name']; ?>" ></td>
                                            <td><input type="text" class="form-control" name="books_id" value="<?php echo $row['books_id']; ?>" ></td>
                                            
                                            <td> <button type="submit" class="btn btn-info btn-fill pull-right">Update Banks</button></form></td>
                                        </tr>
        <?php } ?>
        <tr>
            <td><a href="bank.php" class="btn btn-info btn-fill pull-center">ย้อนกลับ</button></td>
        </tr>
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