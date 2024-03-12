<?php
session_start();
if(isset($_SESSION["auth"])){
    $_SESSION['message'] = 'You are already Logged In';
    header("location: index.php");
    exit();
    }
 include('includes/header.php');
?>
<!-- ============header============== -->

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-5">
            <!-- =========start-message============= -->
            <?php if(isset($_SESSION['message'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
                <strong></strong><?= $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                unset($_SESSION['message']);
             }
            ?>
            <!-- =========end-message=============== -->
            <div class="form_auth">
                <div class="shadow p-4">

                    <h3 class="text-center mb-3">Sign Up</h3>
                    <form action="functions/authcode.php" method="post">
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control mt-2" name="name" placeholder="Enter Your Name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input type="text" class="form-control mt-2" name="email" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Enter Your Phone</label>
                            <input type="number" class="form-control mt-2" name="phone" placeholder="Enter Your Phone">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control mt-2" name="password" placeholder="Enter Your Password">
                        </div>
                        <div class="form-group mb-3">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" class="form-control mt-2" name="cpassword" placeholder="Enter Your Confirm Password">
                        </div>
                        <button type="submit" name="register_btn" class="btn btn-primary">Register Now</button>
                    </form>
                    <a href="login.php">Sign In Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>




<!-- ============footer============== -->
<?php include('includes/footer.php') ?>