<?php
use Bitrix\Main\Entity\BooleanField;
use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\Entity\StringField;
use Bitrix\Main\UserFieldTable;

/**
 * Class UserFieldEnumTable
 */
class UserFieldEnumTable extends DataManager
{
    /**
     * @return string|null
     */
    public static function getTableName()
    {
        return 'b_user_field_enum';
    }

    /**
     * @return array
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\SystemException
     * @throws \Bitrix\Main\LoaderException
     */
    public static function getMap()
    {
        $arMap = parent::getMap();

        $arMap[] = new IntegerField('ID', [
            'primary' => true,
            'autocomplete' => true,
        ]);

        $arMap[] = new IntegerField('USER_FIELD_ID', [
            'required' => true,
        ]);

        $arMap[] = new StringField('VALUE', [
            'size' => 255,
        ]);

        $arMap[] = new BooleanField('DEF', [
            'values' => [
                'N','Y',
            ],
        ]);

        $arMap[] = new IntegerField('SORT', [
            'default_value' => 500,
        ]);

        $arMap[] = new StringField('XML_ID', [
            'size' => 255,
        ]);

        $arMap[] = new ReferenceField('USER_FIELD', UserFieldTable::class, [
            '=this.USER_FIELD_ID' => 'ref.ID',
        ]);

        return $arMap;
    }
}