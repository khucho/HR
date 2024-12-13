<?php
    session_start();
    include "../php/db_com.php";
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
                    <input type="text" class="form-control text-muted" name="empName" value="">
                </div>

                <div class="col-md-3 form-group">
                    <label for="nickName" class="form-label bg-light">Nick Name</label>
                    <input type="text" class="form-control text-muted" name="nickName" value="">
                </div>

                <div class="col-md-3 form-group">
                    <label for="empIdNo" class="form-label bg-light">Employee ID No.</label><span class="error">*</span>
                    <input type="text" class="form-control text-muted" name="empIdNo" value="">
                </div>
                
                <div class="col-md-3 form-group">
                    <label for="gender" class="form-label bg-light">Gender</label><span class="error">*</span>
                    <select name="gender" id="" class="form-select text-muted">
                        <option value=""> -- select -- </option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="notmention">NotMention</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                
                <div class="col-md-3 form-group">
                    <label for="nrc" class="form-label bg-light">National Card ID or Passport No.</label><span class="error">*</span>
                    <input type="text" class="form-control text-muted" name="nrc" value="">
                </div>

                <div class="col-md-3 form-group">
                    <label for="dob" class="form-label bg-light">Date of Birth</label><span class="error">*</span>
                    <input type="text" class="form-control text-muted" name="dob" value="">
                </div>

                <div class="col-md-3 form-group">
                    <label for="religion" class="form-label bg-light">Religion</label>
                    <input type="text" class="form-control text-muted" name="religion" value="">
                </div>

                <div class="col-md-3 form-group">
                    <label for="nationality" class="form-label bg-light">Nationality</label><span class="error">*</span>
                    <input type="text" class="form-control text-muted" name="nationality" value="">
                </div>

            </div>
            <hr class="mt-4">
            <div class="row mt-3">
                
                <div class="col-md-3 form-group">
                    <label for="hiredate" class="form-label bg-light">Hire Date</label><span class="error">*</span>
                    <input type="date" class="form-control text-muted" name="hiredate" value="">
                </div>

                <div class="col-md-3 form-group">
                    <label for="endservice" class="form-label bg-light">End of Contract</label><span class="error">*</span>
                    <input type="date" class="form-control text-muted" name="endservice" value="">
                </div>

                <div class="col-md-3 form-group">
                    <label for="position" class="form-label bg-light">Position</label><span class="error">*</span>
                    <input type="text" class="form-control text-muted" name="position" value="">
                </div>

                <div class="col-md-3 form-group">
                    <label for="department" class="form-label bg-light">Department</label><span class="error">*</span>
                    <select name="department" id="" class="form-select text-muted">
                        <option value=""> -- select -- </option>
                        <option value="hr">HR</option>
                        <option value="finance">Finance</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>

            </div>
            <div class="row mt-3">

                <div class="col-md-3 form-group">
                    <label for="status" class="form-label bg-light">Status</label><span class="error">*</span>
                    <select name="status" id="" class="form-select text-muted">
                        <option value=""> -- select -- </option>
                        <option value="serving">Serving</option>
                        <option value="Retired">Retired</option>
                        <option value="resign">Resign</option>
                    </select>
                </div>

                <div class="col-md-3 form-group ">
                    <label for="endofPro" class="form-label bg-light">End of Probation</label>
                    <input type="date" class="form-control text-muted" name="endOfPro" value="">
                </div>
                
                <div class="col-md-3 form-group ">
                    <label for="prodate" class="form-label bg-light">Final Promotion Date</label>
                    <input type="date" class="form-control text-muted" name="prodate" value="">
                </div>

            </div>
            <hr class="mt-4">   
            <div class="row mt-3">
                <div class="col-md-4 form-group ">
                    <label for="reason" class="form-label bg-light">Terminated Reason</label>
                    <textarea class="form-control text-muted" name="reason"></textarea>
                </div>

                <div class=" col-md-4 form-group">
                    <label for="award" class="form-label bg-light">Award [Year, Title]</label>
                    <textarea class="form-control text-muted" name="award"> </textarea>
                </div>

                <div class=" col-md-4 form-group">
                    <label for="disciplinary" class="form-label bg-light">Disciplinary Action [Date, Violation]</label>
                    <textarea class="form-control text-muted" name="disciplinary">  </textarea>
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