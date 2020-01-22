
<?php 
require 'mysql/config.php';
//require 'books_config.php';

//    if(isset($_GET['rmid'])){
  //      $rmid=$_GET['rmid'];
    //    $bkin=$_GET['bkin'];
      //  $bkstatus=$_GET['bkstatus'];
        //require 'pays_status.php';
    //}

?>

<?php include("adminheader.php"); ?>
<?php $nowdate=date("Y-m-d"); ?>
<div class="content">
 <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">ข้อมูลลประเภทห้องพัก</h4>
                            </div>
                           
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            <!--<h4 class="title">รายการจองห้องพัก</h4>
                              <p class="category">Here is a subtitle for this table</p>-->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>รายการ</th>
                                    	<th>ประเภทห้องพัก</th>
                                        <th>รูปภาพ</th>
                                        <th>รายละเอียด</th>
                                        <th>ราคา</th>
                                        <th>ลบ</th>
                                        <th>แก้ไข</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
  <?php 
  $i = 0;
        $sql="SELECT * FROM roomtype ";

        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $i ++;
        ?>
          <tr>
        <td><?php echo $i ;?></td>

<td> <?php echo $row['tpname']; ?></td>
<td class="text-center">
<img src="roomtype/<?php echo $row['rm_image']; ?>" while="150px" height="150px" >

</td>
<td><?php echo $row['rm_detail']; ?></td>
<td><?php echo $row['rmprice']; ?></td>
<td><form action="roomtype_delete.php" method="POST"  >
            <input type="hidden" name="rmtype"  value="<?php echo $row['rmtype'];?>" class="form-control" required="required">
            <button type="submit" onclick="return confirm('ตกลงการลบประเภทห้องพัก <?php echo $row['tpname']; ?> อีกครั้ง ')" class="btn btn-dangeer pe-7s-trash btn-danger" >ลบ</button>
            </form></td>
        <td ><form action="admin_roomtype_edit.php" method="POST"  >
            <input type="hidden" name="rmtype"  value="<?php echo $row['rmtype'];?>" class="form-control" required="required">
            <button type="submit" class="btn  btn-info" >แก้ไข</button>
            </form></td>
    </tr>
        <?php } ?>
                                    </tbody>
                                </table>

                                
                            </div>
                        </div>
                    </div>

          <!--ปิด div container -->

</div>
</div></div></div></div>
<!-- ยังไมได้ เปลี่ยนชื่อ  name  -->
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">เพิ่มประเภทห้องพัก</h4>
                            </div>
                            <div class="content">
                                <form action="admin_inert_roomtype.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                <div class="col-md-2">
                                            <div class="form-group">
                                                <label>หมายเลขประเภทห้อง<br><span style="font-size:12px ; color:red;" >*หมายเลขห้ามซ้ำกััน</span></label>
                                                <input type="text" name="rmtype" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>ชื่อประเภทห้อง</label>
                                                <input type="text" name="tpname" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">เพิ่มรูป (800*571)</label>
                                                <input type="file" name="image"   >
                                            </div>
                                        </div>
                                        
                                    </div>

                                    
                                    <div class="row">
                                <div class="col-md-3">
                                            <div class="form-group">
                                            <label>ราคา</label>
                                                <input type="text" name="rmprice" class="form-control" >
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">รายละเอียด</label>
                                                <textarea cols="50" rows="4" name="rm_detail" class="form-control" required="required">
                                                </textarea>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-info btn-fill pull-center">เพิ่ม</button>
                                        </div>
                                        
                                   
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>



<?php include("adminfooter.php"); ?>


