<?php 

    session_start();

    if (!$_SESSION['userid']) {
            header("Location: index.php");
    } else {
?>


<?php include("head/user_header.php")?>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "rootroot";
	$dbName = "ginggarha";

  $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
  mysqli_set_charset($conn,'utf8');

	$sql = "SELECT * FROM tb_member WHERE  tb_member.id = '$_SESSION[userid]'"  ;

	$query = mysqli_query($conn,$sql);
?>
<section class="site-hero overlay" style="background-image: url(img/blackground.jpg" data-stellar-background-ratio="0.5">
      <div class="container ">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
          <div class="container bg-white">
          <br>

<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
<div class="row justify-content-center">
    <div class="col-4 text-right">ID</div><div class="col-4 text-left"><?php echo $result["id"];?></div>
    </div>
    <div class="row justify-content-center">
    <div class="col-4 text-right">ชื่อ</div><div class="col-4 text-left"><?php echo $result["firsname"];?></div>
    </div>
    <div class="row justify-content-center">
    <div class="col-4 text-right">นามสกุล</div><div class="col-4 text-left"><?php echo $result["lastname"];?></div>
    </div>
    <div class="row justify-content-center">
    <div class="col-4 text-right">Username</div><div class="col-4 text-left"><?php echo $result["username"];?></div>
    </div>
    <div class="row justify-content-center">
    <div class="col-4 text-right">Email</div><div class="col-4 text-left"><?php echo $result["email"];?></div>
    </div>
    <div class="row justify-content-center">
    <div class="col-4 text-right">เบอร์</div><div class="col-4 text-left"><?php echo $result["phone"];?></div>
    </div>
    <div class="row justify-content-center">
    <div class="col-4 text-right">ที่อยู่</div><div class="col-4 text-left"><?php echo $result["address"];?></div>
    </div>
    <div class="col align-self-center">
    <a href="memberedit.php?id=<?php echo $result["id"];?>">แก้ไข</a>
    </div>
<?php
}
?>

    
<?php
mysqli_close($conn);
?>
</div></div></div></div></section>
<?php include("footer.php")?>
<?php } ?>