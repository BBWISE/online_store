<?php

require_once "tasks handler/RegisterUser.php";
require_once "tasks handler/UserLogin.php";
require_once "validator/EmailValidator.php";
require_once "validator/PasswordValidator.php";
require_once "validator/NameValidator.php";
/*
//$_POST['name'] = "BAYODE BLESSING";
$_POST['password'] = "123456789";
$_POST['email'] = "BLESSING.BAYODE@ekitidigitalskillacademy.com";
//$_POST['email'] = "ljiljljlj";

*/

if(isset($_POST['name'])){
    // Converting user inputs into an array
    $userDetails = [
        'name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'password'=>$_POST['password']
    ];

    // Validating user inputs
    if(validator($userDetails) === null){

        $userReg = new RegisterUser($_POST);
        $userReg->register();

        unset($_POST['password']);
        unset($_POST['email']);
        unset($_POST['name']);
    }
    else{
        $_SESSION['REG_ERROR'] = validator($userDetails);
        unset($_POST['password']);
        unset($_POST['email']);
        unset($_POST['name']);

        header("location: ../registration.php");
    }


}
else{
    if(isset($_POST['email'])){
        // Converting user inputs into an array
        $userDetails = [
            'email'=>$_POST['email'],
            'password'=>$_POST['password']
        ];

        // Validating user inputs
        if(validator2($userDetails) === null){

            $userLogin = new UserLogin();
            $userLogin->login($userDetails);

        }
        else{
            $_SESSION['LoginERROR'] = validator2($userDetails);
            unset($_POST['email']);
            unset($_POST['password']);
            header("location: ../login.php");
        }



    }
}
function validator($userDetails): ?string{

    /**
     * Using the Chain of Responsibility Design Pattern, the required classes
     * are instantiated below and proceeded with the chaining patten.
     *
     */

    $emailValid = new EmailValidator();
    $nameValid = new NameValidator();
    $passValid = new PasswordValidator();

    $emailValid->next($nameValid);
    $nameValid->next($passValid);

    // Validating user inputs
    return $emailValid->validate($userDetails);


}
function validator2($userDetails): ?string{

    /**
     * Using the Chain of Responsibility Design Pattern, the required classes
     * are instantiated below and proceeded with the chaining patten.
     *
     */

    $emailValid = new EmailValidator();
    $passValid = new PasswordValidator();

    $emailValid->next($passValid);

    // Validating user inputs
    return $emailValid->validate($userDetails);

}

/* These syntax below helps initialize the function of
 * adding items into the cart.
 */
if(isset($_GET)){
    $carter = new InsertData();
    $carter->cart($_GET['id'],$_SESSION['ID']);
    header("location: ../index.php");
}


?>