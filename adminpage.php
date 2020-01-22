
<?php 
require 'mysql/config.php';
require 'books_config.php';
$stdate=(isset($_GET['stdate']))?$_GET['stdate']:date("Y-m-d");
$endate=(isset($_GET['endate']))?$_GET['endate']:date("Y-m-d");

    if(isset($_GET['rmid'])){
        $rmid=$_GET['rmid'];
        $bkin=$_GET['bkin'];
        $bkstatus=$_GET['bkstatus'];
        require 'books_status.php';
    }

?>
<?php include("head/admin_header.php"); ?>
<?php $nowdate=date("Y-m-d"); ?>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col" colspan="4" class="text-center">
       <form action="adminpage.php" method="GET">
    <h2 class=" thaifont3" data-aos="fade-up ">รายหารจองห้องพัก</h2>
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
            <th>จัดการ</th>
            <th>เลขที่ห้อง</th>
            <th>ประเภท</th>
            <th>ชื่อ-นามสกุล (ผู้จอง)</th>
            <th>โทรศัพท์</th>
            <th>email</th>
            <th>วันเข้าพัก</th>
            <th>วันออก</th>
            <th>จำนวนวัน</th>
            <th>สถานะ</th>
            <th>ตกลงการเข้าพัก</th>
        </tr>
</thead>
<tbody>
        <?php 
        $sql="SELECT * FROM books "
        ."WHERE books.bkin BETWEEN '$stdate' AND '$endate' AND books.bkstatus > 0 ";
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
        ?>
        
    <tr>
        <td>
        <?php if($row['bkstatus']==1){ ?>
            <a href="javascript:bookstatus('<?php echo $row['rmid']; ?>','<?php echo $row['bkin']; ?>','0')">
            ยกเลิก
            </a>
            <?php } ?>
        </td>
            <?php  $bkout=$row['bkout']; ?>
        <td><?php echo $row['rmid'];?></td>
            <td><?php echo $row['tpname'];?></td>
            <td><?php echo $row['firsname'];?> <?php echo $row['lastname'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo date_format(date_create($row['bkin']), "d/m/Y");?></td>
            <td><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></td>
            <?php 
                   $bkin=$row['bkin'];
                   $bkout=$row['bkout'];
                    $days = (int)date_diff(date_create($bkin), date_create($bkout))->format('%R%a'); 
                  ?>
            <td align="right"><?php echo $days; ?></td>
            <td><?php echo $bookstatus[$row['bkstatus']];?></td>          
            <td>  
            <?php if($row['bkstatus']==4){ ?>
            <a href="javascript:bookstatus('<?php echo $row['rmid'];?>','<?php echo $row['bkin']; ?>','2')">
            เข้าพัก
            </a>
            <?php } ?>
            <?php if($row['bkstatus']==3){ ?>
            <a href="javascript:bookstatus('<?php echo $row['rmid']; ?>','<?php echo $row['bkin']; ?>','4')">
            ชำระเงินแล้ว
            </a>
            <?php } ?>
            </td>
        </tr>
        <?php }?>
</tbody>
</table>
</table>
  

   

          <!--ปิด div container -->

</div>

<script>
    var vurl ="adminpage.php?stdate=<?php echo $stdate; ?>&endate=<?php echo $endate; ?>";
    function bookstatus(v1,v2,v3){
        var v4= vurl+="&rmid="+v1+"&bkin="+v2+"&bkstatus="+v3;
        window.location.replace(v4);
    }
</script>


<?php include("head/admin_footer.php"); ?>