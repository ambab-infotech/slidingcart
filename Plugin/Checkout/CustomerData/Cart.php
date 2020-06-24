<?php
/**
 * Ambab SlidingCart Extension.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Ambab
 *
 * @copyright   Copyright (c) 2019 Ambab (https://www.ambab.com/)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

namespace Ambab\SlidingCart\Plugin\Checkout\CustomerData;

use Ambab\SlidingCart\Helper\Data as helperData;
use Magento\Checkout\Helper\Data as CheckoutHelper;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Quote\Model\Quote;

/**
 * Class Cart
 * Ambab\SlidingCart\Plugin\Checkout\CustomerData.
 */
class Cart
{
    /**
     * @var Magento\Checkout\Model\Session
     */
    protected $checkoutSession;
    /**
     * @var Magento\Checkout\Helper\Data
     */
    protected $checkoutHelper;
    /**
     * @var Magento\Quote\Model\Quote
     */
    protected $quote = null;
    /**
     * @var Ambab\SlidingCart\Helper\Data
     */
    protected $helperData;
    /**
     * @var \Magento\Checkout\Model\Cart
     */
    protected $checkoutCart;
    /**
     * @var \Magento\Quote\Api\CartTotalRepositoryInterface
     */
    protected $cart;
    /**
     * @var \Magento\Framework\Pricing\Helper\Data
     */
    protected $priceHelper;
    /**
     * @var \Magento\Quote\Model\QuoteIdMaskFactory
     */
    protected $quoteIdMaskFactory;
    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $customerSession;
    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlInterface;

    public function __construct(
        CheckoutSession $checkoutSession,
        CheckoutHelper $checkoutHelper,
        helperData $helperData,
        \Magento\Quote\Api\CartTotalRepositoryInterface $cart,
        \Magento\Checkout\Model\Cart $checkoutCart,
        \Magento\Framework\Pricing\Helper\Data $priceHelper,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Quote\Model\QuoteIdMaskFactory $quoteIdMaskFactory,
        \Magento\Framework\UrlInterface $urlInterface,
	    \Magento\Quote\Api\Data\AddressInterface $address,
        \Magento\Checkout\Api\ShippingInformationManagementInterface $shippingInformationManagement,
	    \Magento\Checkout\Api\Data\ShippingInformationInterface $shippingInformation
    ) {
        $this->checkoutSession = $checkoutSession;
        $this->checkoutHelper = $checkoutHelper;
        $this->helperData = $helperData;
        $this->cart = $cart;
        $this->checkoutCart = $checkoutCart;
        $this->priceHelper = $priceHelper;
        $this->quoteIdMaskFactory = $quoteIdMaskFactory;
        $this->customerSession = $customerSession;
        $this->urlInterface = $urlInterface;
	    $this->address = $address;
        $this->shippingInformationManagement = $shippingInformationManagement;
	    $this->shippingInformation = $shippingInformation;
    }

    /**
     * Add additional custom data to result.
     *
     * @return array
     */
    public function afterGetSectionData(
        \Magento\Checkout\CustomerData\Cart $subject,
        array $result
    ) {
        $quoteId = $this->checkoutCart->getQuote()->getId();

	    $this->address->setCountryId('DE');
        $shipping = $this->shippingInformation->setShippingAddress($this->address);
        $shipping->setShippingCarrierCode('flatrate');
        $shipping->setShippingMethodCode('flatrate');
        $this->shippingInformationManagement->saveAddressInformation($quoteId, $shipping);

        $totals = $this->cart->get($quoteId)->getTotalSegments();
        $quoteIdMask = $this->quoteIdMaskFactory->create()->load($quoteId, 'quote_id');
	
        $coupon_code = $this->getQuote()->getCouponCode();
        $isLoggedIn = $this->customerSession->isLoggedIn();
        $addtocartShowSc = boolval($this->helperData->getGeneralConfig('addtocart_show_slidingcart'));

        $_totals = [];

        foreach ($totals as $key => $value) {
            $_totals[] = [
                'title' => $value->getTitle(),
                'value' => $this->priceHelper->currency($value->getValue(), true, false),
            ];
        }
        $result['slidingcart']['totals'] = $_totals;
        $result['slidingcart']['coupon_code'] = ($coupon_code != '' ? $coupon_code : null);
        $result['slidingcart']['coupon_enable'] = boolval($this->helperData->getGeneralConfig('coupon'));
        $result['slidingcart']['totals_enable'] = boolval($this->helperData->getGeneralConfig('totals'));
        $result['slidingcart']['addtocart_show_slidingcart'] = $addtocartShowSc;
        $result['slidingcart']['cart_title'] = $this->helperData->getGeneralConfig('cart_title');
        $result['slidingcart']['totals_title'] = $this->helperData->getGeneralConfig('totals_title');
        $result['slidingcart']['quoteId'] = $quoteIdMask->getMaskedId();
        $result['slidingcart']['isLoggedIn'] = ($isLoggedIn != '' ? true : false);
        $result['slidingcart']['apiUrl'] = $this->urlInterface->getBaseUrl().'rest/default/V1/';
        $totals = $this->getQuote()->getTotals();
        $result['slidingcart']['grand_total'] = isset($totals['grand_total'])
            ? $this->priceHelper->currency($totals['grand_total']->getValue(), true, false)
            : 0;

        return $result;
    }

    /**
     * Get active quote.
     *
     * @return Quote
     */
    protected function getQuote()
    {
        if ($this->quote === null) {
            $this->quote = $this->checkoutSession->getQuote();
        }

        return $this->quote;
    }
}
