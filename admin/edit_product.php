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
 
                            <h6 class="card-title">Edit Product</h6>


                            <?php
                            if (isset($_GET['id'])) {


                                $id = $_GET['id'];
                                $product = getById("products", $id);

                                if (mysqli_num_rows($product) > 0) {
                                    $data = mysqli_fetch_array($product);
                            ?>

                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Select Category</label>
                                            <select name="category_id" class="form-select form-select-sm">
                                                <option selected>--Selected Category--</option>
                                                <?php
                                                $categories = getAll("categories");
                                                if (mysqli_num_rows($categories) > 0) {
                                                    foreach ($categories as $item) {
                                                ?>
                                                        <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id'] ? 'selected':''  ?> ><?= $item['name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo "No Category available";
                                                }


                                                ?>
                                            </select>
                                        </div>
                                        <input type="hidden" name="product_id" value="<?= $data['id'] ?>">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Product Name</label>
                                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="<?= $data['name'] ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="slug" class="form-label">Product Slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug" autocomplete="off" value="<?= $data['slug'] ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="small_description" class="form-label">Small Description</label>
                                            <textarea name="small_description" id="small_description" cols="30" rows="10" class="form-control"><?= $data['small_description'] ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?= $data['description'] ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="original_price" class="form-label">Original Price</label>
                                            <input type="text" class="form-control" id="original_price" name="original_price" autocomplete="off" value="<?= $data['original_price'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="selling_price" class="form-label">Selling Price</label>
                                            <input type="text" class="form-control" id="selling_price" name="selling_price" autocomplete="off" value="<?= $data['selling_price'] ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Upload Photo</label>
                                            <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                            <img src="../uploads/<?= $data['image'] ?>" alt="product" style="width: 70px; height: 70px;">
                                            <input type="file" class="form-control" id="image" name="image" autocomplete="off">
                                        </div>
                                        <hr class="mt-4">
                                        <div class="row py-3">

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label for="qty" class="pt-2">Quentity</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="number" name="qty" id="qty" class="form-control" value="<?= $data['qty'] ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <input type="checkbox" class="form-check-input" <?= $data['status'] ? "checked" : "" ?> name="status" id="status">
                                                <label class="form-check-label" for="status">
                                                    Status
                                                </label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="checkbox" class="form-check-input" <?= $data['trending'] ? "checked" : "" ?> name="trending" id="trending">
                                                <label class="form-check-label" for="trending">
                                                    Trending
                                                </label>
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <br><br>
                                        <h3 class="text-info">SEO SECTION</h3>
                                        <br>
                                        <div class="mb-3">
                                            <label for="meta_title" class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" id="meta_title" name="meta_title" autocomplete="off" value="<?= $data['meta_title'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="meta_description" class="form-label">Meta Description</label>
                                            <textarea name="meta_description" class="form-control" id="meta_description" cols="30" rows="10"><?= $data['meta_description'] ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="meta_keywords" class="form-label">Meta Keyword</label>
                                            <textarea name="meta_keywords" class="form-control" id="meta_keywords" cols="30" rows="10" placeholder="Meta Keywords"><?= $data['meta_keywords'] ?></textarea>
                                        </div>

                                        <button type="submit" name="product_edit_btn" class="btn btn-primary me-2">Update Product</button>
                                    </form>
                            <?php
                                } else {
                                    echo "Product Not Found For Given ID!";
                                }
                            } else {
                                echo "ID MISSING FROM URL!";
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