<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="slideshow-mobile js-slideshowSwiper">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                    CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                    CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                    array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <? if ($arItem["PROPERTIES"]["textstyle"]["VALUE_ENUM"] == "first"): ?>
                    <div class="swiper-slide">
                        <div id="<?= $this->GetEditAreaId($arItem['ID']); ?>"
                             style="background-image: url(<?= $arItem["DISPLAY_PROPERTIES"]["slide_desktop"]["FILE_VALUE"]["SRC"] ?>);"
                             class="slide slide--first "
                        >
                            <div class="slide__img"></div>
                            <div class="slide__first">
                                <h2 class="slide__title"><?= $arItem["PROPERTIES"]["name"]["~VALUE"]['TEXT'] ?></h2>
                                <div class="slide__img-bottle js-slideImage">
                                    <img src="<?= $arItem["DISPLAY_PROPERTIES"]["src"]["FILE_VALUE"]["SRC"] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                <? endif ?>
                <? if ($arItem["PROPERTIES"]["textstyle"]["VALUE_ENUM"] == "second"): ?>
                    <div class="swiper-slide">
                        <div id="<?= $this->GetEditAreaId($arItem['ID']); ?>" class="slide slide--second ">
                            <div
                                    style="background-image: url(<?= $arItem["DISPLAY_PROPERTIES"]["slide_tablet"]["FILE_VALUE"]["SRC"] ?>)"
                                    class="slide__img slide_tablet">
                            </div>
                            <div
                                    style="background-image: url(<?= $arItem["DISPLAY_PROPERTIES"]["slide_desktop"]["FILE_VALUE"]["SRC"] ?>);"
                                    class="slide__img slide_desktop">
                            </div>
                            <div class="slide__second">
                                <h2 class="slide__title"><?= $arItem["PROPERTIES"]["name"]["~VALUE"]['TEXT'] ?></h2>
                            </div>
                        </div>
                    </div>
                <? endif ?>
                <? if ($arItem["PROPERTIES"]["textstyle"]["VALUE_ENUM"] == "third"): ?>
                    <div class="swiper-slide">
                        <div id="<?= $this->GetEditAreaId($arItem['ID']); ?>" class="slide slide--third ">
                            <div
                                    style="background-image: url(<?= $arItem["DISPLAY_PROPERTIES"]["slide_tablet"]["FILE_VALUE"]["SRC"] ?>)"
                                    class="slide__img slide_tablet">
                            </div>
                            <div
                                    style="background-image: url(<?= $arItem["DISPLAY_PROPERTIES"]["slide_desktop"]["FILE_VALUE"]["SRC"] ?>);"
                                    class="slide__img slide_desktop">
                            </div>
                            <div class="slide__third">
                                <h2 class="slide__title">
                                    <?if ($arItem["DISPLAY_PROPERTIES"]["src"]["FILE_VALUE"]["SRC"]):?>
                                        <img src="<?= $arItem["DISPLAY_PROPERTIES"]["src"]["FILE_VALUE"]["SRC"] ?>" width="<?=$arItem["PROPERTIES"]["width"]["VALUE"]?>">
                                    <?elseif ($arItem["PROPERTIES"]["name"]["VALUE"]):?>
                                        <?=$arItem["PROPERTIES"]["name"]["~VALUE"]['TEXT']?>
                                    <?endif?>
                                </h2>
                            </div>
                        </div>
                    </div>
                <? endif ?>
            <? endforeach; ?>
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>