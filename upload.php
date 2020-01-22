<?php 
if($_FILES["file1"]["error"] > 0){
    echo "Error: " .$_FILES["file1"]["error"]. "<br />";
}else{
    echo "Upload:" . $_FILES["file1"]["name"] . "<br />";//ชื่อไฟล์
    echo "Type:" . $_FILES["file1"]["type"]. "<br />"; //ประเภทไฟล์
    echo "Siza:" . ($_FILES["file1"]["size"]/1024). "kB<br />";
    echo "Stored in: ".$_FILES["file1"]["tmp_name"];

    $f_type=$_FILES["file1"]["type"];
    $fnam=time()."_".rand(1,9999);//เปลี่ยนไฟล์ใหม่เพื่อป้องกันการซ้ำของไฟล์
    
    if($f_type=="image/x-png"){ $webUB_fn="$fnam.png";}
    else if(($f_type=="image/pjpeg")||($f_type=="image/jpeg")){ $webUB_fn="fnam.jpg";}
    else if($f_type=="image/gif"){ $webUB_fn="$fnam.gif";}
    else { echo "<br /> สำหรับไฟล์ นามาสกุล .GIF , .PNG , .JPG เท่านั้น";}
  echo $webUB_fn;
        copy($_FILES["file1"]["tmp_name"],"./photo/".$webUB_fn);
    
}

?>