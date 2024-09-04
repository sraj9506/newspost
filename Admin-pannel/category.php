<?php
include "link.php";
include "sidebar1.php";
include "config.php";
?>
<div class="content">
   <?php include "header1.php" ?>
   <section style="background-color:#f1f1f1;min-height:87vh">
      <?php
      $sql = "SELECT category_id,name,post from category";
      $r = mysqli_query($conn, $sql);
      ?>
      <div class="container py-3 px-5">
         <h1>Categories</h1>
         
            <div class="d-flex flex-row justify-content-between">
               <button class="border-0 my-4">
                  <a href="Add-category.php" class="btn btn-light" role="button" style="background-color: #333356;color:white">Add Category</a>
               </button>
               <div class="alert alert-success w-25 my-4" role="alert" style="display: none;" id="row">
                  Deleted
               </div>
            </div>

         <div class="row justify-content-center">
            <div class="col-md-12">
               <table class="table table-striped align-middle">
                  <thead>
                     <tr class="table-dark">
                        <th scope="col">Category</th>
                        <th scope="col">Number Of Post </th>
                        <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php

                     $identify = 1;

                     foreach ($r as $v) {    ?>
                        <tr id='<?php echo $v['category_id'] ?>'>
                           <?php
                           $cat = $v['category_id'];


                           echo "<td>" . $v['name'];
                           echo "<td>" . $v['post'];

                           echo "<td>";
                           ?>

                           <i class="fa fa-trash" style="font-size:28px;color:red" ; onclick="del(<?php echo $identify ?>,<?php echo $cat ?>)"></i>

                        <?php
                        echo "</td>";
                        echo "</tr>";
                     }
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </section>
</div>
<script>
   $('.sidebar-toggler').click(function() {
      $('.sidebar, .content').toggleClass("open");
      return false;
   });


   function del(identify, cat_id) {


      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
            //alert(xhttp.responseText);
            document.getElementById("row").style.display = "block";
            // document.getElementById("row").innerHTML=xhttp.responseText;

            document.getElementById(cat_id).remove();


         }
      }
      xhttp.open("POST", "delete.php?ide=" + identify + "&cat_id=" + cat_id, true);
      xhttp.send();


   }
</script>