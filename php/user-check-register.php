<?php
    session_start();
    include 'db_com.php';

    $nameErr = ""; $emailErr = ""; $passwordErr = ""; $pw2 = "";

if(isset($_POST['submit'])){
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);

    $_SESSION['old']=[
        'username' => $uname,
        'email'    => $email,
        'password' => $password
    ];

    if(empty($uname))
    {
        $_SESSION['nameErr'] = "Name is required";
        $nameErr = "Name is required";
        header("Location: user-register.php");
    }else{

        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$uname)) {
            $_SESSION['nameErr'] = "Only letters and white space allowed";
            $nameErr = "Only letters and white space allowed";
            header("Location: user-register.php");
        }

        // don't allow duplicate username
        $user_check_query = "SELECT * FROM users WHERE username='$uname' LIMIT 1";
        $result = mysqli_query($conn , $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if($user)
        {
            if ($user['username'] === $uname) {
                $_SESSION['nameErr'] = "Username already exists";
                $nameErr = "Username already exists";
                header("Location: user-register.php");
            } 
        }
    }

    if(empty($email))
    {
        $_SESSION['emailErr'] = "Email is required";
        $emailErr = "Email is required";
        header("Location: user-register.php");
    }else{

        // validate email format
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['emailErr'] = "email is not a valid email address";
            $emailErr = "email is not a valid email address";
            header("Location: user-register.php");
        }

        // don't allow duplicate email
        $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn , $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if($user)
        {
            if ($user['email'] === $email) {
                $_SESSION['emailErr'] = "Email already exists";
                $emailErr = "Email already exists";
                header("Location: user-register.php");
            } 
        }
    }

  
    if(empty($password))
    {
        $_SESSION['passwordErr'] = "Password is required";
        $passwordErr = "Password is required";
        header("Location: user-register.php");
    }else if ($_POST["password"] != $_POST["confirm_password"]) {
        $_SESSION['passwordErr'] = "The two passwords do not match";
        $passwordErr = "The two passwords do not match";
        header("Location: user-register.php");
    }

    if(empty($_POST["role"])){
        $role = "User";
    } else {
        $role = test_input($_POST['role']);
    }

    if(empty($nameErr) && empty($emailErr) && empty($passwordErr))
    {
        $pw2 = md5($password);
        // $pw2 = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users (username,email,password,role) VALUES ('$uname','$email','$pw2','$role')";
        mysqli_query($conn,$query);

        $sql = "SELECT * FROM users where username='$uname' AND password='$pw2'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) === 1)
        {
             //the user name must be unique
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] === $pw2 && $row['role'] === $role){
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['username'] = $row['username'];

                unset($_SESSION['old']);

                header("Location: ../index.php");
            }
        }
    }
}else{
    header('Location: user-register.php');
}
?>
