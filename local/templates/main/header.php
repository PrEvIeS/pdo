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
        $asset->addCss(SITE_TEMPLATE_PATH . '/assets/css/main.css');
        $asset->addJs(SITE_TEMPLATE_PATH . '/assets/js/main.js');
        $asset->addString('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>');
        $asset->addString('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">');
        ?>
        <?php $APPLICATION->ShowHead(); ?>
        <title><?php $APPLICATION->ShowTitle() ?></title>
    </head>
    <body>
<?php $APPLICATION->ShowPanel() ?>