<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/**
 * @global $APPLICATION
 */

$APPLICATION->IncludeComponent(
    "project:ajax.router",
    "",
    [
        "SEF_FOLDER" => "/ajax/",
        "SEF_MODE" => "Y",
        "SEF_URL_TEMPLATES" =>
            [
                "getCourses" => 'getCourses.php',
                "getPeriods" => 'getPeriods.php',
                "getStatement" => 'getStatement.php',
                "printCard" => 'printCard.php',
                "printStatement" => 'printStatement.php',
                "register" => 'register.php',
                "register_event" => 'register_event.php',
            ],
    ]
); ?>
