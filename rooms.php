<?php include("adminheader.php"); ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">แก้ไขห้องพัก</h4>
                            <!--    <p class="category">Here is a subtitle for this table</p>-->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>หมายเลขห้อง</th>
                                        <th>ประเภทห้องพัก</th>
                                        <th>ราคาห้องพัก</th>
                                        <th>แก้ไขรายละเอียดห้องพัก</th>
                                        <th>แก้ไขประเภทห้องพัก</th>
                                        <th>แก้ไขราคาห้องพัก</th>
                                        <th>ลบ</th>
                                    </thead>
                                    <tbody>
  <?php 
    require 'mysql/config.php';
    $sql="SELECT * FROM rooms INNER JOIN roomtype ON rooms.rmtype = roomtype.rmtype ";
        
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
    ?>
                                        <tr>
                                        	<td><?php echo $row['rmid']; ?></td>
                                            <td><?php echo $row['tpname']; ?> </td>
                                            <td><?php echo $row['rmprice']; ?> </td>
                                            <td><form action="editdetail.php" method="POST">
            <input type="hidden" name="rmid"  value="<?php echo $row['rmid'];?>" class="form-control" required="required">
            <button type="submit" class="btn bg-secondary pe-7s-cash" >แก้ไขรายละเอียดห้องพัก</button>
            </form></td>
                                        	<td>
                                            <div><form action="edittpname.php" method="POST">
            <input type="hidden" name="rmid"  value="<?php echo $row['rmid'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-primary pe-7s-config" >แก้ไขปะเภทห้อง</button>
            </form></div>
                                
                                            </td>
                                            <td><form action="editprice.php" method="POST">
            <input type="hidden" name="rmid"  value="<?php echo $row['rmid'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-success pe-7s-cash" >แก้ไขราคา</button>
            </form></td>
            <td><form action="deleterooms.php" method="POST">
            <input type="hidden" name="rmid"  value="<?php echo $row['rmid'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-danger pe-7s-trash" >ลบ</button>
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
                                <h4 class="title text-center">เพิ่มข้อมูลห้องพัก</h4>
                            </div>
                            <div class="content">
                                <form action="roomsinsert.php" method="POST">
                                <div class="row">
                                <div class="col-md-3">
                                            <div class="form-group">
                                                <label>เลขห้อง</label>
                                                <input type="text" name="rmid" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>เลขประเภทห้อง<span class="text-dark">(1 = ห้องแอร์,2 = ห้องพัดลม(เตียงเดี่ยว),3 =ห้องพัดลม(เตียงคู่), 4 = อื่นๆ)</span></label>
                                                <input type="text"  placeholder="หมายเลขเท่านั้น" name="rmtype" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ประเภทห้อง</label>
                                                <input type="text" name="tpname" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ราคาห้องพัก</label>
                                                <input type="text" name="rmprice" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Room</button>
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