<?php
if(isset($_POST['post'])){
    $post = $_POST['textpost'];
    $file = $_FILES['img'];
    if($file['name'] != ''){
        $fileN = $db->uploadfile2($file);
    }else{
        $fileN = "";
    }
    $list = [
        'post' => $post,
        'img_p' => $fileN,
        'id_user' => $userid
    ];
    $db->insert("post",$list);
        if($db->query){
            echo '<script type="text/javascript">sweetAlert("Successfully !","Completed Posting","success")</script>';
        }else{
            echo '<script type="text/javascript">sweetAlert("ERROR !","This username already used Please try again","error")</script>';
        }
}
if(isset($_POST['com'])){
    $comment = $_POST['comment'];
    $id = $_POST['id'];
    $list = [
        'comment' => $comment,
        'id_post' => $id,
        'id_user' => $userid
    ];
    $db->insert("comment",$list);
}
?>
<div class="container">
    <div class="" style = "height:30px;"></div>
    <div class="card border bordered mb-4" style = "border-radius:10px; width:1090px;">
        <div class="card-body">
            <div class="row justify-content-between">
                    <?php include_once('./component/post.php') ?>
                </div>
            </div>
        </div>
    </div>
        <?php
        $post = new db();
        $resultpost = $post->select("post,user","*","WHERE user.id_user = post.id_user");
        while($fetchpost = $resultpost->fetch_object()){
        ?>
            <div class="card border bordered mb-4" style = "border-radius:10px;">
                <div class = "row justify-content-between">
                    <div class="col-1">
                        <img src = "./../img/<?= $fetchpost->img_user ?>" style = "width:70px; height:70px; object-fit:cover;" class = "img-fluid rounded-circle m-2">
                    </div>
                    <div class="col-11 text-start">
                        <div class="mt-4">
                            <label for="" class = " fw-bold fs-6"><?= $fetchpost->fname_user ?>   <?= $fetchpost->lname_user ?></label><br>
                            <label for="" class = " text-muted"><?= $fetchpost->time ?></label>
                        </div>
                    </div>
                </div>
                <div class = "card-title ms-5"><?= $fetchpost->post ?></div>
                <?php if($fetchpost->img_p != ''){ ?>
                        <div class="card-body" style = "background-color:#f0f0f0;">
                            <div class="text-center">
                                <img src="./../img/<?= $fetchpost->img_p ?>" class="img-fluid">
                            </div>
                        </div>
                <?php } ?>
                <div class = "card-footer text-center fs-2">
                        <?php include('./component/comment.php') ?>
                </div>
            </div>
        <?php } ?>
</div>