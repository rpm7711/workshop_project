<?php include('includes/header.php'); ?>

<div>
    <div class="container my-5">
        <div class="row">
            <div class="col md-12 py-5 text-center">
                <?php alertMessage(); ?>
                <h1 class="mt-1">برنامج الورشة</h1>
                <img src="assets/images/no-image.jpg" alt="">

                <div>
                    <?php if (!isset($_SESSION['loggedIn'])) : ?>
                        <a href="login.php" class="btn btn-primary mt-4">تسجيل الدخول</a>
                    <?php endif; ?>
                </div>

            </div>
        </div>

    </div>
</div>


<?php include('includes/footer.php'); ?>