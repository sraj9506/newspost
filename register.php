<html lang='en'>

<head>
<style>
    .row {
      background-color: white;
      padding: 20px;
    }
  
  </style>

  <script src="Admin-pannel/js/city.js"></script>
<!-- validation plugin  -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="reg.js"></script>
</head>
<?php
include 'link.php';
include 'Admin-pannel/config.php';
include 'navbar.php';

?>

  <body style="background-color: #f1f1f1;">
    
     
    
    
  <?php
  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $num = $_POST['num'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $cat = $_POST['category'];
    $pwd = $_POST['password'];
    $password = md5($pwd);
    $sql = "INSERT into `users`(uname,email,pwd,favcategory,number,state,city  ) values('$name','$email','$password','$cat','$num','$state','$city') ";
    $r = mysqli_query($conn, $sql);



    $error = mysqli_error($conn);
    if ($error) {
      echo '<div class="alert alert-danger" role="alert">
                Email already exist
           </div>';


    } else {
      echo '<div class=container>
            <div class="alert alert-success">
            Register successfully you can login now 
            </div>
            </div>';
    }
  }
  $sql = "select * from `category`";
  $r = mysqli_query($conn,$sql);


  ?>


<div class='container'>


<div class='row' style='margin-top: 4%;'>
  <br>
  <h1>
    Register
    <hr>
  </h1>
  <br>
  <br>
  <br>
  <div class="forms">
    <form id="form" action="register.php" method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email&nbsp;<span style="color: red;">*</span></label>
          <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Username&nbsp;<span style="color: red;">*</span></label>
          <input type="name" name="name" class="form-control" id="inputPassword4" placeholder="username" required>
        </div>
      </div>
      <div class="form-group">
        <label for="inputmobile">Mobile number&nbsp;<span style="color: red;">*</span></label>
        <input type="text" class="form-control" id="Number" name="num" placeholder="Enter Mobile Number" required>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputState">State&nbsp;<span style="color: red;">*</span></label>
          <select id="state" class="form-control" name="state" onchange="fun1()" required>

          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="city">City&nbsp;<span style="color: red;">*</span></label>
          <select id="city" name="city" class="form-control" required>

          </select>
        </div>

      </div>
      <div class="form-group">

        <label for="inputState">Select Favourite category&nbsp;<span style="color: red;">*</span></label>
        <select id="inputState" name="category" class="form-control" required>
          <?php
          foreach ($r as $v) {
              ?>


<option value="<?php echo $v['category_id'] ?>"> <?php echo $v['name'] ?></option>
<?php }
          ?>
        </select>
    </div>
    
    <div class="form-group">
        
        <label for="inputState">Password&nbsp;<span style="color: red;">*</span></label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>

      </div>
    
    <div class="form-group">
        
        <label for="inputState">Confirm Password&nbsp;<span style="color: red;">*</span></label>
        <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" required>

      </div>



      <br>
      <button type="submit" name="submit" id="submit" class="btn btn" style="background-color: #333356; color:white;">Submit</button>
      <br>
      <br>

      
      
      
    </form>
</div>
</div>
</div>

</body>
<?php
include "footer.php";

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
    var x = document.getElementById("state");
    var option = document.createElement("option");
option.text = "Select state";
x.add(option);

var y = document.getElementById("city");

var optioncity = document.createElement("option");
optioncity.text = "Select city";
y.add(optioncity);



fun();


function fun() {
  console.log("this is fun");

  for (let index = 0; index < state_arr.length; index++) {
    var options = document.createElement("option");
    console.log("this is looop")
    options.text = state_arr[index];
    x.add(options);


  }
}

function fun1() {
  y.length = 0;
  let state = x.selectedIndex;

  console.log(state);
  let cities = (s_a[state]);
  let city = cities.split("|");
  for (let index = 0; index < city.length; index++) {
    var optioncity = document.createElement("option");
    optioncity.text = city[index];
    y.add(optioncity);
  }
}
</script>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
  <script src="Admin-pannel/js/rating.js"></script>


</html>

  