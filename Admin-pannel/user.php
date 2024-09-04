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
    $sql = "SELECT * from `users`";

    $r = mysqli_query($conn, $sql);
    ?>
    <div class="container py-3 px-5">
      <h1 class="pb-4">Users</h1>
      <div class="row">
        <table class="table pt-3 mb-3" id="myTable">
          <thead class="thead table-dark ">
            <tr>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">State</th>
            </tr>
            </thead>
            <tbody>
            <?php
         
            foreach ($r as $v) {
              ?>
              <tr>
            <?php 
             
          
?>
                <td>
                     <?php echo  $v['uname']; ?>
                    </td>
                <td>
                     <?php echo  $v['email']; ?>
                    </td>
                    <td>
                  <?php echo  $v['state']; ?>

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