<?php
$category_id = $_REQUEST['cat_id'];
$ide = $_REQUEST['ide'];
include "config.php";
echo $category_id;

if($ide == 1)
{
  
  
  $sql = "DELETE from `category` where `category_id` = $category_id ";
  mysqli_query($conn,$sql);
  // mysqli_error($conn);
  
  
  
}
else
{
  $cat = $_REQUEST['cat'];
  
  $pid = $_REQUEST['pid'];


      $sql = "UPDATE category SET post = post - 1 WHERE category_id = {$cat}";
   mysqli_query($conn,$sql);

  $sql = "DELETE from `post` where `id` = $pid ";
  mysqli_query($conn,$sql);
}  

