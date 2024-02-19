<button type="button" class = "btn btn-outline-success rounded-pill form-control" data-bs-toggle = "modal" data-bs-target = "#m">What do you think <?= $fetuser->fname_user ?></button>
<div class="modal fade" id = "m" data-bs-backdrop = "static" tabindex = "-1">
    <form action="" method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" align = "center">
                    <p class="fw-bold fs-5">POST</p>
                </div>
                <div class="modal-body">
                    <textarea class="form-control mb-2" required placeholder = "Post what you think" rows="3"></textarea>
                    <input type="file" name="" id="" class="form-control mb-2">
                </div>
                <div class="modal-footer">
                    <button type="button" class = "btn btn-secondary" data-bs-dismiss = "modal">Close</button>
                    <button type="submit" class = "btn btn-success" name = "save">Post</button>
                </div>
            </div>
        </div>
    </form>
</div>