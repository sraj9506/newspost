<?php include "link.php";
include "sidebar1.php";
include "config.php";
ob_start();
?>
<div class="content">
    <?php include "header1.php"; ?>
    <section style="background-color:#f1f1f1;min-height:87vh">
        <div class="container py-3 px-5">
            <div class="d-flex flex-row justify-content-between">
                <h1 class="mb-4">Add Post</h1>
                <?php
                $sql = "select * from `category`";
                $r = mysqli_query($conn, $sql);
                if (isset($_POST['submit'])) {
                    $title = $_POST['posttitle'];
                    $des = trim($_POST['des']);
                    $category = $_POST['category'];
                    $filename = $pid . "." . pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);

                    //store image 

                    $target_path = "img/{$filename}";
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_path);

                    $sql = "INSERT INTO `post` (title,descrip,category,img) VALUES ('$title','$des',$category,'$filename')";
                    $r = mysqli_query($conn, $sql);
                    $sql1 = "select * from category";
                    $result = mysqli_query($conn, $sql1);
                    echo mysqli_error($conn);

                    foreach ($result as $v) {
                        if ($category == $v['category_id']) {
                            $sql = "UPDATE category SET post = post + 1 WHERE category_id = {$category}";
                            mysqli_query($conn, $sql);
                        }
                    }
                    if ($r) {
                        echo '<div class="alert alert-success w-50" role="alert">
        Record insert Succesfully ..
        </div>';
                        header("location:Addpost.php");
                    }
                }
                ?>
            </div>
            <div class="row  justify-content-center">
                <form name="addpost" method="post" enctype="multipart/form-data" action="Addpost.php">
                    <div class="form-group m-b-20">
                        <label for="exampleInputEmail1">Post Title</label>
                        <input type="text" class="form-control mt-2 mb-3 " id="posttitle" name="posttitle" placeholder="Enter title" required="">
                    </div>
                    <div class="form-group m-b-20">
                        <label for="exampleInputEmail1">Category</label>
                        <select class="form-control mt-2 mb-3" name="category" id="category" onchange="getSubCat(this.value);" required="">
                            <option value="">Select Category </option>
                            <?php
                            foreach ($r as $v) {
                                echo "<option value=$v[category_id] > $v[name] </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group m-b-20">
                        <label for="exampleInputEmail1">Post Title</label>
                        <textarea class="form-control mt-2 mb-3" name="des" rows="7" required></textarea>
                    </div>
                    <div class="form-group m-b-20">
                        <label for="exampleInputEmail1">Feature Image</label>
                        <input type="file" class="form-control mt-2 mb-3" id="postimage" name="img" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save and Post</button>
                    <button type="reset" class="btn btn-danger waves-effect waves-light">Discard</button>
                </form>
            </div>
        </div>
    </section>
</div>
<?php
ob_flush();
?>
<script>
    $('.sidebar-toggler').click(function() {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });
</script>