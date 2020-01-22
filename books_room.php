
<?php  
    require 'mysql/config.php';
   $sql="SELECT * FROM books "
        ."LEFT JOIN rooms ON books.rmid = rooms.rmid " 
        ."LEFT JOIN roomtype ON rooms.rmtype = roomtype.rmtype "
        ." LEFT JOIN tb_member ON books.id = tb_member.id "
        ."WHERE books.bkin ='$bkin' AND books.phone = '$phone' AND books.bkstatus = '1' ";
        $result=$conn->query($sql);

?>
<?php 
require 'mysql/config.php';
require 'books_config.php';
$stdate=(isset($_GET['stdate']))?$_GET['stdate']:date("Y-m-d");
$endate=(isset($_GET['endate']))?$_GET['endate']:date("Y-m-d");

    if(isset($_GET['rmid'])){
        $rmid=$_GET['rmid'];
        $bkin=$_GET['bkin'];
        $bkstatus=$_GET['bkstatus'];
        require 'books_status.php';
    }


?>

<table border="1" cellspacing="0" cellpadding="2">
    <thead>
        <tr>
            <th>ยกเลิก</th>
            <th>ชื่อผู้จอง</th>
            <th>เลขสมาชิก</th>
            <th>ประเภทห้องพัก</th>
            <th>เข้าพัก</th>
            <th>ออก</th>
            <th>ราคา</th>
            <th>สถานะ</th>
</tr>
</thead>
<tbody>
    <?php 
  
        $sql="SELECT * FROM books "
        ."LEFT JOIN rooms ON books.rmid = rooms.rmid " 
        ."LEFT JOIN roomtype ON rooms.rmtype = roomtype.rmtype "
        ." LEFT JOIN tb_member ON books.id = tb_member.id "
        ."WHERE books.bkin BETWEEN '$stdate' AND '$endate' AND books.bkstatus > 0  AND tb_member.id "
        ."ORDER BY books.bkin ASC, books.firsname ASC, books.rmid ASC";
        
        

        $result=$conn->query($sql);
        while($row= $result->fetch_array(MYSQLI_ASSOC)){
            $days = (int)date_diff(date_create($row['bkin']), date_create($row['bkout']))->format('%R%a');
            $sumprice=$days *(int)$row['rmprice'];
        ?>
        <tr>
        
            <td>
                <a href="javascript:bookcancel('<?php echo $row['rmid'];?>');">ยกเลิก</a>
                <a href="javascript:bookstatus('<?php echo $row['rmid'];?>','<?php echo $row['bkin']; ?>','2')">
            เข้าพัก
            </a>
            </td>

            <td><?php echo $row['id']; ?></td>
                 
</tr>

        <?php } ?>

        
</tbody>
</table>


<script>
function bookcancel(v1){
    window.location.href="userbooks_form.php?bkin=<?php echo $bkin;?>&bkout=<?php echo $bkout;?>&firsname=<?php echo $bkcust;?>&rmid=" + v1;
}
</script>