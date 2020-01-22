<?php include("head/user_header.php")?>


<?php 
require 'mysql/config.php';

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
<section class="site-hero overlay" style="background-image: url(img/blackground.jpg" data-stellar-background-ratio="0.5">
      <div class="container ">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
          <div class="container ">
          <h1 class="thaifont7">ใบเสร็จรับเงิน</h1>
    </section>

    <section class="section bg-light text-center"  >
<div class="container">
  <div class="row ">
 <h1 class="text-warning">ใบเสร็จรับเงิน</h1>
  <table class="table table-bordered">
  <thead>
  <tr>
      <td colspan="4"><img  src="img/SCB.jpg" class="img-thumbnail"  width="100" height="100">
          <br><span style="font-size:20px">ห้องพักเฮือนกิ่งกะหร่า</span><br>
      <div>เบอร์โทร : 0871815055</div>
      <div>Gmail : info-kingkara@gmail.com
    </td>
    </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
                                   
</div>
</div>
</section>




    
</body>
</html>





<script>
    var vurl ="userbooks_list.php?stdate=<?php echo $stdate; ?>&endate=<?php echo $endate; ?>";
    function bookstatus(v1,v2,v3){
        var v4= vurl+="&rmid="+v1+"&bkin="+v2+"&bkstatus="+v3;
        window.location.replace(v4);
    }
</script>


<?php include("footer.php")?>