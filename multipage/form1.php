<?php
    session_start();
    include "../php/db_com.php";

    if(isset($_SESSION['username']) && isset($_SESSION['id']))
    {

        $empNameErr = $nickNameErr = $genderErr = $birthdayErr = $religionErr = $nationalityErr = $hireDateErr = $hireTypeErr = $empCategoryErr = $departmentErr = $empStatusErr = $positionErr = $nrcErr = $endServiceErr = $empIdNoErr = "";
        $empName = $nickName = $gender = $nrc = $birthday = $religion = $nationality = $hireDate = $hireType = $empCategory = $department = $empStatus = $endOfPro = $proDate = $endService = $position = $reason = $empIdNo = $award = $disciplinary = "";

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if(empty($_POST['empName']))
            {
                $empNameErr = "Name is required";
            }else{
                $empName = test_input($_POST['empName']);
            }

            if(empty($_POST['nickName']))
            {
                $nickNameErr = "";
            }else{
                $nickName = test_input($_POST['nickName']);
            }

            if (empty($_POST["empIdNo"])) {
                $empIdNoErr = "Employee Id No. is required";
            } else {
                $empIdNo = test_input($_POST["empIdNo"]);
            }

            if(empty($_POST['gender']))
            {
                $genderErr = "Gender is required";
            }else{
                $gender = test_input($_POST['gender']);
            }

            if (empty($_POST["nrc"])) {
                $nrcErr = "NRC No. or Passport No. is required";
            } else {
                $nrc = test_input($_POST["nrc"]);
            }

            if (empty($_POST["dob"])) {
                $birthdayErr = "Date of Birth is required";
            } else {
                $doB = test_input($_POST["dob"]);
            }

            if (empty($_POST["religion"])) {
                $religionErr = "";
            } else {
                $religion = test_input($_POST["religion"]);
            }

            if (empty($_POST["nationality"])) {
                $nationalityErr = "Nationality is required";
            } else {
                $nationality = test_input($_POST["nationality"]);
            }

            if (empty($_POST["hiredate"])) {
                $hireDateErr = "Hire Date is required";
            }else {
                $hireDate = test_input($_POST["hiredate"]);
            }

            
            if (empty($_POST["endservice"])) {
                $endServiceErr = "End date of contract is required";
            } else {
                $endService = test_input($_POST["endservice"]);
            }

            if (empty($_POST["position"])) {
                $positionErr = "position is required";
            } else {
                $position = test_input($_POST["position"]);
            }

            if (empty($_POST["department"])) {
                $departmentErr = "Department is required";
            }else {
                $department = test_input($_POST["department"]);
            }

            if (empty($_POST["status"])) {
                $empStatusErr = "Employment Status is required";
            }else {
                $empStatus = test_input($_POST["status"]);
            }

            if (empty($_POST["endOfPro"])) {
                $endOfPro = null;
            } else {
                $endOfPro = test_input($_POST["endOfPro"]);
            }

            if (empty($_POST["prodate"])) {
                $proDate = null;
            } else {
                $proDate = test_input($_POST["prodate"]);
            }

            if (empty($_POST["reason"])) {
                $reason = "";
            } else {
                $reason = test_input($_POST["reason"]);
            }

            if (empty($_POST["award"])) {
                $award = "";
            } else {
                $award = test_input($_POST["award"]);
            }
    
            if (empty($_POST["disciplinary"])) {
                $disciplinary = "";
            } else {
                $disciplinary = test_input($_POST["disciplinary"]);
            }

            if($empNameErr == "" && $nickNameErr == "" && $genderErr  == "" && $birthdayErr  == "" && $religionErr  == "" && $nationalityErr  == "" && $hireDateErr  == "" && $hireTypeErr  == "" && $empCategoryErr  == "" && $departmentErr  == "" && $empStatusErr  == "" && $positionErr  == "" && $empIdNoErr == "" && $nrcErr == "" && $endServiceErr == ""){
                
                $_SESSION['info']['empName'] = $empName;
                $_SESSION['info']['nickName'] = $nickName;
                $_SESSION['info']['empIdNo'] = $empIdNo;
                $_SESSION['info']['gender'] = $gender;
                $_SESSION['info']['nrc'] = $nrc;
                $_SESSION['info']['doB'] = $doB;
                $_SESSION['info']['religion'] = $religion;
                $_SESSION['info']['nationality'] = $nationality;
                $_SESSION['info']['hireDate'] = $hireDate;
                $_SESSION['info']['endService'] = $endService;
                $_SESSION['info']['position'] = $position;
                $_SESSION['info']['department'] = $department;
                $_SESSION['info']['empStatus'] = $empStatus;
                $_SESSION['info']['endOfPro'] = $endOfPro;            
                $_SESSION['info']['proDate'] = $proDate; 
                $_SESSION['info']['reason'] = $reason;
                $_SESSION['info']['award'] = $award;
                $_SESSION['info']['disciplinary'] = $disciplinary;

                header("Location: form2.php");
            }
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 1</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body style="background: #DFDFDF;">
    <?php include "form_header.php"; ?>
    <div class="container">
        <form class="border shadow p-3 rounded" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="margin-top:100px; background: #FFFFFF;">
            <header class="display-6 text-center mb-3"> Registration Form</header>

            <div class="row">

                <span class="mb-3 fs-4">Basic Info:</span>

                <div class="form-label mb-3">
                    <p><span class="error">* required field</span></p>
                </div>

                <div class="col-md-3 form-group">
                    <label for="empName" class="form-label bg-light">Full Name</label><span class="error">*</span>
                    <input type="text" class="form-control text-muted" name="empName" value="<?= isset($_SESSION['info']['empName']) ? $_SESSION['info']['empName'] : '' ?>">
                    <span class="error"><?php echo $empNameErr;?></span>
                </div>

                <div class="col-md-3 form-group">
                    <label for="nickName" class="form-label bg-light">Nick Name</label>
                    <input type="text" class="form-control text-muted" name="nickName" value="<?php isset($_SESSION['info']['nickName']) ? $_SESSION['info']['nickName'] : '' ?>">
                    <span class="error"><?php echo $nickNameErr;?></span>
                </div>

                <div class="col-md-3 form-group">
                    <label for="empIdNo" class="form-label bg-light">Employee ID No.</label><span class="error">*</span>
                    <input type="text" class="form-control text-muted" name="empIdNo" value="<?php isset($_SESSION['info']['empIdNo']) ? $_SESSION['info']['empIdNo'] : '' ?>">
                    <span class="error"><?php echo $empIdNoErr;?></span>
                </div>
                
                <div class="col-md-3 form-group">
                    <label for="gender" class="form-label bg-light">Gender</label><span class="error">*</span>
                    <select name="gender" id="" class="form-select text-muted">
                        <option value=""> -- select -- </option>
                        <option value="male"
                        <?php 
                            if(isset($_SESSION['info']['gender'])){
                            if($_SESSION['info']['gender'] == "male"){
                            ?> 
                            selected="selected" 
                        <?php } }?>
                        >Male</option>
                        <option value="female"
                        <?php 
                            if(isset($_SESSION['info']['gender'])){
                            if($_SESSION['info']['gender'] == "female"){
                            ?> 
                            selected="selected" 
                        <?php } }?>
                        >Female</option>
                        <option value="notmention"
                        <?php 
                            if(isset($_SESSION['info']['gender'])){
                            if($_SESSION['info']['gender'] == "notmention"){
                            ?> 
                            selected="selected" 
                        <?php } }?>
                        >NotMention</option>
                    </select>
                    <span class="error"><?php echo $genderErr;?></span>
                </div>
            </div>
            <div class="row mt-3">
                
                <div class="col-md-3 form-group">
                    <label for="nrc" class="form-label bg-light">National Card ID or Passport No.</label><span class="error">*</span>
                    <input type="text" class="form-control text-muted" name="nrc" value="<?php isset($_SESSION['info']['nrc']) ? $_SESSION['info']['nrc'] : '' ?>">
                    <span class="error"><?php echo $nrcErr;?></span>
                </div>

                <div class="col-md-3 form-group">
                    <label for="dob" class="form-label bg-light">Date of Birth</label><span class="error">*</span>
                    <input type="date" class="form-control text-muted" name="dob" value="<?php isset($_SESSION['info']['doB']) ? $_SESSION['info']['doB'] : '' ?>">
                    <span class="error"><?php echo $birthdayErr;?></span>
                </div>

                <div class="col-md-3 form-group">
                    <label for="religion" class="form-label bg-light">Religion</label>
                    <input type="text" class="form-control text-muted" name="religion" value="<?php isset($_SESSION['info']['religion']) ? $_SESSION['info']['religion'] : '' ?>">
                    <span class="error"><?php echo $religionErr;?></span>
                </div>

                <div class="col-md-3 form-group">
                    <label for="nationality" class="form-label bg-light">Nationality</label><span class="error">*</span>
                    <input type="text" class="form-control text-muted" name="nationality" value="<?php isset($_SESSION['info']['nationality']) ? $_SESSION['info']['nationality'] : '' ?>">
                    <span class="error"><?php echo $nationalityErr;?></span>
                </div>

            </div>
            <hr class="mt-4">
            <div class="row mt-3">
                
                <div class="col-md-3 form-group">
                    <label for="hiredate" class="form-label bg-light">Hire Date</label><span class="error">*</span>
                    <input type="date" class="form-control text-muted" name="hiredate" value="<?php isset($_SESSION['info']['hireDate']) ? $_SESSION['info']['hireDate'] : '' ?>">
                    <span class="error"><?php echo $hireDateErr;?></span>
                </div>

                <div class="col-md-3 form-group">
                    <label for="endservice" class="form-label bg-light">End of Contract</label><span class="error">*</span>
                    <input type="date" class="form-control text-muted" name="endservice" value="<?php isset($_SESSION['info']['endService']) ? $_SESSION['info']['endService'] : '' ?>">
                    <span class="error"><?php echo $endServiceErr;?></span>
                </div>

                <div class="col-md-3 form-group">
                    <label for="position" class="form-label bg-light">Position</label><span class="error">*</span>
                    <input type="text" class="form-control text-muted" name="position" value="<?php isset($_SESSION['info']['position']) ? $_SESSION['info']['position'] : '' ?>">
                    <span class="error"><?php echo $positionErr;?></span>
                </div>

                <div class="col-md-3 form-group">
                    <label for="department" class="form-label bg-light">Department</label><span class="error">*</span>
                    <select name="department" id="" class="form-select text-muted">
                        <option value=""> -- select -- </option>
                        <option value="hr"
                        <?php 
                        if(isset($_SESSION['info']['department'])){
                        if($_SESSION['info']['department'] == "HR"){
                        ?> 
                        selected="selected" 
                        <?php } }?>
                        >HR</option>
                        <option value="finance"
                        <?php 
                        if(isset($_SESSION['info']['department'])){
                        if($_SESSION['info']['department'] == "Finance"){
                        ?> 
                        selected="selected" 
                        <?php } }?>
                        >Finance</option>
                        <option value="development"
                        <?php 
                        if(isset($_SESSION['info']['department'])){
                        if($_SESSION['info']['department'] == "Development"){
                        ?> 
                        selected="selected" 
                        <?php } }?>
                        >Development</option>
                    </select>
                    <span class="error"><?php echo $departmentErr;?></span>
                </div>

            </div>
            <div class="row mt-3">

                <div class="col-md-3 form-group">
                    <label for="status" class="form-label bg-light">Status</label><span class="error">*</span>
                    <select name="status" id="" class="form-select text-muted">
                        <option value=""> -- select -- </option>
                        <option value="serving"
                        <?php 
                        if(isset($_SESSION['info']['empStatus'])){
                        if($_SESSION['info']['empStatus'] == "serving"){
                        ?> 
                        selected="selected" 
                        <?php } }?>
                        >Serving</option>
                        <option value="retired"
                        <?php 
                        if(isset($_SESSION['info']['empStatus'])){
                        if($_SESSION['info']['empStatus'] == "retired"){
                        ?> 
                        selected="selected" 
                        <?php } }?> 
                        >Retired</option>
                        <option value="resign"
                        <?php 
                        if(isset($_SESSION['info']['empStatus'])){
                        if($_SESSION['info']['empStatus'] == "resign"){
                        ?> 
                        selected="selected" 
                        <?php } }?> 
                        >Resign</option>
                    </select>
                    <span class="error"><?php echo $empStatusErr;?></span>
                </div>

                <div class="col-md-3 form-group ">
                    <label for="endOfPro" class="form-label bg-light">End of Probation</label>
                    <input type="date" class="form-control text-muted" name="endOfPro" value="<?php isset($_SESSION['info']['endOfPro']) ? $_SESSION['info']['endOfPro'] : '' ?>">
                </div>
                
                <div class="col-md-3 form-group ">
                    <label for="prodate" class="form-label bg-light">Final Promotion Date</label>
                    <input type="date" class="form-control text-muted" name="prodate" value="<?php isset($_SESSION['info']['proDate']) ? $_SESSION['info']['proDate'] : '' ?>">
                </div>

            </div>
            <hr class="mt-4">   
            <div class="row mt-3">
                <div class="col-md-4 form-group ">
                    <label for="reason" class="form-label bg-light">Terminated Reason</label>
                    <textarea class="form-control text-muted" name="reason"><?php isset($_SESSION['info']['reason']) ? $_SESSION['info']['reason'] : '' ?></textarea>
                </div>

                <div class=" col-md-4 form-group">
                    <label for="award" class="form-label bg-light">Award [Year, Title]</label>
                    <textarea class="form-control text-muted" name="award"> <?php isset($_SESSION['info']['award']) ? $_SESSION['info']['award'] : '' ?></textarea>
                </div>

                <div class=" col-md-4 form-group">
                    <label for="disciplinary" class="form-label bg-light">Disciplinary Action [Date, Violation]</label>
                    <textarea class="form-control text-muted" name="disciplinary"> <?php isset($_SESSION['info']['disciplinary']) ? $_SESSION['info']['disciplinary'] : '' ?> </textarea>
                </div>  

            </div>
            <div class="row mt-4 mb-3 ">
                <div class="col-md-12 d-flex justify-content-between">
                    <a href="readForm.php" class="btn btn-success" role="button" aria-pressed="true">View</a>
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