<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) {
    die();
}

use Bitrix\Main\Localization\Loc as Loc;
Loc::loadMessages(__FILE__);

$arComponentDescription = array(
	'NAME' => Loc::getMessage('REGFORM_DESCRIPTION_NAME'),
	'DESCRIPTION' => Loc::getMessage('REGFORM_DESCRIPTION_DESCRIPTION'),
	'ICON' => '/images/icon.gif',
	'SORT' => 20,
	'PATH' => array(
		'ID' => 'project',
		'NAME' => Loc::getMessage('REGFORM_DESCRIPTION_GROUP'),
		'SORT' => 10,
	),
);

