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
<div class="form__inner">
    <div class="form-wrap">
        <form class="form" method="post" action="/ajax/register_event.php">
            <div class="form-head title">
                <h3>Заявка на рассмотрение Проекта мероприятия Программы развития Кубанского ГАУ на 2021-2030 гг.
                </h3>
            </div>
            <div class="input-container ic1">
                <input id="NAME" class="input" type="text" placeholder=" " maxlength="100" name="NAME" required />
                <div class="cut"></div>
                <label for="NAME" class="placeholder">Наименование мероприятия<sup>*</sup></label>
            </div>
            <div class="select-container ic2">
                <select id="RELATION" class="select" type="text" placeholder=" " name="NAME" required>
                    <option value=""></option>
                    <?php foreach ($arResult['RELATIONS'] as $RELATION) : ?>
                        <option value="<?= $RELATION['UF_XML_ID'] ?>"><?= $RELATION['UF_NAME'] ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="cut"></div>
                <label for="RELATION" class="placeholder">Отношение мероприятия к политикам Целевой модели
                    университета в
                    соответствии с Программой развития университета на 2021-2030 гг.<sup>*</sup></label>
            </div>
            <div class="select-container ic2">
                <select id="RELATION_EVENT" class="select" type="text" placeholder=" " name="RELATION_EVENT" required>
                    <option value=""></option>
                    <?php foreach ($arResult['RELATIONS_OF_EVENT'] as $RELATION) : ?>
                        <option value="<?= $RELATION['UF_XML_ID'] ?>"><?= $RELATION['UF_NAME'] ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="cut"></div>
                <label for="RELATION_EVENT" class="placeholder">Отношение мероприятия к стратегическому
                    проекту
                    Программы
                    развития Кубанского ГАУ на 2021-2030 гг.<sup>*</sup></label>
            </div>
            <div class="textarea-container ic1">
                <input id="TARGET" class="textarea" type="text" placeholder=" " maxlength="150" name="TARGET" required />
                <div class="cut"></div>
                <label for="TARGET" class="placeholder">Цель мероприятия<sup>*</sup></label>
            </div>
            <div class="textarea-container ic1">
                <input id="TASKS" class="textarea" type="text" placeholder=" " maxlength="150" name="TASKS" required />
                <div class="cut"></div>
                <label for="TASKS" class="placeholder">Задачи мероприятия<sup>*</sup></label>
            </div>
            <div class="textarea-container ic1">
                <input id="DESCRIPTION" class="textarea" type="text" placeholder=" " maxlength="1000" name="DESCRIPTION" required />
                <div class="cut"></div>
                <label for="DESCRIPTION" class="placeholder">Аннотация мероприятия (краткое описание
                    основных этапов,
                    объекта, сроки, контрольные точки)<sup>*</sup></label>
            </div>
            <div class="textarea-container ic1">
                <input id="RESULT" class="textarea" type="text" placeholder=" " maxlength="1000" name="RESULT" required />
                <div class="cut"></div>
                <label for="RESULT" class="placeholder">Ожидаемый результат, его уникальность и значение для
                    развития
                    университета, социально-экономического развития региона, отрасли<sup>*</sup></label>
            </div>
            <div class="select-container ic2">
                <select id="TIPOLOGY" class="select" type="text" placeholder=" " name="TIPOLOGY" required>
                    <option value=""></option>
                    <?php foreach ($arResult['TYPOLOGY'] as $TYPOLOGY) : ?>
                        <option value="<?= $TYPOLOGY['UF_XML_ID'] ?>"><?= $TYPOLOGY['UF_NAME'] ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="cut"></div>
                <label for="TIPOLOGY" class="placeholder">Типология мероприятия в соответствии в Правилами
                    реализации
                    программы стратегического академического лидерства "Приоритет-2030"<sup>*</sup></label>
            </div>
            <div class="link">
                <span>Скачайте <a download href="">шаблон «Объем финансирования»</a> (ссылка), заполните и
                    прикрепите в
                    поле «Объем финансирования»</span>
            </div>
            <div class="mb-3">
                <label for="FUNDING" class="form-label subtitle">Объем финансирования, руб. <sup>*</sup></label>
                <input class="form-control" name="FUNDING" accept=".xls,.xlsx" type="file">
            </div>
            <div class="input-container ic1">
                <input id="FUNDING_DESCRIPTION" class="input" type="text" placeholder=" " name="FUNDING_DESCRIPTION" required />
                <div class="cut"></div>
                <label for="FUNDING_DESCRIPTION" class="placeholder">Сумма финансирования проекта,
                    руб.<sup>*</sup></label>
            </div>

            <div class="link">
                <span>Скачайте <a download href="">шаблон «МТО»</a> (ссылка), заполните и прикрепите в поле
                    «Материально-техническое обеспечение»</span>
            </div>
            <div class="mb-3">
                <label for="MTO" class="form-label subtitle">Материально-техническое обеспечение
                    <sup>*</sup></label>
                <input class="form-control" accept=".xls,.xlsx" name="MTO" type="file">
            </div>
            <div class="line"></div>
            <div class="mb-3">
                <h2 class="form-label subtitle h2">Творческий коллектив </h2>
                <div class="mb-3">
                    <label for="MTO" class="form-label subtitle h6">Первым участником заполнить Руководителя
                        ТК</label>
                </div>

                <div class="members mb-3">
                    <div class="member">
                        <div class="line"></div>
                        <div class="col">
                            <div class="input-container ic1">
                                <input id="MEMBER_SURNAME" class="input" type="text" placeholder=" " name="MEMBER_SURNAME[]" />
                                <div class="cut"></div>
                                <label for="MEMBER_SURNAME" class="placeholder">Фамилия</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-container ic1">
                                <input class="input" type="text" placeholder=" " id="MEMBER_NAME" name="MEMBER_NAME[]" />
                                <div class="cut"></div>
                                <label for="MEMBER_NAME" class="placeholder">Имя</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-container ic1">
                                <input class="input" type="text" placeholder=" " id="MEMBER_LAST_NAME" name="MEMBER_LAST_NAME[]" />
                                <div class="cut"></div>
                                <label for="MEMBER_LAST_NAME" class="placeholder">Отчество</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-container ic1">
                                <input class="input" type="text" placeholder=" " id="MEMBER_WORK_PLACE" name="MEMBER_WORK_PLACE[]" />
                                <div class="cut"></div>
                                <label for="MEMBER_WORK_PLACE" class="placeholder">Место работы</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-container ic1">
                                <input class="input" type="text" placeholder=" " id="MEMBER_POSITION" name="MEMBER_POSITION[]" />
                                <div class="cut"></div>
                                <label for="MEMBER_POSITION" class="placeholder">Должность</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-container ic1">
                                <input class="input" type="text" placeholder=" " id="MEMBER_ACADEMIC_DEGREE" name="MEMBER_ACADEMIC_DEGREE[]" />
                                <div class="cut"></div>
                                <label for="MEMBER_ACADEMIC_DEGREE" class="placeholder">Ученая
                                    степень</label>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="input-container ic1">
                                <input class="input" type="text" placeholder=" " id="MEMBER_ACADEMIC_TITLE" name="MEMBER_ACADEMIC_TITLE[]" />
                                <div class="cut"></div>
                                <label for="MEMBER_ACADEMIC_TITLE" class="placeholder">Ученое звание</label>
                            </div>
                        </div>
                        <div class="line"></div>
                    </div>
                </div>
                <button type="button" id="addMember" class="btn btn-primary btn-sm btn-my" style="width: 50%;">Добавить
                    участника
                </button>
            </div>
            <div class="textarea-container ic1">
                <input id="PROJECT_ADDITIONAL" class="textarea" type="text" placeholder=" " maxlength="200" name="PROJECT_ADDITIONAL" required />
                <div class="cut"></div>
                <label for="PROJECT_ADDITIONAL" class="placeholder">Дополнительная информация о
                    Проекте</label>
            </div>
            <div class="input-container ic1">
                <input id="PROJECT_INITIATOR" class="input" type="text" placeholder=" " name="PROJECT_INITIATOR" />
                <div class="cut"></div>
                <label for="PROJECT_INITIATOR" class="placeholder">Инициатор мероприятия</label>
            </div>
            <div class="input-container ic1">
                <input id="DATE" class="input form-control" type="date" placeholder=" " name="DATE" required placeholder="дата подачи" />
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
            <button type="submit" class="btn btn-success btn-footer">Отправить заявку</button>
        </form>
    </div>
</div>