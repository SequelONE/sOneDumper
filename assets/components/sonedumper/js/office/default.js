Ext.onReady(function () {
    sOneDumper.config.connector_url = OfficeConfig.actionUrl;

    var grid = new sOneDumper.panel.Home();
    grid.render('office-sonedumper-wrapper');

    var preloader = document.getElementById('office-preloader');
    if (preloader) {
        preloader.parentNode.removeChild(preloader);
    }
});