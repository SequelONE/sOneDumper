sOneDumper.window.CreateItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'sonedumper-item-window-create';
    }
    Ext.applyIf(config, {
        title: _('sonedumper_item_create'),
        width: 550,
        autoHeight: true,
        url: sOneDumper.config.connector_url,
        action: 'mgr/item/create',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    sOneDumper.window.CreateItem.superclass.constructor.call(this, config);
};
Ext.extend(sOneDumper.window.CreateItem, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'textfield',
            fieldLabel: _('sonedumper_item_name'),
            name: 'name',
            id: config.id + '-name',
            anchor: '99%',
            allowBlank: false,
        }, {
            xtype: 'textarea',
            fieldLabel: _('sonedumper_item_description'),
            name: 'description',
            id: config.id + '-description',
            height: 150,
            anchor: '99%'
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('sonedumper_item_active'),
            name: 'active',
            id: config.id + '-active',
            checked: true,
        }];
    },

    loadDropZones: function () {
    }

});
Ext.reg('sonedumper-item-window-create', sOneDumper.window.CreateItem);


sOneDumper.window.UpdateItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'sonedumper-item-window-update';
    }
    Ext.applyIf(config, {
        title: _('sonedumper_item_update'),
        width: 550,
        autoHeight: true,
        url: sOneDumper.config.connector_url,
        action: 'mgr/item/update',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    sOneDumper.window.UpdateItem.superclass.constructor.call(this, config);
};
Ext.extend(sOneDumper.window.UpdateItem, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'hidden',
            name: 'id',
            id: config.id + '-id',
        }, {
            xtype: 'textfield',
            fieldLabel: _('sonedumper_item_name'),
            name: 'name',
            id: config.id + '-name',
            anchor: '99%',
            allowBlank: false,
        }, {
            xtype: 'textarea',
            fieldLabel: _('sonedumper_item_description'),
            name: 'description',
            id: config.id + '-description',
            anchor: '99%',
            height: 150,
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('sonedumper_item_active'),
            name: 'active',
            id: config.id + '-active',
        }];
    },

    loadDropZones: function () {
    }

});
Ext.reg('sonedumper-item-window-update', sOneDumper.window.UpdateItem);