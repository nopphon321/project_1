
<?php

require 'mysql/config.php';


  $prefix = $_POST['prefix_id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $password = $_POST['password'];
  $username = $_POST['username'];
  $rmid = $_POST['rmid'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $bkin = $_POST['bkin'];
  $bkout = $_POST['bkout'];
  $bkdate = $_POST['bkdate'];
  $sumprice = $_POST['sumprice'];
  

        $query = "INSERT INTO member (prefix_id, firstname, lastname, password, username, phone, email, userlevel) 
        VALUE ('$prefix', '$firstname', '$lastname', '$password', '$username', '$phone', '$email',  'm' ) ";
        $last_insert =mysqli_query($conn, $query) or die(mysql_error());
        if($last_insert){
          $member_id=mysqli_insert_id($conn); 
          $v1=1;
       }else{  
         echo "บันทึกข้อมูลไม่ได้ครับ";    
       }
       ?>

        <script>
    var v1=<?php echo $v1;?>;
    var vurl="book_payinsert.php?bkin=<?php echo $bkin;?>";
    vurl+="&bkout=<?php echo $bkout;?>";
    vurl+="&bkdate=<?php echo $bkdate;?>";
    vurl+="&rmid=<?php echo $rmid;?>";
    vurl+="&sumprice=<?php echo $sumprice;?>";
    vurl+="&member_id=<?php echo $member_id;?>";
    if(v1==1){
     
    }else{
        alert("กำดำเนินการผิดพลาด");
    }
    window.location.replace(vurl);
</script>


    
