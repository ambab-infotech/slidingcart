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

namespace Ambab\SlidingCart\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    
    public function execute()
    {
		if (isset($_COOKIE['show_cart'])) {
			unset($_COOKIE['show_cart']);
			setcookie('show_cart', '', time() - 3600, '/'); // empty value and old timestamp
			echo "Cookie Deleted!!";
		}
    }
}