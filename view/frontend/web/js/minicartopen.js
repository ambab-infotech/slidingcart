define([
	"jquery",
	"jquery/ui",
	"underscore",
	"uiComponent",
	"mage/cookies",
	"mage/url"
],function($, Component, _, uiComponent, cookies, url){

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

			let addtocart_show_slidingcart = $("#addtocart_show_slidingcart").val();

	      	if(addtocart_show_slidingcart==1){ // Auto open sliding cart on Add To Cart
		      	let check_cookie = $.mage.cookies.get('slidingcart_show_cart');

				if(check_cookie == 1){
					setTimeout(function(){
						$('[data-block="minicart"]').find('[data-role="dropdownDialog"]').dropdownDialog("open");
						$.cookieStorage.set('slidingcart_show_cart', 0);
					},2000);
				}

			    $('.minicart-wrapper').on('contentLoading', function (event) {
			        $('[data-block="minicart"]').on('contentUpdated', function () {
			            $('[data-block="minicart"]').find('[data-role="dropdownDialog"]').dropdownDialog("open");
			            $.cookieStorage.set('slidingcart_show_cart', 0);
			        });
			    });
			}
	    }
	});
});