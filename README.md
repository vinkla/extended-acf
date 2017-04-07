# ACF

> An [Advanced Custom Fields](https://www.advancedcustomfields.com) helper for [WordPlate](https://wordplate.github.io).

[![Build Status](https://img.shields.io/travis/wordplate/acf/master.svg?style=flat)](https://travis-ci.org/wordplate/acf)
[![StyleCI](https://styleci.io/repos/87427318/shield?style=flat)](https://styleci.io/repos/87427318)
[![Coverage Status](https://img.shields.io/codecov/c/github/wordplate/acf.svg?style=flat)](https://codecov.io/github/wordplate/acf)
[![Latest Version](https://img.shields.io/github/release/wordplate/acf.svg?style=flat)](https://github.com/wordplate/acf/releases)
[![License](https://img.shields.io/packagist/l/wordplate/acf.svg?style=flat)](https://packagist.org/packages/wordplate/acf)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```bash
$ composer require wordplate/acf
```

## Usage

Use the `acf_field_group()` helper function to register a new field group in ACF. It uses the [`acf_add_local_field_group()`](https://www.advancedcustomfields.com/resources/register-fields-via-php#example) function behind the scenes. The difference is that it appends the `key` value to all fields and appends an array of elements to the `hide_on_screen` array by default. Below you'll find an example of a field group below.

```php
$fields = [
    acf_image(['name' => 'image', 'label' => 'Image']),
    acf_text(['name' => 'title', 'label' => 'Title']),
];

$location = [
    acf_location('post_type', 'post'),
    acf_location('post_type', '!=', 'page'),
];

acf_field_group([
    'title' => 'About',
    'key' => 'group_about',
    'fields' => $fields,
    'location' => [
        $location
    ],
]);
```

[Visit the official documentation to read more about the field group settings.](https://www.advancedcustomfields.com/resources/register-fields-via-php#group-settings)

### Fields

Below you'll find a list of available field functions. All fields accepts an array of settings. All field settings arrays must have the keys `label` and `name`.

```php
$settings = [
    'label' => 'Field Label'
    'name' => 'unique-field-name'
];

// Basic field types.
acf_text($settings);
acf_textarea($settings);
acf_number($settings);
acf_email($settings);
acf_url($settings);
acf_password($settings);

// Content field types.
acf_wysiwyg($settings);
acf_image($settings);
acf_oembed($settings);
acf_file($settings);
acf_gallery($settings);

// Choice field types.
acf_select($settings);
acf_checkbox($settings);
acf_radio($settings);
acf_true_false($settings);

// Relational field types.
acf_post_object($settings);
acf_page_link($settings);
acf_relationship($settings);
acf_taxonomy($settings);
acf_user($settings);
```

[Visit the official documentation to read more about the field settings.](https://www.advancedcustomfields.com/resources/register-fields-via-php#field-settings)

## License

[MIT](LICENSE) © [Vincent Klaiber](https://vinkla.com)
