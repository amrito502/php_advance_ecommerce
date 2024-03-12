<?php
session_start();
include('includes/header.php');

?>
<!-- ============header============== -->

<?php include('includes/navbar.php') ?>

<!-- =========start-message============= -->
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
        <strong></strong><?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['message']);
}
?>
<!-- =========end-message=============== -->

<!-- ============footer============== -->
<?php include('includes/footer.php') ?>