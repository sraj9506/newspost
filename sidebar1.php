<?php
$sql = "select * from `category`";
$rows = mysqli_query($conn, $sql);
?>
<body>
<div class="col-md-4" id="sidebar" style="height: 875px;">
  <!-- Search Widget -->
  <div class="card poster mb-4">
    <h5 class="card-header">
      Search
    </h5>
    <div class="card-body">
      <form action="index.php" method="get">
      <div class="input-group">
        <input type="text" name="search-criteria" class="form-control" placeholder="Search for..." required="">
        <span class="input-group-btn">
          <button class="btn btn-secondary" name="search" type="submit" style="background-color: #333356 ; color:white;">Go!</button>
        </span>
      </div>
      </form>
    </div>
  </div>
  <!-- Categories Widget -->
  <div class="card poster my-4" style="height: 225px;overflow:auto;">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            <?php
            foreach ($rows as $value) {
            ?>
              <li>
                <a style="text-decoration:none;" href="category.php?catid=<?php echo $value['category_id'] ?>" class="catname">
                  <h5>
                    <?php echo $value['name'] ?>
                  </h5>
                </a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Side Widget -->
  <div class="card poster my-4 " style="height: 480px;overflow:auto;">
    <h5 class="card-header" >Recommended Posts</h5>
    <div class="card-body">
      <ul class="mb-0">
        <?php
            if(!(isset($_SESSION['uname'])))
            {?>
              <li>
              <a style="text-decoration:none;" href="login.php" class="catname">You Have To Login To See Recommended Post For You! Click Here For Login</a>
              </li>
              <?php
            } 
           else
            {
                $ucat=$_SESSION['ucat'];
                $sql="select `title`,`id` from `post` where category='$ucat'";
                $r=mysqli_query($conn,$sql);
                foreach($r as $v){
              ?>
          <li><a style="text-decoration:none;" href="news-details.php?id=<?php echo $v['id'] ?>" class="catname"><?php echo $v['title'] ?></a></li>
          <?php } } ?>
      </ul>
    </div>
  </div>
</body>