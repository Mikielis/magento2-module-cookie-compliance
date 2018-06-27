
# EU cookie law compliance, Magento 2 extension

This Magento 2 extension adds a notice telling visitors that your website uses cookies.<br />
Tbe bar can be displayed in two different positions and it contains a short sentence, three buttons - more info, allow cookies and close button in top right corner.<br />
Optionally can be diplayed store’s logo above the sentence.

In your Magento admin you will be able to set following settings:

> Functional settings:

- enable/disable module
- cookie lifetime (in seconds)
- show/hide close button
- change behaviour of the close button (hide bar or hide bar and allow cookies)

> Design settings:

- message position (top or bottom)
- logo (it can be displayed above the sentence or it can be hidden)
- “more info” and “allow” buttons: font and background colours, border size and colour, font and background colours when a cursor hovers over them.

> Content:

- add/change sentence
- “more info” button text
- “more info” button URL
- “allow” button text

# Screenshots

Store: https://photos.app.goo.gl/FemGJaujbKYwEXZV7<br />
Magento admin: https://photos.app.goo.gl/fxhzBcX4Rosw2WYv9

# Installation

Pull in the extension through Composer:

```php
composer require mikielis/magento2-module-cookie-compliance
```

Learn more on how to install Magento 2 extensions from the command line and follow listed steps:
https://devdocs.magento.com/guides/v2.2/comp-mgr/install-extensions.html
