<?php

session_start();
if (!isset($_SESSION["userLoged"])) {
    header("location: login_register/register_layout.view.php");
    die();
};

?>


<h1>Hello world</h1>