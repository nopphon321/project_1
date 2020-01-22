<?php include("adminheader.php"); ?>


<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">โชว์รูปภาพ</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" class="text-center">
                                    <thead>
                                        <th>หมายเลขห้อง</th>
                                    	<th>ประเภทห้อง</th>
                                    	<th>รายละเอียด</th>
                                    	<th>แก้ไข</th>
                                    </thead>
                                    

                                    <tbody>
                                    <?php 
$i= 0 ;
$sql="SELECT DISTINCT web_image.web_header_id , web_title.web_title_name FROM web_image INNER JOIN web_title ON web_image.web_header_id = web_title.web_header_id WHERE web_image.web_header_id = '1'";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $i++;
?>
                                        <tr class="text-center">
                                        	<td><?php echo $i ;?></td>
                                        	<td><?php echo $row['web_title_name']; ?></td>
                                            <td>
                                            <?php 

                                            $sql2="SELECT web_image.w_image FROM web_image INNER JOIN web_title ON web_image.web_header_id = web_title.web_header_id WHERE web_image.web_header_id = '1'";
                                            $result2 = $conn->query($sql2);
                                            while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                                                
                                                ?>
                                     <img src="img/<?php echo$row2['w_image']; ?>" while="50px" height="50px" >
                                            <?php }?>
                                        
                                        </td>
                                            <td><form action="admin_gallery_edit.php" method="POST"  >
            <input type="hidden" name="rmtype"  value="<?php echo $row['web_title_name'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-dangeer  btn-info" >แก้ไข</button>
            </form></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>


                                    <tbody>
                                    <?php 

$sql="SELECT DISTINCT gallery.rmtype , roomtype.tpname FROM gallery INNER JOIN roomtype ON gallery.rmtype = roomtype.rmtype WHERE gallery.rmtype = '2'";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $i++;
?>
                                        <tr class="text-center">
                                        	<td><?php echo $i ;?></td>
                                        	<td><?php echo $row['tpname']; ?></td>
                                            <td>
                                            <?php 

                                            $sql2="SELECT gallery.src_image FROM gallery INNER JOIN roomtype ON gallery.rmtype = roomtype.rmtype WHERE gallery.rmtype = '2'";
                                            $result2 = $conn->query($sql2);
                                            while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                                                
                                                ?>
                                     <img src="img/<?php echo$row2['src_image']; ?>" while="50px" height="50px" >
                                            <?php }?>
                                        
                                        </td>
                                        <td><form action="admin_gallery_edit.php" method="POST"  >
            <input type="hidden" name="rmtype"  value="<?php echo $row['rmtype'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-dangeer  btn-info" >แก้ไข</button>
            </form></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>

                                    <tbody>
                                    <?php 

$sql="SELECT DISTINCT gallery.rmtype , roomtype.tpname FROM gallery INNER JOIN roomtype ON gallery.rmtype = roomtype.rmtype WHERE gallery.rmtype = '3'";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $i++;
?>
                                        <tr class="text-center">
                                        	<td><?php echo $i ;?></td>
                                        	<td><?php echo $row['tpname']; ?></td>
                                            <td>
                                            <?php 

                                            $sql2="SELECT gallery.src_image FROM gallery INNER JOIN roomtype ON gallery.rmtype = roomtype.rmtype WHERE gallery.rmtype = '3'";
                                            $result2 = $conn->query($sql2);
                                            while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                                                
                                                ?>
                                     <img src="img/<?php echo$row2['src_image']; ?>" while="50px" height="50px" >
                                            <?php }?>
                                        
                                        </td>
                                        <td><form action="admin_gallery_edit.php" method="POST"  >
            <input type="hidden" name="rmtype"  value="<?php echo $row['rmtype'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-dangeer  btn-info" >แก้ไข</button>
            </form></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>

                                    
                                    <tbody>
                                    <?php 

$sql="SELECT DISTINCT gallery.rmtype , roomtype.tpname FROM gallery INNER JOIN roomtype ON gallery.rmtype = roomtype.rmtype WHERE gallery.rmtype = '4'";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $i++;
?>
                                        <tr class="text-center">
                                        	<td><?php echo $i ;?></td>
                                        	<td><?php echo $row['tpname']; ?></td>
                                            <td>
                                            <?php 

                                            $sql2="SELECT gallery.src_image FROM gallery  WHERE gallery.rmtype = '4'";
                                            $result2 = $conn->query($sql2);
                                            while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                                                
                                                ?>
                                     <img src="img/<?php echo$row2['src_image']; ?>" while="50px" height="50px" >
                                            <?php }?>
                                        
                                        </td>
                                        <td><form action="admin_gallery_edit.php" method="POST"  >
            <input type="hidden" name="rmtype"  value="<?php echo $row['rmtype'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-dangeer  btn-info" >แก้ไข</button>
            </form></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                
                                    <tbody>
                                    <?php 

$sql="SELECT DISTINCT gallery.rmtype , roomtype.tpname FROM gallery INNER JOIN roomtype ON gallery.rmtype = roomtype.rmtype WHERE gallery.rmtype = '5'";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $i++;
?>
                                        <tr class="text-center">
                                        	<td><?php echo $i ;?></td>
                                        	<td><?php echo $row['tpname']; ?></td>
                                            <td>
                                            <?php 

                                            $sql2="SELECT gallery.src_image FROM gallery  WHERE gallery.rmtype = '5'";
                                            $result2 = $conn->query($sql2);
                                            while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                                                
                                                ?>
                                     <img src="img/<?php echo$row2['src_image']; ?>" while="50px" height="50px" >
                                            <?php }?>
                                        
                                        </td>
                                            <td>
                                            <form action="admin_gallery_edit.php" method="POST"  >
            <input type="hidden" name="rmtype"  value="<?php echo $row['rmtype'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-dangeer  btn-info" >แก้ไข</button>
            </form>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>

                                    <tbody>
                                    <?php 

$sql="SELECT DISTINCT gallery.rmtype , roomtype.tpname FROM gallery INNER JOIN roomtype ON gallery.rmtype = roomtype.rmtype WHERE gallery.rmtype = '6'";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $i++;
?>
                                        <tr class="text-center">
                                        	<td><?php echo $i ;?></td>
                                        	<td><?php echo $row['tpname']; ?></td>
                                            <td>
                                            <?php 

                                            $sql2="SELECT gallery.src_image FROM gallery INNER JOIN roomtype ON gallery.rmtype = roomtype.rmtype WHERE gallery.rmtype = '3'";
                                            $result2 = $conn->query($sql2);
                                            while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                                                
                                                ?>
                                     <img src="img/<?php echo$row2['src_image']; ?>" while="50px" height="50px" >
                                            <?php }?>
                                        
                                        </td>
                                        <td><form action="admin_gallery_edit.php" method="POST"  >
            <input type="hidden" name="rmtype"  value="<?php echo $row['rmtype'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-dangeer  btn-info" >แก้ไข</button>
            </form></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>

                            
                                </table>

                            </div>
                        </div>
                    </div>


<!-- เพิ่ม -->
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">เพิ่มรูปภาพ</h4>
                            </div>
                            <div class="content">
                                <form action="admin_insert_gallery.php" method="POST" enctype="multipart/form-data" >
                                <div class="row">
                                <div class="col-md-6">
                                            <div class="form-group">
                                                <label>เลือกประเภทห้องที่จะเพิ่ม</label>
                                                <select name="rmtype" id="q" class="form-control">
                  <option value="0">กรุณาเลือก</option>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>ชื่อประเภทห้อง</label>
                                                <input type="file" name="image" >
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