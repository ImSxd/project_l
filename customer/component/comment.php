<button type="button" class = "btn btn rounded-pill form-control" id = "com" data-bs-toggle = "modal" data-bs-target = "#m<?= $fetchpost->id_p ?>">comment</button>
<div class="modal fade" id = "m<?= $fetchpost->id_p ?>" data-bs-backdrop = "static" tabindex = "-1">
    <form action="" method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" align = "center">
                    <p class="fw-bold fs-5">Comment</p>
                    <button type="button" class = "btn btn-close" data-bs-dismiss = "modal"></button>
                </div>
                <div class="modal-body">
                    <div class="card mb-2">
                        <?php
                        $id_post = $fetchpost->id_p;
                        $com = new db();
                        $resultcom = $com->select("comment,user","*","WHERE comment.id_post = $id_post AND user.id_user = comment.id_user");
                        if($resultcom->num_rows > 0){
                        while($fetchcom = $resultcom->fetch_object()){
                        ?>
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-2">
                                        <img src="./../img/<?= $fetchcom->img_user ?>" class  ="rounded-circle img-fluid" style="width:80px; height:80px; object-fit:cover;">
                                    </div>
                                    <div class="col-10 text-start">
                                        <label for="" class = "fw-bold fs-4"><?= $fetchcom->comment ?></label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php } }else{  ?>
                            Not have any comment
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer input-group">
                    <input type="text" name="comment" class = "form-control" placeholder = "Comment" required>
                    <input type="hidden" name="id" value = "<?= $fetchpost->id_p ?>">
                    <button type="submit" class = "btn btn-success" name = "com">Post</button>
                </div>
            </div>
        </div>
    </form>
</div>