var sOneDumper = function (config) {
    config = config || {};
    sOneDumper.superclass.constructor.call(this, config);
};
Ext.extend(sOneDumper, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('sonedumper', sOneDumper);

sOneDumper = new sOneDumper();