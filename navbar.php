<!doctype html>
<html lang="en">
<body>
  <?php session_start(); ?>
  <div class="space">
    <nav class="navbar navbar-expand-lg fixed-top py-0">
      <div class="container navcontainer" id="contain">
        <div class="nav-item" id="muser"></div>
        <img class="navbar-brand fs-2" src="logo.png" width="240px">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
          <ul class="navbar-nav fs-5">
            <li class="nav-item ">
              <a class="nav-link custom " aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link custom" href="about-us.php">About Us</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link custom" href="feedback.php">Feedback</a>
            </li>
            <li class="nav-item " id="login">
              <a class="nav-link custom" href="login.php">Login</a>
            </li>
          
          </ul>
        </div>
        <div class="nav-item" id="user">
          <a class="nav-link custom" href="login.php" id="ulink">
            <div class="ucontent">
            <i class="bx bx-user-circle" id="uicon"></i>
            <span id="uname"></span>
            <i  class="bx bx-log-out" id="logout"></i>
            </div>
          </a>
        </div>
      </div>
    </nav>
  </div>
  <?php
if(isset($_SESSION['uname'])){
  $uname=$_SESSION['uname'];
  
?>
<script>
  document.getElementById("login").style.display="none";
  document.getElementById("user").style.display="block";
  document.getElementById("uname").innerText="<?php echo "$uname"; ?>";
  document.getElementById("logout").style.display="inline";
  document.getElementById("ulink").href="logout.php";
</script>
<?php
}
?>
</body>

</html>
<script>
  check=0;
  $(window).resize(function() {
      if ($(window).width() < 992) {  
        if(check==0){
          document.getElementById("muser").appendChild(document.getElementById("user"));
          check=1;
        }
      }
      else{
        if(check==1){
          document.getElementById("contain").appendChild(document.getElementById("user"));
          check=0;
        }
      }
  }).resize()
</script>