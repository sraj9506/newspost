<?php
 include "Admin-pannel/config.php";
 $userid = $_REQUEST['u_id'];

 $pid = $_REQUEST['pid'];
       ///echo $userid;
    $likerecog = $_REQUEST['like'];
    if($likerecog=="true")
    {
        
      $sql = "INSERT INTO `like` (`u_id`,`p_id`) VALUES('$userid','$pid')";
      mysqli_query($conn,$sql);
      
      $sql1 = "SELECT  * FROM  `like` where p_id = '$pid' ";
      $result=mysqli_query($conn,$sql1);
    
      
      $row = mysqli_num_rows($result);
      $sql = "UPDATE post SET p_like = p_like + 1 WHERE id = {$pid}";
      mysqli_query($conn,$sql);
      // echo mysqli_errno($conn);
      
      echo $row;
      
    }
    else
    {
      $sql = "DELETE FROM `like` where u_id = '$userid'";
      mysqli_query($conn,$sql);
      
      $sql1 = "SELECT  * FROM  `like` where p_id = '$pid' ";
      $sql = "UPDATE post SET p_like = p_like - 1 WHERE id = {$pid}";
      mysqli_query($conn,$sql);
  
      $result=mysqli_query($conn,$sql1);
    $row = mysqli_num_rows($result);
      echo $row;

    }
   






       


?>