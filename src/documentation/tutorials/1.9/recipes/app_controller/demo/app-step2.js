define([
	"dojo/dom", 
	"dojo/dom-style", 
	"dojo/dom-class", 
	"dojo/dom-construct", 
	"dojo/dom-geometry", 
	"dojo/string", 
	"dojo/on", 
	"dojo/aspect", 
	"dojo/keys", 
	"dojo/_base/config",
	"dojo/_base/lang", 
	"dojo/_base/fx", 
	"dijit/registry", 
	"dojo/parser",
	"dijit/layout/ContentPane", 
	"dojox/data/FlickrRestStore", 
	"dojox/image/LightboxNano",
	"demo/module"
	], 
	function(dom, domStyle, domClass, domConstruct, domGeometry, string, on, aspect, keys, config, lang, baseFx, registry, parser, ContentPane, FlickrRestStore, LightboxNano) {

	var store = null,
		preloadDelay = 500,
		flickrQuery = config.flickrRequest || {},

		itemTemplate = '<img src="${thumbnail}">${title}',
		itemClass = 'item',
		itemsById = {},

		largeImageProperty = "media.l", // path to the large image url in the store item
		thumbnailImageProperty = "media.t", // path to the thumb url in the store item

		startup = function() {

			// create the data store
			var flickrStore = store = new FlickrRestStore();

			// build up and initialize the UI
			initUi();
		},

		initUi = function() {
			// summary: 
			// 		create and setup the UI with layout and widgets

			// create a single Lightbox instnace which will get reused
			lightbox = new LightboxNano({});

			// set up ENTER keyhandling for the search keyword input field
			on(dom.byId("searchTerms"), "keydown", function(evt){
				if(evt.keyCode == keys.ENTER){
					evt.preventDefault();
					doSearch();
				}
			});

			// set up click handling for the search button
			on(dom.byId("searchBtn"), "click", doSearch);			
		},
		doSearch = function() {
			// summary: 
			// 		inititate a search for the given keywords
			var terms = dom.byId("searchTerms").value;
			console.log(terms);
		},
		showImage = function (url, originNode){
			// summary: 
			// 		Show the full-size image indicated by the given url
		};
	
	return {
		init: function() {

			// register callback for when dependencies have loaded
			startup();

		}
	};

});