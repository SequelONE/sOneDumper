<?php

class sOneDumperItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'sOneDumperItem';
    public $classKey = 'sOneDumperItem';
    public $languageTopics = ['sonedumper'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('sonedumper_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('sonedumper_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'sOneDumperItemCreateProcessor';