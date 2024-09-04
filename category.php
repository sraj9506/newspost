<?php
include "link.php";
include "navbar.php";
include "Admin-pannel/config.php";
?>
<!doctype html>
<html lang="en">
<body>
  <section class="py-5" style="background-color: #f1f1f1;">
    <?php
    $catid = $_GET['catid'];
    $sql = "SELECT post.id,post.title,post.img,post.time,category.name FROM post INNER JOIN category ON post.category=category.category_id where category= '$catid'";
    $r = mysqli_query($conn, $sql);
    $row=mysqli_num_rows($r);
    ?>
    <div class='container'>
      <div class='row'>
        <?php
        echo "<div class='col-md-8'>";
        foreach ($r as $v) {
        ?>
          <div class='card mb-4 poster content' id="card">
            <img class='card-img-top' src="<?php echo $v['img'] ?>">
            <div class='card-body'>
              <h3 class='card-title mb-1'>
                <?php echo $v['title'];
                ?>
              </h3>
              <br>
              <div class="read">
                <button type="button" class="btn btn-primary" id="readmore" style="background-color: #333356;">
                  <a href='news-details.php?id=<?php echo $v['id'] ?>'>Read More </a>
                </button>
                <div class="mt-3">
                  <span> Posted On <?php echo $v['time']; ?> </span>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
        <div id="pagination"></div>
      </div>
      <?php
      include "sidebar1.php";
      ?>
  </section>
</body>
</html>
<script>
  $(document).scroll(function() {
    var value = $(document).scrollTop();
    if (value >= 415) {
      $('#sidebar').css({
        "position": "sticky",
        "top": "-300px"
      });
    }
    else{
      $('#sidebar').css({
        "position": "relative",
        "top": "0"
      });
    }
  });
  function fun() {
    a = document.getElementsByClassName("active");
    if (a.length > 1) {
      if (a[0].innerText == "Prev") {
        a[0].classList.remove("active");
      } else {
        a[1].classList.remove("active");
      }
    }
  }
  $(document).ready(function() {
    fun();
  });
  $(".col-md-8 .content").slice(5).hide();
  $('#pagination').pagination({
    items: "<?php echo "$row" ?>",
    itemsOnPage: 5,
    onPageClick: function(noofele) {
      $(".col-md-8 .content").hide()
        .slice(5 * (noofele - 1),
          5 + 5 * (noofele - 1)).show();
      fun();
    }
  });
</script>