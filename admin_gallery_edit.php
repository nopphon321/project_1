<?php include("adminheader.php"); ?>

<?php 

$rmtype = $_POST['rmtype']; 
if(isset($_POST['submit2'])){
    $rmtype = $_POST['rmtype'];
    $gallery_id= $_POST['gallery_id'];

    $sql3 ="DELETE FROM `gallery` WHERE gallery_id = $gallery_id AND rmtype = $rmtype";
    $mysql =mysqli_query($conn, $sql3) or die(mysqli_error($conn));
    if($mysql){
      echo "<script>";
      echo "alert('ลบรูปภาพสพเสร็จ');" ;
      echo "window.location.href='admin_gallery.php';";
      echo "</script>";
     
   }else{  
     echo "เกิดความผิดพลาด";    
   }
  }

       
        ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">แสดงรูปภาพห้องพัก</h4>
                                <p class="category">
                                <form action="<?php echo $_SERVER['PHP_SELF'];?>"  mehod="POST">
                               </form>
                                </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th class="text-center">รูป</th>
                                    	<th class="text-center">ลบ</th>
                                    </thead>
                                    <tbody>
                                    <?php
                    
                    require 'mysql/config.php';
                // Search By Name or Email
                $sql2="SELECT gallery.src_image, gallery.rmtype , gallery.gallery_id FROM gallery INNER JOIN roomtype ON gallery.rmtype = roomtype.rmtype WHERE gallery.rmtype = $rmtype";
                $result2 = $conn->query($sql2);
                while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                ?>
                                        <tr>
                                        	<td><img src="img/<?php echo$row2['src_image']; ?>" while="150px" height="150px" ></td>
     
                                        	<td>
                                            <div><form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="rmtype"  value="<?php echo $row2['rmtype'];?>" class="form-control" required="required">
            <input type="hidden" name="gallery_id"  value="<?php echo $row2['gallery_id'];?>" class="form-control" required="required">
           
            <button type="submit" name="submit2" class="btn btn-light pe-7s-trash btn-danger " >ลบ</button>
            </form></div>
                
                                            </td>
                                        </tr>
                                       
        <?php } ?>
                                    </tbody>
                                </table>
                                <a href="admin_gallery.php"   class="btn btn-info btn-fill pull-left">ย้อนกลับ</a>
                                    
                          

                            </div>
                            
                        </div>
                    </div>


               
                </div>
            </div>
        </div>

    </div>
</div>


<?php include("adminfooter.php"); ?>