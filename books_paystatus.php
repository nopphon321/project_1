<?php include("head/admin_header.php")?>
<?php 

    session_start();

    if (!$_SESSION['userid']='a') {
            header("Location: index.php");
    } else {
?>

<?php 
require 'mysql/config.php';
require 'books_config.php';
$stdate=$_GET['stdate'];
$endate=$_GET['endate'];

    if(isset($_GET['rmid'])){
        $rmid=$_GET['rmid'];
        $bkin=$_GET['bkin'];
        $bkstatus=$_GET['bkstatus'];
        require 'books_status.php';
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="site-hero overlay" style="background-image: url(img/hero_2.jpg" data-stellar-background-ratio="0.5">
      <div class="container ">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
          <div class="container bg-white">
          <br>
    <form action="books_paystatus.php" method="GET">
    <h2 class=" thaifont3" data-aos="fade-up ">สถานะการโอนเงิน</h2>
    <br>
<label class="bg-whie ">เข้าพักวันที่</label>
        <input type="date" name="stdate" value="<?php echo $stdate; ?>" required>
        <label>ถึง</label>
        <input type="date" name="endate" value="<?php echo $endate; ?>" required>
        <button type="submit">ค้นหา</button>
        <a href="books_list.php">วันนี้/</a>
        <a href="books_range.php">ทำรายการจองห้องพัก/</a>
        <a href="books_pay.php">ตรวจสอบการชำระเงิน</a>
</form><br>
<table border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>จัดการ</th>
            <th>เลขที่ห้อง</th>
            <th>ประเภท</th>
            <th>ผู้จอง</th>
            <th>โทรศัพท์</th>
            <th>วันเข้าพัก</th>
            <th>วันออก</th>
            <th>จำนวนวัน</th>
            <th>ค่าที่พัก</th>
            <th>สถานะ</th>
            <th>ตกลงการเข้าพัก</th>
        </tr>
</thead>
<tbody>
        <?php 
        $sql="SELECT * FROM books "
        ."LEFT JOIN rooms ON books.rmid = rooms.rmid " 
        ."LEFT JOIN roomtype ON rooms.rmtype = roomtype.rmtype "
        ." LEFT JOIN tb_member ON books.id = tb_member.id "
        ."WHERE books.bkin BETWEEN '$stdate' AND '$endate' AND books.bkstatus = 3 "
        ."ORDER BY books.bkin ASC, books.firsname ASC, books.rmid ASC";

        $result=$conn->query($sql);

        while($row= $result->fetch_array(MYSQLI_ASSOC)){
            $days = (int)date_diff(date_create($row['bkin']), date_create($row['bkout']))->format('%R%a');
            $sumprice=$days *(int)$row['rmprice'];
        ?>
    <tr>
        <td>
        <?php if($row['bkstatus']==1){ ?>
            <a href="javascript:bookstatus('<?php echo $row['rmid']; ?>','<?php echo $row['bkin']; ?>','0')">
            ยกเลิก
            </a>
            <?php } ?>
        </td>

        <td><?php echo $row['rmid'];?></td>
            <td><?php echo $row['tpname'];?></td>
            <td><?php echo $row['firsname'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td><?php echo date_format(date_create($row['bkin']), "d/m/Y");?></td>
            <td><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></td>
            <td align="right"><?php echo $days; ?></td>
            <td align="right"><?php echo  number_format( $sumprice,0);?></td> 
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
<br>
</div>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <?php } ?>
    
</body>
</html>





<script>
    var vurl ="books_pays.php?stdate=<?php echo $stdate; ?>&endate=<?php echo $endate; ?>";
    function bookstatus(v1,v2,v3){
        var v4= vurl+="&rmid="+v1+"&bkin="+v2+"&bkstatus="+v3;
        window.location.replace(v4);
    }
</script>


<?php include("footer.php")?>