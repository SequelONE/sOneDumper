<?php

/**
 * The home manager controller for sOneDumper.
 *
 */
class sOneDumperHomeManagerController extends modExtraManagerController
{
    /** @var sOneDumper $sOneDumper */
    public $sOneDumper;


    /**
     *
     */
    public function initialize()
    {
        $this->sOneDumper = $this->modx->getService('sOneDumper', 'sOneDumper', MODX_CORE_PATH . 'components/sonedumper/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['sonedumper:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('sonedumper');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->sOneDumper->config['cssUrl'] . 'mgr/main.css');
        //$this->addJavascript($this->sOneDumper->config['jsUrl'] . 'mgr/sonedumper.js');
        //$this->addJavascript($this->sOneDumper->config['jsUrl'] . 'mgr/misc/utils.js');
        //$this->addJavascript($this->sOneDumper->config['jsUrl'] . 'mgr/misc/combo.js');
        //$this->addJavascript($this->sOneDumper->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        //$this->addJavascript($this->sOneDumper->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        //$this->addJavascript($this->sOneDumper->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        //$this->addJavascript($this->sOneDumper->config['jsUrl'] . 'mgr/sections/home.js');
//
        //$this->addHtml('<script type="text/javascript">
        //sOneDumper.config = ' . json_encode($this->sOneDumper->config) . ';
        //sOneDumper.config.connector_url = "' . $this->sOneDumper->config['connectorUrl'] . '";
        //Ext.onReady(function() {MODx.load({ xtype: "sonedumper-page-home"});});
        //</script>');

        $this->addHtml('<script type="text/javascript">
        window.onload=function() {
        document.getElementById("ifr").style.height=window.innerHeight+"px";
        }
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<iframe id="ifr" src="/assets/components/sonedumper/dumper/" width="100%" border="0"></iframe>';

        return '';
    }
}