# Ambab SlidingCart

This extension enables the system to replace the minicart into slidingcart. 
It takes your mini cart to the next level with responsive design and conversion oriented features. 
Optimize user experience by allowing cart summary review in one glace, without leaving the product page.
The result? Improved conversion as the customer goes directly to checkout; no need to visit the shopping cart page!

# Features

- Sliding cart with more details

- Apply & remove coupon.
 
- View total summary.

- Easy to modify the products in the cart.

- Removes sliding cart from cart & checkout page.

- 100% open source

- Easy to install 


# Installation/Uninstallation [Versions supported: 2.3.x onwards]

**Steps to install with composer**

- composer require ambab/module-slidingcart

- bin/magento module:enable Ambab_SlidingCart

- bin/magento setup:upgrade

- bin/magento setup:di:compile

- bin/magento cache:flush

**Steps to uninstall a composer installed module**

- bin/magento module:disable Ambab_SlidingCart

- bin/magento module:uninstall Ambab_SlidingCart

- composer remove ambab/module-slidingcart

- bin/magento cache:flush


**Steps to install module manually in app/code**

- Add directory to app/code/Ambab/SlidingCart manually

- bin/magento module:enable Ambab_SlidingCart

- bin/magento setup:upgrade

- bin/magento cache:flush

**Steps to uninstall a manually added module in app/code**

- bin/magento module:disable Ambab_SlidingCart

- remove directory from app/code/Ambab/SlidingCart manually

- bin/magento setup:upgrade

- bin/magento cache:flush


# Configurations

Go to Admin -> Stores -> Configuration -> Ambab -> SlidingCart to configure SlidingCart

Option to enable/disable totals, apply & remove coupon, payment summary, custom payment title and custom cart title. 


# Support

Please feel free to reach out at tech.support@ambab.com
