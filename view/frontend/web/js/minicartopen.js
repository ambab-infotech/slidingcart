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
		      	let check_cookie = $.mage.cookies.get('show_cart');

				url.setBaseUrl(BASE_URL);
				
				let URL = url.build('show_cart/index');

				if(check_cookie == 1){
					setTimeout(function(){ // avoid blank slidingcart
						$('[data-block="minicart"]').find('[data-role="dropdownDialog"]').dropdownDialog("open");
						
						$.ajax({ // unset cookie [show_cart]
			                url : URL,
			                type : 'POST',
			                dataType : 'text',
			                success : function(data) {              
			                    //console.log(data);
			                }
			            });
					},1500);
				}

			    $('.minicart-wrapper').on('contentLoading', function (event) {
			        $('[data-block="minicart"]').on('contentUpdated', function () {
			            $('[data-block="minicart"]').find('[data-role="dropdownDialog"]').dropdownDialog("open");
						
						$.ajax({ // unset cookie [show_cart]
			                url : URL,
			                type : 'POST',
			                dataType : 'text',
			                success : function(data) {              
			                    //console.log(data);
			                }
			            });
			        });
			    });
			}
	    }
	});
});