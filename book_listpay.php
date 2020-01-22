
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
<?php include("head/admin_header.php"); ?>
<?php $nowdate=date("Y-m-d"); ?>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col" colspan="4" class="text-center">
       <form action="book_listpay.php" method="POST">
    <h2 class=" thaifont3" data-aos="fade-up ">รายการที่ยังไม่ชำระเงิน/ตรวจสอบ</h2>
    <br>
<label class="bg-whie ">เข้าพักวันที่</label>
        <input type="date" name="stdate" value="<?php echo $nowdate; ?>" required>
        <label>ถึง</label>
        <input type="date" name="endate" value="<?php echo $nowdate; ?>" required>
        <button type="submit" class="btn btn-dark">ค้นหา</button>

</form>

  </thead>
  </table>
<table border="1" cellspacing="0" cellpadding="5" class="text-center">
    <thead>
        <tr>
            <th>วันที่โอน</th>
            <th>โอนเข้าธนาคาร</th>
            <th>จำนวนเงินที่โอน</th>
            <th>ชื่อ-นามสกุลผู้โอน</th>
            <th>หหมายเลขข้องพัก</th>
            <th>วันที่เข้าพัก</th>
            <th>วันที่ออก</th>
            <th>สถานะการโอน</th>
            <th>หลักฐานการโอน</th>
        </tr>
</thead>
<tbody>
        <?php 
        $sql="SELECT * FROM pay  LEFT JOIN bank ON pay.bank_id = bank.bank_id "
        ."WHERE pay.bkstatus = 2 AND pay.bkin BETWEEN '$stdate' AND '$endate'  ";
        
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
        ?>

    <tr>
        <td><?php echo date_format(date_create($row['paydate']), "d/m/Y");?></td>
            <td><?php echo $row['bank_name'];?></td>
            <td><?php echo $row['price'];?>
            <td><?php echo $row['firsname'];?> <?php echo $row['lastname'];?></td>
            <td><?php echo $row['rmid'];?></td>
            <td><?php echo date_format(date_create($row['bkin']), "d/m/Y");?></td>
            <td><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></td>
            <td><?php echo $bookstatus[$row['bkstatus']];?></td>
            <td>
            <form action="viewpay.php" method="POST">
            <input type="hidden" name="pay_id"  value="<?php echo $row['pay_id'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-dark">ดูหลังฐานการโอน</button>
            </form>
            </td>

        </tr>
        <?php }?>
</tbody>
</table>
</table>
  

   

          <!--ปิด div container -->

</div>

<script>
    var vurl ="book_listpay.php?stdate=<?php echo $stdate; ?>&endate=<?php echo $endate; ?>";
    function bookstatus(v1,v2,v3){
        var v4= vurl+="&rmid="+v1+"&bkin="+v2+"&bkstatus="+v3;
        window.location.replace(v4);
    }
</script>


<?php include("head/admin_footer.php"); ?>