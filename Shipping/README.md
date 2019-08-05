# Clean install:
Upload the "Toshi" folder to the following directory: "public_html/app/code"
SSH into the server and navigate to the "public_html" directory

Run the following commands in the terminal:

```
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:flush
php bin/magento cache:clean
```

1. Login the the Magento backend \
Go to "System" -> "Cache Management"
Under the "Additional Cache Management" section, click "Flush Javascript/Css Cache"
Go to "Stores" -> "Configuration"
Expand the "Sales" section and click "Shipping Methods"
Expand the "Toshi Concierge Delivery" shipping option and enable it (if necessary)
Update the "Minimum Basket Amount" value (if necessary)
Set the "Toshi Endpoint URL" to "https://www.toshi.co"
Set the "Toshi Client API Key" to the key provided to you
Set the "Toshi Server API Key" to the key provided to you
Click "Save Config"


# Upgrade:
Upload the "Toshi" folder to the following directory: "public_html/app/code"
SSH into the server and navigate to the "public_html" directory
Run the following commands in the terminal:
```
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:flush
php bin/magento cache:clean
```
