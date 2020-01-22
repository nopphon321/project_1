<?php include("adminheader.php"); ?>
<?php
// ปิดการแสดง error
error_reporting(0);
?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <!-- <h4 class="title">ค้นหารายชื่อสมาชิก</h4>
                                <p class="category">
                                <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>"  mehod="GET">
                                <input name="Search" class="form"  type="text"  value="">
                                 <input type="submit" class="btn btn-info  pe-7s-search" value="Search"></form>
                                </p> -->
                            </div>
                            <div class="content ">
                                <table 
                                data-toggle="table"
                                    data-search="true"
                                    data-pagination="true"
                                    data-page-list="[5, 10, all]"
                                >
                                    <thead>
                                        <th>ID</th>
                                    	<th>ชื่อ-นามสกุล</th>
                                    	<th>เบอร์</th>
                                    	<th>อีเมล์</th>
                                        <th>ลบ</th>
                                        <th>ดูประวัติ/แก้ไข</th>
                                    </thead>
                                    <tbody>
                                    <?php
                    
                    require 'mysql/config.php';
                // Search By Name or Email
                $strSQL = "SELECT * FROM member ";
                $result = $conn->query($strSQL);     
                    while($row = $result->fetch_array(MYSQLI_ASSOC)){
                ?>
                                        <tr>
                                        	<td><?php echo $row['member_id']; ?></td>
                                        	<td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                                        	<td><?php echo $row['phone']; ?></td>
                                        	<td><?php echo $row['email']; ?></td>
                                        	<td>
                                            <div><form action="delete.php" class="text-center" method="POST">
            <input type="hidden" name="member_id"  value="<?php echo $row['member_id'];?>" class="form-control" required="required">
            <button type="submit" onclick="return confirm('คุณแน่ในหรือว่าจะลบข้อมูลสมาชิกหมายเลข <?php echo $row['member_id'] ?> ')" class="btn btn-light  btn-danger icon ion-ios-trash ion-icon " ></button>
            </form></div>
                                
                                            </td>
                                            <td><form action="editmember.php" class="text-center" method="POST">
            <input type="hidden" name="member_id"  value="<?php echo $row['member_id'];?>" class="form-control" required="required">
            <button type="submit" class=" icon ion-md-create ion-icon btn btn-light btn-primary " ></button>
            </form></td>
                                        </tr>
        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


               
                </div>
            </div>
        </div>

    </div>
</div>

<?php include("adminfooter.php"); ?>