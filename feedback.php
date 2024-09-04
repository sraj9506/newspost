<html lang='en'>

<head>
<style>
    .row {
      background-color: white;
      padding: 20px;
    }
    #input
    {
       /* padding: 22px; */
       margin-left: 14px;         
    }
    .img
    {
        padding: 10px;
   
    }
  </style>
</head>
<?php
include 'link.php';
include 'Admin-pannel/config.php';
include 'navbar.php';

?>

  <body style="background-color: #f1f1f1;">
    
     
    <?php  
        

          if(isset($_POST['submit']))  
          {
            if(isset($_SESSION['uname']))
            {
               $star = $_POST['submit'];
               $feedback = $_POST['feedback'];
               $uid = $_SESSION['uid'];
               $sql ="INSERT INTO `feedback` (`feedback`,`star`,`u_id`) values ('$feedback','$star','$uid')";
             $r =  mysqli_query($conn,$sql);
              $error = mysqli_error($conn);
              if(!$error)
              {
                echo '                 <div class="alert alert-success" role="alert">
               Thank you for submiting Feedback your Feedback matter for us.
             </div>';

           
              }
            }
            else
            {
                   ?>
                    <div class="alert alert-danger" role="alert">
   You Have To Login 
</div>

                   <?php
       header("refresh: 1");

            }

          }
    

        ?>
    
      <div class="container">

  

      <div class='row' style='margin-top: 4%;'>
        <br>
  <h1 style="color: #333356;">
    Feedback
    <hr>
  </h1>
  <br>
  <br>
  <br>
  <div class="forms">
    <form id="form" action="feedback.php" method="post">
      <div class="inputs">

        <label for="rating">
          <span style="font-size: x-large;">
            
            Rate our Site out of 5 Star
          </span>   
        </label>
        <div id="rating">
    <?php    
    $i = 0;
?>
        <img src="image/selectedStar.svg" style="width: 100px;" class="img" id=0 data-position="2" onmouseover=rating(<?php echo $i ?>) >
        <?php
          for ($i=1; $i < 5; $i++) { 
            # code...
            ?>

            <img src="image/unselectedStar.svg" class="img" style="width: 100px;" data-position="" id=<?php echo $i ?> onmouseover="rating(<?php echo $i ?>)" onclick ="rating(<?php echo $i ?>)" >
         <?php }

        ?>
        <br>
        <br>
        
<div class="mb-3">
  <label for="" class="form-label">
  <span style="font-size: x-large;">
            Write Your Feedback :
          </span> 
  </label>
  <textarea class="form-control" name="feedback" id="" rows="7" col="2"></textarea>
</div>
<button type="submit" onclick="check()" name="submit" id="submit" class="btn btn-primary">Submit</button>
  
</div>
      </div>
</form>
</div>
</div>
      </div>

</body>
<?php
include "footer.php";

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
  <script src="Admin-pannel/js/rating.js"></script>


</html>

  