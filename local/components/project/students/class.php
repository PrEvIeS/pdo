<?php

use WheatleyWL\BXIBlockHelpers\Exceptions\HLHelperException;
use WheatleyWL\BXIBlockHelpers\HLHelper;
use WheatleyWL\BXIBlockHelpers\IBlockHelper;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

\CBitrixComponent::includeComponentClass('system:standard.elements.list');

class StudentsComponent extends StandardElementListComponent
{
    /**
     * @throws HLHelperException
     */
    public function getResult()
    {
        $iblockId = IBlockHelper::getIBlockIdByCode('study_programs','educational_programs');
        $data = CIBlockElement::GetList([],['IBLOCK_ID' =>$iblockId],false,false,['ID','IBLOCK_ID','NAME']);
        while($program = $data->Fetch()){
            $programs[$program['ID']] = $program['NAME'];
        }
        $hlHelper = HLHelper::getClassByName('Students');
        $students = $hlHelper::getList([
            'select' => [
                'ID',
                'UF_LAST_NAME',
                'UF_NAME',
                'UF_MIDDLE_NAME',
                'UF_PROGRAMM',
            ]
        ])->fetchAll();
        foreach ($students as $student) {

            $this->arResult['STUDENTS'][] = [
                'ID' => $student['ID'],
                'NAME' => $student['UF_LAST_NAME'] . ' ' . $student['UF_NAME']. ' '.$student['UF_MIDDLE_NAME'],
                'PROGRAMM' => $programs[$student['UF_PROGRAMM']] ,
            ];
        }
    }
}
