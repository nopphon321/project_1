
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
<form action="paying_report.php" method="POST">

<label class="bg-whie ">เข้าพักวันที่</label>
        <input type="date" name="stdate" value="<?php echo $nowdate; ?>" required>
        <label>ถึง</label>
        <input type="date" name="endate" value="<?php echo $nowdate; ?>" required>
        <button type="submit" class="btn btn-dark">ค้นหา</button>
        <?php
                        $sumprice = 0 ;
                        
                ?>

</form>

</nav>
</div>

<div class="container">
  </table>
  <?php include("bodycss_print.php"); ?>
  <div class="container text-center" id="print">
    <div class="text-center"><img src="img/hotel.jpg" width="250px"  height="150px"><br/><br/>
    <h4  data-aos="fade-up ">รายงานข้อมูลรายได้</h4><hr>
    <div class="text-left" style="font-size:18px">ตั้งแต่วันที่<span class="font-weight-bold"> <?php echo date_format(date_create($stdate), "d/m/Y");?></span> ถึง <span class="font-weight-bold"><?php echo date_format(date_create($endate), "d/m/Y");?></span> </div>

  </div>
  <br/>
<center><table border="1" cellspacing="1" cellpadding="1"   >
    <thead>
        <tr>
            <th>วันที่โอน</th>
            <th>โอนเข้าธนาคาร</th>
            <th>ชื่อ-นามสกุลผู้โอน</th>
            <th>หหมายเลขห้องพัก</th>
            <th>สถานะการชำระเงิน</th>
            <th>จำนวนเงินที่โอน</th>

        </tr>
</thead>
                
<tbody style="font-size:15px"  class="table table-striped" >
        <?php 
        $sql="SELECT * FROM pay  LEFT JOIN bank ON pay.bank_id = bank.bank_id "
        ."WHERE   pay.bkin BETWEEN '$stdate' AND '$endate'  "
        ."ORDER BY pay.paydate ASC";
        
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
        ?>

    <tr>
    
        <td><?php echo date_format(date_create($row['paydate']), "d/m/Y");?></td>
            <td><?php echo $row['bank_name'];?></td>

            <td><?php echo $row['firsname'];?> <?php echo $row['lastname'];?></td>
            <td class="text-center"><?php echo $row['rmid'];?></td>
            <td class="text-center"><?php echo $bookstatus[$row['bkstatus']];?></td>
            <td class="text-center"><?php echo number_format( $row['price'],0);?></td>
        </tr>
        <?php $sumprice = (int)$sumprice + (int)$row['price']; ?>
        <?php }?>
        
        <tr>
        <td colspan="5" class="text-right">Total :<td>
        <?php echo number_format($sumprice) ;?>
        </tr>
</tbody>
</table>
</center>
  

   

          <!--ปิด div container -->

</div><br/>


<?php include("head/admin_footer.php"); ?>
