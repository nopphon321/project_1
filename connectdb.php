<?php
$dbcon = mysqli_connect('localhost','root','rootroot','ginggarha') ;


if (mysqli_connect_error()){
    echo "ไม่สามารถติดต่อฐานข้อมูล Mysql ได้".mysqli_connect_error();
    exit;
}
mysqli_set_charset($dbcon,'utf8');
?>