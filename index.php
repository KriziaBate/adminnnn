<?php
session_start();

// Check if the "role" session variable is set.
if (isset($_SESSION["role"])) {
    $role = $_SESSION["role"];

    // Redirect the user to a page based on their role.
    header("Location: $role/$role.php");
    exit; // Make sure to exit the script after the redirection.
}

// If the "role" session variable is not set, the user stays on the current page.
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Trisakay</title>
    <link rel="icon" href="../img/logo3.png" type="image/png" />
</head>
<body>


    <div class="container">
        <!-- <a class="navbar-brand" href="#">Login Form</a> -->
        <a class="navbar-brand" href="#"><img src="Logo2.png" alt="Logo" style="height: 30px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

       
    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center" >
            <div class="col-md-8">
                <div class="card" style="background-color: #4CAF50;">
                    <div class="card-header" style="background-color: white;" >Login</div>
                    <div class="card-body">
                        <!-- Add the logo here -->
                        <div class="text-center mb-4">
                            <img src="Logo1.png" alt="Logo"  height="150px" >
                        </div>
                        <!-- End of logo -->
                        <form action="login_back.php" method="POST">
                            <div class="form-group row" >
                                <label for="email_address" class="col-md-4 col-form-label text-md-right" style="font-weight:bold; color:white;" >E-Mail Address</label>
                                <div class="col-md-5">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right" style="font-weight:bold; color:white;">Password</label>
                                <div class="col-md-5">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 offset-md-3 text-center" >
                            <div style="text-align: center;">
                                <input type="submit" value="Login" name="login" style="background-color: white; color: black;  border-radius: 20px;" >
                            </div>
                                <a href="recover_psw.php" class="btn btn-link" style="color: white;">
                                    Forgot Your Password?
                                </a>
                              
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link" href=""style="font-weight:bold; color:white;  text-align: center;" >Dont have an account? SIGN UP as:</a>
                    <a class="nav-link" href="driversignup.php" style="font-weight:bold; color:white;  text-align: center;" >Driver</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="commutersignup.php" style="font-weight:bold; color:white;  text-align: center; ">Commuter</a>
                </li>
            </ul>

                            </div>
                            
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>
