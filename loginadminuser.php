<?php 
session_start();
        if(isset($_POST['username'])){
				//connection
                                require 'mysql/config.php';
				//รับค่า user & password
                  $username = $_POST['username'];
                  $password = $_POST['password'];
				//query 
                  $sql="SELECT * FROM member Where username='".$username."' and password='".$password."' ";

                  $result = mysqli_query($conn,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["member_id"] = $row["member_id"];
                      $_SESSION["User"] = $row["firstname"]." ".$row["lastname"];
                      $_SESSION["userlevel"] = $row["userlevel"];

                      if($_SESSION["userlevel"]=="a"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                        Header("Location: adminbooking.php");

                      }

                      if ($_SESSION["userlevel"]=="m"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

                        Header("Location: home.php");

                      }

                  }else{

                        echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
                  }

        }else{


             Header("Location: form.php"); //user & password incorrect back to login again

        }
?>