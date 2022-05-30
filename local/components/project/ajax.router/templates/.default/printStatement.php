<?php

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use WheatleyWL\BXIBlockHelpers\HLHelper;
use WheatleyWL\BXIBlockHelpers\IBlockHelper;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

while (ob_get_level()) {
    ob_end_clean();
}
try {
    $hlHelper = HLHelper::getClassByName('Students');
    $student = $hlHelper::getList([
        'filter' => [
            'ID' => $_GET['id'],
        ]
    ])->fetch();

    $fileInfo = \CFile::GetFileArray($student['UF_STATEMENT']);

    \CFile::ViewByUser(
        $fileInfo,
        ['force_download' => true]
    );
} catch (\Throwable $t) {
    echo $t->getMessage();
    echo $t->getTraceAsString();
}