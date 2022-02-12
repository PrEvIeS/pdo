<?php
/**
 * @global $DB
 */

use Bitrix\Main\Engine\Response\Json;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use WheatleyWL\BXIBlockHelpers\HLHelper;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

while (ob_get_level()) {
    ob_end_clean();
}
$response = new Json();
$data = [];
try {

    if (empty($_FILES['UF_STATEMENT']['name'])) {
        throw new Exception('Не прикреплен файл заявления!');
    }
    if (empty($_FILES['UF_DIPLOMA']['name'])) {
        throw new Exception('Не прикреплен файл диплома!');
    }
    if (empty($_FILES['UF_SNILS_FILE']['name'])) {
        throw new Exception('Не прикреплен файл СНИЛС!');
    }

    $hlHelper = HLHelper::getClassByName('Students');
    $birthDate = new \Bitrix\Main\Type\DateTime($_POST['UF_BIRTHDAY'], 'd.m.Y');
    $diplomaDate = new \Bitrix\Main\Type\DateTime($_POST['UF_DIPLOMA_DATE'], 'd.m.Y');
    $student = [
        'UF_LAST_NAME' => $_POST['UF_LAST_NAME'],
        'UF_NAME' => $_POST['UF_NAME'],
        'UF_MIDDLE_NAME' => $_POST['UF_MIDDLE_NAME'],
        'UF_BIRTHDAY' => $birthDate,
        'UF_YEARS' => $_POST['UF_YEARS'],
        'UF_CITIZENSHIP' => $_POST['UF_CITIZENSHIP'],
        'UF_SNILS' => $_POST['UF_SNILS'],
        'UF_EDUCATION' => $_POST['UF_EDUCATION'],
        'UF_SPECIALITY' => $_POST['UF_SPECIALITY'],
        'UF_SERIES' => $_POST['UF_SERIES'],
        'UF_DIPLOMA_DATE' => $diplomaDate,
        'UF_WORK_PLACE' => $_POST['UF_WORK_PLACE'],
        'UF_AGRARIAN' => (bool)$_POST['UF_AGRARIAN'],
        'UF_POSITION' => $_POST['UF_POSITION'],
        'UF_EXPIRIANCE' => $_POST['UF_EXPIRIANCE'],
        'UF_ADDRESS' => $_POST['UF_ADDRESS'],
        'UF_PHONE' => $_POST['UF_PHONE'],
        'UF_EMAIL' => $_POST['UF_EMAIL'],
        'UF_STATEMENT' => $_FILES['UF_STATEMENT'],
        'UF_DIPLOMA' => $_FILES['UF_DIPLOMA'],
        'UF_SNILS_FILE' => $_FILES['UF_SNILS_FILE'],
        'UF_MARRIAGE' => $_FILES['UF_MARRIAGE'],
        'UF_PROGRAMM' => $_POST['UF_PROGRAMM'],
        'UF_PERIOD' => $_POST['UF_PERIOD'],
    ];
    $name = [
        'last_name' => ['A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'A9', 'AA', 'AB', 'AC', 'AD', 'AE'],
        'first_name' => ['B1', 'B2', 'B3', 'B4', 'B5', 'B6', 'B7', 'B8', 'B9', 'BA', 'BB', 'BC', 'BD', 'BE'],
        'middle_name' => [
            'C1',
            'C2',
            'C3',
            'C4',
            'C5',
            'C6',
            'C7',
            'C8',
            'C9',
            'C10',
            'C11',
            'C12',
            'C13',
            'C14',
            'CX'
        ],
        'birthday' => ['D1', 'D2', 'D3', 'D4', 'D5', 'D6', 'D7', 'D8'],
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

    $lastName = mb_str_split($student['UF_LAST_NAME']);
    $firstName = mb_str_split($student['UF_NAME']);
    $middlleName = mb_str_split($student['UF_MIDDLE_NAME']);
    $birthday = mb_str_split($student['UF_BIRTHDAY']->format('dmY'));

    foreach ($name['last_name'] as $key => $value) {
        $templateProcessor->setValue($value, $lastName[$key]);
    }
    foreach ($name['first_name'] as $key => $value) {
        $templateProcessor->setValue($value, $firstName[$key]);
    }
    foreach ($name['middle_name'] as $key => $value) {
        $templateProcessor->setValue($value, $middlleName[$key]);
    }
    foreach ($name['birthday'] as $key => $value) {
        $templateProcessor->setValue($value, $birthday[$key]);
    }
    foreach ($education as $key => $value) {
        if ($key == $student['UF_EDUCATION']) {
            $templateProcessor->setValue($value, 'V');
        } else {
            $templateProcessor->setValue($value, '');
        }
    }
    $templateProcessor->setValue('AGE', $student['UF_YEARS']);
    $templateProcessor->setValue('CITIZENSHIP', $student['UF_CITIZENSHIP']);
    $templateProcessor->setValue('EDUCATION_ORGANISATION', $student['UF_CITIZENSHIP']);
    $templateProcessor->setValue('SERIA_DIPLOMA', $student['UF_SERIES']);
    $templateProcessor->setValue('DIPLOMA_DATE', ($student['UF_DIPLOMA_DATE'])->format('d.m.Y'));
    $templateProcessor->setValue('WORKPLACE', $student['UF_WORK_PLACE']);
    $templateProcessor->setValue('AGRARIAN', $student['UF_AGRARIAN'] ? 'Да' : 'Нет');
    $templateProcessor->setValue('POSITION', $student['UF_POSITION']);
    $templateProcessor->setValue('WORK_EXPERIENCE', $student['UF_EXPIRIANCE']);
    $templateProcessor->setValue('HOME_INDEX', $student['UF_ADDRESS']);
    $templateProcessor->setValue('PHONE', $student['UF_PHONE']);
    $templateProcessor->setValue('EMAIL', $student['UF_EMAIL']);
    $templateProcessor->setValue('SNILS', $student['UF_SNILS']);

    $file = 'Карточка-заявка.docx';
    $filePath = $_SERVER['DOCUMENT_ROOT'] . '/upload' . '/' . $file;
    $templateProcessor->saveAs($filePath);
    $card = CFile::MakeFileArray($filePath);
    $student['UF_CARD'] = $card;

    $DB->StartTransaction();
    $result = $hlHelper::add($student);

    if ($result->isSuccess()) {
        $DB->Commit();

    } else {
        $DB->Rollback();
        throw new \Exception($result->getErrorMessages());
    }
    $data['success'] = 'true';
    $response->setData($data);
    $response->setStatus(200);

} catch (\Throwable $t) {
    $data['success'] = 'false';
    $data['message'] = $t->getMessage();
    $response->setData($data);
    $response->setStatus(400);
} finally {
    $response->send();
}