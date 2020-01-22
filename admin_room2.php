<?php
date_default_timezone_set("Asia/Bangkok");
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "data";

$conn=new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_errno){
    echo "Fail to connect MySQLI:(".$conn->connect_errno.")".$conn->connect_error;
}

$conn->set_charset("utf8");

$sql = "SELECT * FROM rooms";
$result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
$data;

foreach ($result as $row) {
    $data[] = $row;
}

echo json_encode($data);