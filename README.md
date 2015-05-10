Cockpit reCaptcha
===

A simple addon to be used with the [Cockpit CMS](http://getcockpit.com/).

Inserts the [Google reCAPTCHA](https://www.google.com/recaptcha/) widget in your form and validates the input.

Big thanks to [Florian Letsch](https://github.com/florianletsch) for the example addon Mailqueue I used and [Artur Heinze](https://github.com/aheinze) for creating Cockpit!

## Install

```
cd path/to/cockpit/modules/addons
git clone https://github.com/Bixie/cockpit-recaptcha Recaptcha
```

1. Download or clone
2. Place all files in folder `cockpit/modules/addons/Recaptcha`.
3. Open cockpit backend. You will find the settings of the addon at the Cockpit settings section.
4. Create your API keys at (https://www.google.com/recaptcha/admin) and save them in config.

## Display widget

Place widget in form:

```php
echo get_recaptcha();
```

## Validate input

Create a file with the name of the form in folder `custom/forms`, eg `custom/forms/Contact.php`, with the following content

```php
return check_recaptcha();
```

## Licensed under MIT License

Copyright 2015 Matthijs Alles under the MIT license.

The MIT License (MIT)

Copyright (c) 2015 Matthijs Alles, http://www.bixie.nl

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.