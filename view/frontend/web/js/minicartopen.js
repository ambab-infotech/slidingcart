define([
	"jquery",
	"jquery/ui",
	"underscore",
	"uiComponent"
],function($, Component, _, uiComponent){

	"use strict";

	/**
	* Return the UI Component
	*/
	return uiComponent.extend({
	    /**
	     * Initialization method
	     */
	    initialize: function () {
	      	this._super();

			let localStorage = $.initNamespaceStorage('mage-cache-storage').localStorage;

			if(localStorage.get('show_cart') == true){
				$('[data-block="minicart"]').find('[data-role="dropdownDialog"]').dropdownDialog("open");

				localStorage.set('show_cart', false);
			}

		    $('.minicart-wrapper').on('contentLoading', function (event) {
		        $('[data-block="minicart"]').on('contentUpdated', function () {
		            $('[data-block="minicart"]').find('[data-role="dropdownDialog"]').dropdownDialog("open");
		            localStorage.set('show_cart', false);
		        });
		    });

		    $(document).on('customer-data-invalidate', function(event, sections){
		    	if (_.isEmpty(sections) || _.contains(sections, 'cart')) {
		            let localStorage = $.initNamespaceStorage('mage-cache-storage').localStorage;
				    localStorage.set('show_cart', true);
		        }
		    });
	    }
	});
});