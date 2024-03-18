<?php
include 'includes/header.php';
include '../middleware/adminMiddleware.php';

include 'includes/sidebar.php';
?>

<div class="page-wrapper">
    <?php
    include 'includes/navbar.php';
    ?>
    <div class="page-content">
        <div class="containers">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Category</h6>

                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="Category Name">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Category Slug</label>
                                    <input type="text" class="form-control" id="name" name="slug" autocomplete="off" placeholder="Category Slug">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Upload Photo</label>
                                    <input type="file" class="form-control" id="name" name="image" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Enter Description</label>
                                    <input type="text" class="form-control" id="name" name="description" autocomplete="off" placeholder="Write Description">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" id="name" name="meta_title" autocomplete="off" placeholder="Meta Title">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Meta Description</label>
                                    <input type="text" class="form-control" id="name" name="meta_description" autocomplete="off" placeholder="Meta Description">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Meta Keyword</label>
                                    <input type="text" class="form-control" id="name" name="meta_keyword" autocomplete="off" placeholder="Meta Keyword">
                                </div>

                                <div class="box_check f-flex justify-content-between">
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" name="status" id="status">
                                        <label class="form-check-label" for="status">
                                            Status
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" name="popular" id="popular">
                                        <label class="form-check-label" for="popular">
                                            Popular
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" name="category_add_btn" class="btn btn-primary me-2">Create Category</button>
                            </form>

                        </div> 
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div>
        <?php
        include 'includes/footer.php';

        ?>