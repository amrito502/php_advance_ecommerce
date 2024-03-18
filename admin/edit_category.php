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
                            <h6 class="card-title">Edit Category</h6>
                            <?php

                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $category = getById("categories", $id);

                                if (mysqli_num_rows($category) > 0) {

                                    $data = mysqli_fetch_array($category);

                            ?>
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Category Name</label>
                                            <input type="hidden" name="category_id" value="<?= $data['id']; ?>">
                                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="<?= $data['name']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Category Slug</label>
                                            <input type="text" class="form-control" id="name" name="slug" autocomplete="off" value="<?= $data['slug']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Upload Photo</label>
                                            <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                            <img src="../uploads/<?= $data['image'] ?>" alt="category" style="width: 70px; height: 70px;">
                                            <input type="file" class="form-control" id="name" name="image" autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Enter Description</label>
                                            <input type="text" class="form-control" id="name" name="description" autocomplete="off" value="<?= $data['description']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" id="name" name="meta_title" autocomplete="off" value="<?= $data['meta_title']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Meta Description</label>
                                            <input type="text" class="form-control" id="name" name="meta_description" autocomplete="off" value="<?= $data['meta_description']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Meta Keyword</label>
                                            <input type="text" class="form-control" id="name" name="meta_keywords" value="<?= $data['meta_keywords']; ?>">
                                        </div>

                                        <div class="box_check f-flex justify-content-between">
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" <?= $data['status'] ? "checked" : "" ?> name="status" id="status">
                                                <label class="form-check-label" for="status">
                                                    Status
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" <?= $data['popular'] ? "checked" : "" ?> name="popular" id="popular">
                                                <label class="form-check-label" for="popular">
                                                    Popular
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" name="category_edit_btn" class="btn btn-primary me-2">Update Category</button>
                                    </form>
                            <?php
                                } else {
                                    echo "Category Not Found!";
                                }
                            } else {
                                echo 'ID Missing From URL!';
                            }
                            ?>

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