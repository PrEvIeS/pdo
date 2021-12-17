<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

/**
 * variables
 * @var array $arResult
 * @var array $arParams
 */

use \Bitrix\Main\Localization\Loc as Loc;
Loc::loadMessages(__FILE__);
?>
<div class="form-wrap">
    <form class="form">
        <div class="form-head">
            <h3>Форма</h3>
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Фамилия<sup>*</sup></label>
            <input type="text" class="form-control" id="surname" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Имя<sup>*</sup></label>
            <input type="text" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
            <label for="patronymic" class="form-label">Отчество<sup>*</sup></label>
            <input type="email" class="form-control" id="patronymic" required>
        </div>
        <div class="mb-3">
            <label for="date-of-birth" class="form-label">Дата рождения<sup>*</sup></label>
            <input type="text" class="form-control" id="date-of-birth" required>
        </div>
        <div class="mb-3">
            <label for="number-of-years" class="form-label">Число полных лет<sup>*</sup></label>
            <input type="text" class="form-control" id="number-of-years" required>
        </div>
        <div class="mb-3">
            <label for="citizenship" class="form-label">Гражданство<sup>*</sup></label>
            <input type="text" class="form-control" id="citizenship" required>
        </div>
        <div class="mb-3">
            <label for="snils" class="form-label">СНИЛС<sup>*</sup></label>
            <input type="text" class="form-control" id="snils" required>
        </div>
        <div class="mb-3">
            <label for="education" class="form-label">Уровень образования<sup>*</sup></label>
            <select id="education" class="form-select" required>
                <option value=""></option>
                <option value="1">Среднее профессиональное – квалифицированный рабочий, служащий</option>
                <option value="2">Среднее профессиональное – специалист среднего звена</option>
                <option value="3">Высшее профессиональное – бакалавриат</option>
                <option value="4">Высшее профессиональное – специалитет</option>
                <option value="5">Высшее профессиональное – магистратура</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="speciality" class="form-label">Специальность (направление по диплому)<sup>*</sup></label>
            <input type="text" class="form-control" id="speciality" required>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="number-diploma" class="form-label">Серия, номер диплома<sup>*</sup></label>
                    <input type="text" class="form-control" id="number-diploma" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="date-of-issue" class="form-label">Дата выдачи диплома<sup>*</sup></label>
                    <input type="text" class="form-control" id="date-of-issue" required>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="work" class="form-label">Место работы (наименование предприятия)<sup>*</sup></label>
            <textarea class="form-control" id="work" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="affiliation" class="form-label">Принадлежность места работы к сектору АПК<sup>*</sup></label>
            <input type="text" class="form-control" id="affiliation" required>
        </div>

        <div class="mb-3">
            <label for="position-held" class="form-label">Занимаемая должность<sup>*</sup></label>
            <input type="text" class="form-control" id="position-held" required>
        </div>

        <div class="mb-3">
            <label for="experience" class="form-label">Стаж работы (общий / педагогический)<sup>*</sup></label>
            <input type="text" class="form-control" id="experience" required>
        </div>

        <div class="mb-3">
            <label for="adress" class="form-label">Адрес места проживания и индекс<sup>*</sup></label>
            <input type="text" class="form-control" id="adress" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Телефон<sup>*</sup></label>
            <input type="tel" class="form-control" id="phone" required>
        </div>

        <div class="mb-3">
            <label for="mail" class="form-label">Адрес электронной почты<sup>*</sup></label>
            <input type="email" class="form-control" id="mail" required>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="course" class="form-label">Выберите курс<sup>*</sup></label>
                    <select id="course" class="form-select" required>
                        <option value=""></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="period" class="form-label">Период обучения<sup>*</sup></label>
                    <select id="period" class="form-select" required>
                        <option value=""></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <span data-bs-toggle="modal" data-bs-target="#exampleModal">Распечатайте <a href="#" target="_blank">файл «Заявление»</a> (ссылка), подпишите, отсканируйте и прикрепите в поле «Заявление на зачисление»</span>

        </div>

        <div class="mb-3">
            <label for="addFile" class="form-label">Заявление на зачисление<sup>*</sup></label>
            <input class="form-control" id="addFile" type="file">
        </div>

        <div class="mb-3">
            <p class="form-text">Отсканируйте диплом об образовании и прикрепите по воле «Диплом об образовании»</p>
            <label for="addFileDiplom" class="form-label">Диплом об образовании<sup>*</sup></label>
            <input class="form-control" id="addFileDiplom" type="file">
        </div>

        <div class="mb-3">
            <p class="form-text">Если у вас была смена фамилии, то необходимо отсканировать документ, подтверждающий это
                и прикрепить в поле «Свидетельство о браке»</p>
            <label for="addFileBrak" class="form-label">Свидетельство о браке<sup>*</sup></label>
            <input class="form-control" id="addFileBrak" type="file">
        </div>

        <div class="mb-3">
            <p class="form-text">Отсканируйте СНИЛС и прикрепите в поле «СНИЛС»</p>
            <label for="addFileSnils" class="form-label">СНИЛС<sup>*</sup></label>
            <input class="form-control" id="addFileSnils" type="file">
        </div>

        <button type="submit" class="btn btn-success">ОТПРАВИТЬ РЕГИСТРАЦИОННУЮ ФОРМУ</button>
    </form>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Согласие на обработку персональных данных</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>Настоящим в соответствии с Федеральным законом № 152-ФЗ «О персональных данных» от 27.07.2006 года
                    свободно, своей волей и в своем интересе выражаю свое безусловное согласие на обработку моих
                    персональных данных , зарегистрированным в соответствии с законодательством РФ по адресу:<br> (далее
                    по тексту - Оператор).<br>Персональные данные&nbsp;- любая информация, относящаяся к определенному
                    или определяемому на основании такой информации&nbsp;физическому лицу.<br>Настоящее Согласие выдано
                    мною на обработку следующих персональных данных:<br>- Фамилия;<br>- Имя;<br>- Отчество;<br>- Число
                    полных лет;<br>- Гражданство;<br>- СНИЛС;<br>- Уровень образования;<br>- Специальность по
                    диплому;<br>- Серия, номер и дата выдачи диплома;<br>- ;<br>- Место работы;<br>- Принадлежность
                    места работы к сектору АПК;<br>- Занимаемая должность;<br>- Стаж работы;<br>- Адрес;<br>-
                    Телефон;<br>- E-mail;<br>- ;<br>- Вид программы;<br>- ;<br>- Заявление;<br>- Диплом об
                    образовании;<br>- СНИЛС;<br>- Свидетельство о браке.<br><br>Согласие дано Оператору для совершения
                    следующих действий с моими персональными данными с использованием средств автоматизации и/или без
                    использования таких средств: сбор, систематизация, накопление, хранение, уточнение (обновление,
                    изменение), использование, обезличивание, а также осуществление любых иных действий, предусмотренных
                    действующим законодательством РФ как неавтоматизированными, так и автоматизированными способами.<br>Данное
                    согласие дается Оператору для обработки моих персональных данных в следующих целях:<br>-
                    предоставление мне услуг/работ;<br>- направление в мой адрес уведомлений, касающихся предоставляемых
                    услуг/работ;<br>- подготовка и направление ответов на мои запросы;<br>- направление в мой адрес
                    информации, в том числе рекламной, о мероприятиях/товарах/услугах/работах Оператора.<br><br>Настоящее
                    согласие действует до момента его отзыва путем направления соответствующего уведомления на
                    электронный адрес d.shuvalov@digital-sector.ru. В случае отзыва мною согласия на обработку
                    персональных данных Оператор вправе продолжить обработку персональных данных без моего согласия при
                    наличии оснований, указанных в пунктах 2 – 11 части 1 статьи 6, части 2 статьи 10 и части 2 статьи
                    11 Федерального закона №152-ФЗ «О персональных данных» от 27.07.2006 г.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary js-checkboxCheck" data-bs-dismiss="modal">Принимаю</button>
                <button type="button" class="btn btn-secondary js-checkboxNotCheck" data-bs-dismiss="modal">Не
                    принимаю
                </button>
            </div>
        </div>
    </div>
</div>
