<?php include("adminheader.php"); ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            <h4 class="title">รายการข้อมูล คำนำหน้านาม</h4>
                               <!-- <p class="category">Here is a subtitle for this table</p>-->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>คำนำหน้านาม</th>

                                        <th>ลบ</th>
                                    </thead>
                                    <tbody>
  <?php 
    require 'mysql/config.php';
    $sql="SELECT * FROM prefix ";
        
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
    ?>
                                        <tr>
                                        	<td><?php echo $row['prefix_id']; ?></td>
                                        	<td><?php echo $row['prefix_name']; ?></td>
                                        
                          
                                            <td>
                                            <form action="deleteprefix.php" method="POST">
            <input type="hidden" name="prefix_id"  value="<?php echo $row['prefix_id'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-danger pe-7s-trash" >ลบ</button>
            </form>
                                        </td>
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
                                <h4 class="title text-center">เพิ่มข้อมูลคำนำหน้านาม</h4>
                            </div>
                            <div class="content">
                                <form action="prefixinsert.php" method="POST">
                                <div class="row">
                                <div class="col-md-2">
                                            <div class="form-group">
                                                <label>ID</label>
                                                <input type="text" name="prefix_id" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>คำนำหน้านาม</label>
                                                <input type="text" name="prefix_name" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">&nbsp;</label><br>
                                                <button type="submit" class="btn btn-info btn-fill pull-right">เพิ่ม</button>
                                            </div>
                                        </div>
                                    </div>


                                  
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