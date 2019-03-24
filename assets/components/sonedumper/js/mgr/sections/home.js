sOneDumper.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'sonedumper-panel-home',
            renderTo: 'sonedumper-panel-home-div'
        }]
    });
    sOneDumper.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(sOneDumper.page.Home, MODx.Component);
Ext.reg('sonedumper-page-home', sOneDumper.page.Home);