<?php
session_start();
require_once"dbConnector.php";
require_once"process.php";

$connect = connectToDB();
if(isset($_POST)){

    $password = htmlspecialchars($_POST['passwordLogin']);

    if(exist($_POST['emailLogin'])){
        //echo "<br />yes<br />". $userDetails1['id']."<br />";
        if(proceed($_POST['emailLogin'], $password)){
            //$userDetails = proceed($_POST['emailLogin'],$password);

            $_SESSION['EMAIL'] = $_POST['emailLogin'];
            //var_dump($_SESSION);
            header("location: ../dashboard.php");
        }
        else{
            $_SESSION['ERROR'] = "Invalid credentials";
            header("location: ../index.php");
        }

    }
    else{
        $_SESSION['ERROR'] = "The email ".$_POST['emailLogin']." does not exist.";
        header("location: ../index.php");
    }

}
/*function proceed($email,$password){
    $password2 = password_hash($password, PASSWORD_DEFAULT);
    //echo $email."<br />".$password;
    $sql = "SELECT id, fName, lName FROM `users` WHERE `email`='$email' AND `password`='$password'";

    global $connect;
    $result = $connect -> query($sql);
    if($result==true){
        if ($result->num_rows > 0) {

            $userDetails1 = $result->fetch_assoc();
            $_SESSION['fName'] = $userDetails1['fName'];
            $_SESSION['lName']= $userDetails1['lName'];
            $_SESSION['id']= $userDetails1['id'];

            return true;
        }
        else{

            return false;
        }
    }
    else{

        return false;
    }

}
function exist($email){

    $sql = "SELECT `id` FROM `users` WHERE `email`='$email'";

    global $connect;
    $result = $connect -> query($sql);

    if ($result->num_rows > 0) {
        //global $userDetails1;
        //$userDetails1 = $result->fetch_assoc();
        return true;
    }
    else{
        return false;
    }

}*/
?>