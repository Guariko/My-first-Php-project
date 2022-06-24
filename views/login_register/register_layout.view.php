<?php

session_start();

if (isset($_SESSION["userLoged"])) {
    header("location: ../home.view.php ");
    die();
};

require_once("../../configs/view.classes.php");
require_once("../../configs/functions.php");

$model = "Register";
$modelStyles = "../../css/register.login.styles.css";

include("../head_body.view.php/head.view.php");

$forms = new Form();

// TODO: Draw form informations //
// $amount = 1,
// $header = ["header" =>  "my form", "h" => "h1"],
// $inputs = [
//     "amount" => 1,
//     "inputData" => ["class" => "", "types" => ["text"], "contents" => ["my input"], "names" => [""]],
//     "divClass" => ""

// ],
// $labelClass = "",
// $buttons = ["class" => "", "amount" => 1, "contents" => ["my button"], "buttonsContainerClass" => ""],
// $method = "POST",
// $formClass = "",
// $formContainerClass = "" 
// FIXME: Draw form informations end //

$amountOfForms = 1;

$header = ["header" =>  "register", "h" => "h1", "class" => "register__login__header"];

$inputs = [
    "amount" => 3,
    "inputData" => [
        "class" => "", "types" => ["text", "email", "password"],
        "contents" => ["nick name", "email", "password"],
        "names" => ["userName", "userEmail", "userPassword"]
    ],
    "divClass" => "inputs__container"
];

$labelClass = "";

$buttons = ["class" => "button", "amount" => 1, "contents" => ["register"], "buttonsContainerClass" => ""];

$method = "POST";

$formClass = "register__login";

$formContainerClass = "register__login__container";



?>

<main class="main">
    <?php

    $forms->drawForm($amountOfForms, $header, $inputs, $labelClass, $buttons, $method, $formClass, $formContainerClass);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $userMinimunCharacterPassword = 8;
        $userMinimunCharacterName = 2;

        $userInformations = [
            "userName" => $_POST["userName"],
            "userEmail" => filter_input(INPUT_POST, "userEmail", FILTER_VALIDATE_EMAIL),
            "userPassword" => $_POST["userPassword"]
        ];

        if (
            $_POST["userEmail"] !== false && strlen($userInformations["userPassword"]) >= $userMinimunCharacterPassword
            && $userInformations["userName"] >= $userMinimunCharacterName
        ) {
            appendUserInformationToJson("login_register_data/users_account.json", $userInformations);
            unset($userInformations);
            $_SESSION["email"] = $userInformations["userEmail"];
            $_SESSION["userName"] = $userInformations["userName"];
            $_SESSION["userPassword"] = $userInformations["userPassword"];
            $_SESSION["userLoged"] = true;
            header("location: ../home.view.php");
            die();
        };


        unset($userInformations);
    };

    ?>
</main>


<?php


$jsLink = "../../javaScript/register_login.js";

include("../head_body.view.php/body.view.php");
