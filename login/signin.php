<?php
$reseult = $_GET['error'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Experts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100;400;500;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">

    <script src="https://kit.fontawesome.com/467085cb8c.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="main-page-grid">
            <form name="" action="./processLogin.php" method="post">
            <div class="signup-content">
                <div class="logo-container d-none">Track Expect</div>
                <div class="get-started">
                    <?php
                    if ($reseult == "102"){?>
                        <div class="btn-container"><button class="btn btn-danger d-block" name="registration" id="registration">Email or Password Incorrect</button></div>
                        <?php
                    }
                    ?>
                    <h2 class="get-stated-title">Get Started</h2>
                    <span class="get-stated-sub-title">Not a member &nbsp;<a class="sign-in" href="./signup.php">Sign up here</a></span>
                </div>
                <div class="login-items-container">
                    <div>
                        <input class="text-field" type="email" name="email" id="" placeholder="Email">
                    </div>
                    <div>
                        <input class="text-field" type="password" name="password" id="" placeholder="Password">
                    </div>
                </div>
                <div class="btn-container"><button class="btn btn-primary d-block" name="login" id="login">Login</button></div>
            </div>
            </form>

            <div class="signup-image"><div></div></div>
        </div>
    </div>
</body>
</html>