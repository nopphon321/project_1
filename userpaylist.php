<!DOCTYPE html>
<html lang="en">
<div id="print">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400|Playfair+Display:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Charmonman&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Patua+One&display=swap" rel="stylesheet">
    


    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <section class="section bg-light text-center"  >
<div class="container text-center">
  <div class="row ">
 <h1 class="text-warning">ใบเสร็จรับเงิน</h1>
  <table class="table table-bordered">
  <thead id="print">
  <tr>
      <td colspan="4" class="text-center"><img  src="img/SCB.jpg" class="img-thumbnail"  width="100" height="100">
          <br><span style="font-size:20px">ห้องพักเฮือนกิ่งกะหร่า</span><br>
      <div>ต.เปียงหลวง อ.เวียงแหง จ.เชียงใหม่ 50350</div>
      <div>หมายเลขประจำตัวผู้เสียภาษี :<?php echo $tax_id;?> </div>
      <h2 class="text-warning bg-success">ใบเสร็จรับเงิน</h2>
    </td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="2" class="text-left">
      <div>รายละเอียดการเช่า (Booking Information):</div>
      <div>ผู้เช่า (Customer) :<span style="font-size:15px"><?php echo $firsname;?><?php echo $lastname;?> <span></div>
      <div>ประเภทห้องพัก(Room Type):<span style="font-size:15px"> <?php echo $tpname;?></span></div>
      <div>หมายเลขห้อง (Unit): <span style="font-size:15px"><?php echo $rmid;?></span></div>
      </td>
      <td colspan="2" class="text-right">
      <div>รายละเอียดใบเสร็จรับเงิน (Receipt Information):</div>
      <div>วันที่ออกใบเสร็จรับเงิน (Receipt Issue Date) :<span style="font-size:15px"> <?php echo $bkdate;?></span></div>
      <div>วันที่ออกชำระเงิน(Payment Date) :<span style="font-size:15px"> <?php echo $bkdate;?></span></div>
      </td>
    </tr>
    <tr>
      <th colspan="4" class="thead-light">รายละเอียด</th>  
    </tr>
    <tr class="text-center">
      <td>รายการ<br>Free Item</td>
      <td>ราคาต่อหน่วย(บาท)<br>Price (Baht)</td>
      <td>จำนวนหน่วย<br>Quantity</td>
      <td>จำนวนเงิน(บาท)<br>Totals(Baht)
    </tr>
    <tr class="text-center">
      <td>ค่าเช่า (Rental)</td>
      <td><?php echo $priceroom;?></td>
      <td><?php echo $days ;?></td>
      <td><?php echo $price ;?></td>
    </tr>
    <tr class="text-center">
    <td colspan="2"></td>
    <td>รวมทั้งหมด (Total)</td>
    <td><?php echo $price ;?></td>
    </tr>
  
  </tbody>
</table>                        
</div>
</div>
</section>




</div>
<div class="container">
<a class="btn btn-sm btn-outline-secondary text-center" href="userbooks_range.php">หน้าแรก</a>
<a class="btn btn-sm btn-outline-secondary text-right" onClick="PrintDiv();">พิมพ์หน้านี้</a>

</div>
    
</body>
</html>
<script>
function PrintDiv() {
        var divToPrint = document.getElementById('print'); // เลือก div id ที่เราต้องการพิมพ์
	var html =  '<html>'+ // 
				'<head>'+
					'<link href="css/print.css" rel="stylesheet" type="text/css">'+
				'</head>'+
					'<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>'+
				'</html>';
				
	var popupWin = window.open();
	popupWin.document.open();
	popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
	popupWin.document.close();	
}
</script>