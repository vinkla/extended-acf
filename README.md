# ACF

![acf](https://user-images.githubusercontent.com/499192/34915298-1782a500-f924-11e7-85a7-dc7de6aacc14.png)

> An [Advanced Custom Fields](https://www.advancedcustomfields.com) helper for [WordPlate](https://wordplate.github.io).

If you're working with multiple developers on a WordPress application with custom fields it can be hard to keep track of changes made in custom fields. This package will help you register advanced custom fields with PHP without caring about field keys. All fields will have their own helper function that automagically create unique field keys based on their parent field group. All fields exists within the theme and can be added to version control.

[![Build Status](https://img.shields.io/travis/wordplate/acf/master.svg?style=flat)](https://travis-ci.org/wordplate/acf)
[![StyleCI](https://styleci.io/repos/87427318/shield?style=flat)](https://styleci.io/repos/87427318)
[![Coverage Status](https://img.shields.io/codecov/c/github/wordplate/acf.svg?style=flat)](https://codecov.io/github/wordplate/acf)
[![Total Downloads](https://img.shields.io/packagist/dt/wordplate/acf.svg?style=flat)](https://packagist.org/packages/wordplate/acf)
[![Latest Version](https://img.shields.io/github/release/wordplate/acf.svg?style=flat)](https://github.com/wordplate/acf/releases)
[![License](https://img.shields.io/packagist/l/wordplate/acf.svg?style=flat)](https://packagist.org/packages/wordplate/acf)

## Installation

Require this package, with [Composer](https://getcomposer.org), in the root directory of your project.

```bash
$ composer require wordplate/acf
```

Download the [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/pro) plugin and put it in either the `plugins` or `mu-plugins` directory. Visit the WordPress dashboard and activate the plugin. Please note that this package supports ACF version 5.6 or later.

#### ACF Pro

If you want to install [ACF Pro](https://www.advancedcustomfields.com/pro) with Composer you may use the [repositories feature](https://getcomposer.org/doc/05-repositories.md#package-2). Add the snippet below to your `composer.json` file. Replace `your-acf-key` with your ACF Pro key and run `composer install`. Composer should now install the plugin to the `plugins` directory.

```json
"repositories": [
    {
        "type": "package",
        "package": {
            "name": "wpackagist-plugin/advanced-custom-fields-pro",
            "type": "wordpress-plugin",
            "version": "5.6.10",
            "dist": {
                "url": "https://connect.advancedcustomfields.com/index.php?v=5.6.10&p=pro&a=download&k=your-acf-key",
                "type": "zip"
            }
        }
    }
]
```

## Usage

Use the `acf_field_group()` helper function to register a new field group in ACF. It uses the [`acf_add_local_field_group()`](https://www.advancedcustomfields.com/resources/register-fields-via-php#example) function behind the scenes. The difference is that it appends the `key` value to all fields. Below you'll find an example of a field group.

```php
$fields = [
    acf_image(['name' => 'image', 'label' => 'Image']),
    acf_text(['name' => 'title', 'label' => 'Title']),
];

$location = [
    [
        acf_location('post_type', 'page')
    ],
];

acf_field_group([
    'title' => 'About',
    'fields' => $fields,
    'style' => 'seamless',
    'location' => $location,
]);
```

[Visit the official documentation to read more about the field group settings.](https://www.advancedcustomfields.com/resources/register-fields-via-php#group-settings)

## Fields

All fields accepts an array of settings. All field settings arrays must have the keys `label` and `name`. Below the example you'll find a list of available field functions.

```php
acf_text([
    'name' => 'unique-field-name',
    'label' => 'Field Label',
    'instructions' => 'Add the text value',
    'required' => true,
]);
```

### Settings

Below you'll find a list of settings and their descriptions you can add to your fields. **Please note** that the `type` and `key` values will be automagically added by this package. Please don't add these values manually, they will be overwritten. [Visit the official documentation](https://www.advancedcustomfields.com/resources/register-fields-via-php#field-settings) to read more about the field settings.

Name | Description
---- | -----------
`label` | This is the label which appears on the edit page when entering a value.
`name` | This is the name used to save and load data from the database. This name must be a single word, no spaces, underscores and dashes allowed.
`instructions` | This text appears on the edit page when entering a value.
`required` | Required fields will cause validation to run when saving a post. When attempting to save an empty value to a required field, an error message will display.
`conditional_logic` | Once enabled, more settings will appear to customize the logic which determines if the current field should be visible or not. Groups of conditional logic can be created to allow for multiple and/or statements. The available [toggle](#choice-fields) fields are limited to those which are of the type select, checkbox, true/false, radio.
`wrapper` | The array of attributes given to the field element such as width, class and id.
`prepend` | The prepend value adds a visual text element before the input.
`append` | The append value adds a visual text element before the input.
`default_value` | The default value if no value has yet been saved.
`placeholder` | The placeholder appears within input when no value exists.

### Basic Fields

**Email** - The [email field](https://www.advancedcustomfields.com/resources/text) creates a simple email input.

```php
acf_email([
    'name' => 'email',
    'label' => 'Email',
    'instructions' => 'Add the employees email address.',
    'required' => true,
]);
```

**Number** - The [number field](https://www.advancedcustomfields.com/resources/text) creates a simple number input.

```php
acf_number([
    'name' => 'age',
    'label' => 'Age',
    'instructions' => 'Add the employees age.',
    'required' => true,
    'min' => 18,
    'max' => 65,
]);
    ```

**Password** - The [password field](https://www.advancedcustomfields.com/resources/text) creates a simple password input.

```php
acf_password([
    'name' => 'password',
    'label' => 'Password',
    'instructions' => 'Add the employees secret pwned password.',
    'required' => true,
]);
```

**Range** - The [range](https://www.advancedcustomfields.com/resources/range) field provides an interactive experience for selecting a numerical value.

    ```php
    acf_range([
        'name' => 'rate',
        'label' => 'Rate',
        'instructions' => 'Add the employees completion rate.',
        'required' => true,
        'min' => 0,
        'max' => 100,
    ]);
    ```

**Text** - The [text field](https://www.advancedcustomfields.com/resources/text) creates a simple text input.

```php
acf_text([
    'name' => 'name',
    'label' => 'Name',
    'instructions' => 'Add the employees name.',
    'required' => true,
]);
```

**Textarea** - The [textarea field](https://www.advancedcustomfields.com/resources/textarea) creates a simple textarea.

```php
acf_textarea([
    'name' => 'biography',
    'label' => 'Biography',
    'instructions' => 'Add the employees biography.',
    'required' => true,
    'rows' => 3,
]);
```

**URL** - The [url field](https://www.advancedcustomfields.com/resources/text) creates a simple url input.

```php
acf_url([
    'name' => 'website',
    'label' => 'Website',
    'instructions' => 'Add the employees website link.',
    'required' => true,
]);
```

### Choice Fields

- `acf_button_group()` - The [button group](https://www.advancedcustomfields.com/resources/button-group) field creates a list of radio buttons.
- `acf_checkbox()` - The [checkbox field](https://www.advancedcustomfields.com/resources/checkbox) creates a list of tick-able inputs.
- `acf_radio()` - The [radio button field](https://www.advancedcustomfields.com/resources/radio-button) creates a list of select-able inputs.
- `acf_select()` - The [select field](https://www.advancedcustomfields.com/resources/select) creates a drop down select or multiple select input.
- `acf_true_false()` - The [true / false field](https://www.advancedcustomfields.com/resources/true-false) allows you to select a value that is either 1 or 0.

### Content Fields

- `acf_file()` - The [file field](https://www.advancedcustomfields.com/resources/file) allows a file to be uploaded and selected.
- `acf_gallery()` - The [gallery field](https://www.advancedcustomfields.com/resources/gallery) provides a simple and intuitive interface for managing
- `acf_image()` - The [image field](https://www.advancedcustomfields.com/resources/image) allows an image to be uploaded and selected.
- `acf_oembed()` - The [oEmbed field](https://www.advancedcustomfields.com/resources/oembed) allows an easy way to embed videos, images, tweets, audio, and other content.
- `acf_wysiwyg()` - The [WYSIWYG field](https://www.advancedcustomfields.com/resources/wysiwyg-editor) creates a full WordPress tinyMCE content editor.

### jQuery Fields

- `acf_color_picker()` - The [color picker field](https://www.advancedcustomfields.com/resources/color-picker) allows a color to be selected via a JavaScript popup.
- `acf_date_picker()` - The [date picker field](https://www.advancedcustomfields.com/resources/date-picker) creates a jQuery date selection popup.
- `acf_date_time_picker()` - The [date time picker field](https://www.advancedcustomfields.com/resources/date-time-picker) creates a jQuery date & time selection popup.
- `acf_google_map()` - The [Google Map field](https://www.advancedcustomfields.com/resources/google-map) creates an interactive map with the ability to place a marker.
- `acf_time_picker()` - The [time picker field](https://www.advancedcustomfields.com/resources/time-picker) creates a jQuery time selection popup.

### Layout Fields

- `acf_accordion()` - The [accordion field](https://www.advancedcustomfields.com/resources/accordion) is used to organize fields into collapsible panels.
- `acf_clone()` - The [clone field](https://www.advancedcustomfields.com/resources/clone) allows you to select and display existing fields.
- `acf_flexible_content()` - The [flexible content field](https://www.advancedcustomfields.com/resources/flexible-content) acts as a blank canvas to which you can add an unlimited number of layouts with full control over the order.
- `acf_group()` - The [group](https://www.advancedcustomfields.com/resources/group) allows you to create a group of sub fields.
- `acf_message()` - The message fields allows you to display a text message.
- `acf_repeater()` - The [repeater field](https://www.advancedcustomfields.com/resources/repeater) allows you to create a set of sub fields which can be repeated again and again whilst editing content!
- `acf_tab()` - The [tab field](https://www.advancedcustomfields.com/resources/tab) is used to group together fields into tabbed sections. 

### Relational Fields

- `acf_link()` - The [page link field](https://www.advancedcustomfields.com/resources/link) provides a simple way to select or define a link (url, title, target).
- `acf_page_link()` - The [page link field](https://www.advancedcustomfields.com/resources/page-link) allows the selection of 1 or more posts, pages or custom post types.
- `acf_post_object()` - The [post object field](https://www.advancedcustomfields.com/resources/post-object) creates a select field where the choices are your pages + posts + custom post types. 
- `acf_relationship()` - The [relationship field](https://www.advancedcustomfields.com/resources/relationship) creates a very attractive version of the post object field. 
- `acf_taxonomy()` - The [taxonomy field](https://www.advancedcustomfields.com/resources/taxonomy) allows the selection of 1 or more taxonomy terms. 
- `acf_user()` - The user field creates a select field for all your users. 

## Helpers

This package provides helper functions for [conditional logic](#conditional-logic), [layout](#layout), [location](#location) and [options pages](#options-page) to help you write less code.

### Conditional Logic

The conditional function help you write [conditional logic](#settings) without knowing the fields `key` value.

```php
acf_select([
    'name' => 'type',
    'label' => 'Type',
    'choices' => [
        'document' => 'Document',
        'link' => 'Link to resource',
    ],
]),
acf_file([
    'name' => 'file',
    'label' => 'Document',
    'conditional_logic' => [
        [
            acf_conditional('type', 'document')
        ],
    ],
]),
acf_url([
    'name' => 'url',
    'label' => 'Link',
    'conditional_logic' => [
        [
            acf_conditional('type', 'link')
        ],
    ],
]),
```

### Layout

The layout function help you write [flexible content layouts](https://www.advancedcustomfields.com/resources/flexible-content) without knowing the fields `key` value.

```php
acf_layout([
    'label' => 'Layout',
    'name' => 'layout',
    'sub_fields' => [ ... ]
]);
```

Instead of using [`get_row_layout`](https://www.advancedcustomfields.com/resources/get_row_layout) and compare it against a string you may use the `is_layout` function.

```php
if (is_layout('text')) {
    // Load the layout row template view.
}
```

### Location

The location function help you write [custom location rules](https://www.advancedcustomfields.com/resources/custom-location-rules) without the `name`, `operator` and `value` keys.

```php
acf_location('post_type', 'post');

acf_location('post_type', '!=', 'post');
```

## Theming

This package provides two helpers to make theming with custom fields much cleaner.

### Field

Instead of fetching data with `get_field` and `get_sub_field` you can use the `field` helper function. It works as the `get_field` function except that if checks if the given field name is a sub field first.

```php
echo field('title');
```

> **Note:** This will not work if nested fields in a field group share the same name.

### Option

Instead of passing the `option` key to the `get_field` function we can now use the new option function. It will automagically use the `get_field` function with the `option` key.

```php
echo option('github-url');
```

## Resources

Below you'll find a list of articles which can help you getting started and advance your custom fields knowledge.

- [A Beginner’s Guide to Advanced Custom Fields](https://www.advancedcustomfields.com/blog/beginners-guide-advanced-custom-fields)
- [Best Practices when Designing Custom Fields](https://www.advancedcustomfields.com/blog/best-practices-designing-custom-fields)
- [Organizing Custom Fields Inside of WordPress with ACF](https://www.advancedcustomfields.com/blog/organizing-custom-fields-inside-wordpress-acf)
- [Wait, ACF Has Settings?](https://www.advancedcustomfields.com/blog/acf-has-settings)

## License

[MIT](LICENSE) © [Vincent Klaiber](https://vinkla.com)
