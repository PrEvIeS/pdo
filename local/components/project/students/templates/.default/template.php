<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * variables
 * @var array $arResult
 * @var array $arParams
 * @global $APPLICATION
 * @global $USER
 */

use \Bitrix\Main\Localization\Loc as Loc;

Loc::loadMessages(__FILE__);
if (!$USER->IsAuthorized()){
    LocalRedirect('/');
}
?>
<div class="form-wrap">
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">№</th>
        <th scope="col">Подавший заявку</th>
        <th scope="col">Курс</th>
        <th scope="col">Действия</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($arResult['STUDENTS'] as $key => $student):?>
    <tr>
        <th scope="row"><?= $key + 1?></th>
        <td><?= $student['NAME']?></td>
        <td><?= $student['PROGRAMM']?></td>
        <td><a href="<?= $student['ID']?>" id="printCard">Карточка</a> <a href="<?= $student['ID']?>" id="printStatement">Заявление</a></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
</div>