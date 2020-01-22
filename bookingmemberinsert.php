
<?php

require 'mysql/config.php';


  $prefix = $_POST['prefix_id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $rmid = $_POST['rmid'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $bkin = $_POST['bkin'];
  $password = $_POST['password'];
  $username = $_POST['username'];
  $bkout = $_POST['bkout'];
  $bkdate = $_POST['bkdate'];
  $sumprice = $_POST['sumprice'];
  $address = $_POST['address'];
  $nowdate=date("Y-m-d"); 
  $i=1;

        $query = "INSERT INTO member (prefix_id, firstname, lastname, username, password, phone, email, address ,  userlevel) 
        VALUE ('$prefix', '$firstname', '$lastname', '$username', '$password', '$phone', '$email', '$address' ,  'm' ) ";
        $member_id =mysqli_query($conn, $query) or die(mysqli_error($conn));
        if($member_id){
          $member_id=mysqli_insert_id($conn); 
          $query2 = "INSERT INTO reservation (member_id, bkdate, sumprice, sumdays, status) 
          VALUE ('$member_id', '$nowdate', '0', '0', '1' ) ";
          $reservation_id =mysqli_query($conn, $query2) or die(mysqli_error($conn));
          $reservation_id=mysqli_insert_id($conn);
         
          $v1=1;
       }else{  
         echo "บันทึกข้อมูลไม่ได้ครับ";    
       } $query3 = "INSERT INTO reservation_detail (reservation_id , rmid, bkin, bkout, price) 
       VALUE ('$reservation_id', '$rmid', '$bkin', '$bkout', '$sumprice' ) ";
       $re_id =mysqli_query($conn, $query3) or die(mysqli_error($conn));

       ?>

   

    


        <script>
    var v1=<?php echo $v1;?>;
    var vurl="admin_booking.php?reservation_id=<?php echo $reservation_id;?>";
    vurl+="&i=<?php echo $i;?>";
    vurl+="&m_id=<?php echo $member_id;?>";

    window.location.replace(vurl);
</script>


    
