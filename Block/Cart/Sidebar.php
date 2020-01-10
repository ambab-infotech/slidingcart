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

namespace Ambab\SlidingCart\Block\Cart;

/**
 * Cart sidebar block.
 */
class Sidebar extends \Magento\Checkout\Block\Cart\Sidebar
{
    /**
     * @throws \RuntimeException
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Catalog\Helper\Image $imageHelper,
        \Magento\Customer\CustomerData\JsLayoutDataProviderPoolInterface $jsLayoutDataProvider,
        array $data = [],
        \Magento\Framework\Serialize\Serializer\Json $serializer = null,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $enable = $scopeConfig->getValue('slidingcart/general/enable');

        parent::__construct($context, $customerSession, $checkoutSession, $imageHelper, $jsLayoutDataProvider, $data, $serializer);

        if ($enable) {
            $path = 'Ambab_SlidingCart/minicart/content';
            $this->jsLayout['components']['minicart_content']['config']['template'] = $path;
        }

        if (!$enable) {
            $this->jsLayout['components']['totals']['config']['componentDisabled'] = true;
            $this->jsLayout['components']['coupon']['config']['componentDisabled'] = true;
            $this->jsLayout['components']['cart-title']['config']['componentDisabled'] = true;
        }
    }
}
