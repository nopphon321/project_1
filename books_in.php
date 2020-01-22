
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
<table class="table" >
  <thead>
    <tr>
      <th scope="col" colspan="4" class="text-center">
       <form action="books_in.php" method="POST">
    <h2 class="thai-font3b" data-aos="fade-up ">รายการที่ยังไม่ชำระเงิน/ตรวจสอบการเข้าพัก</h2>
    <br>
<label class="bg-whie ">เข้าพักวันที่</label>
        <input type="date" name="stdate" value="<?php echo $nowdate; ?>" required>
        <label>ถึง</label>
        <input type="date" name="endate" value="<?php echo $nowdate; ?>" required>
        <button type="submit" class="btn btn-dark">ค้นหา</button>

</form>

  </thead>
  </table>
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
            <th class="text-center">สถานะ</th>
            <th>ยืนยันการเข้าพัก</th>
            <th>หลักฐานการโอน</th>
        </tr>
</thead>
<tbody style="font-size:15px"  >
        <?php 
        $sql="SELECT * FROM pay  LEFT JOIN bank ON pay.bank_id = bank.bank_id  "
        ."WHERE  pay.bkin BETWEEN '$stdate' AND '$endate' "
        ."ORDER BY pay.bkin ASC";
        
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $bkstatus=$row['bkstatus'];
        ?>

    <tr>
    
    <?php
            if($bkstatus>2){ ?>
        <td class="text-center"><?php echo date_format(date_create($row['paydate']), "d/m/Y");?></td>
            <td><?php echo $row['bank_name'];?></td>
            <td class="text-center"><?php echo $row['price'];?>
            <td><?php echo $row['firsname'];?> <?php echo $row['lastname'];?></td>
            <td class="text-center"><?php echo $row['rmid'];?></td>
            <td><?php echo date_format(date_create($row['bkin']), "d/m/Y");?></td>
            <td><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></td>
            <td class="text-center"><?php echo $bookstatus[$row['bkstatus']];?></td>
            <td> <?php if($row['bkstatus']==3){ ?>
            <a   href="javascript:bookstatus('<?php echo $row['rmid']; ?>','<?php echo $row['bkin']; ?>','4')">
            ยืนยันการเข้าพัก
            </a>
            <?php } ?></td>
            <td>
            <form action="viewpay.php" method="POST">
            <input type="hidden" name="pay_id"  value="<?php echo $row['pay_id'];?>" class="form-control" required="required">
            <button type="submit"  class="btn btn-light">ดูหลังฐานการโอน</button>
            </form>
            </td>
            <?php }else{ ?>

    <td class="text-danger"><?php echo date_format(date_create($row['paydate']), "d/m/Y");?></td>
    <td class="text-danger"><?php echo $row['bank_name'];?></td>
    <td class="text-danger text-center"><?php echo $row['price'];?>
    <td class="text-danger"><?php echo $row['firsname'];?> <?php echo $row['lastname'];?></td>
    <td class="text-danger text-center"><?php echo $row['rmid'];?></td>
    <td class="text-danger"><?php echo date_format(date_create($row['bkin']), "d/m/Y");?></td>
    <td class="text-danger"><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></td>
    <td class="text-danger text-center"><?php echo $bookstatus[$row['bkstatus']];?></td>
<td>
            <form action="viewpay.php" method="POST">
            <input type="hidden" name="pay_id"  value="<?php echo $row['pay_id'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-light" >ดูหลังฐานการโอน</button>
            </form>
            </td>
            <?php }?>
        </tr>
        <?php }?>
</tbody>
</table>
</table>
  <br><br />

   

          <!--ปิด div container -->

</div>

<script>
    var vurl ="books_in.php?stdate=<?php echo $stdate; ?>&endate=<?php echo $endate; ?>";
    function bookstatus(v1,v2,v3){
        var v4= vurl+="&rmid="+v1+"&bkin="+v2+"&bkstatus="+v3;
        window.location.replace(v4);
    }
</script>


<?php include("head/admin_footer.php"); ?>