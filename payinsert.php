

<?php 
require 'mysql/config.php';
$rmid = $_POST['rmid'];
$bkin = $_POST['bkin'];
$bkout = $_POST['bkout'];

$sql = "INSERT INTO pay(tpname, firsname, phone, rmid, bkin, bkout,  days, price ,image) VALUE ('$tpname', '$firsname', '$phone', '$rmid', '$bkin', '$bkout' ,'$days' , '$price' ,'$image' ) ";

if($conn->query($sql)==TRUE){
    
    echo "<script>";
    echo "alert('บันถึงการชำระเงินสำเร็จ');" ;
    echo "window.location.href='userbooks_list.php';";
    echo "</script>";
}else{
    echo "ERROR".sql."<br>".$conn->error;
}
    ?>





