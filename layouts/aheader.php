<?php
    include "php/db_com.php";

    if(isset($_SESSION['username']) && isset($_SESSION['id']))
    {
        $username = $_SESSION['username']; 
        $uid = $_SESSION['id'];
        $role = $_SESSION['role'];

        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
        <nav class="navbar navbar-expand-lg bg-light shadow">
            <a class="navbar-brand" href="#">
            <img src="../images/logo1.jpeg" alt="Logo" width="90" height="49" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active fw-bold text-dark" aria-current="page" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link active fw-bold text-primary" href="multipage/form1.php">Human Resources</a>
                </li>
                <?php 
                if($role == 'Admin' || $role == 'HR' || $role == 'Local HR' || $role == 'Chief')
                { ?>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-primary" href="attendance_system/viewAttendance.php"> Attendance  </a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-primary" href="attendance_system/user_viewAttendance.php"> Attendance </a>
                </li>
                <?php } ?>

                <?php 
                if($role == 'Admin' || $role == 'HR' || $role == 'Chief')
                { ?>
                <li class="nav-item">
                <a class="nav-link fw-bold text-primary" href="leave_system/manageLeave.php">  Leave  </a>
                </li>
                <?php } ?>
                <?php 
                if($role == 'User' || $role == 'Local HR')
                { ?>
                <li class="nav-item">
                <a class="nav-link fw-bold text-primary" href="leave_system/requestForm.php">  Leave  </a>
                </li>
                <?php } ?>

                <?php 
                if($role == 'Admin' || $role == 'HR' || $role == 'Chief')
                { ?>
                <li class="nav-item">
                <a class="nav-link fw-bold text-primary" href="appraisal_system/appraisal_form.php">Appraisal</a>
                </li>
                <?php } ?>
                <?php 
                if($role == 'Admin' || $role == 'HR' || $role == 'Local HR' || $role == 'Chief')
                { ?>
                <li class="nav-item">
                <a class="nav-link fw-bold text-primary" href="education_system/manage_edu.php"> Education </a>
                </li>
                <?php } ?>
                <?php 
                if($role == 'User')
                { ?>
                <li class="nav-item">
                <a class="nav-link fw-bold text-primary" href="education_system/edu_form.php"> Education  </a>
                </li>
                <?php } ?>
            </ul>
            <!-- Image and text -->
            <a class="navbar-brand" href="#">
                <img class="rounded-circle border border-primary" src = "<?php if(isset($image_url))
                                    { 
                                        echo "upload-images/uploads/". $image_url;
                                    }else{?> upload-images/uploads/girl.png
                                <?php } ?>"  width="30" height="30" class="d-inline-block align-top" alt="">
                <span style="font-size: 12px;"><?=$username?></span>
            </a>        
            <a href="logout.php" class="btn btn-sm btn-primary">Logout</a>
            </div>
        </nav>
</body>
    <script src="js/bootstrap.bundle.min.js"></script>
</html>

<?php } ?>