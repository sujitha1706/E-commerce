<?php
session_start();
$errors = [
    'login'=>$_SESSION['login_error'] ?? '',
    'register'=>$_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error){
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}
function isActiveForm($formName,$activeForm){
    return $formName === $activeForm ? 'active' : '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-Stack Login & Register Form With User & Admin Page| Codehal</title>
    <link rel="stylesheet" href="login.css">
    <meta charset="UTF-8">
</head>
<body>
        <div class="container">
             <div class="form-box <?= isActiveForm('login',$activeForm); ?>" id="login-form">
               <form action="login_register.php" method="POST">
                   <h2>Login</h2>
                   <?= showError($errors['login']); ?>
                   <input type="email" name="email" placeholder="Email" required>
                   <input type="password" name="password" placeholder="Password" required>
                   <button type="submit" name="login">Login</button>
                   <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
                </form>
            </div>
        </div>


        <div class="container">
            <div class="form-box  <?= isActiveForm('register',$activeForm); ?>" id="register-form">
              <form action="login_register.php" method="POST">
                  <h2>Register</h2>
                  <?= showError($errors['register']); ?>
                  <input type="text" name="fname" placeholder="Full Name" required="required">
                  <input type="email" name="email" placeholder="Email" required="required">
                  <input type="password" name="password" placeholder="Password" required="required">
                  <button type="submit" name="register">Register</button>
                  <p>Already have an account? <a href="#"onclick="showForm('login-form')">Login</a></p>
               </form>
           </div>
       </div>
<script>
    function showForm (formId) {
        document.querySelectorAll(".form-box").forEach(form => form.classList.remove("active"));
        document.getElementById(formId).classList.add("active");
    }
</script>
</body>
</html>