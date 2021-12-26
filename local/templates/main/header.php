<?php use Bitrix\Main\Page\Asset;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
IncludeTemplateLangFile(__FILE__);
/**
 * @global $APPLICATION
 */
$asset = Asset::getInstance();
?>
    <html>
    <head>
        <?
        // $asset->addJs(SITE_TEMPLATE_PATH . '/assets/js/jquery-3.6.0.min.js');
        $asset->addString('<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>');
        $asset->addString('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">');
        $asset->addString('<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>');
        $asset->addString('<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>');
        $asset->addString('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>');

        $asset->addString('<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js" type="text/javascript"></script>');
        $asset->addCss(SITE_TEMPLATE_PATH . '/assets/css/main.css');
        $asset->addCss(SITE_TEMPLATE_PATH . '/assets/css/bootstrap-datepicker3.min.css');
        $asset->addJs(SITE_TEMPLATE_PATH . '/assets/js/main.js');
        $asset->addJs(SITE_TEMPLATE_PATH . '/assets/js/bootstrap-datepicker.min.js');
        $asset->addJs(SITE_TEMPLATE_PATH . '/assets/js/bootstrap-datepicker.ru.min.js');


        ?>
        <?php $APPLICATION->ShowHead(); ?>
        <title><?php $APPLICATION->ShowTitle() ?></title>
    </head>
    <body>

<?php $APPLICATION->ShowPanel() ?>