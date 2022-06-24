<?php

session_start();
if (!isset($_SESSION["userLoged"])) {
    header("location: login_register/register_layout.view.php");
    die();
};

?>


<h1>Hello world</h1>

<form action="" method="POST">
    <button type="submit" name="log-out">log out</button>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["log-out"])) {
        session_unset();
        session_destroy();
        header("location: login_register/register_layout.view.php");
        die();
    };
};
