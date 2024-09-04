<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <style>
#btn{
     color: white;
     background-color: #333356;
}
</style>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/login.css">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

    <?php
    $incorrectpwd = "false";
    if(isset($_POST['login']))
    {

    



        $username = $_POST['name'];
        $pwd=$_POST['pwd'];
        $password = md5($pwd);
      
             
       include "config.php";
        $sql = "select * from `admin` where username='$username' AND password='$password'";
        $result=mysqli_query($conn,$sql);
        $rows=mysqli_num_rows($result);
        foreach($result as $v)
        {
            $userid=$v['id'];
            
        }
    if($rows==1)
    {
        session_start();
        $_SESSION['name']=$username;
        $_SESSION['id']=$userid;
    
?>
<script>
    alert(<?php echo $_SESSION['id'] ?>)
</script>
<?php
        
        header("location:dashboard.php");

    }
    else{
        $incorrectpwd = "true";
       

       

    }

        
        


    }



?>

<body>
 
  <main>
  
<!------ Include the above in your HEAD tag ---------->

<div class="sidenav" style="background-color: #333356;">
         <div class="login-main-text">
            <h1>News Post <br> Admin Login Page</h1>
            <h4>Login  from  here.</h4>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 ">
         <?php
        if($incorrectpwd == "true")
        {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Incorrect Password </strong> 
       
      </div>';

        }
      ?>
            <div class="login-form">
               <form action="index.php" method="post">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" name="name" class="form-control" placeholder="Enter username">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="pwd"class="form-control" placeholder="Password">
                  </div>
                
                        <br>
                  <button type="submit" name="login" class="btn btn" id="btn">Login</button>
                
               </form>
            </div>
         </div>
      </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
</body>

</html>