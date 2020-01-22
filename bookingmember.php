<?php include("adminheader.php"); ?>
<?php 

require_once "mysql/config.php";
$bkin = $_GET['bkin'];
$bkout = $_GET['bkout'];
$rmid = $_GET['rmid'];
$tpname = $_GET['tpname'];
$rmtype = $_GET['rmtype'];
$sumprice = $_GET['rmprice'];
$days = (int)date_diff(date_create($bkin), date_create($bkout))->format('%R%a');


?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">ข้อมูลห้องพัก</h4>
                            </div>
                            <div class="content">

                                <div class="row">
                                <div class="col-md-4">
                                            <div class="form-group">
                                                <label>เช็คอินวันที่</label>
                                                <?php echo  date_format(date_create($bkin), "d/m/Y") ;?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>เช็คเอ้าท์วันที่</label>
                                                <?php echo  date_format(date_create($bkout), "d/m/Y") ;?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                
                                        </div>
                                    </div>
                                    <div class="row">
                                <div class="col-md-3">
                                            <div class="form-group">
                                                <label>หมายเลขห้อง</label>
                                                <?php echo  $rmid ;?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>ประเภทห้องพัก</label>
                                                <?php echo  $tpname ;?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">จำนวนคืน</label>
                                                <?php echo $days ; ?> คืน

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ราคา</label>
                                                
                                                <?php 
                                                $sumprice = (int)$days * (int)$sumprice;
                                                echo  number_format( $sumprice,0);?>
                                            </div>
                                        </div>
                                    </div>
</div>
                            
                            </div>
                        </div>
                    </div>
                  
                    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">กรอกข้อมูลการจอง</h4>
                            </div>
                            <div class="content">
                                <form action="bookingmemberinsert.php" method="POST">
                                <div class="row">
                                <div class="col-md-2">
                                            <div class="form-group">
                                                <label>คำนำหน้านาม</label>
                                                <select name="prefix_id" id="q" class="form-control">
                  <option value="0">คำนำหน้า</option>
                  <?php 
                        $sql="SELECT * FROM prefix ORDER BY prefix_name ASC";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_array(MYSQLI_ASSOC)){
                        ?>
                          <option value="<?php echo $row['prefix_id']; ?>"><?php echo $row['prefix_name']; ?></option>
                          
                          <?php } ?>
                        </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>ชื่อ</label>
                                                <input type="text" name="firstname" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>นามสกุล</label>
                                                <input type="text" name="lastname" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
        <!-- ส่งข้อมูลห้องพัก -->
        <input type="hidden" name="rmid"  value="<?php echo $rmid ;?>" >    
        <input type="hidden" name="bkin"  value="<?php echo $bkin ;?>" >  
        <input type="hidden" name="bkout"  value="<?php echo $bkout ;?>" >  
        <input type="hidden" name="bkdate"  value=" <?php echo date("Y-m-d");?>">
        <input type="hidden" name="sumprice" value=" <?php echo $sumprice;?>" readonly class="form-control">
        <!-- ส่งข้อมูลห้องพัก -->
         
                                            </div>
                                        </div>
                                        
                                    </div>
                                 
                                    <div class="row">
                                <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" >
                                            </div>
                                        </div>
                                        
                                        </div>

                           
                                        <div class="row">
                                <div class="col-md-6">
                                            <div class="form-group">
                                                <label>phone</label>
                                                <input type="text" name="phone" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>email</label>
                                                <input type="email" name="email" class="form-control" >
                                            </div>
                                        </div>
                                        
                                        </div>



                            <div class="row">
                                <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Addres</label>
                                            <textarea name="address" class="form-control"  cols="40" rows="5"></textarea>
                                            </div>
                                </div>
                            </div>
                                        

                                        <div class="row">

                                <div class="col-md-6">
                                            <div class="form-group">
                                               
                                    <button type="submit" name="submit" class="btn btn-info btn-fill pull-right"> Booking</button>
                                    <div class="clearfix">
                                            </div>
                                        </div>
                                        
                                      

                                  
                                </form>
                                
                            </div>
                        </div>
                    </div>


<?php include("adminfooter.php"); ?>