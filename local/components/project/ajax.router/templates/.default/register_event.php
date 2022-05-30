<?php
/**
 * @global $DB
 */

use Bitrix\Main\Engine\Response\Json;
use WheatleyWL\BXIBlockHelpers\HLHelper;
use WheatleyWL\BXIBlockHelpers\IBlockHelper;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

while (ob_get_level()) {
    ob_end_clean();
}
$response = new Json();
$data = [];
function addMembers($members)
{
    $ids = [];

    for ($i = 0; $i < count($members['MEMBER_SURNAME']); $i++) {
        $memberProps = [
            'SURNAME' => $members['MEMBER_SURNAME'][$i],
            'NAME' => $members['MEMBER_NAME'][$i],
            'LAST_NAME' => $members['MEMBER_LAST_NAME'][$i],
            'WORK_PLACE' => $members['MEMBER_WORK_PLACE'][$i],
            'POSITION' => $members['MEMBER_POSITION'][$i],
            'ACADEMIC_DEGREE' => $members['MEMBER_ACADEMIC_DEGREE'][$i],
            'ACADEMIC_TITLE' => $members['MEMBER_ACADEMIC_TITLE'][$i],
        ];
        $member = [
          'IBLOCK_ID' => IBlockHelper::getIBlockIdByCode('members','Applications'),
          'ACTIVE' => 'Y',
          'NAME' => "{$memberProps['SURNAME']}  {$memberProps['NAME']}  {$memberProps['LAST_NAME']}",
          'PROPERTY_VALUES' => $memberProps
        ];

        $ids[] = addEvent($member);
    }
    return $ids;
}

function addEvent($event)
{
    $eb = new CIBlockElement();
    return $eb->Add($event);
}

try {

    $members = [
        'MEMBER_SURNAME' => $_POST['MEMBER_SURNAME'],
        'MEMBER_NAME' => $_POST['MEMBER_NAME'],
        'MEMBER_LAST_NAME' => $_POST['MEMBER_LAST_NAME'],
        'MEMBER_WORK_PLACE' => $_POST['MEMBER_WORK_PLACE'],
        'MEMBER_POSITION' => $_POST['MEMBER_POSITION'],
        'MEMBER_ACADEMIC_DEGREE' => $_POST['MEMBER_ACADEMIC_DEGREE'],
        'MEMBER_ACADEMIC_TITLE' => $_POST['MEMBER_ACADEMIC_TITLE'],
    ];
    $membersIds = addMembers($members);
    $props = [
        'RELATION' => ['VALUE' => $_POST['RELATION']],
        'RELATION_OF_EVENT' => ['VALUE' => $_POST['RELATION_EVENT']],
        'TARGET' => $_POST['TARGET'],
        'TASKS' => $_POST['TASKS'],
        'DESCRIPTION' => $_POST['DESCRIPTION'],
        'RESULT' => $_POST['RESULT'],
        'TYPOLOGY' => ['VALUE' => $_POST['TIPOLOGY']],
        'FUNDING_DESCRIPTION' => $_POST['FUNDING_DESCRIPTION'],
        'MEMBERS' => $membersIds,
        'MTO' => $_FILES['MTO'],
        'FUNDING' => $_FILES['FUNDING'],
        'DATE' => $_POST['DATE'],
        'PROJECT_INITIATOR' => $_POST['PROJECT_INITIATOR'],
        'TK_OWNER' => $membersIds[0],
    ];
    $event = [
        'IBLOCK_ID' => IBlockHelper::getIBlockIdByCode('applications', 'Applications'),
        'NAME' => $_POST['NAME'],
        'PROPERTY_VALUES' => $props,
        'ACTIVE' => 'Y'
    ];

    $eventId = addEvent($event);
    echo '<pre>', print_r($event, true), '</pre>';
    die();
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