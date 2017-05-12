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

## Fields

All fields accepts an array of settings. All field settings arrays must have the keys `label` and `name`. Below the example you'll find a list of available field functions.

```php
acf_text([
    'label' => 'Field Label'
    'name' => 'unique-field-name'
]);
```

[Visit the official documentation to read more about the field settings.](https://www.advancedcustomfields.com/resources/register-fields-via-php#field-settings)

#### Basic Fields

- `acf_text()` - The text field creates a simple text input.
- `acf_textarea()` - The textarea field creates a simple textarea.
- `acf_number()` - The number field creates a simple number input.
- `acf_email()` - The email field creates a simple email input.
- `acf_url()` - The url field creates a simple url input.
- `acf_password()` - The password field creates a simple password input.

#### Choice Fields

- `acf_checkbox()` - The checkbox field creates a list of tick-able inputs.
- `acf_radio()` - The radio button field creates a list of select-able inputs.
- `acf_select()` - The select field creates a drop down select or multiple select input.
- `acf_true_false()` - The true / false field allows you to select a value that is either 1 or 0.

#### Content Fields

- `acf_file()` - The file field allows a file to be uploaded and selected.
- `acf_gallery()` - The gallery field provides a simple and intuitive interface for managing
- `acf_image()` - The image field allows an image to be uploaded and selected.
- `acf_oembed()` - The oEmbed field allows an easy way to embed videos, images, tweets, audio, and other content.
- `acf_wysiwyg()` - The WYSIWYG field creates a full WordPress tinyMCE content editor.

#### jQuery Fields

- `acf_color_picker()` - The color picker field allows a color to be selected via a JavaScript popup.
- `acf_date_picker()` - The date picker field creates a jQuery date selection popup.
- `acf_date_time_picker()` - The date time picker field creates a jQuery date & time selection popup.
- `acf_google_map()` - The Google Map field creates an interactive map with the ability to place a marker.
- `acf_time_picker()` - The time picker field creates a jQuery time selection popup.

#### Layout Fields

- `acf_repeater()` - The repeater field allows you to create a set of sub fields which can be repeated again and again whilst editing content!

#### Relational Fields

- `acf_page_link()` - The page link field allows the selection of 1 or more posts, pages or custom post types.
- `acf_post_object()` - The post object field creates a select field where the choices are your pages + posts + custom post types. 
- `acf_relationship()` - The relationship field creates a very attractive version of the post object field. 
- `acf_taxonomy()` - The taxonomy field allows the selection of 1 or more taxonomy terms. 
- `acf_user()` - The user field creates a select field for all your users. 

## License

[MIT](LICENSE) © [Vincent Klaiber](https://vinkla.com)
