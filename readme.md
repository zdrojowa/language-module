# LanguageModule

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

Language list.

## Installation

Via Composer

``` bash
$ composer require zdrojowa/language-module
```

NPM required:
``` bash
"flag-icon-css": "3.4.6"
```

## Usage
- Add mix.module('LanguageModule', 'vendor/zdrojowa/language-module'); in webpack.mix.js
- npm run dev
- add css
``` bash
<link rel="stylesheet" href="{{ mix('vendor/css/LanguageModule.css','') }}">
```
- Use span flags
``` bash
<span class="flag-icon flag-icon-pl"></span>
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/zdrojowa/language-module.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/zdrojowa/language-module.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/zdrojowa/language-module/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/zdrojowa/language-module
[link-downloads]: https://packagist.org/packages/zdrojowa/language-module
[link-travis]: https://travis-ci.org/zdrojowa/language-module
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/zdrojowa
[link-contributors]: ../../contributors
