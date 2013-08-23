
//@require @packageOverrides
if (!Ext.themeName)
{
  Ext.themeName="classic";
}
if (Ext.repoDevMode) {
    document.write('<link rel="stylesheet" type="text/css" href="../build/KitchenSink/ext-theme-' +
        Ext.themeName + '/resources/KitchenSink-all.css"/>');
}
else 
{
    document.write('<link rel="stylesheet" type="text/css" href="../build/KitchenSink/ext-theme-' +
        Ext.themeName + '/resources/KitchenSink-all.css"/>');
}

var apps=Ext.application({
    name: 'KitchenSink',

    requires: [
        'KitchenSink.DummyText',
        'KitchenSink.data.DataSets',
        'Ext.state.CookieProvider',
        'Ext.window.MessageBox',
        'Ext.tip.QuickTipManager'
    ],

    controllers: [
        'Main'
    ],

    autoCreateViewport: true,

    init: function() {
    	//this.controllers['Main'].set
    	/*
    	var controller = Ext.create(this.getModuleClassName('KitchenSink.controller.Main', 'controller'), {
			application: this,
			id: 'Main'
		});
		this.controllers.add(controller);
		*/
    	
        Ext.setGlyphFontFamily('Pictos');
        Ext.tip.QuickTipManager.init();
        Ext.state.Manager.setProvider(Ext.create('Ext.state.CookieProvider'));
    }
});

