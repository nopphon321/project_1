<?php include("adminheader.php"); ?>

<?php 

$rmtype = $_POST['rmtype']; 


        $sql="SELECT * FROM roomtype WHERE rmtype= $rmtype ";
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
        ?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">ข้อมูลประเภทห้องพัก </h4>
                            </div>
                            <div class="content">
  <!-- Form -->  <form action="admin_roomtype_edit_insert.php" method="POST" class="bg-white p-md-5 p-4 mb-5 border"  enctype="multipart/form-data" >

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>หมายเลขประเภทห้อง</label>
                                                <input type="text" class="form-control" name="rmtype" value="<?php echo $row['rmtype']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                            <label>ชื่อประเภทห้องพัก</label>
                                                <input type="text" class="form-control" name="tpname" value="<?php echo $row['tpname']; ?>">
                                            </div>
                                            </div>
                                         <div class="col-md-5">
                                            <div class="form-group">
                                            <label>ราคาห้องพัก</label>
                                            <input type="text" class="form-control" name="rmprice" value="<?php echo $row['rmprice']; ?>">
                                                
                                            </div>
                                            </div>
                                        </div>
                                        
                                        

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>รายละเอียด</label>
                                                <textarea cols="20" rows="4" name="rmtype_detail" class="form-control" >
                                                <?php echo $row['rm_detail']; ?>
                                                </textarea>
                                            </div>
                                        </div>
                                          </div>
        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>รูปภาพเดิม</label>
                                                <img src="roomtype/<?php echo $row['rm_image']; ?>" while="250px" height="250px" >
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>อัพโหลดรูปภาพใหม่</label>
                                            <h1>เลือกรูปภาพ</h1>
                                                <input type="file" name="image" >
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <a href="admin_roomtype.php"   class="btn btn-info btn-fill pull-left">ย้อนกลับ</a>
                                    
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