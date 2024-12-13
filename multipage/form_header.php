<?php
// session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "../php/db_com.php";
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];
    $uid = $_SESSION['id'];
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Human Resources</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

            :root {
                --header-height: 3rem;
                --nav-width: 68px;
                --first-color: #4723D9;
                --first-color-light: #AFA5D9;
                --white-color: #F7F6FB;
                --body-font: 'Nunito', sans-serif;
                --normal-font-size: 1rem;
                --z-fixed: 100
            }

            *,
            ::before,
            ::after {
                box-sizing: border-box
            }

            body {
                position: relative;
                margin: var(--header-height) 0 0 0;
                padding: 0 1rem;
                font-family: var(--body-font);
                font-size: var(--normal-font-size);
                transition: .5s
            }

            a {
                text-decoration: none
            }

            .header {
                width: 100%;
                height: var(--header-height);
                position: fixed;
                top: 0;
                left: 0;
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0 1rem;
                background-color: var(--white-color);
                z-index: var(--z-fixed);
                transition: .5s
            }

            .header_toggle {
                color: var(--first-color);
                font-size: 1.5rem;
                cursor: pointer
            }

            .header_img {
                width: 35px;
                height: 35px;
                display: flex;
                justify-content: center;
                border-radius: 50%;
                overflow: hidden
            }

            .header_img img {
                width: 40px
            }

            .l-navbar {
                position: fixed;
                top: 0;
                left: -30%;
                width: var(--nav-width);
                height: 100vh;
                background-color: var(--first-color);
                padding: .5rem 1rem 0 0;
                transition: .5s;
                z-index: var(--z-fixed)
            }

            .nav {
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                overflow: hidden
            }

            .nav_logo,
            .nav_link {
                display: grid;
                grid-template-columns: max-content max-content;
                align-items: center;
                column-gap: 1rem;
                padding: .5rem 0 .5rem 1.5rem
            }

            .nav_logo {
                margin-bottom: 2rem
            }

            .nav_logo-icon {
                font-size: 1.25rem;
                color: var(--white-color)
            }

            .nav_logo-name {
                color: var(--white-color);
                font-weight: 700
            }

            .nav_link {
                position: relative;
                color: var(--first-color-light);
                margin-bottom: 1.5rem;
                transition: .3s
            }

            .nav_link:hover {
                color: var(--white-color)
            }

            .nav_icon {
                font-size: 1.25rem
            }

            .show {
                left: 0
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 1rem)
            }

            .active {
                color: var(--white-color)
            }

            .active::before {
                content: '';
                position: absolute;
                left: 0;
                width: 2px;
                height: 32px;
                background-color: var(--white-color)
            }

            .height-100 {
                height: 100vh
            }

            @media screen and (min-width: 768px) {
                body {
                    margin: calc(var(--header-height) + 1rem) 0 0 0;
                    padding-left: calc(var(--nav-width) + 2rem)
                }

                .header {
                    height: calc(var(--header-height) + 1rem);
                    padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
                }

                .header_img {
                    width: 40px;
                    height: 40px
                }

                .header_img img {
                    width: 45px
                }

                .l-navbar {
                    left: 0;
                    padding: 1rem 1rem 0 0
                }

                .show {
                    width: calc(var(--nav-width) + 156px)
                }

                .body-pd {
                    padding-left: calc(var(--nav-width) + 188px)
                }
            }
        </style>
    </head>

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle me-3"> <i class='bx bx-menu' id="header-toggle"></i> </div>
                <ul class="nav nav-bar nav-list me-auto mt-3">
                    <li class="nav-item active">
                        <a class="nav-link fw-bold text-primary" href="../home.php"> | Home | </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link fw-bold text-dark" href="form1.php"> | Human Resources <span class="sr-only">(current)</span> | </a>
                    </li>
                    <?php
                    if ($role == 'Chief' || $role == 'Admin' || $role == 'HR' || $role == 'Local HR') { ?>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="../attendance_system/viewAttendance.php"> | Attendance | </a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="../attendance_system/user_viewAttendance.php"> | Attendance | </a>
                        </li>
                    <?php } ?>
                    <?php
                    if ($role == 'Chief' || $role == 'Admin' || $role == 'HR') { ?>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="../leave_system/manageLeave.php"> | Leave | </a>
                        </li>
                    <?php } ?>
                    <?php
                    if ($role == 'User' || $role == 'Local HR') { ?>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="../leave_system/requestForm.php"> | Leave | </a>
                        </li>
                    <?php } ?>
                    <?php
                    if ($role == 'Chief' || $role == 'Admin' || $role == 'HR') { ?>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="../appraisal_system/appraisal_form.php">Appraisal</a>
                        </li>
                    <?php } ?>
                    <?php
                    if ($role == 'Chief' || $role == 'Admin' || $role == 'HR' || $role == 'Local HR') { ?>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="../education_system/manage_edu.php">| Education | </a>
                        </li>
                    <?php } ?>
                    <?php
                    if ($role == 'User') { ?>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="../education_system/edu_form.php">| Education | </a>
                        </li>
                    <?php } ?>
                </ul>
                <a class="navbar-brand" href="#">
                    <img class="rounded-circle border border-primary" src="<?php if (isset($image_url)) {
                                                                                echo "../upload-images/uploads/" . $image_url;
                                                                                //  { echo "uploads/download.jpg";
                                                                            } else { ?> ../upload-images/uploads/girl.png
                                <?php } ?>" width="30" height="30" class="d-inline-block align-top" alt="">
                    <span style="font-size: 12px;"><?= $username ?></span>
                </a>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> 
                    <a href="#" class="nav_logo"> <span class="nav_logo-name">HR</span> </a>
                    <div class="nav_list"> 
                        <a href="../multipage/form1.php" id="fill" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Fill a Record</span> </a> 
                        <a href="../upload-images/photo.php" id="photo" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Add a Photo</span> </a> 
                        <a href="../viewform/view_all_emp.php" id="view" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Employees</span> </a>
                        <a href="../hr_search/searchEmp.php" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Search Employees</span> </a> 
                        <?php if($role == 'Admin'|| $role == 'Chief' || $role == 'HR' || $role == 'Local HR'){ ?>
                            <a href="../employment_certi/emp_certi_list.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Employment Certificate</span> </a> 
                        <?php } ?>
                    </div>
                </div> 
                <a href="../logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Logout</span> </a>
            </nav>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {

                const showNavbar = (toggleId, navId, bodyId, headerId) => {
                    const toggle = document.getElementById(toggleId),
                        nav = document.getElementById(navId),
                        bodypd = document.getElementById(bodyId),
                        headerpd = document.getElementById(headerId)

                    // Validate that all variables exist
                    if (toggle && nav && bodypd && headerpd) {
                        toggle.addEventListener('click', () => {
                            // show navbar
                            nav.classList.toggle('show')
                            // change icon
                            toggle.classList.toggle('bx-x')
                            // add padding to body
                            bodypd.classList.toggle('body-pd')
                            // add padding to header
                            headerpd.classList.toggle('body-pd')
                        })
                    }
                }

                showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

                /*===== LINK ACTIVE =====*/
                const linkColor = document.querySelectorAll('.nav_link')

                function colorLink() {
                    if (linkColor) {
                        linkColor.forEach(l => l.classList.remove('active'))
                        this.classList.add('active')
                    }
                }
                linkColor.forEach(l => l.addEventListener('click', colorLink))

            });
        </script>

    </body>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    </html>
<?php } ?>