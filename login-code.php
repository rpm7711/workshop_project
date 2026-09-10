<?php

require 'config/function.php';

if (isset($_POST['loginBtn'])) {
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if ($email != '' && $password != '') {
        $query = "SELECT * FROM admins WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $query);
        if ($result) {

            if (mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_assoc($result);
                $hashedPassword = $row['password'];

                if (!password_verify($password, $hashedPassword)) {
                    redirect('login.php', 'Invalid Password');
                }

                if ($row['is_ban'] == 1) {
                    redirect('login.php', 'تم حظر حسابك. تواصل مع مسؤول النظام.');
                }

                if ($row['type'] == 0) {

                    $_SESSION['loggedIn'] = true;
                    $_SESSION['loggedInUser'] = [
                        'user_id' => $row['id'],
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'phone' => $row['phone'],
                        'type' => $row['type'],
                        'delete_password' => $row['delete_password'],
                        'branch_name' => $row['branch_name'],
                        'branch_id' => $row['branch_id'],
                        'authorized' => $row['authorized'],
                    ];

                    redirect('user/index.php', 'Logged In Successfully -- تم تسجيل الدخول بنجاح');
                
                } else {

                    $_SESSION['loggedIn'] = true;
                    $_SESSION['loggedInUser'] = [
                        'user_id' => $row['id'],
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'phone' => $row['phone'],
                        'type' => $row['type'],
                        'delete_password' => $row['delete_password'],
                        'branch_name' => $row['branch_name'],
                        'branch_id' => $row['branch_id'],
                        'authorized' => $row['authorized'],
                    ];

                    redirect('admin/index.php', 'Logged In Successfully -- تم تسجيل الدخول بنجاح');
                }


            } else {
                redirect('login.php', 'Invalid Email Address -- الايميل المدخل غير صحيح');
            }
        } else {
            redirect('login.php', 'Somthing went wrong');
        }
    } else {
        redirect('login.php', 'All field are mandetory');
    }
}
