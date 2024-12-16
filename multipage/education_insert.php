<?php
    session_start();
    include "../php/db_com.php";

    if(isset($_SESSION['username']) && isset($_SESSION['id'])){
        if(isset($_POST['uniName']))
        {
            $uniName = $_POST["uniName"];
            $etype = $_POST["etype"];
            $major = $_POST["major"];
            $place = $_POST["place"];
            $score = $_POST["score"];
            $beginDate = $_POST["beginDate"];
            $endDate = $_POST["endDate"];
            $status = 'temp';
            $query = '';

            if(isset($_SESSION['info']))
            {
                $name = $_SESSION['info']['empName'];
                $empIdNo = $_SESSION['info']['empIdNo'];
            }

            for($count = 0; $count < count($uniName); $count++)
            {
                $uni1 = mysqli_real_escape_string($conn, $uniName[$count]);
                $major1 = mysqli_real_escape_string($conn, $major[$count]);  
                $beginDate1 = mysqli_real_escape_string($conn, $beginDate[$count]);
                $endDate1 = mysqli_real_escape_string($conn, $endDate[$count]);   
                $place1 = mysqli_real_escape_string($conn, $place[$count]);       
                $etype1 = mysqli_real_escape_string($conn, $etype[$count]);
                $score1 = mysqli_real_escape_string($conn, $score[$count]);
    
                if($score1 == ''){
                    $score1 = 0;
                } 

                if($uni1 != ''){

                    $query .= 'INSERT INTO education(empIdNo, empName, uniName, major, eduBeginDate, eduEndDate, place, etype, score, status) VALUES("'.$empIdNo.'", "'.$name.'", "'.$uni1.'", "'.$major1.'", "'.$beginDate1.'", "'.$endDate1.'", "'.$place1.'", "'.$etype1.'", "'.$score1.'", "'.$status.'");';          
                }
            }

            
            if($query != ''){
                    
                if(mysqli_multi_query($conn, $query)){
                    echo 'Users Data Inserted successfully';
                }else{
                    echo 'Error';
                }
            }else{
                echo 'All Fields are Required';
            }    
        }
    }
    else{
        header("Location: ../index.php");
    }
?>