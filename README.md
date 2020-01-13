**Ambab SlidingCart**

This extension enables the system to replace the minicart into slidingcart which include extra functionality mentioned below.

**"FEATURES OF THE MAGENTO 2 SLIDING CART EXTENSION.**

The Magento 2 Sliding Cart Extension takes your mini cart to the next level with responsive design and conversion oriented features. 

Optimize user experience by allowing cart summary review in one glace, without leaving the product page.
This reduces checkout steps and minimizes friction. 

The result? Improved conversion as the customer goes directly to checkout; no need to visit the shopping cart page!

Cart page features are implemented on Sliding cart as follows below.

- Apply & remove coupon.

- view total summary.

- Easy to modify the products in the cart.


Improve the shopping experience by reducing the number of steps necessary for checkout.
Easily preview your cart summary.
Designed to improve conversions.
Modern responsive design.
Easily customize a design from admin options.


**Installation [Versions supported: 2.3.x onwards]**

**Install the extension through composer package manager steps as follows below.**

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

- Add directory to app/code manually

- bin/magento module:enable Ambab_SlidingCart

- bin/magento setup:upgrade

- bin/magento cache:flush

**Steps to uninstall a manually added module in app/code**

- bin/magento module:disable Ambab_SlidingCart

- remove directory from app/code manually

- bin/magento setup:upgrade

- bin/magento cache:flush


**Configurations**

You can check if the module has been installed using bin/magento module:status

You should be able to see Ambab_SlidingCart in the module list

Go to Admin -> Stores -> Configuration -> Ambab -> SlidingCart to configure SlidingCart

Option to enable/disable Totals, coupon payment summary, custom title and cart custom title. 

If you do not see Sliding Cart Module, please clear your Magento Cache from your admin panel (System -> Cache Management OR terminal hard refresh on browser also clear browser cache).


**Support**

Please feel free to reach out at tech.support@ambab.com
