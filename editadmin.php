<?php include("adminheader.php"); ?>


<?php 
$admin_id=$_GET['admin_id'];

    require 'mysql/config.php';
    $sql="SELECT * FROM admin  WHERE admin_id=$admin_id ";
        
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
    ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">แก้ไข ข้อมูลผู้ดูแลระบบ: <?php echo $row['admin_id']; ?></h4>
                            </div>
                            <div class="content">
                                <form action="updateadmin.php" method="POST">
                                <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <input type="hidden" name="admin_id" class="form-control" value="<?php echo $row['admin_id']; ?>">
                                                <label>ชื่อ</label>
                                                <input type="text" name="firstname" class="form-control" value="<?php echo $row['firstname']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">นามสกุล</label>
                                                <input type="text" name="lastname" class="form-control" value="<?php echo $row['lastname']; ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>email</label>
                                                <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>phone</label>
                                                <input type="text" class="form-control" name="phone" placeholder="Last Name" value="<?php echo $row['phone']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>password</label>
                                                <input type="text" class="form-control" name="password" placeholder="Last Name" value="<?php echo $row['password']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>userlevel(a=Admin,m="Member")</label>
                                                <input type="text" class="form-control" name="userlevel" value="<?php echo $row['userlevel']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>ที่อยู่</label>
                                                <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <a href="member.php" class="btn btn-info btn-fill pull-left">ย้อนกลับ</a>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">ตกลงการแก้ไข</button>
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