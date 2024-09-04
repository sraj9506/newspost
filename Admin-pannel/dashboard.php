<?php include "link.php";
include "sidebar1.php";
include "config.php";





    // $adminname = $_SESSION['name'];
    $sql1 = "select * from `users`";
   $result1 = mysqli_query($conn,$sql1);

     $row1 = mysqli_num_rows($result1);
    
     $sql2 = "select * from `feedback`";
     $result2 = mysqli_query($conn,$sql2);
     $row22 = mysqli_num_rows($result2);
     $sql3 = "select * from `category`";
     $result3 = mysqli_query($conn,$sql3);
     $row2 = mysqli_num_rows($result3);
     $sql4 = "select * from `post`";
     $result4 = mysqli_query($conn,$sql4);
     $row3 = mysqli_num_rows($result4);
     $sql5 = "select * from `comment`";
     $result5 = mysqli_query($conn,$sql5);
     $row4 = mysqli_num_rows($result5);
     $sql6 = "select * from `like`";
     $result6 = mysqli_query($conn,$sql6);
     $row5 = mysqli_num_rows($result6);
  

    ?>



<?php



?>
<div class="content">
    <?php include "header1.php"; ?>
    <section style="background-color:#f1f1f1;min-height:87vh">
        <div class="container py-5 px-5">
            <div class="row row-cols-md-2 row-cols-1 row-cols-lg-3 g-4">
                <div class="col">
                    <div class="border bg-light p-4 rounded d-flex align-items-center justify-content-between chip">
                        <i class="fas fa-edit fa-3x" style="color: #333356;"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Posts </p>
                            <h6 class="mb-0"><?php echo $row3; ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                <div class="border bg-light p-4 rounded d-flex align-items-center justify-content-between chip">
                        <i class="fas fa-list-alt fa-3x" style="color: #333356;"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Categories </p>
                            <h6 class="mb-0"><?php  echo $row2?></h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                <div class="border bg-light p-4 rounded d-flex align-items-center justify-content-between chip">
                        <i class="fas fa-comment fa-3x" style="color: #333356;"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Comments </p>
                            <h6 class="mb-0"><?php echo $row4; ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                <div class="border bg-light p-4 rounded d-flex align-items-center justify-content-between chip">
                        <i class="fas fa-user fa-3x" style="color: #333356;"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Users </p>
                            <h6 class="mb-0"><?php echo $row1;?></h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                <div class="border bg-light p-4 rounded d-flex align-items-center justify-content-between chip">
                        <i class="fas fa-headset fa-3x" style="color: #333356;"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Feedbacks</p>
                            <h6 class="mb-0"><?php echo $row22; ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                <div class="border bg-light p-4 rounded d-flex align-items-center justify-content-between chip">
                        <i class="fas fa-thumbs-up fa-3x" style="color: #333356;"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Likes</p>
                            <h6 class="mb-0"><?php echo $row5; ?></h6>
                        </div>
                    </div>
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
</script>