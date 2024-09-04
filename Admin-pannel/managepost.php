<?php include "link.php";
include "sidebar1.php";
include "config.php";
?>
<div class="content">
  <?php
  include "header1.php"
  ?>
  <section style="min-height: 87vh;background-color:#f1f1f1">
    <?php
    $sql = "SELECT post.id,post.title,post.category,category.name FROM post INNER JOIN category ON post.category=category.category_id";
    $r = mysqli_query($conn, $sql);
    ?>
    <div class="container py-4 px-5">
    <div class="d-flex flex-row justify-content-between">
              <h1 class="mb-4">Manage Posts</h1>
               <div class="alert alert-success w-25 mb-4" role="alert" style="display: none;" id="row">
                  Deleted
               </div>
            </div>
      <div class="row">
        <table class="table pt-3 mb-3" id="myTable">
          <br>
          <thead class="thead table-dark">
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $a = 1;
            foreach ($r as $v) {
              ?>
              <tr id="<?php echo $v['category'];?>">
            <?php 
             $categoryid = $v['category'];
             $pid = $v['id'];
?>
                <td>
                     <?php echo  $v['title']; ?>
                    </td>
                    <td>
                  <?php echo  $v['name']; ?>

                </td>
                <td>
                    <i class="fa fa-trash" style="font-size:28px;color:red" onclick="del(<?php echo $categoryid ?>,<?php echo $pid ?>)"></i>

                    </a>
                    <a href="editpost.php?p_id=<?php echo $v['id'] ?>">
                    <i class="fa fa-edit ms-1 primary" style="font-size:28px;"></i>

                    </a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
  </section>
  <script>
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
$('.sidebar-toggler').click(function() {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });
</script>
<script>

function del(categoryid,pid)
         {
             

             var xhttp = new XMLHttpRequest();
             xhttp.onreadystatechange = function (){
              if(this.readyState == 4 && this.status==200)
            {
               //alert(xhttp.responseText);
               document.getElementById("row").style.display="block";
               // document.getElementById("row").innerHTML=xhttp.responseText;
                
               document.getElementById(categoryid).remove();


            } 
          }
          xhttp.open("POST","delete.php?cat="+categoryid+"&pid="+pid,true);
          xhttp.send();

          
         }

</script>