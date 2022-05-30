<?php

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use WheatleyWL\BXIBlockHelpers\IBlockHelper;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

while (ob_get_level()) {
    ob_end_clean();
}
function downloadFile($filePath)
{
    if(file_exists($filePath)) {
        while(ob_get_level()) {
            ob_end_clean();
        }

        $info = new SplFileInfo(basename($filePath));

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $info->getFileName());
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    }

    throw new Exception('Unable to generate file.');
}
try {
    $periods = explode('-', $_GET['period']);
    $data = [
        'start' => $periods[0],
        'end' => $periods[1],
    ];
    $iblockId = IBlockHelper::getIBlockIdByCode('study_programs', 'educational_programs');

    $filter = [
        'IBLOCK_ID' => $iblockId,
        'ID' => $_GET['course'],
    ];
    $select = [
        'ID',
        'IBLOCK_ID',
        'PROPERTY_PERIOD',
        'PROPERTY_HOURS',
        'PROPERTY_TYPE',
        'NAME',
    ];
    $program = (CIBlockElement::GetList([], $filter, false, false, $select))->Fetch();
    $data['hours'] = $program['PROPERTY_HOURS_VALUE'];
    $data['name'] = $program['NAME'];
    $data['type'] = $_GET['PERIOD'] == 'development' ? 'повышения квалификации' : 'профессиональной переподготовки';

    $phpWord = new PhpWord();
    $templateProcessor = new TemplateProcessor(__DIR__ . '/../local/templates/main/assets/word/statement.docx');

    $templateProcessor->setValue('PROGRAMM', $data['type']);
    $templateProcessor->setValue('PROGRAMM_NAME', $data['name']);
    $templateProcessor->setValue('PROGRAMM_HOURS', $data['hours']);
    $templateProcessor->setValue('PROGRAMM_START', $data['start']);
    $templateProcessor->setValue('PROGRAMM_END', $data['end']);

    $file =  'Образец заявления' . '.docx';
    $filePath = $_SERVER['DOCUMENT_ROOT'] . '/upload' . '/' . $file;
    $templateProcessor->saveAs($filePath);
    downloadFile($filePath);
} catch (\Throwable $t) {
    echo $t->getMessage();
    echo $t->getTraceAsString();
}