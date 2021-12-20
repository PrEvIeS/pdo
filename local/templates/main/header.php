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
        $asset->addJs(SITE_TEMPLATE_PATH . '/assets/js/jquery-3.6.0.min.js');
        $asset->addString('<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>');
        $asset->addCss(SITE_TEMPLATE_PATH . '/assets/css/main.css');
        $asset->addJs(SITE_TEMPLATE_PATH . '/assets/js/main.js');

        $asset->addString('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">');
        ?>
        <?php $APPLICATION->ShowHead(); ?>
        <title><?php $APPLICATION->ShowTitle() ?></title>
    </head>
    <body>

<?php $APPLICATION->ShowPanel() ?>