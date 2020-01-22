
<?php 
require 'mysql/config.php';
require 'books_config.php';
$stdate=(isset($_POST['stdate']))?$_POST['stdate']:date("Y-m-d");
$endate=(isset($_POST['endate']))?$_POST['endate']:date("Y-m-d");

    if(isset($_GET['rmid'])){
        $rmid=$_GET['rmid'];
        $bkin=$_GET['bkin'];
        $bkstatus=$_GET['bkstatus'];
        require 'pays_status.php';
    }

?>
<?php $nowdate=date("Y-m-d"); ?>
<?php include("head/admin_header.php"); ?>
<div class="container text-center">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<form action="booking_report.php" method="POST">

<label class="bg-whie ">เข้าพักวันที่</label>
        <input type="date" name="stdate" value="<?php echo $nowdate; ?>" required>
        <label>ถึง</label>
        <input type="date" name="endate" value="<?php echo $nowdate; ?>" required>
        <button type="submit" class="btn btn-dark">ค้นหา</button>

</form>

</nav>
</div>

<div class="container">
  </table>
  <?php include("bodycss_print.php"); ?>
  <div class="container text-center" id="print">
    <div class="text-center"><img src="img/hotel.jpg" width="250px"  height="150px"><br/><br/>
    <h4  data-aos="fade-up ">รายงานข้อมูลการเข้าพัก ห้องพักเฮือนกิ่งกะหร่า</h4><hr>
    <div class="text-left" style="font-size:18px">ตั้งแต่วันที่<span class="font-weight-bold"> <?php echo date_format(date_create($stdate), "d/m/Y");?></span> ถึง <span class="font-weight-bold"><?php echo date_format(date_create($endate), "d/m/Y");?></span> </div>

  </div>
  <br/>
  <center>
<table border="1" cellspacing="1" cellpadding="1"   >
    <thead>
        <tr>
            <th>วันที่โอน</th>
            <th>โอนเข้าธนาคาร</th>
            <th>จำนวนเงินที่โอน</th>
            <th>ชื่อ-นามสกุลผู้โอน</th>
            <th>หหมายเลขข้องพัก</th>
            <th>วันที่เข้าพัก</th>
            <th>วันที่ออก</th>
            <th>สถานะ</th>
        </tr>
</thead>
<tbody style="font-size:15px"  class="table table-striped" >
        <?php 
        $sql="SELECT * FROM pay  LEFT JOIN bank ON pay.bank_id = bank.bank_id "
        ."WHERE  pay.bkin BETWEEN '$stdate' AND '$endate'  "
        ."ORDER BY pay.bkin ASC";
        
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $bkstatus=$row['bkstatus'];
        ?>

    <tr >
    <?php
            if($bkstatus>0){ ?>
        <td>
        
        <?php echo date_format(date_create($row['paydate']), "d/m/Y");?>
        
        </td>
            <td ><?php echo $row['bank_name'];?></td>
            <td><?php echo $row['price'];?>
            <td><?php echo $row['firsname'];?> <?php echo $row['lastname'];?></td>
            <td><?php echo $row['rmid'];?></td>
            <td><?php echo date_format(date_create($row['bkin']), "d/m/Y");?></td>
            <td><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></td>
            <td>
            <?php
            if($bkstatus>0){ ?>
            <?php echo $bookstatus[$row['bkstatus']];?>
           <?php }else{ ?>
           <span class="text-danger"> <?php echo $bookstatus[$row['bkstatus']];
            } ?></span>
           </td>
           <?php }else{ ?>
            <td class="text-danger">
        
        <?php echo date_format(date_create($row['paydate']), "d/m/Y");?>
        
        </td>
            <td class="text-danger" ><?php echo $row['bank_name'];?></td>
            <td class="text-danger"><?php echo $row['price'];?>
            <td class="text-danger"><?php echo $row['firsname'];?> <?php echo $row['lastname'];?></td>
            <td class="text-danger"><?php echo $row['rmid'];?></td>
            <td class="text-danger"><?php echo date_format(date_create($row['bkin']), "d/m/Y");?></td>
            <td class="text-danger"><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></td>
            <td class="text-danger"> <?php echo $bookstatus[$row['bkstatus']];?></td>
           <?php }?>
        </tr>
        <?php }?>
</tbody>
</table>
</center>
  

   

          <!--ปิด div container -->

</div><br/>


<?php include("head/admin_footer.php"); ?>
