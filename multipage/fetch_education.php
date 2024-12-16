<?php
    session_start();
    include "../php/db_com.php";

    if(isset($_SESSION['username']) && isset($_SESSION['id'])){
        if(isset($_SESSION['info']))
        {
            $name = $_SESSION['info']['empName'];
            $empIdNo = $_SESSION['info']['empIdNo'];
        }

        $query = "SELECT * FROM education WHERE empName = '$name'";
        $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .small{
            font-size: 14px;
        }
    </style>
</head>

<body style="background: #DFDFDF;">
        <div class="container">
            <form action='education_update.php' method='post' style='margin-right:7px;'>
                <span style="color:blue;">
                    <h6>Inserted Data:</h6>
                </span>
                <table class="table text-center table-striped table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Name of University or Certificate</th>
                        <th>Major/Degree</th>
                        <th>Begin Date</th>
                        <th>Date of Graduation</th>
                        <th>Place of Issue</th>
                        <th>Type</th>
                        <th>Score</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    $i = 1;
                    $uni = $major = $eduBeginDate = $eduEndDate = $place = $etype = $score = "";
                    while ($row = mysqli_fetch_array($result)) {
                        $uni = $row['uniName'];
                        $major = $row['major'];
                        $eduBeginDate = $row['eduBeginDate'];
                        $eduEndDate = $row['eduEndDate'];
                        $place = $row['place'];
                        $etype = $row['etype'];
                        $score = $row['score'];

                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td><input class='form-control small' type='text' name='uniName[]' value='$uni'></td>";
                        echo "<td><input class='form-control small' type='text' name='major[]' value='$major'></td>";
                        echo "<td><input class='form-control small' type='date' name='eduBeginDate[]' value='$eduBeginDate'></td>";
                        echo "<td><input class='form-control small' type='date' name='eduEndDate[]' value='$eduEndDate'></td>";
                        echo "<td><input class='form-control small' type='text' name='place[]' value='$place'></td>";
                        echo "<td><select contenteditable='true' class='form-select small' name='etype[]'><option value=''>select</option><option value='subject'>Subject</option><option value='language'>Language</option></select></td>";
                        echo "<td><input contenteditable='true' type='number' min='0' max='200' step='0.5' class='small form-control' name='score[]'></td>";
                        echo "<td class='text-start'>" . $row["status"] . "</td>";
                        $eduId = $row['eduId'];
                        echo "<input class='d-none' name='eduId[]' value='$eduId'>";
                        echo "</tr>";
                    }
                    ?>
                    <tr class="small">
                        <td colspan="9">
                            <div class='d-flex justify-content-end'><button class='btn btn-sm btn-warning small' type='submit' name='update' style='margin-right:7px;'>Update</button>
                            <button class='btn btn-sm btn-danger small' type='submit' name='delete'>Delete</button></div>
                        </td>
                    </tr>
                </table>
        </form>
        </div>
    </body>

</html>
<?php
    }else{
        header("Location: ../index.php");
    }
?>