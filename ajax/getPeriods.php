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
        'ID' => $_POST['id'],
    ];
    $select = [
        'ID',
        'IBLOCK_ID',
        'PROPERTY_PERIOD',
        'NAME',
    ];
    $periods = CIBlockElement::GetList([], $filter, false, false, $select);
    while ($period = $periods->Fetch()) {
        foreach ($period['PROPERTY_PERIOD_VALUE'] as $item){
            $data[] = $item;
        }

    }
    $response = new \Bitrix\Main\Engine\Response\Json();
    $response->setData($data);
    $response->setStatus(200);
    $response->send();
} catch (\Throwable $t) {
    echo $t->getMessage();
    echo $t->getTraceAsString();
}