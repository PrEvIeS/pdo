<?php

namespace Ds\Migrate\Schema;

use Bitrix\Main\ArgumentException;
use Bitrix\Main\ArgumentOutOfRangeException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use Ds\Migrate\AbstractSchema;
use Ds\Migrate\Exceptions\HelperException;

class OptionSchema extends AbstractSchema
{

    protected function initialize()
    {
        $this->setTitle('Схема настроек модулей');
    }

    public function getMap()
    {
        return ['options/'];
    }

    /**
     * @return bool
     */
    protected function isBuilderEnabled()
    {
        return $this->getHelperManager()->Option()->isEnabled();
    }

    public function outDescription()
    {
        $schemas = $this->loadSchemas('options/', [
            'items' => [],
        ]);

        $cnt = 0;

        foreach ($schemas as $schema) {
            $cnt += count($schema['items']);
        }

        $this->out('Настроек: %d', $cnt);
    }

    /**
     * @throws ArgumentException
     * @throws SystemException
     */
    public function export()
    {
        $helper = $this->getHelperManager();

        $modules = $helper->Option()->getModules();

        foreach ($modules as $module) {
            $exportItems = $helper->Option()->getOptions([
                'MODULE_ID' => $module['ID'],
            ]);

            $this->saveSchema('options/' . $module['ID'], [
                'items' => $exportItems,
            ]);
        }
    }

    public function import()
    {
        $schemas = $this->loadSchemas('options/', [
            'items' => [],
        ]);

        foreach ($schemas as $schema) {
            $this->addToQueue('saveOptions', $schema['items']);
        }
    }


    /**
     * @param $items
     * @throws ArgumentException
     * @throws SystemException
     * @throws ArgumentOutOfRangeException
     * @throws ObjectPropertyException
     * @throws HelperException
     */
    protected function saveOptions($items)
    {
        $helper = $this->getHelperManager();
        $helper->Option()->setTestMode($this->testMode);

        foreach ($items as $item) {
            $helper->Option()->saveOption($item);
        }
    }

}