# Extension for Laravel Blade allowing more concise syntax for components with a single, primary attribute

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nihilsen/laravel-blade-terse.svg?style=flat-square)](https://packagist.org/packages/nihilsen/laravel-blade-terse)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/nihilsen/laravel-blade-terse/run-tests?label=tests)](https://github.com/nihilsen/laravel-blade-terse/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/nihilsen/laravel-blade-terse/Check%20&%20fix%20styling?label=code%20style)](https://github.com/nihilsen/laravel-blade-terse/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/nihilsen/laravel-blade-terse.svg?style=flat-square)](https://packagist.org/packages/nihilsen/laravel-blade-terse)

This package extends the syntax for Blade components in your Laravel application, adding the possibility to include a single, primary attribute directly in the tag. This allows for a terser syntax, which is especially neat for simpler components that need some "main" attribute.

The attribute will be made available on the component as a variable with the same name as the component.

To differentiate between static and bound attributes, the value may be enclosed in single quotes `'` or double quotes `"` for static attributes, and  backquotes `` ` `` for bound attributes.

## Installation

You can install the package via composer:

```bash
composer require nihilsen/laravel-blade-terse
```

## Usage

```blade
{{-- <x-foo.bar bar="baz" /> --}}
<x-foo.bar="baz" />

{{-- <x-foobar :foobar="$qux" /> --}}
<x-foobar=`$qux` />
```

## Credits

- [nihilsen](https://github.com/nihilsen)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
