/**
 * Ambab
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Ambab.com license that is
 * available through the world-wide-web at this URL:
 * https://www.Ambab.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Ambab
 * @package     Ambab_SlidingCart
 * @copyright   Copyright (c) Ambab (https://www.Ambab.com/)
 * @license     https://www.Ambab.com/
 */
 
require([
    "jquery",
    'Magento_Customer/js/customer-data',
    'Magento_Checkout/js/model/quote',
],function ($, customerData, quote){
    'use strict';

    quote.shippingMethod.subscribe(function () {
		var sections = ['cart'];
	    customerData.invalidate(sections); // used to refresh minicart Shipping & Handling
    });
});