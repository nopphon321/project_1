<?php 
    require 'mysql/config.php';
    $bank_id = $_POST['bank_id'];
    $bank_name =$_POST ['bank_name'];
    $books_id = $_POST['books_id'];
    $sql = "INSERT INTO bank (bank_id, bank_name, books_id) 
    VALUE ('$bank_id', '$bank_name', '$books_id' ) ";
    $query = mysqli_query($conn,$sql);
    if($query)
    {
        echo "<script language=\"JavaScript\">";
            echo "alert('อัพเดทเสร็จสิ้น');";
            echo "location='bank.php' ";
            echo "</script>";
    }else
    {
        printf("Error: %s\n", $conn->error);
        exit();
    }
    
?>