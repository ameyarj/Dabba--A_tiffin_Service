<?php

    if(!isset($_SESSION['user']))

    {
        $_SESSION['no-=login-message']="<div class='error text-center'>Please Login First !</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
?>