<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
        <form  class="border shadow p-3 rounded" action="php/check-login.php" method="post" style="width: 450px; background: #FFFFFF;">
            <div class="text-center">
                <img class="" src="images/logo1.jpeg" alt="LOGIN" style="height: 180px;">
            </div>
            <?php if(isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert"><? $_GET['error'] ?></div>
            <?php } ?>
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-4">
                <label for="" class="form-label">Select User Type</label>
                <select class="form-select" name="rolw" id="">
                    <option selected value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="hr">HR</option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <span>Not yet a member? <a href="">Sign up</a> </span>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>