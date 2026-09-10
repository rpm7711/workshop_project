<?php
include('includes/header.php'); 

if(isset($_SESSION['loggedIn'])){
    ?>
    <script>window.location.href = 'index.php'; </script>
    <?php

}
?>

<div class="py-5 bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col md-6">

                <div class="card shadow rounded-4">
                    <?php alertMessage(); ?>
                    <div class="p-5">
                        <h4 class="text-dark mb-3">يرجى تسجيل الدخول لبرنامج الورشة</h4>
                        <form action="login-code.php" method="POST">
                            <div class="mb-3">
                                <label>البريد الالكتروني <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" required placeholder="example@gmail.com"/>
                            </div>
                            <div class="mb-3">
                                <label>كلمة المرور <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" required placeholder="****"/>
                            </div>
                            <div class="my-3">
                                <button type="submit" name="loginBtn" class="btn btn-primary w-100 mt-2" >
                                    تسجيل الدخول
                                </button>
                            </div>
                        </form>
                    </div>

                </div>


            </div>
        </div>

    </div>
</div>


<?php include('includes/footer.php'); ?>