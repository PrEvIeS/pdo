<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/**
 * @global $APPLICATION
 */
$APPLICATION->SetTitle("Регистрационная форма");
$APPLICATION->IncludeComponent(
    "project:reg.2030.form",
    "",
    Array(
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "IBLOCK_CODE" => 'study_programs',
        "IBLOCK_TYPE" => 'educational_programs',
    )
);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");