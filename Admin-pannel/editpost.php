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
                <h1 class="mb-4">Edit Post</h1>
                <?php
                $pid = $_GET['p_id'];

                //  THIS is Query for set value of form where pid match with which we choose post and it
                // will print all values in form
                $sql = "SELECT post.id,post.title,post.descrip,post.img,post.category,category.name  FROM post INNER JOIN category ON post.category=category.category_id  where post.id = '$pid' ";
                $r = mysqli_query($conn, $sql);
                $result = mysqli_fetch_assoc($r);


                // this query for choose category 
                $sql1 = "select * from category";
                $result1 = mysqli_query($conn, $sql1);


                // if submit button cliked then it will update the values
                if (isset($_POST['submit'])) {
                    $title = $_POST['posttitle'];
                    $des = trim($_POST['des']);
                    $category = $_POST['category'];
                    $filename = $pid . "." . pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);


                    //store image 

                    $target_path = "img/{$filename}";
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_path);

                    // Update query 
                    $sql = "UPDATE `post` SET `title`='{$title}',`descrip`='{$des}',`img`='{$filename}',`category`='{$category}' WHERE id ='$pid'";


                    $check =     mysqli_query($conn, $sql);
                    if ($check) {
                ?>
                        <div class="alert alert-success" id="success" role="alert">
                            Post Edit Successfully!

                        </div>
                <?php
                    }

                    //  this is logic of increasing number of post in category table when user edit the category
                    if ($result['category'] !=  $category) {
                        $sql = "UPDATE `category` SET post = post + 1 WHERE category_id = '$category' ";
                        mysqli_query($conn, $sql);
                    }
                    //  this query is for when you submit form than after it will print all the new values which you
                    //    modify or edit
                    $sql = "SELECT post.id,post.title,post.descrip,post.img,post.category,category.name  FROM post INNER JOIN category ON post.category=category.category_id  where post.id = '$pid' ";
                    $r = mysqli_query($conn, $sql);
                    $result = mysqli_fetch_assoc($r);
                }
                ?>
            </div>
            <div class="row  justify-content-center">
                <form name="addpost" method="post" enctype="multipart/form-data" action="editpost.php?p_id=<?php echo $pid ?>">
                    <div class="form-group m-b-20">
                        <label for="exampleInputEmail1">Post Title</label>
                        <input type="text" class="form-control mt-2 mb-3 " id="posttitle" name="posttitle" placeholder="Enter title" required value="<?php echo $result['title'] ?>">
                    </div>
                    <div class="form-group m-b-20">
                        <label for="exampleInputEmail1">Category</label>
                        <select class="form-control mt-2 mb-3" name="category" id="category">
                                        <?php
                                        foreach ($result1 as $v) {
                                            echo "<option value=$v[category_id] > $v[name] </option>";
                                        }
                                        ?>
                                    </select>
                    </div>
                    <div class="form-group m-b-20">
                        <label for="exampleInputEmail1">Post Title</label>
                        <textarea class="form-control mt-2 mb-3" name="des" rows="7" required><?php echo rtrim($result['descrip']) ?></textarea>
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
    $(document).ready(async function (){
        $('#category').val('<?php echo $result["category"] ?>');
        const fileInput=document.getElementById("postimage");
        const fileName='<?php echo $result['img'] ?>';
       const filePath='img/'+fileName;
       try{
            const response=await fetch(filePath);
            const blob=response.blob();
            const file=new File([blob],fileName,{type:blob.type});
            const dataTransfer=new DataTransfer();
            dataTransfer.items.add(file);
            fileInput.files=dataTransfer.files;
        }
        catch(e)
        {
            console.log("error:"+e);
        }
    });
    $('.sidebar-toggler').click(function() {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });
</script>
