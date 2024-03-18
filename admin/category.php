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

                            <h6 class="card-title">All Category</h6>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $category = getAll("categories");

                                    if (mysqli_num_rows($category) > 0) {
                                        foreach ($category as $item) {
                                    ?>
                                            <tr>
                                                <td><?= $item['id']; ?></td>
                                                <td><?= $item['name']; ?></td>
                                                <td> <img src="../uploads/<?= $item['image'] ?>" alt="category" style="width: 70px; height: 70px;"></td>
                                                <td><?= $item['description']; ?></td>
                                                <td><?= $item['status'] == '0' ? "Visible" : "Hidden" ?></td>
                                                <td>
                                                    <a href="edit_category.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                                                    <form action="code.php" method="post">
                                                        <input type="hidden" name="category_id" value="<?= $item['id']; ?>">
                                                        <button type="submit" class="btn btn-sm btn-danger" name="delete_category_btn">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "Not Record Found!";
                                    }

                                    ?>

                                </tbody>
                            </table>
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

      