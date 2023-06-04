<?php
session_start();

//Importing the required PHP Files;
require_once "./db codes/GetData.php";


class UserLogin{

    /**
     * This method performs the function of
     * login the user in if the supplied details are
     * correct else rejects.
     *
     * @param mixed $userDetails
     * @return void
     */
    public function login($userDetails){
        $getData = new GetData();
        $userInfo = $getData->user($userDetails);
        //var_dump($userInfo);
        if($userInfo != null){

            $_SESSION['ID'] = $userInfo['id'];
            $_SESSION['EMAIL'] = $userInfo['email'];
            $_SESSION['NAME'] = $userInfo['name'];

            unset($_POST);

            $_SESSION['PRODUCTS'] = $getData->product();


            header("location: ../index.php");

        }
        else{

            unset($_POST);
            $_SESSION['LoginERROR'] = "Invalid login details !!";
            header("location: ../login.php");
        }

        return ;
    }
}

?>