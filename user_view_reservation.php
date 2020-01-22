<?php include("head/user_headerlogin.php") ; ?>
<?php session_start();
    require 'mysql/config.php';
    if (!$_SESSION['member_id']) {
            header("Location: index.php");
    } else {
      $member_id=$_SESSION['member_id'];
      $sql="SELECT * FROM member LEFT JOIN prefix ON member.prefix_id=prefix.prefix_id WHERE member.member_id='$member_id'";
      $result = $conn->query($sql);
      while($row = $result->fetch_array(MYSQLI_ASSOC)){
     
?>
      


<?php 
error_reporting(0);
require 'mysql/config.php';
    ?>


<nav class="navbar  navbar-expand-lg navbar-dark fixed-top bg-dark " id="mainNav">
        <div class="container ">
          <a class="navbar-brand js-scroll-trigger font-weight-bold  family" href="home.php"><img src="icon/navicon.png" width="40" height="40" alt="">เฮือนกิ่งกะหร่า</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
   Menu
          <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse  " style="font-size:13px;" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto ">
                    <li class="nav-item ">
                    <div class="navbar-brand js-scroll-trigger  "> </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="memberedit.php">แก้ไขข้อมูลส่วนตัว</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="books_list.php">แจ้งชำระเงิน</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="logout.php">ออกจากระบบ</a>
                </li>
              
                </ul>
        </div>
    </div>
</nav>

<?php $nowdate=date("Y-m-d"); ?>


<section class="section mt-2  " style="background-color:#ffe680" id="booking" >
  <div class="container ">
  <h1 class="family">ประวัติการจองห้องพัก</h1>
    <div class="row">
      <div class="block-32">
          <div class="row">
            <div class="col-md-6 mb-3 mb-lg-0 col-lg-12">
            
            <style>
  .select,
  #locale {
    width: 100%;
  }
  .like {
    margin-right: 10px;
  }
</style>   
<div class="table-responsive">  
<table class="table "
>
  <thead class="text-center">
    <tr>
      <th>รายการ</th>
      <th>วันที่จอง</th>
      <th>ราคา</th>
      <th>จำนวนคืน</th>
      <th>รายละเอียด</th>
    </tr>
  </thead>
  <tbody class="text-center">
  <?php 
  $list = 0;
        $sql="SELECT * FROM reservation INNER JOIN member ON reservation.member_id = member.member_id
       
         WHERE reservation.member_id = $member_id ";

        $result=$conn->query($sql);

        while($row= $result->fetch_array(MYSQLI_ASSOC)){
          $reservation_id = $row['reservation_id'];
          $list++;
        ?>
    <tr>
<td><?php echo $list ;?></td>
    <td><?php   echo date_format(date_create($row['bkdate']), "d/m/Y"); ?></td>
    <td><?php echo number_format( $row['sumprice'],2); ?></td>
    <td><?php echo $row['sumdays']; ?></td>


    <td>
    <?php 

    $sql2 = "SELECT * FROM  reservation_detail INNER JOIN rooms ON reservation_detail.rmid = rooms.rmid INNER JOIN roomtype ON rooms.rmtype = roomtype.rmtype
    WHERE reservation_detail.reservation_id = $reservation_id";
   
  $result2 = $conn->query($sql2);
   while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
    ?>
    
    หมายเลขห้อง --<?php echo $row2['rmid']; ?>--ประเภท-- 
     <?php echo $row2['tpname']; ?><br>
   <?php }?>
    </td>
    </tr>

        <?php  }if($list=='0'){ ?>
          <tr>
            <td colspan="5" ><h2 class="family m-2 text-danger">ไม่มีรายการจอง</h2></td>
          </tr>
        <?php }?>
    </tbody>
</table>
</div>

    </div>
  </div>
</section>


<?php include("footer.php") ; ?>


                        <?php } ?><?php } ?>