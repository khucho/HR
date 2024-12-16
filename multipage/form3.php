<?php
    session_start();
    include "../php/db_com.php";

    if(isset($_SESSION['username']) && isset($_SESSION['id']))
    {

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu Background:</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body style="background: #DFDFDF;">
    <?php include "form_header.php"; ?>
    <div class="container">
        <form class="border shadow p-3 rounded" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="margin-top:100px; background: #FFFFFF;">
            <header class="display-6 text-center mb-3"> Registration Form</header>

            <div class="row">
                <span class="mb-3 fs-4">Education Background</span>
            </div>

            <?php
            if(isset($_GET['success'])) { ?>
            <div class="alert alert-success col-4" role="alert">
            <?php echo $_GET['success']; ?>
            </div>
            <?php  }  ?>

            <?php
            if(isset($_GET['error'])) { ?>
            <div class="alert alert-danger col-4" role="alert">
            <?php echo $_GET['error']; ?>
            </div>
            <?php  }  ?>
            
            <div class="row mt-3">
                <table class="table text-center table-striped table-bordered" id="crud_table">
                    <tr>
                        <th>Name of University or Certificate<span style="color:red;">*</span></th>
                        <th>Major/Degree</th>
                        <th>Begin Date<span style="color:red;">*</span></th>
                        <th>Date of Graduation<span style="color:red;">*</span></th>
                        <th>Place of Issue</th>
                        <th>Type</th>
                        <th>Score</th>
                        <th><button type="button" name="add" id="add" class="btn btn-success">+</button></th>
                    </tr>
                    <tr>
                        <td><input  type='text' class='uniName form-control' name='uniName'></td>
                        <td><input  type='text' class='major form-control' name='major'></td>
                        <td><input type='date' class ='beginDate form-control' name='beginDate' /></td>
                        <td><input type='date' class ='endDate form-control' name='endDate' /></td>
                        <td><input  type='text' class='place form-control' name='place'></td>
                        <td><select  class='form-select etype' name='etype'><option value=''> -- select -- </option><option value='subject'>Subject</option><option value='language'>Language</option></select></td>
                        <td><input  type='number' min='0' max='200' step='0.5' class='score form-control' name='score'></td>
                        <td><button type='button' name='remove' data-row='row1' class='btn btn-danger btn-xs remove'>-</button></td>
                    </tr>
                </table>
            </div>
            <div class="row">
                <div id="inserted_item_data" class="mt-2"></div>
            </div>
            
            <div class="row mt-4 mb-3 ">
                <div class="col-md-12 d-flex justify-content-between">
                    <a href="form2.php" class="btn btn-primary" role="button">Previous</a>
                    <button type="button" class="btn btn-primary" name = "save" id="save"> 
                        Next
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            var count = 1;
            $('#add').click(function(){
                count = count + 1 ;
                var html_code = "<tr id='row"+count+"'>";
                html_code += "<td><input type='text' class='uniName form-control' name='uniName'></td>";
                html_code += "<td><input type='text' class='major form-control' name='major' value=''></td>";
                html_code += "<td><input type='date' class ='beginDate form-control' name='beginDate' /></td>";
                html_code += "<td><input type='date' class ='endDate form-control' name='endDate' /></td>";
                html_code += "<td><input type='text' class='place form-control' name='place'></td>";
                html_code += "<td><select  class='form-select etype' name='etype'><option value=''> -- select -- </option><option value='subject'>Subject</option><option value='language'>Language</option></select></td>";
                html_code += "<td><input  type='number' min='0' max='200' step='0.5' class='score form-control' name='score'></td>";
                html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
                html_code += "</tr>";  
                $('#crud_table').append(html_code);
            });

            $(document).on('click', '.remove', function(){
                $(this).parent().parent().remove();
            });

            $('#save').click(function(){
                var uniName = [] ;
                var major = [];
                var beginDate = [];
                var endDate = [];
                var place = [];
                var etype = [];
                var score = [];
                var error = '';

                $('.uniName').each(function(){
                    uniName.push($(this).val());
                })
                
                $('.major').each(function(){
                    major.push($(this).val());
                })

                $('.beginDate').each(function(){
                    beginDate.push($(this).val());
                })

                $('.endDate').each(function(){
                    endDate.push($(this).val());
                })

                $('.place').each(function(){
                    place.push($(this).val());
                })

                $('.etype').each(function(){
                    etype.push($(this).val());
                })

                $('.score').each(function(){
                    score.push($(this).val());
                })


                $.ajax({
                    url: "education_insert.php",
                    method: "POST",
                    data: {
                        uniName: uniName,
                        major: major,
                        beginDate: beginDate,
                        endDate: endDate,
                        place: place,
                        etype: etype,
                        score: score
                    },
                    success: function(data){
                        alert(data);
                        fetch_send_data();
                    }
                });

            });
            function fetch_send_data(){
                $.ajax({
                    url:"form4.php",
                    method:"POST",
                        success:function(data){
                            window.location = "form4.php";
                            
                        }
                })
            }
            function fetch_item_data(){
                $.ajax({
                    url:"fetch_education.php", 
                    method:"POST",
                        success:function(data){
                            $('#inserted_item_data').html(data);
                        }
                })
            }
            fetch_item_data();
        })
    </script>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
    }else{
        header("Location: ../index.php");
    }
?>