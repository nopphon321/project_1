<?php
    $sql="UPDATE reservation SET status='0' WHERE reservation_id='$id'  ";
    
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