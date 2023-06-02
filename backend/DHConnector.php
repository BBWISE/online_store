<?php
function connectToDB(){
  
    return new mysqli("localhost:3306","root","B.blessing2","todo_app");
}
?>