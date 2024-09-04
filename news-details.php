<!doctype html>
<html lang='en'>

<body>
    <section style="background-color: #f1f1f1;">
    <script>
                            function showLogErr()
                    {
                        window.scrollTo(0,0)
                        document.getElementById("logalert").style.display="block";
                    }
        </script>
        <?php
        $id = $_GET['id'];
        include "link.php";
        include 'navbar.php';
        include 'Admin-pannel/config.php';
        ?>
        <div class="alert alert-danger" id="logalert" role="alert" style="display: none;">
            You have to login  !
            </div>
        <?php
        $sql = "select * from `comment` where pid = $id";
        $r = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($r);
        $rows = $row;
        $likerow = "false";


        $sql = "SELECT * from `like` where p_id='$id'";
        $result = mysqli_query($conn, $sql);
        $totallike = mysqli_num_rows($result);

        if (isset($_SESSION['uname'])) {
            $user = $_SESSION['uid'];

            // logic of  like exist or not 
            $sql = "SELECT * from `like` where u_id='$user' && p_id='$id'";
            $result = mysqli_query($conn, $sql);
            $likerow = mysqli_num_rows($result);
        } else {
            $user = 0;
        }

        if (isset($_POST['submit'])) {
            if (isset($_SESSION['uname'])) {
                $uid = $_SESSION['uid'];
                $com =  $_POST['comment'];
                $sql = "INSERT INTO `comment` (`com`, `pid`, `u_id`) VALUES ('$com', '$id', '$uid')";
                mysqli_query($conn, $sql);
                echo '<div class="alert alert-success" role="alert">
         Comment Posted:
         </div>
         ';
            } else {
                echo '<script>showLogErr()</script>
            ';
            }
        }
        if (isset($_POST['submitreply'])) {
            if (isset($_SESSION['uname'])) {
                $uid = $_SESSION['uid'];
                $reply = $_POST['reply'];
                $commentid = $_POST['submitreply'];
                $sql = "INSERT INTO `reply` (`desc`, `c_id`, `u_id`) VALUES ('$reply', '$commentid', '$uid')";
                mysqli_query($conn, $sql);
                echo '<div class="alert alert-success" role="alert">
          Reply Posted:
          </div>
          ';
            } else {
                echo '<br><br><br><div class="alert alert-danger" role="alert">
          You have to login !!
          </div>
          ';
            }
        }
        $sql = "select * from `post` where id='$id'";
        $r = mysqli_query($conn, $sql);
        $array = mysqli_fetch_assoc($r);
        $catid = $array['category'];
        $sql1 = "select * from `category` where category_id='$catid'";
        $row = mysqli_query($conn, $sql1);
        $array1 = mysqli_fetch_assoc($row);
        $sql = "SELECT comment.id,comment.com,users.uname FROM comment   INNER JOIN users ON comment.u_id=users.id where pid='$id'";
        $comment = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($comment);
        ?>
        <div class='container py-5'>
            <div class='row'>
                <div class='col-md-8 animate'>
                    <div class="card mb-4" id="card">
                        <div class="card-body" style="padding:0.3rem">
                            <h2 class="card-title ">
                                <?php
                                echo $array['title'];
                                ?>
                            </h2>
                            <a class="badge bg-secondary text-decoration-none link-light mb-3" href="category.php?catid=3" style="color:#fff">
                                <?php
                                echo  $array1['name'];
                                ?>
                            </a>
                            <p> <b>Posted On </b> <?php echo $array['time'] ?></p>
                            <hr>
                            <img class="img-fluid card-img-top rounded" src="Admin-pannel/img/<?php echo  $array['img'] ?>" >
                            <p class="card-text"></p>
                            <p style="margin-bottom: 3rem; font-size: 20px; color: rgb(41, 41, 41); line-height: 1.6; font-family:Proxima Nova">
                                <?php echo $array['descrip'] ?>
                            </p>
                            <div class="cardfooter">
                                <div class="rating">
                                    <span class="ritems">
                                        <span class="licon">
                                            <?php

                                            // if numbers of row is 1 then it will show solid like icon 
                                            if ($likerow == 1) {
                                            ?>
                                                <i class="bx bxs-like" onclick=likes(<?php echo $user ?>,<?php echo $id ?>) id="like"></i>

                                            <?php
                                            } else {
                                            ?>
                                                <i class="bx bx-like" onclick=likes(<?php echo $user ?>,<?php echo $id ?>) id="like"></i>

                                            <?php
                                            }
                                            ?>
                                        </span>
                                        <span class="ltext" id="ltext"> <?php echo $totallike ?></span>
                                    </span>
                                    <span class="ritems">
                                        <span class="licon"><i class="bx bx-comment" id="com"></i></span>
                                        <span class="ltext">
                                            <?php echo $rows;
                                            ?>
                                        </span>
                                </div>
                                <div class="view">
                                    <span class="ritems" id="view">
                                        View Comments
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div id="commentbox">
                            <form action="news-details.php?id=<?php echo $id ?>" method="POST">
                                <?php
                                ?>
                                <h3> Leave your comment</h3>
                                <textarea name="comment" id="comment" cols="45" rows="5" required></textarea>
                                <br>
                                <button type="submit" name="submit" id="commentsubmit" class="btn" style="background-color: #333356; color:white;">Submit</button>
                        </div>
                        </form>
                    </div>
                    <div class="commentsection">
                        <?php
                        foreach ($comment as $value) {
                        ?>
                            <div class="d-flex" id="core">
                                <div class="flex-shrink-0">
                                    <img src="Image/usericon.png" alt="" width="">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mt-0"><?php
                                                        echo $value['uname'];
                                                        ?>
                                    </h5>
                                    <p><?php
                                        echo $value['com'];
                                        ?></p>
                                    <?php
                                    ?>
                                    <div id="replybtn<?php echo $value['id'] ?>">
                                        <button class="btn" name="reply" id="reply" onclick="fun(<?php echo $value['id'] ?>)">
                                            <span class="badge bg-primary"> Reply </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <?php
                            $sql = "SELECT reply.desc,reply.c_id,users.uname FROM reply   INNER JOIN users ON reply.u_id=users.id where c_id='$value[id]'";
                            $comment = mysqli_query($conn, $sql);
                            echo "<br>";
                            $rows = mysqli_num_rows($comment);
                            if ($rows > 0) {
                                foreach ($comment as $v) {
                            ?>
                                    <div class="d-flex" style="margin-left: 45px;">
                                        <div class="flex-shrink-0">
                                            <img src="Image/usericon.png" alt="" width="">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <i class='bx bx-reply' style="font-size: 32px;"></i>
                                            <h5 class="mt-0"><?php echo  $v['uname'] ?></h5>
                                            <p><?php
                                                echo $v['desc'];
                                                ?></p>
                                        </div>
                                    </div>
                                    <br>
                        <?php
                                }
                            }
                        }
                        ?>
                        <div id="rform" style="display: none;">
                            <form action='news-details.php?id=<?php echo $id ?>' method='post' class='replyform'>
                                <textarea name='reply' id='comment' cols='75' rows='5' style="width: 98%;" required></textarea>
                                <br>
                                <button type='submit' name='submitreply' id='submitr' class='btn btn-primary'>Submit</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <br>
                <?php
                include "sidebar1.php";
                ?>
                <script>
                    // like logic
                    function likes(userid, pid) {
                        if (userid == 0) {

                            showLogErr();
                            return false;


                        }


                        var likerecog;

           

                        var like = document.getElementById("like");
                        if (like.classList.contains("bx-like")) {
                            like.classList.remove("bx-like");
                            like.classList.add("bxs-like");
                            likerecog = "true";

                        } else {
                            like.classList.remove("bxs-like");
                            like.classList.add("bx-like");
                            likerecog = "false";

                        }
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {

                                document.getElementById("ltext").innerHTML = this.responseText;






                            }
                        }
                        xhttp.open("POST", "like.php?u_id=" + userid + "&pid=" + pid + "&like=" + likerecog, true);
                        xhttp.send();


                    }
                    //  end of like logic
                    c = "null";

                    function fun(id) {
                        a = c;
                        b = document.getElementById("replybtn" + id);
                        if (a != "null" && a != id) {
                            document.getElementById("rform").style.display = "none";
                        }
                        $("#rform").toggle('slow');
                        document.getElementById("rform").style.display = "flex";
                        b.appendChild(document.getElementById("rform"));
                        c = id;
                        document.getElementById('submitr').value = id;
                    }
                </script>

                <script>
                    $("#view").click(function() {
                        $(".commentsection").toggle('slow');

                    });
                    $("#com").click(function() {
                        $("#commentbox").toggle('slow');

                    });
                    $(document).scroll(function() {
                        var value = $(document).scrollTop();
                        if (value >= 415) {
                            $('#sidebar').css({
                                "position": "sticky",
                                "top": "-300px"
                            });
                        } else {
                            $('#sidebar').css({
                                "position": "relative",
                                "top": "0"
                            });
                        }
                    });
                </script>
    </section>
</body>

</html>