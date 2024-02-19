<div class="container">
    <div class="" style = "height:30px;"></div>
    <div class="card border bordered mb-4" style = "border-radius:10px;">
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-1">
                    <img src="./../img/<?= $fetuser->img_user ?>" style = "width:80px; height:80px; object-fit:cover;" class = "rounded-circle" alt="">
                </div>
                <div class="col-11">
                    <br>
                    <?php include_once('./component/post.php') ?>
                </div>
            </div>
        </div>
    </div>

            <div class="card border bordered" style = "border-radius:10px;">
                <div class = "row justify-content-between">
                    <div class="col-1">
                        <img src = "./../img/<?= $fetuser->img_user ?>" style = "width:70px; height:70px; object-fit:cover;" class = "img-fluid rounded-circle m-2">
                    </div>
                    <div class="col-11 text-start">
                        <div class="mt-4">
                            <label for="" class = " fw-bold fs-6"><?= $fetuser->fname_user ?>   <?= $fetuser->lname_user ?></label><br>
                            <label for="" class = " text-muted"><?php echo "10:00น." ?></label>
                        </div>
                    </div>
                </div>
                <div class = "card-title ms-5">fdshnjfhdasfhas</div>
                <div class="card-body" style = "background-color:#f0f0f0;">
                    <div class="text-center">
                    <img src="./../img/412061034_740219064223635_1149011169544202603_n.jpg" class="img-fluid">
                    </div>
                </div>
                <div class = "card-footer">
                    <div class="row justify-content-between">
                        <div class="col-6">
                        </div>
                        <div class="col-6">

                        </div>
                    </div>
                </div>
            </div>

</div>