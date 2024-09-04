<?php
include "link.php";
include "sidebar1.php";
include "config.php";


?>
<div class="content">
   <?php include "header1.php" ?>
   <section style="background-color:#f1f1f1;min-height:87vh">

      <div class="container py-3 px-5">
         <div class="d-flex flex-row justify-content-between">
               <h1 class="mb-4">Add Category</h1>
            <?php
            if (isset($_POST['submit'])) {
               $category = $_POST['category'];
               $sql = "INSERT INTO `category` (name) VALUES ('$category')";
               $r = mysqli_query($conn, $sql);
               if ($r) {
                  echo '
              <div class="alert alert-success w-50" role="alert">
              Category insert Succesfully ..
              </div>';
               }
            }
            ?>
         </div>
         <div class="row justify-content-center">
               <form name="addpost" method="post" action="Add-category.php">
                  <div class="form-group m-b-20">
                     <label for="exampleInputEmail1">Enter Category</label>
                     <input type="text" class="form-control my-3" id="category" name="category" placeholder="Enter Category" required>
                     <button type="submit" name="submit" class="btn btn" style="background-color:#333356;color:white;">Submit</button>
                  </div>
               </form>
         </div>
      </div>
</div>
</section>

<script>
   $('.sidebar-toggler').click(function() {
      $('.sidebar, .content').toggleClass("open");
      return false;
   });
</script>