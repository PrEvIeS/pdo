<?php

use WheatleyWL\BXIBlockHelpers\HLHelper;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

\CBitrixComponent::includeComponentClass('system:standard.elements.list');

class RegFormComponent extends StandardElementListComponent
{
    public function getResult()
    {
        $hlHelper = HLHelper::getClassByName('Relations');
        $this->arResult['RELATIONS'] = $hlHelper::getList([
            'select' => [
                'ID',
                'UF_NAME',
                'UF_XML_ID',
            ]
        ])->fetchAll();
        $hlHelper = HLHelper::getClassByName('Relationoftheevent');
        $this->arResult['RELATIONS_OF_EVENT'] = $hlHelper::getList([
            'select' => [
                'ID',
                'UF_NAME',
                'UF_XML_ID',
            ]
        ])->fetchAll();
        $hlHelper = HLHelper::getClassByName('Typology');
        $this->arResult['TYPOLOGY'] = $hlHelper::getList([
            'select' => [
                'ID',
                'UF_NAME',
                'UF_XML_ID',
            ]
        ])->fetchAll();
    }
}
