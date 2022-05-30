<?php

use WheatleyWL\BXIBlockHelpers\IBlockHelper;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

while (ob_get_level()) {
    ob_end_clean();
}

try {
    $iblockId = IBlockHelper::getIBlockIdByCode('study_programs', 'educational_programs');

    $filter = [
        'IBLOCK_ID' => $iblockId,
        'PROPERTY_PROGRAMM' => IBlockHelper::getEnumIdByXmlId($_POST['program'], 'PROGRAMM', $iblockId),
    ];
    $select = [
        'ID',
        'IBLOCK_ID',
        'PROPERTY_PROGRAMM',
        'NAME',
    ];
    $programs = CIBlockElement::GetList([], $filter, false, false, $select);
    while ($program = $programs->Fetch()) {
        $data[$program['ID']] = $program['NAME'];
    }
    $response = new \Bitrix\Main\Engine\Response\Json();
    $response->setData($data);
    $response->setStatus(200);
    $response->send();
} catch (\Throwable $t) {
    echo $t->getMessage();
    echo $t->getTraceAsString();
}