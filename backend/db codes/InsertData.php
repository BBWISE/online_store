<?php
/* Importing other require PHP Files*/
require_once "./db codes/DBConnector.php";

// Calling the connectToDB static functioin in the DBConnector class
$connect = DBConnector::connectToDB();

class InsertData{
    private string $name, $email, $password;

    /**
     * The below method helps to send New User's informations
     * into the user table in the database taking an input
     * of array.
     *
     * @param mixed $userDetails
     * @return mixed
     */
    public function user($userDetails){

        $this->name = $userDetails['name'];
        $this->email = $userDetails['email'];
        $this->password= $userDetails['password'];

        $sql = "INSERT INTO `user` (`id`,`name`,`email`,`password`) VALUES(NULL,'$this->name','$this->email','$this->password')";
        echo $sql;
        global $connect;
        return $connect -> query($sql);
    }

    /**
     * The method below helps to send add a new product the
     * cart table in the database taking the product and user
     * id as input.
     *
     * @param mixed $productId
     * @param mixed $userId
     * @return mixed
     */
    public function cart($productId, $userId){

        $sql = "INSERT INTO `cart` (`id`,`product_id`,`user_id`,`status`) VALUES(NULL,'$productId','$userId','0')";
        echo $sql;
        global $connect;
        return $connect -> query($sql);
    }

}

?>