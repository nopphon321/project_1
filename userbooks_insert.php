
<!DOCTYPE html>
<?php 
require 'mysql/config.php';
$bkin=$_POST['bkin'];
$bkout=$_POST['bkout'];
$firsname=$_POST['firsname'];
$id=$_POST['id'];
    if(isset($_POST['rmid'])){
        $rmid=$_POST['rmid'];  
        $sql="SELECT COUNT(rmid) AS countid FROM books "
        . "WHERE rmid = '$rmid' AND bkstatus > 0 "
        . "AND ((bkin >= '$bkin' AND bkin <'$bkout') "
        . "OR (bkin < '$bkin' AND bkout > '$bkin'))";
    $result=$conn->query($sql);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $countid=(int)$row['countid'];
        if($countid<1){
            $sql="INSERT INTO books(bkdate, rmid, bkin, bkout, firsname,  id, bkstatus)" 
            . "VALUES (NOW(), '$rmid', '$bkin', '$bkout', '$firsname', '$id', '1')";
        $result=$conn->query($sql);
        $bkid=$result['bkid'];
        $v1=($result==1)?1:0;
        }else{
            $v1=0;
        }
    }else{
        $v1=0;
    }
    $sql="SELECT LAST_INSERT_ID()";
$result=$conn->query($sql);
$bkid=$result['LAST_INSERT_ID()'];
echo  $bkid;
exit();
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<script>
    var v1=<?php echo $v1;?>;
    var vurl="userbooks_list.php?bkin=<?php echo ;?>";
    vurl+="&bkout=<?php echo $bkout;?>";
    vurl+="&firsname=<?php echo $firsname;?>";
    if(v1==1){
        alert("กำดำเนินการเสร็จสิ้น");
    }else{
        alert("กำดำเนินการผิดพลาด");
    }
    window.location.replace(vurl);
</script>
</body>
</html>




