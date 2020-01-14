# Ambab SlidingCart

Sliding Cart extension for Magento 2 enhances mini cart to the next level with responsive design and conversion oriented features. Improves user experience by allowing cart summary review in one glace, without leaving the current page. No need to visit the shopping cart page! Most of the cart features are implemented in the Sliding Cart extension.

Customers can use coupon code in Sliding Cart to test and find out the grand total after being discounted. Customers can apply, then cancel the coupon codes right from the sliding cart easily. This feature helps customers to view the summary without leaving the current page. Customers can also add/ update qty, delete the product from the sliding cart itself.

# Features

 - Easily preview your cart summary.

 - Designed to improve conversions.

 - Update Mini cart in layout & effect with Modern responsive design.

 - Apply coupon code from the Mini cart.

 - Enable/ Disable the extension.

 - Allow/ Disallow auto-opening the quick cart.

 - Allow/ Disallow showing coupon codes.

 - Allow/ Disallow showing Order summary.

 - Cart title can be edited from backend.

 - Order summary title can be edited from backend.

 - Easily customize a design from admin options.

 - 100% open source.
 
 - Easy to install.


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

Go to Admin -> Stores -> Configuration -> Ambab -> Sliding Cart.

Option to enable/disable totals, apply & remove coupon, payment summary, custom payment title and custom cart title. 

# Contribute

Feel free to fork and contribute to this module by creating a PR to master branch (https://github.com/ambab-infotech/slidingcart).

# Support

For issues please raise here https://github.com/ambab-infotech/slidingcart/issues

In case of additional support feel free to reach out at tech.support@ambab.com