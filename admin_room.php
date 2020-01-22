<?php include("adminheader.php"); ?>
<?php 

if (isset($_POST['submit2'])) {
    $rmid = $_POST['rmid'];



    $query = "DELETE FROM `rooms` WHERE rmid = $rmid";
    $result =mysqli_query($conn, $query) or die(mysql_error());
    if($result){
      echo "<script>";
      echo "alert('ลบสำเร็จ');" ;
      echo "window.location.href='admin_room.php';";
      echo "</script>";
     
   }else{  
     echo "มีบางอย่างผิดพลาด!!!!";    
   }
  }

?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">ข้อมูห้องพัก</h4>
                                <p class="category"></p>
                            </div>
                            <!-- <div class="content table-responsive table-full-width"> -->
                                <table
                                    data-toggle="table"
                                    data-search="true"
                                    data-pagination="true"
                                    data-page-list="[5, 10, all]"
                                    >
                                    <thead>
                                        <th class="text-center">หมายเลขห้อง</th>
                                    	<th class="text-center">ประเภทห้อง</th>
                                    	<th class="text-center">รายละเอียด</th>
                                    	<th class="text-center">ลบ</th>
                                        <th class="text-center">แก้ไข</th>
                                    </thead>
                                    

                                    <tbody>
                                    <?php 
// $i= 0 ;
// $sql="SELECT * FROM rooms INNER JOIN roomtype ON rooms.rmtype = roomtype.rmtype";
// $result = $conn->query($sql);
// while($row = $result->fetch_array(MYSQLI_ASSOC)){
//     $i++;
$sql = "SELECT * FROM rooms INNER JOIN roomtype ON rooms.rmtype = roomtype.rmtype";
$result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

$i = 1;

foreach ($result as $row) { ?>
                                        <tr class="text-center">
                                        	<td><?php echo $i ;?></td>
                                        	<td><?php echo $row['tpname']; ?></td>
                                            <td><?php echo $row['detail']; ?></td>
                                            <td>
                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"  >
            <input type="hidden" name="rmid"  value="<?php echo $row['rmid'];?>" class="form-control" required="required">
            <button type="submit" name="submit2" onclick="return confirm('ตกลงการลบข้อมูลห้องพัก หมายเลข <?php echo $row['rmid'];?> อีกครั้ง')" class="btn btn-dangeer pe-7s-trash btn-danger" >ลบ</button>
            </form>
                                            </td>
                                            <td>
                                            <form action="admin_room_edit.php" method="POST"  >
            <input type="hidden" name="rmid"  value="<?php echo $row['rmid'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-dangeer  btn-info" >แก้ไข</button>
            </form>
                                            </td>
                                        </tr>
                                        <?php $i++;} ?>
                                    </tbody>

                                </table>

                            <!-- </div> -->
                        </div>
                    </div>

<!-- เพิ่ม -->
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">เพิ่มห้องพัก</h4>
                            </div>
                            <div class="content">
                                <form action="admin_insert_room.php" method="POST" >
                                <div class="row">
                                <div class="col-md-2">
                                            <div class="form-group">
                                                <label>หมายเลขห้องพัก<span style="font-size:12px ; color:red;" >*หมายเลขห้ามซ้ำกััน</span></label>
                                                <input type="text" name="rmid" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>ชื่อประเภทห้อง</label>
                                                <select name="rmtype" id="q" class="form-control">
                  <option value="0">ทั้งหมด</option>
                  <?php 
                        $sql="SELECT * FROM roomtype ORDER BY rmtype ASC";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_array(MYSQLI_ASSOC)){
                        ?>
                          <option value="<?php echo $row['rmtype']; ?>"><?php echo $row['tpname']; ?></option>
                          
                          <?php } ?>
                        </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">รายละเอียดห้องพัก</label>
                                                <input type="text" name="detail"  class="form-control" >
                                            </div>
                                            <button type="submit" class="btn btn-info btn-fill pull-center">เพิ่ม</button>
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

    

<?php include("adminfooter.php"); ?>