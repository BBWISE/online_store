<?php
/* Importing the ValidatorBlueprint PHP File */
require_once "ValidatorBlueprint.php";

class NameValidator extends Validator{
    function validate($userDetails): ?string{
        if(is_array($userDetails)){ // Checking if the input is an array.
            if(array_key_exists("name",$userDetails )){ // Checking if the name array key exists .
                if(strlen($userDetails['name'])<=50){ // Name lenght must not be more than 20 alphabets.
                    return parent::validate($userDetails);
                }
                else{
                    return "Please input a valid name";
                }
            }
            else{
                return "No name input.";
            }
        }
        else{
            return "The input $userDetails is in wrong format";
        }
    }
}
?>