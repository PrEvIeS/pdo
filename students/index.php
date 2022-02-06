<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/**
 * @global $APPLICATION
 */
$APPLICATION->SetTitle("Список студентов");
$APPLICATION->IncludeComponent(
    "project:students",
    "",
    [
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "N",
        "IBLOCK_CODE" => 'study_programs',
        "IBLOCK_TYPE" => 'educational_programs',
    ]
);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>