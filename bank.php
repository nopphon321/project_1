<?php include("adminheader.php"); ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            <h4 class="title">รายการข้อมูล ธนาคาร</h4>
                               <!-- <p class="category">Here is a subtitle for this table</p>-->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>ธนาคาร</th>
                                        <th>เลขบัญชี</th>
                                        <th>ลบข้อมูล</th>
                                        <th>แก้ไขข้อมูล</th>
                                    </thead>
                                    <tbody>
  <?php 
    require 'mysql/config.php';
    $sql="SELECT * FROM bank ";
        
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
    ?>
                                        <tr>
                                        	<td><?php echo $row['bank_id']; ?></td>
                                        	<td><?php echo $row['bank_name']; ?></td>
                                        	<td><?php echo $row['books_id']; ?></td>
                                        
                                        	<td>
                                            <div><form action="bankdelete.php" method="POST">
            <input type="hidden" name="bank_id"  value="<?php echo $row['bank_id'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-dangeer pe-7s-trash btn-danger" >ลบ</button>
            </form></div>
                                
                                            </td>
                                            <td><form action="editbank.php" method="POST">
            <input type="hidden" name="bank_id"  value="<?php echo $row['bank_id'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-primary pe-7s-config" >แก้ไข</button>
            </form></td>
                                        </tr>
        <?php } ?>
                                    </tbody>
                                </table>

                                
                            </div>
                        </div>
                    </div>

                    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">เพิ่มข้อมูลธนาคาร</h4>
                            </div>
                            <div class="content">
                                <form action="bankinsert.php" method="POST">
                                <div class="row">
                                <div class="col-md-2">
                                            <div class="form-group">
                                                <label>ID</label>
                                                <input type="text" name="bank_id" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>ธนาคาร</label>
                                                <input type="text" name="bank_name" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">เลขบัญชี</label>
                                                <input type="text" name="books_id" class="form-control" >
                                            </div>
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-info btn-fill pull-right">เพิ่ม</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>

               
                </div>
            </div>
        </div>

    </div>
</div>


<?php include("adminfooter.php"); ?>