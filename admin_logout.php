<?php
    session_start();
    if(isset($_SESSION["a_email"]) == true){
        logout();
    }
    function logout(){
    session_destroy();
    header("location: index.html");
    }
?>