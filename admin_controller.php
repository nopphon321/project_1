<!-- 
<?php

class User
{
    public $reservation_id ;
    public $stdate;
    public $enddate;

    
    public function delete()
    {
        include "mysql/config.php";

        $sql = "DELETE FROM reservation_detail WHERE  reservation_id = $this->reservation_id ";
        $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));
        if($result){
            $sql = "DELETE FROM reservation WHERE  reservation_id = $this->reservation_id ";
            $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));
        }

        
        
    }

    
}
?>