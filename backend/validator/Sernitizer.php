<?php
/* This class helps Sernitize the user inputs */

class Sernitizer{

    static function sernitizer($value): string{
        $trimed = trim($value); // Remove white spaces before and after the value.
        $removedHTML = htmlspecialchars($trimed); // Remove any HTML Special Characters
        return $removedHTML; // Returns the sernitized value
    }
}
?>