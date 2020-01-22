<?php 
    require 'mysql/config.php';
    $rmid = $_POST['rmid'];
    $rmtype =$_POST ['rmtype'];
    $tpname = $_POST['tpname'];
    $rmprice = $_POST['rmprice'];
    $sql = "INSERT INTO roomtype (rmtype, tpname) 
    VALUE ('$rmtype', '$tpname' ) ";
    $query = mysqli_query($conn,$sql);
    if($query)
    {
            $v1=1;
    }else
    {
        printf("Error: %s\n", $conn->error);
        exit();
    }
    
?>
<script>
var v1=<?php echo $v1;?>;
var vurl="roomsinsert2.php?rmid=<?php echo $rmid;?>";
vurl+="&rmtype=<?php echo $rmtype;?>";
vurl+="&rmprice=<?php echo $rmprice;?>";
if(v1==1){
alert("กำดำเนินการเสร็จสิ้น");
}else{
alert("กำดำเนินการผิดพลาด");
}
window.location.replace(vurl);
</script>
