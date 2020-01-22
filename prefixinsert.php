<?php 
    require 'mysql/config.php';
    $prefix_id = $_POST['prefix_id'];
    $prefix_name =$_POST ['prefix_name'];

    $sql = "INSERT INTO prefix (prefix_id, prefix_name) 
    VALUE ('$prefix_id', '$prefix_name' ) ";
    $query = mysqli_query($conn,$sql);
    if($query)
    {
        echo "<script language=\"JavaScript\">";
            echo "alert('อัพเดทเสร็จสิ้น');";
            echo "location='prefix.php' ";
            echo "</script>";
    }else
    {
        printf("Error: %s\n", $conn->error);
        exit();
    }
    
?>