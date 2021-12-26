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
    <form class="form" method="post" action="/ajax/register.php">
        <div class="form-head">
            <h3>Форма записи на курсы допольнительного образования</h3>
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Фамилия<sup>*</sup></label>
            <input type="text" class="form-control" id="surname" name="UF_LAST_NAME" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Имя<sup>*</sup></label>
            <input type="text" class="form-control" id="name" name="UF_NAME" required>
        </div>
        <div class="mb-3">
            <label for="patronymic" class="form-label">Отчество<sup>*</sup></label>
            <input type="text" class="form-control" id="patronymic" name="UF_MIDDLE_NAME"  required>
        </div>
        <div class="mb-3">
            <label for="date-of-birth" class="form-label">Дата рождения<sup>*</sup></label>
            <input  class="form-control" id="date-of-birth" name="UF_BIRTHDAY" placeholder="Дата рождения" required>
        </div>
        <div class="mb-3">
            <label for="number-of-years" class="form-label">Число полных лет<sup>*</sup></label>
            <input type="text" class="form-control" id="number-of-years" name="UF_YEARS" required>
        </div>
        <div class="mb-3">
            <label for="citizenship" class="form-label">Гражданство<sup>*</sup></label>
            <input type="text" class="form-control" id="citizenship" name="UF_CITIZENSHIP" required>
        </div>
        <div class="mb-3">
            <label for="snils" class="form-label">СНИЛС<sup>*</sup></label>
            <input type="text" class="form-control" id="snils" name="UF_SNILS" required>
        </div>
        <div class="mb-3">
            <label for="education" class="form-label">Уровень образования<sup>*</sup></label>
            <select id="education" class="form-select" name="UF_EDUCATION" required>
                <option value=""></option>
                <option value="Среднее профессиональное – квалифицированный рабочий, служащий">Среднее профессиональное
                    – квалифицированный рабочий, служащий
                </option>
                <option value="Среднее профессиональное – специалист среднего звена">Среднее профессиональное –
                    специалист среднего звена
                </option>
                <option value="Высшее профессиональное – бакалавриат">Высшее профессиональное – бакалавриат</option>
                <option value="Высшее профессиональное – специалитет">Высшее профессиональное – специалитет</option>
                <option value="Высшее профессиональное – магистратура">Высшее профессиональное – магистратура</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="speciality" class="form-label">Специальность (направление по диплому)<sup>*</sup></label>
            <input type="text" class="form-control" id="speciality"  name="UF_SPECIALITY" required>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="number-diploma" class="form-label">Серия, номер диплома<sup>*</sup></label>
                    <input type="text" class="form-control" id="number-diploma" name="UF_SERIES" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="date-of-issue" class="form-label">Дата выдачи диплома<sup>*</sup></label>
                    <input type="text" class="form-control" id="date-of-issue" name="UF_DIPLOMA_DATE" placeholder="01.01.1999" required>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="work" class="form-label">Место работы (наименование предприятия)<sup>*</sup></label>
            <textarea class="form-control" id="work" name="UF_WORK_PLACE" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="affiliation" class="form-label">Принадлежность места работы к сектору АПК<sup>*</sup></label>
            <select id="affiliation" class="form-select" name="UF_AGRARIAN" required>
                <option value=""></option>
                <option value="true">Да</option>
                <option value="false">Нет</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="position-held" class="form-label">Занимаемая должность<sup>*</sup></label>
            <input type="text" class="form-control" id="position-held" name="UF_POSITION" required>
        </div>

        <div class="mb-3">
            <label for="experience" class="form-label">Стаж работы (общий / педагогический)<sup>*</sup></label>
            <input type="text" class="form-control" id="experience" name="UF_EXPIRIANCE" required>
        </div>

        <div class="mb-3">
            <label for="adress" class="form-label">Адрес места проживания и индекс<sup>*</sup></label>
            <input type="text" class="form-control" id="adress" name="UF_ADDRESS" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Телефон<sup>*</sup></label>
            <input type="text" placeholder="Телефон" class="phone_mask form-control" name="UF_PHONE" required>
        </div>

        <div class="mb-3">
            <label for="mail" class="form-label">Адрес электронной почты<sup>*</sup></label>
            <input type="email" class="form-control" id="mail" name="UF_EMAIL" required>
        </div>
        <div class="mb-3">
            <label for="education" class="form-label">Вид программы<sup>*</sup></label>
            <select id="PROGRAMM" class="form-select" required>
                <option value=""></option>
                <option value="development">повышение квалификации</option>
                <option value="retraining">профессиональная переподготовка</option>
            </select>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="course" class="form-label">Выберите курс<sup>*</sup></label>
                    <select id="course" class="form-select" name="UF_PROGRAMM" required>
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="period" class="form-label">Период обучения<sup>*</sup></label>
                    <select id="period" class="form-select" name="UF_PERIOD" required>
                        <option value=""></option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <span>Распечатайте <a href="#" id="printStatement">файл «Заявление»</a> (ссылка), подпишите, отсканируйте и прикрепите в поле «Заявление на зачисление»</span>
        </div>
        <div class="mb-3">
            <label for="addFile" class="form-label">Заявление на зачисление<sup>*</sup></label>
            <input class="form-control" id="addFile" name="UF_STATEMENT" type="file">
        </div>

        <div class="mb-3">
            <p class="form-text">Отсканируйте диплом об образовании и прикрепите по воле «Диплом об образовании»</p>
            <label for="addFileDiplom" class="form-label">Диплом об образовании<sup>*</sup></label>
            <input class="form-control" id="addFileDiplom" name="UF_DIPLOMA" type="file">
        </div>

        <div class="mb-3">
            <p class="form-text">Если у вас была смена фамилии, то необходимо отсканировать документ, подтверждающий это
                и прикрепить в поле «Свидетельство о браке»</p>
            <label for="addFileBrak" class="form-label">Свидетельство о браке</label>
            <input class="form-control" id="addFileBrak" name="UF_MARRIAGE" type="file">
        </div>

        <div class="mb-3">
            <p class="form-text">Отсканируйте СНИЛС и прикрепите в поле «СНИЛС»</p>
            <label for="addFileSnils" class="form-label">СНИЛС<sup>*</sup></label>
            <input class="form-control" id="addFileSnils" name="UF_SNILS_FILE" type="file">
        </div>
        <? $APPLICATION->IncludeComponent(
            "bitrix:main.userconsent.request",
            ".default",
            array(
                "AUTO_SAVE" => "Y",
                "ID" => "1",
                "IS_CHECKED" => "Y",
                "REPLACE" => array(
                    'button_caption' => 'ОТПРАВИТЬ РЕГИСТРАЦИОННУЮ ФОРМУ',
                    'fields' => array('Email', 'Телефон', 'Имя')
                ),
                "IS_LOADED" => "Y",
                "COMPONENT_TEMPLATE" => ".default"
            ),
            false
        ); ?>
        <button type="submit" class="btn btn-success">ОТПРАВИТЬ РЕГИСТРАЦИОННУЮ ФОРМУ</button>
    </form>
</div>
