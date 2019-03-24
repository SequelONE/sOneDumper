sOneDumper.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'sonedumper-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('sonedumper') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('sonedumper_items'),
                layout: 'anchor',
                items: [{
                    html: _('sonedumper_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'sonedumper-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    sOneDumper.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(sOneDumper.panel.Home, MODx.Panel);
Ext.reg('sonedumper-panel-home', sOneDumper.panel.Home);
