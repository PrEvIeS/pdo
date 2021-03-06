<?php

namespace Ds\Migrate;

/**
 * Class Version
 * @package Ds\Migrate
 */
class Version extends ExchangeEntity
{

    /**
     * @var string
     */
    protected $description = "";

    /**
     * @var array
     */
    protected $versionFilter = [];
    /**
     * @var string
     */
    protected $storageName = 'default';

    /**
     * your code for up
     * @return bool
     */
    public function up()
    {
        return true;
    }

    /**
     * your code for down
     * @return bool
     */
    public function down()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isVersionEnabled()
    {
        return true;
    }

    /**
     * @throws Exceptions\ExchangeException
     * @return string
     */
    public function getVersionName()
    {
        return $this->getClassName();
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return array
     */
    public function getVersionFilter()
    {
        return $this->versionFilter;
    }

    /**
     * @param $name
     * @param $data
     * @throws Exceptions\ExchangeException
     */
    public function saveData($name, $data)
    {
        $this->getStorageManager()->saveData($this->getVersionName(), $name, $data);
    }

    /**
     * @param $name
     * @throws Exceptions\ExchangeException
     * @return mixed|string
     *
     */
    public function getSavedData($name)
    {
        return $this->getStorageManager()->getSavedData($this->getVersionName(), $name);
    }

    /**
     * @param bool $name
     * @throws Exceptions\ExchangeException
     */
    public function deleteSavedData($name = false)
    {
        $this->getStorageManager()->deleteSavedData($this->getVersionName(), $name);
    }

    /**
     * @return StorageManager
     */
    protected function getStorageManager()
    {
        return new StorageManager($this->storageName);
    }

    /**
     * @return ExchangeManager
     */
    protected function getExchangeManager()
    {
        return new ExchangeManager($this);
    }

    /**
     * @return HelperManager
     */
    protected function getHelperManager()
    {
        return HelperManager::getInstance();
    }
}



