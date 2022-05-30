<?php
/**
 * @global $DB
 */

use Bitrix\Main\Engine\Response\Json;
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