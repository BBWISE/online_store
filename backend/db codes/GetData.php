<?php
/* Importing other require PHP Files*/
require_once "DBConnector.php";

// Calling the connectToDB static functioin in the DBConnector class
$connect = DBConnector::connectToDB();

class GetData{
    private string $email, $password;


    /**
     * The below method helps to get all the available
     * products from the product table in the database.
     *
     */
    public function product(){

        // Query the Database
        $sql = "SELECT * FROM `products`";

        global $connect;
        $result = $connect -> query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);// Returns all products.
        }
        else{
            return null;// Returns null if the user does not exists.
        }

    }

    /**
     * The below method helps to get all the available
     * products from the cart table in the database.
     *
     */
    public function cart($user_id){

        // Query the Database
        $sql = "SELECT * FROM `cart` WHERE `user_id`='$user_id'";

        global $connect;
        $result = $connect -> query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);// Returns all products.
        }
        else{
            return null;// Returns null if the user does not exists.
        }

    }



    /**
     * This method helps retrieves the user's informations
     * from the database.
     *
     * @param mixed $userDetails
     * @return mixed
     */
    public function user($userDetails){


        $this->email = $userDetails['email'];
        $this->password= $userDetails['password'];

        // Query the Database
        $sql = "SELECT * FROM `user` WHERE `email`='$this->email' AND `password`='$this->password'";

        global $connect;
        $result = $connect -> query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();// Returns details if user exists.
            //return $result->fetch_all(MYSQLI_ASSOC);
        }
        else{
            return null;// Returns null if the user does not exists.
        }

    }
}

?>