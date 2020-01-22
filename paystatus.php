<?php
    $sql="UPDATE pay SET paystatus='$paystatus' WHERE rmid='$rmid' AND 	bkin='$bkin' AND paystatus='1'";

    $result=$conn->query($sql);
    if($result==1){
        $msg="การดำเนินการเสร็จสิ้น";
    }else{
        $msg="การดำเนินการผิดพลาด";
    }
?>
<script>
    alert('<?php echo $msg; ?>');
</script>