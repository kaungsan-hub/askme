<?php
    session_start();
    if(isset($_SESSION["id"]) == true){
        logout();
    }
    function logout(){
    session_destroy();
    header("location: index.html");
    }
?>