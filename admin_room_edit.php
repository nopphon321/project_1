<?php include("adminheader.php"); ?>

<?php 

$rmid = $_POST['rmid']; 


        $sql="SELECT * FROM rooms INNER JOIN roomtype ON rooms.rmtype = roomtype.rmtype  WHERE rmid= $rmid ";
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
        ?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">แก้ไขข้อมูลห้องพัก</h4>
                            </div>
                            <div class="content">
  <!-- Form -->  <form action="admin_room_edit_insert.php" method="POST" class="bg-white p-md-5 p-4 mb-5 border"  enctype="multipart/form-data" >

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>หมายเลขห้อง</label>
                                                <input type="text" class="form-control" name="rmid" value="<?php echo $row['rmid']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                            <label>ชื่อประเภทห้องห้องพัก</label>
                                            <input type="text" class="form-control" name="rmtype" value="   <?php echo $row['tpname']; ?>" readonly>
                                         
                                            </div>
                                            </div>
                                         <div class="col-md-5">
                                            <div class="form-group">
                                            <label>รายละเอียดห้องพัก</label>
                                            <textarea cols="20" rows="4" name="detail" class="form-control" >
                                                <?php echo $row['detail']; ?>
                                                </textarea>
                                                
                                            </div>
                                            </div>

                                    </div>

                                    <a href="admin_room.php"   class="btn btn-info btn-fill pull-left">ย้อนกลับ</a>
                                    
                                    <button type="submit"  name="submit" class="btn btn-info btn-fill pull-right">ตกลงการแก้ไข</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
               

                </div>
            </div>
        </div>

        <?php } ?>
<?php include("adminfooter.php"); ?>