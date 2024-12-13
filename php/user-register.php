<?php
    session_start();
    include "db_com.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body style="background: #DFDFDF;">
    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
        <form  class="border shadow p-3 rounded" action="user-check-register.php" method="post" style="width: 450px; background: #FFFFFF;">
            <!-- <div class="text-center">
                <img class="" src="../images/logo1.jpeg" alt="SIGN UP" style="height: 180px;">
            </div> -->
            <div class="mb-3">
                <label for="username" class="form-label">username</label><span class="error">*</span>
                <input type="text" name="username" class="form-control" value="<?= isset($_SESSION['old']['username']) ? $_SESSION['old']['username'] : ''; ?>">
                <span class="error"> 
                    <?php
                    if( ! empty($_SESSION['nameErr']))
                        {
                            echo $_SESSION['nameErr'];
                            unset($_SESSION['nameErr']);
                        }
                    ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label><span class="error">*</span>
                <input type="email" name="email" class="form-control" value="<?= isset($_SESSION['old']['email']) ? $_SESSION['old']['email'] : ''; ?>">
                <span class="error"> 
                    <?php
                    if( ! empty($_SESSION['emailErr']))
                        {
                            echo $_SESSION['emailErr'];
                            unset($_SESSION['emailErr']);
                        }
                    ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label><span class="error">*</span>
                <input type="password" name="password" class="form-control" value="<?= isset($_SESSION['old']['password']) ? $_SESSION['old']['password'] : ''; ?>">
                <span class="error"> 
                    <?php
                    if( ! empty($_SESSION['passwordErr']))
                        {
                            echo $_SESSION['passwordErr'];
                            unset($_SESSION['passwordErr']);
                        }
                    ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label><span class="error">*</span>
                <input type="password" name="confirm_password" class="form-control" value="<?= isset($_SESSION['old']['password']) ? $_SESSION['old']['password'] : ''; ?>">
                <span class="error"> 
                    <?php
                    if( ! empty($_SESSION['passwordErr']))
                        {
                            echo $_SESSION['passwordErr'];
                            unset($_SESSION['passwordErr']);
                        }
                    ?>
                </span>
            </div>
            <div class="mb-4">
                <label for="" class="form-label">Type</label><span class="error">*</span>
                <select class="form-select mb-5" name="role" aria-label="Default select example">
                    <option value="User"> User</option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <span>Already a member?  <a href="../index.php">Sign in</a> </span>
                </div>
                <div>
                    <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                </div>
            </div>
        </form>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>