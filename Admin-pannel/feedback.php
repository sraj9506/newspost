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
    $sql = "SELECT feedback.feedback,feedback.star,users.uname FROM feedback INNER JOIN users ON feedback.u_id=users.id";
    $r = mysqli_query($conn, $sql);
    ?>
    <div class="container py-3 px-5">
    <h1 class="pb-4">Feedback</h1>
      <div class="row">
        <table class="table pt-3 mb-3" id="myTable">
          <thead class="thead table-dark ">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Feedback</th>
              <th scope="col">Stars</th>
            </tr>
            </thead>
            <tbody>
            <?php
           
            foreach ($r as $v) {
              ?>
             <tr>
                <td>
                    <?php echo  $v['uname']?>
                </td>
                <td>
                    <?php echo  $v['feedback']?>
                </td>
                <td>
                    <?php 

       $num = (int)$v['star'];
                for ($i=0; $i < 5; $i++) { 
                    if($i<$num)
                    {
                     ?>
                     <img src="img/selectedStar.svg" alt="" srcset="">
                     <?php
                    }
                    else
                    {
                        ?>
                        <img src="img/unselectedStar.svg" alt="" srcset="">
<?php
                    }   
            }

                    
                    ?>
                    
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
