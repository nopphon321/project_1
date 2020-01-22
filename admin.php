<?php include("header.php"); ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">รายชื่อสมาชิก</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>ชื่อ-นามสกุล</th>
                                    	<th>เบอร์</th>
                                    	<th>อีเมล์</th>
                                        <th>แก้ไข</th>
                                        <th>แก้ไข</th>
                                    </thead>
                                    <tbody>
  <?php 
    require 'mysql/config.php';
    $sql="SELECT * FROM member ";
        
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
    ?>
                                        <tr>
                                        	<td><?php echo $row['member_id']; ?></td>
                                        	<td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                                        	<td><?php echo $row['phone']; ?></td>
                                        	<td><?php echo $row['email']; ?></td>
                                        	<td>
                                            <div><form action="delete.php" method="POST">
            <input type="hidden" name="member_id"  value="<?php echo $row['member_id'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-light pe-7s-trash" >ลบ</button>
            </form></div>
                                
                                            </td>
                                            <td><form action="editmember.php" method="POST">
            <input type="hidden" name="member_id"  value="<?php echo $row['member_id'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-light" >ดูข้อมูล/แก้ไข</button>
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

<?php include("footer.php"); ?>