<?php
require_once "./db codes/InsertData.php";
require_once "./db codes/DuplicateExist.php";



class RegisterUser{
    private string $name, $email, $password;
    // A constructor to help assign values into the private variables above.
    public function __construct($userDetails){
        $this->name = $userDetails['name'];
        $this->email = $userDetails['email'];
        $this->password = $userDetails['password'];

    }

    // Returns User's name
    private function getName(): string{
        return $this->name;
    }

    // Returns User's email
    private function getEmail(): string{
        return $this->email;
    }

    // Returns User's Password
    private function getPassword(): string{
        return $this->password;
    }

    // Check if user already exists
    private function existence(){
        $exists = DuplicateExist::exists($this->getEmail(), "user");
        if($exists){
            return true;
        }
        else{

            return false;
        }
    }

    // Register new User
    public function register(){
        if($this->existence()){
            echo "exist";
            $_SESSION['REG_ERROR'] = "The email: ".$this->getEmail()." already exists.";
            header("location: ../registration.php");
        }
        else{
            echo "not exist";
            $userDetails = [
                'name'=>$this->getName(),
                'email'=>$this->getEmail(),
                'password'=>$this->getPassword()
            ];
            $register = new InsertData();
            $register->user($userDetails);
        }

    }
}

?>