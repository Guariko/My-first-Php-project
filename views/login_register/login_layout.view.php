<?php

session_start();

if (isset($_SESSION["userLoged"])) {
    header("location: ../home.view.php");
};

$model = "Log-in";
$modelStyles = "../../css/register.login.styles.css";

include("../head_body.view.php/head.view.php");
require_once("../../configs/view.classes.php");
require_once("../../configs/functions.php");


$log_in_form = new Form();

/* TODO: FORM INFORMATIONS start */

$amountOfForms = 1;

$header = ["header" =>  "log-in", "h" => "h1", "class" => "register__login__header"];

$inputs = [
    "amount" => 2,
    "inputData" => [
        "class" => "", "types" => ["email", "password"],
        "contents" => ["email", "password"],
        "names" => ["userEmail", "userPassword"]
    ],
    "divClass" => "inputs__container"
];

$labelClass = "";

$buttons = [
    "class" => "button", "amount" => 2, "contents" => ["log-in", "register"], "buttonsContainerClass" => "buttons__container",
    "buttonsName" => ["login", "register"], "buttonsType" => ["submit", "submit"]
];
$method = "POST";

$formClass = "register__login";

$formContainerClass = "register__login__container";

/* FIXME: Form informations end */

$userAdministration = new UserAdministration("login_register_data/users_account.json");

?>

<main class="main">

    <?php

    $log_in_form->drawForm(
        $amountOfForms,
        $header,
        $inputs,
        $labelClass,
        $buttons,
        $method,
        $formClass,
        $formContainerClass
    );

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
        $userEmail = $_POST["userEmail"];
        $userPassword = $_POST["userPassword"];
        $userExists = $userAdministration->searchIfUserExists($userEmail, $userPassword);

        if ($userExists) {
            $_SESSION["userEmail"] = $userEmail;
            $_SESSION["userPassword"] = $userPassword;
            $_SESSION["userLoged"] = true;
            unset($userEmail);
            unset($userPassword);
            header("location: ../home.view.php");
            die();
        };

        unset($userEmail);
        unset($userPassword);
    };

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register"])) {
        header("location: register_layout.view.php");
    };

    ?>

</main>


<?php

include("../head_body.view.php/body.view.php");
