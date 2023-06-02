<?php
session_start();

require_once "dbConnector.php";
require_once "process.php";

$connect = connectToDB();

if(isset($_POST)){
    $postedPost = file_get_contents('php://input');

    $details = json_decode($postedPost, true);

    if($details != null){

        if(notExist(json_encode($details['email']))){
            //echo json_encode($details['lName'])." ".json_encode($details['password']).", ".json_encode($details['tel']);
            //echo "here";

            if(addNewUser($details['fName'],$details['lName'],$details['email'],$details['password'],$details['tel'])){

                $_SESSION['fName']= $details['fName'];
                $_SESSION['lName']= $details['lName'];
                $_SESSION['EMAIL']= $details['email'];

                echo "yes";
                //header("location: ../dashboard.php");
            }


        }
    }
    else{
        echo "no";
        /*
        $_SESSION['ERROR'] = "The email ".$details['email']." already exist.";
        header("location: ../register.php");*/
    }

}

function notExist($email){

    $sql = "SELECT `id` FROM `users` WHERE `email`='$email'";

    global $connect;
    $result = $connect -> query($sql);

    if ($result->num_rows > 0) {
        /*$userDetails = $result->fetch_assoc();*/
        $connect->close();
        return false;
    }
    else{
        return true;
    }

}
?>