<?php

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use WheatleyWL\BXIBlockHelpers\HLHelper;
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
    $hlHelper = HLHelper::getClassByName('Students');
    $student = $hlHelper::getList([
        'filter' => [
            'ID' => $_GET['id'],
        ]
    ])->fetch();

    $name = [
      'last_name' => ['A1','A2','A3','A4','A5','A6','A7','A8','A9','AA','AB','AC','AD','AE'],
      'first_name' => ['B1','B2','B3','B4','B5','B6','B7','B8','B9','BA','BB','BC','BD','BE'],
      'middle_name' => ['C1','C2','C3','C4','C5','C6','C7','C8','C9','C10','C11','C12','C13','C14','CX'],
      'birthday' => ['D1','D2','D3','D4','D5','D6','D7','D8'],
    ];
    $education = [
        'Среднее профессиональное – квалифицированный рабочий, служащий' => 'V1',
        'Среднее профессиональное – специалист среднего звена' => 'V2',
        'Среднее профессиональное – студент (обучаюсь)' => 'V3',
        'Высшее профессиональное – бакалавриат' => 'V4',
        'Высшее профессиональное – специалитет' => 'V5',
        'Высшее профессиональное – магистратура' => 'V6',
        'Высшее профессиональное – аспирантура' => 'V7',
        'Высшее профессиональное – докторантура' => 'V8',
        'Высшее профессиональное – студент (обучаюсь)' => 'V9',
    ];
    $fileInfo = \CFile::GetFileArray($student['UF_STATEMENT']);
    $phpWord = new PhpWord();
    $templateProcessor = new TemplateProcessor(__DIR__ . '/../local/templates/main/assets/word/Карточка-заявка.docx');

    $lastName =mb_str_split($student['UF_LAST_NAME']);
    $firstName = mb_str_split($student['UF_NAME']);
    $middlleName = mb_str_split($student['UF_MIDDLE_NAME']);
    $birthday = mb_str_split($student['UF_BIRTHDAY']->format('dmY'));

    foreach ($name['last_name'] as $key => $value){
        $templateProcessor->setValue($value, $lastName[$key]);
    }
    foreach ($name['first_name'] as $key => $value){
        $templateProcessor->setValue($value, $firstName[$key]);
    }
    foreach ($name['middle_name'] as $key => $value){
        $templateProcessor->setValue($value, $middlleName[$key]);
    }
    foreach ($name['birthday'] as $key => $value){
        $templateProcessor->setValue($value, $birthday[$key]);
    }
    foreach ($education as $key => $value){
        if ($key == $student['UF_EDUCATION']){
            $templateProcessor->setValue($value, 'V');
        }else{
            $templateProcessor->setValue($value, '');
        }
    }
    $templateProcessor->setValue('AGE', $student['UF_YEARS']);
    $templateProcessor->setValue('CITIZENSHIP', $student['UF_CITIZENSHIP']);
    $templateProcessor->setValue('EDUCATION_ORGANISATION', $student['UF_CITIZENSHIP']);
    $templateProcessor->setValue('SERIA_DIPLOMA', $student['UF_SERIES']);
    $templateProcessor->setValue('DIPLOMA_DATE', ($student['UF_DIPLOMA_DATE'])->format('d.m.Y'));
    $templateProcessor->setValue('WORKPLACE', $student['UF_WORK_PLACE']);
    $templateProcessor->setValue('AGRARIAN', $student['UF_AGRARIAN']? 'Да': 'Нет');
    $templateProcessor->setValue('POSITION', $student['UF_POSITION']);
    $templateProcessor->setValue('WORK_EXPERIENCE', $student['UF_EXPIRIANCE']);
    $templateProcessor->setValue('HOME_INDEX', $student['UF_ADDRESS']);
    $templateProcessor->setValue('PHONE', $student['UF_PHONE']);
    $templateProcessor->setValue('EMAIL', $student['UF_EMAIL']);
    $templateProcessor->setValue('SNILS', $student['UF_SNILS']);

    $file =  'Карточка-заявка.docx';
    $filePath = $_SERVER['DOCUMENT_ROOT'] . '/upload' . '/' . $file;
    $templateProcessor->saveAs($filePath);

    downloadFile($filePath);
    \CFile::ViewByUser(
        $fileInfo,
        ['force_download' => true]
    );
} catch (\Throwable $t) {
    echo $t->getMessage();
    echo $t->getTraceAsString();
}