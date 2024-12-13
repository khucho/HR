<?php
    session_start();
    include "../php/db_com.php";

    if(isset($_SESSION['username']) && isset($_SESSION['id']))
    {

        $emailErr = $phoneErr = $add1Err = $add2Err = $cityErr = $regionErr = $countryErr = $financeAccErr = "";
        $email = $phNo = $add1 = $add2 = $city = $region = $country = $zip = $financeAcc = "";

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }

            if (empty($_POST["financeAcc"])) {
                $financeAcc = "";
            } else {
                $financeAcc = test_input($_POST["financeAcc"]);
            }
        
            if (empty($_POST["phNo"])) {
                $phoneErr = "Phone No. is required";
            } else {
                $phNo = test_input($_POST["phNo"]);
            }
        
            if (empty($_POST["add1"])) {
                $add1Err = "Address is required";
            } else {
                $add1 = test_input($_POST["add1"]);
            }
        
            if (empty($_POST["add2"])) {
                $add2Err = "Address is required";
            } else {
                $add2 = test_input($_POST["add2"]);
            }

            if (empty($_POST["city"])) {
                $cityErr = "City is required";
            } else {
                $city = test_input($_POST["city"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
                    $cityErr = "Only letters and white space allowed";
                    }  
            }
        
            if (empty($_POST["region"])) {
                $regionErr = "State or Region is required";
            } else {
                $region = test_input($_POST["region"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z-' ]*$/",$region)) {
                    $regionErr = "Only letters and white space allowed";
                    }  
            }

            if (empty($_POST["country"])) {
                $countryErr = "Country is required";
            } else {
                $country = test_input($_POST["country"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z-' ]*$/",$country)) {
                    $countryErr = "Only letters and white space allowed";
                    }  
            }
            
            if (empty($_POST["zip"])) {
                $zip = "";
            } else {
                $zip = test_input($_POST["zip"]);
            }

            if($emailErr == "" && $phoneErr == "" && $add1Err == "" && $add2Err == "" && $cityErr == "" && $regionErr == "" && $countryErr =="") {  
            
                    $_SESSION['info']['email'] = $email;
                    $_SESSION['info']['financeAcc'] = $financeAcc;
                    $_SESSION['info']['phNo'] = $phNo;
                    $_SESSION['info']['add1'] = $add1;
                    $_SESSION['info']['add2'] = $add2;
                    $_SESSION['info']['city'] = $city;
                    $_SESSION['info']['region'] = $region;
                    $_SESSION['info']['country'] = $country;
                    $_SESSION['info']['zip'] = $zip;
            
                    header("Location: form3.php");
            }
        
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Info:</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body style="background: #DFDFDF;">
    <?php include "form_header.php"; ?>
    <div class="container">
        <form class="border shadow p-3 rounded" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="margin-top:100px; background: #FFFFFF;">
            <header class="display-6 text-center mb-3"> Registration Form</header>

            <div class="row">

                <span class="mb-3 fs-4">Contact Info:</span>

                <div class="form-label mb-3">
                    <p><span class="error">* required field</span></p>
                </div>

                <div class="col-md-4 form-group">
                    <label for="email" class="form-label bg-light">Email</label><span class="error">*</span>
                    <input type="email" class="form-control text-muted" name="email" value="<?= isset($_SESSION['info']['email']) ? $_SESSION['info']['email'] : '' ?>">
                    <span class="error"><?php echo $emailErr;?></span>
                </div>

                <div class="col-md-4 form-group">
                    <label for="financeAcc" class="form-label bg-light">Finance Account No.</label> 
                    <input type="text" class="form-control text-muted" name="financeAcc" value="<?php isset($_SESSION['info']['financeAcc']) ? $_SESSION['info']['financeAcc'] : '' ?>">
                    <span class="error"><?php echo $financeAccErr;?></span>
                </div>

                <div class="col-md-4 form-group">
                    <label for="phNo" class="form-label bg-light">Phone No.</label> <span class="error">*</span>
                    <input type="text" class="form-control text-muted" name="phNo" value="<?php isset($_SESSION['info']['phNo']) ? $_SESSION['info']['phNo'] : '' ?>">
                    <span class="error"><?php echo $phoneErr;?></span>
                </div>

            </div>
            
            <div class="row mt-3">
                <div class="col-md-4 form-group">
                    <label for="add1" class="form-label bg-light">Address (Building No.)</label> <span class="error">*</span>
                    <input type="text" class="form-control text-muted" name="add1" value="<?php isset($_SESSION['info']['add1']) ? $_SESSION['info']['add1'] : '' ?>">
                    <span class="error"><?php echo $add1Err;?></span>
                </div>
                
                <div class="col-md-4 form-group">
                    <label for="add2" class="form-label bg-light">Address (Street, Ward)</label> <span class="error">*</span>
                    <input type="text" class="form-control text-muted" name="add2" value="<?php isset($_SESSION['info']['add2']) ? $_SESSION['info']['add2'] : '' ?>">
                    <span class="error"><?php echo $add2Err;?></span>
                </div>

                <div class="col-md-4 form-group">
                    <label for="city" class="form-label bg-light">City</label> <span class="error">*</span>
                    <input type="text" class="form-control text-muted" name="city" value="<?php isset($_SESSION['info']['city']) ? $_SESSION['info']['city'] : '' ?>">
                    <span class="error"><?php echo $cityErr;?></span>
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-md-4 form-group">
                    <label for="region" class="form-label bg-light">State or Region</label> <span class="error">*</span>
                    <input type="text" class="form-control text-muted" name="region" value="<?php isset($_SESSION['info']['region']) ? $_SESSION['info']['region'] : '' ?>">
                    <span class="error"><?php echo $regionErr;?></span>
                </div>
    
                <div class="col-md-4 form-group">
                    <label for="country" class="form-label bg-light">Country</label> <span class="error">*</span>
                    <input type="text" class="form-control text-muted" name="country" value="<?php isset($_SESSION['info']['country']) ? $_SESSION['info']['country'] : '' ?>">
                    <span class="error"><?php echo $countryErr;?></span>
                </div>

                <div class="col-md-4 form-group">
                    <label for="zip" class="form-label bg-light">Zip</label> 
                    <input type="text" class="form-control text-muted" name="zip" value="<?php isset($_SESSION['info']['zip']) ? $_SESSION['info']['zip'] : '' ?>">
                </div>

            </div>
            
            <div class="row mt-4 mb-3 ">
                <div class="col-md-12 d-flex justify-content-between">
                    <a href="form1.php" class="btn btn-primary" role="button">Previous</a>
                    <button type="submit" class="btn btn-primary" name = "next">
                        Next
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
    }else{
        header("Location: ../index.php");
    }
?>