Ext.define('KitchenSink.view.basedata.CustomerPanels', {
	//extend:'Ext.Container',
	extend:'Ext.window.Window',
    //extend: 'Ext.panel.panel',
	//extend: 'Ext.tab.Panel',
    xtype: 'customer-panels',
	alias:'widget.customer-panels',
    width: 660,
	height:500,
	maximizable:true,
	minimizable:true,
	closable:false,
	closeAction:'hide',
	title:'客戶資料管理',
    /*
	layout: {
        type: 'table',
        columns: 3,
        tdAttrs: { style: 'padding: 10px;' }
    },
	*/
	/*
    defaults: {
        xtype: 'panel',
        width: 200,
        height: 200,
        bodyPadding: 10
    },
	*/
    //<example>
    exampleDescription: [
        '<p>This example shows how to create basic panels</p>',
        '<p>Panels typically have a header and a body, although the header is optional. ',
        'The panel header can contain a title, and icon, and one or more tools for ',
        'performing specific actions when clicked</p>'
    ],
    themes: {
        classic: {
            percentChangeColumn: {
                width: 75
            }
        },
        neptune: {
            percentChangeColumn: {
                width: 100
            }
        }
    },
    //</example>
	layout:'border',
	requires: [
	'Ext.grid.*',
	'Ext.form.*',
	'Ext.layout.container.Column',
	'KitchenSink.model.Company',
	'Ext.window.*',
	'Ext.app.*'
	],
    initComponent: function () {
    	
    	KitchenSink.data.DataSets.company.push(
    		['2m Co',                               71.72, 0.02,  0.03,  '9/1 12:00am']
    	);
		var tab1={
		   xtype:'gridpanel',
		   itemId:'mgd',
		   tbar:[
			{
				xtype:'button',
				text:'btna',
				action:'btna'
			},
		   	{
		   		text:'show grid',
		   		scope:this,
		   		handler:function(){
		   			//{xc
		   			var alias="widget.array-grid";
		   			var className = Ext.ClassManager.getNameByAlias(alias);
            		var ViewClass = Ext.ClassManager.get(className);
		   			var cmp=new ViewClass;
		   			
		   			var win=Ext.create('Ext.window.Window',{
		   				height: 400,
    					width: 600,
		   				items:[
							cmp				
		   				]
		   			});
		   			win.show();
		   			
		   			cmp.getStore().add(
    					{'company':'2m Co'}
    				);
		   		}
		   	}
		   ],
		   store: new Ext.data.Store({
                    model: KitchenSink.model.Company,
                    proxy: {
                        type: 'memory',
                        reader: {
                            type: 'array'
                        }
                    },
                    data: KitchenSink.data.DataSets.company
           }),
		   title:'List',
		   columns: [{
                    text: '客戶編號',
                    flex: 1,
                    sortable: true,
                    dataIndex: 'company'
                }, {
                    text: '名稱',
                    width: 150,
                    sortable: true,
                    dataIndex: 'company'
                },
				{
				   text:'電話'
				},
				{
					text:'傳真'
				},
				{
					text:'Email'
				},
				{
					text:'Address'
				}
			]
		};
		
		var tab2={
			xtype:'form',
			frame:true,
			title:'Detail',
			bodyStyle:'padding:5px;',
			fieldDefaults: {
				labelAlign: 'right',
				labelWidth: 115,
				msgTarget: 'side'
			},
			items:[
			  {
			    xtype:'fieldset',
				title:'section1',
				defaultType: 'textfield',
				items:[
					{
						fieldLabel:'Maker Code'
					},
					{
						fieldLabel:'Company Name',
						anchor:'95%'
					},
					{
						fieldLabel:'Address',
						anchor:'95%',
						xtype:'textarea'
					}
				]
			  }
			  ,{
			    xtype:'tabpanel',
				height:200,
				items:[
					{
						xtype:'gridpanel',
						title:'products',
						Cls:'aaa',
						columns:[
							{
								text:'productid',
								dataIndex:'fda'
							},
							{
								text:'customer productid',
								width:200,
								dataIndex:'fdb'
							}
						],
						store: new Ext.data.Store({
								proxy: {
									type: 'memory',
									reader: {
										type: 'array'
									}
								},
								fields: ['fda','fdb'],
								data: [
									['testdata','testdata'],
									['testdata','testdata'],
									['testdata','testdata'],
									['testdata','testdata']
								]
					    })
					},
					{
						xtype:'gridpanel',
						title:'order history',
						
						columns:[
							{
								text:'orderid',
								dataIndex:'fda'
							},
							{
								text:'order_date',
								width:200,
								dataIndex:'fdb'
							}
						]
						,
						store: new Ext.data.Store({
								proxy: {
									type: 'memory',
									reader: {
										type: 'array'
									}
								},
								fields: ['fda','fdb'],
								data: [
									['testdata','testdata'],
									['testdata','testdata'],
									['testdata','testdata'],
									['testdata','testdata']
								]
					    })
					}
					
				]
			  }
		   ]
		}
		
	
		var tabs={
			xtype:'tabpanel',
			region:'center',
			items:[
				tab1,
				tab2
			]
		};
		
		
		this.items=[
		  tabs
		];
		
		this.callParent();return;
	    this.items=[
		   {
		     xtype:'panel',
			 width:300,
			 split:true,
			 region:'west',
			 title:'west'
		   },
		   {
		     xtype:'panel',
			 region:'center',
			 titie:'客戶資料'
		   }
	  
		];
		
		this.callParent();
		
		return;
	
        this.items = [
            {
                html: KitchenSink.DummyText.mediumText
            },
            {
                title: 'Title',
                html: KitchenSink.DummyText.mediumText
            },
            {
                title: 'Header Icons',
                tools: [
                    { type:'pin' },
                    { type:'refresh' },
                    { type:'search' },
                    { type:'save' }
                ],
                html: KitchenSink.DummyText.mediumText
            },
            {
                title: 'Collapsed Panel',
                collapsed: true,
                collapsible: true,
                width: 640,
                html: KitchenSink.DummyText.mediumText,
                colspan: 3
            }
        ];

        this.callParent();
    }
});
