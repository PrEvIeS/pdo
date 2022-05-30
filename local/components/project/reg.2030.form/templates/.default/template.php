<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * variables
 * @var array $arResult
 * @var array $arParams
 * @global $APPLICATION
 */

use \Bitrix\Main\Localization\Loc as Loc;

Loc::loadMessages(__FILE__);
?>
<div class="form-wrap">
    <form class="form" method="post" action="/ajax/register_event.php">
        <div class="form-head">
            <h3>Заявка на рассмотрение Проекта мероприятия Программы развития Кубанского ГАУ на 2021-2030 гг.</h3>
        </div>
        <div class="mb-3">
            <label for="NAME" class="form-label">Наименование мероприятия<sup>*</sup></label>
            <input type="text" class="form-control" id="NAME" maxlength="100" name="NAME" required>
        </div>
        <div class="mb-3">
            <label for="RELATION" class="form-label">Отношение мероприятия к политикам Целевой модели университета в
                соответствии с Программой развития университета на 2021-2030 гг.<sup>*</sup></label>
            <select id="RELATION" class="form-select" name="RELATION" required>
                <option value=""></option>
                <?php foreach ($arResult['RELATIONS'] as $RELATION): ?>
                    <option value="<?= $RELATION['UF_XML_ID'] ?>"><?= $RELATION['UF_NAME'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="RELATION_EVENT" class="form-label">Отношение мероприятия к стратегическому проекту Программы
                развития Кубанского ГАУ на 2021-2030 гг.<sup>*</sup></label>
            <select id="RELATION_EVENT" class="form-select" name="RELATION_EVENT" required>
                <option value=""></option>
                <?php foreach ($arResult['RELATIONS_OF_EVENT'] as $RELATION): ?>
                    <option value="<?= $RELATION['UF_XML_ID'] ?>"><?= $RELATION['UF_NAME'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="TARGET" class="form-label">Цель мероприятия<sup>*</sup></label>
            <textarea class="form-control" name="TARGET" maxlength="150" id="" cols="65" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label for="TASKS" class="form-label">Задачи мероприятия<sup>*</sup></label>
            <textarea class="form-control" name="TASKS" maxlength="150" id="TASKS" cols="65" rows="10" ></textarea>
        </div>
        <div class="mb-3">
            <label for="DESCRIPTION" class="form-label">Аннотация мероприятия (краткое описание основных этапов,
                объекта, сроки, контрольные точки)<sup>*</sup></label>
            <textarea class="form-control" name="DESCRIPTION" maxlength="1000" id="" cols="65" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label for="RESULT" class="form-label">Ожидаемый результат, его уникальность и значение для развития
                университета, социально-экономического развития региона, отрасли<sup>*</sup></label>
            <textarea class="form-control" name="RESULT" id="" maxlength="1000" cols="65" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label for="TIPOLOGY" class="form-label">Типология мероприятия в соответствии в Правилами реализации
                программы стратегического академического лидерства "Приоритет-2030"<sup>*</sup></label>
            <select id="education" class="form-select" name="TIPOLOGY" required>
                <option value=""></option>
                <?php foreach ($arResult['TYPOLOGY'] as $TYPOLOGY): ?>
                    <option value="<?= $TYPOLOGY['UF_XML_ID'] ?>"><?= $TYPOLOGY['UF_NAME'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <span>Скачайте <a download href="<?= $templateFolder . '/docs/Объем финансирования.xlsx' ?>">шаблон «Объем финансирования»</a> (ссылка), заполните и прикрепите в поле «Объем финансирования»</span>
        </div>
        <div class="mb-3">
            <label for="FUNDING" class="form-label">Объем финансирования, руб. <sup>*</sup></label>
            <input class="form-control" name="FUNDING" accept=".xls,.xlsx" type="file">
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="FUNDING_DESCRIPTION" class="form-label">Сумма финансирования проекта, руб.<sup>*</sup></label>
                    <input type="text" class="form-control" name="FUNDING_DESCRIPTION" required>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <span>Скачайте <a download href="<?= $templateFolder . '/docs/МТО.xlsx' ?>">шаблон «МТО»</a> (ссылка), заполните и прикрепите в поле «Материально-техническое обеспечение»</span>
        </div>
        <div class="mb-3">
            <label for="MTO" class="form-label">Материально-техническое обеспечение <sup>*</sup></label>
            <input class="form-control" accept=".xls,.xlsx" name="MTO" type="file">
        </div>
        <div class="line"></div>
        <div class="mb-3">
            <h2 class="form-label">Творческий коллектив </h2>
            <div class="mb-3">
                <label for="MTO" class="form-label">Первым участником заполнить Руководителя ТК</label>
            </div>

            <div class="members mb-3">
                <div class="member">
                    <div class="line"></div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="MEMBER_SURNAME" class="form-label">Фамилия</label>
                            <input type="text" class="form-control" id="MEMBER_SURNAME" name="MEMBER_SURNAME[]"
                                   required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="MEMBER_NAME" class="form-label">Имя</label>
                            <input type="text" class="form-control" id="MEMBER_NAME" name="MEMBER_NAME[]" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="MEMBER_LAST_NAME" class="form-label">Отчество</label>
                            <input type="text" class="form-control" id="MEMBER_LAST_NAME" name="MEMBER_LAST_NAME[]"
                                   required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="MEMBER_WORK_PLACE" class="form-label">Место работы</label>
                            <input type="text" class="form-control" id="MEMBER_WORK_PLACE" name="MEMBER_WORK_PLACE[]"
                                   required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="MEMBER_POSITION" class="form-label">Должность</label>
                            <input type="text" class="form-control" id="MEMBER_POSITION" name="MEMBER_POSITION[]"
                                   required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="MEMBER_ACADEMIC_DEGREE" class="form-label">Ученая степень</label>
                            <input type="text" class="form-control" id="MEMBER_ACADEMIC_DEGREE"
                                   name="MEMBER_ACADEMIC_DEGREE[]" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="MEMBER_ACADEMIC_TITLE" class="form-label">Ученое звание</label>
                            <input type="text" class="form-control" id="MEMBER_ACADEMIC_TITLE"
                                   name="MEMBER_ACADEMIC_TITLE[]" required>
                        </div>
                    </div>
                    <div class="line"></div>
                </div>
            </div>
            <button type="button" id="addMember" class="btn btn-primary btn-sm" style="width: 50%;">Добавить
                участника
            </button>
        </div>

        <div class="mb-3">
            <label for="PROJECT_ADDITIONAL" class="form-label">Дополнительная информация о Проекте</label>
            <textarea class="form-control" name="PROJECT_ADDITIONAL" maxlength="200" id="" cols="65"
                      rows="10"></textarea>
        </div>

        <div class="mb-3">
            <label for="PROJECT_INITIATOR" class="form-label">Инициатор мероприятия</label>
            <input type="text" class="form-control" id="PROJECT_INITIATOR" name="PROJECT_INITIATOR" required>
        </div>
        <div class="mb-3">
            <label for="DATE" class="form-label">Дата подачи заявки<sup>*</sup></label>
            <input class="form-control" id="DATE" name="DATE" placeholder="Дата подачи заявки" required>
        </div>
        <? $APPLICATION->IncludeComponent(
            "bitrix:main.userconsent.request",
            ".default",
            array(
                "AUTO_SAVE" => "Y",
                "ID" => "1",
                "IS_CHECKED" => "Y",
                "REPLACE" => array(
                    'button_caption' => 'Отправить заявку',
                    'fields' => array('Email', 'Телефон', 'Имя')
                ),
                "IS_LOADED" => "Y",
                "COMPONENT_TEMPLATE" => ".default"
            ),
            false
        ); ?>
        <button type="submit" class="btn btn-success">Отправить заявку</button>
    </form>
</div>
