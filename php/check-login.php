<?php
session_start();
include "db_com.php";

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])){
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $role = test_input($_POST['role']);

    if (empty($username)){
        header("Location: ../index.php?error=User Name is Required");
    }else if (empty($password)){
            header("Location: ../index.php?error=Password is Required");
    }else{
        $password = md5($password);

        $sql = "SELECT * FROM users where username = '$username' AND password = '$password'";
        
        $result = mysqli_query($conn , $sql);

        if(mysqli_num_rows($result) === 1)
        {
            $row = mysqli_fetch_assoc($result);

            if($row['password'] === $password && $row['role'] === $role)
            {
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];

                header('Location: ../home.php');
            }else{
                header("Location: ../index.php?error=Incorrect password or user type");
            }
        }else{
            header("Location: ../index.php?error=Incorrect user name or password");
        }
    }
}else{
    header("Location: ../index.php");
}
?>