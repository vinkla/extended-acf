# ACF

![acf](https://user-images.githubusercontent.com/499192/34915298-1782a500-f924-11e7-85a7-dc7de6aacc14.png)

> An [Advanced Custom Fields](https://www.advancedcustomfields.com) helper for [WordPlate](https://wordplate.github.io).

If you're working with multiple developers on a WordPress application with custom fields it can be hard to keep track of changes made in custom fields. This package will help you register advanced custom fields with PHP without caring about field keys. All fields will have their own helper function that automagically create unique field keys based on their parent field group. All fields exists within the theme and can be added to version control.

[![Build Status](https://badgen.net/travis/wordplate/acf/master)](https://travis-ci.org/wordplate/acf)
[![Coverage Status](https://badgen.net/codecov/c/github/wordplate/acf)](https://codecov.io/github/wordplate/acf)
[![Total Downloads](https://badgen.net/packagist/dt/wordplate/acf)](https://packagist.org/packages/wordplate/acf)
[![Latest Version](https://badgen.net/github/release/wordplate/acf)](https://github.com/wordplate/acf/releases)
[![License](https://badgen.net/packagist/license/wordplate/acf)](https://packagist.org/packages/wordplate/acf)

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
            "version": "5.7.2",
            "dist": {
                "url": "https://connect.advancedcustomfields.com/index.php?v=5.7.2&p=pro&a=download&k=your-acf-key",
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
    'new_lines' => 'br', // br or wpautop
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

**Button Group** - The [button group](https://www.advancedcustomfields.com/resources/button-group) field creates a list of radio buttons.

```php
acf_button_group([
    'name' => 'color',
    'label' => 'Color',
    'instructions' => 'Select the box shadow color.',
    'required' => true,
    'choices' => [
        'cyan' => 'Cyan',
        'hotpink' => 'Hotpink',
    ],
    'default_value' => [
        'hotpink',
    ],
]);
```

**Checkbox** - The [checkbox field](https://www.advancedcustomfields.com/resources/checkbox) creates a list of tick-able inputs.

```php
acf_checkbox([
    'name' => 'color',
    'label' => 'Color',
    'instructions' => 'Select the border color.',
    'required' => true,
    'choices' => [
        'cyan' => 'Cyan',
        'hotpink' => 'Hotpink',
    ],
    'default_value' => [
        'hotpink',
    ],
]);
```

**Radio** - The [radio button field](https://www.advancedcustomfields.com/resources/radio-button) creates a list of select-able inputs.

```php
acf_radio([
    'name' => 'color',
    'label' => 'Color',
    'instructions' => 'Select the text color.',
    'required' => true,
    'choices' => [
        'cyan' => 'Cyan',
        'hotpink' => 'Hotpink',
    ],
    'default_value' => [
        'cyan',
    ],
]);
```

**Select** - The [select field](https://www.advancedcustomfields.com/resources/select) creates a drop down select or multiple select input.

```php
acf_select([
    'name' => 'color',
    'label' => 'Color',
    'instructions' => 'Select the background color.',
    'required' => true,
    'choices' => [
        'cyan' => 'Cyan',
        'hotpink' => 'Hotpink',
    ],
    'default_value' => [
        'cyan',
    ],
]);
```

**True False** - The [true / false field](https://www.advancedcustomfields.com/resources/true-false) allows you to select a value that is either 1 or 0.

```php
acf_true_false([
    'name' => 'display-social-media',
    'label' => 'Social Media',
    'instructions' => 'Select whether to display social media links or not.',
    'default_value' => false,
    'ui' => true,
]);
```

### Content Fields

**File** - The [file field](https://www.advancedcustomfields.com/resources/file) allows a file to be uploaded and selected.

```php
acf_file([
    'name' => 'menu',
    'label' => 'Menu',
    'instructions' => 'Add the menu <strong>pdf</strong> file.',
    'required' => true,
    'library' => 'all',
    'mime_types' => 'pdf',
    'return_format' => 'array',
    'min_size' => '400 KB',
    'max_size' => 5, // MB if entered as int
]);
```

**Gallery** - The [gallery field](https://www.advancedcustomfields.com/resources/gallery) provides a simple and intuitive interface for managing a collection of images.

```php
acf_gallery([
    'name' => 'images',
    'label' => 'Images',
    'instructions' => 'Add the gallery images.',
    'required' => true,
    'mime_types' => 'jpeg, jpg, png',
    'min_height' => 1000,
    'min_width' => 1200,
    'min' => 1,
    'max' => 6,
]);
```

**Image** - The [image field](https://www.advancedcustomfields.com/resources/image) allows an image to be uploaded and selected.

```php
acf_image([
    'name' => 'background-image',
    'label' => 'Background Image',
    'instructions' => 'Add an image in at least 12000x100px and only in the formats <strong>jpg</strong>, <strong>jpeg</strong> or <strong>png</strong>.',
    'library' => 'all',
    'mime_types' => 'jpeg, jpg, png',
    'min_height' => 1000,
    'min_width' => 1200,
    'preview_size' => 'medium',
    'return_format' => 'array',
]);
```

**Oembed** - The [oEmbed field](https://www.advancedcustomfields.com/resources/oembed) allows an easy way to embed videos, images, tweets, audio, and other content.

```php
acf_oembed([
    'name' => 'tweet',
    'label' => 'Tweet',
    'instructions' => 'Add a tweet from Twitter.',
    'required' => false,
]);
```

**WYSIWYG** - The [WYSIWYG field](https://www.advancedcustomfields.com/resources/wysiwyg-editor) creates a full WordPress tinyMCE content editor.

```php
acf_wysiwyg([
    'name' => 'content',
    'label' => 'Content',
    'instructions' => 'Add the text content.',
    'required' => true,
    'media_upload' => false,
    'tabs' => 'visual',
    'toolbar' => 'simple',
]);
```

### jQuery Fields

**Color Picker** - The [color picker field](https://www.advancedcustomfields.com/resources/color-picker) allows a color to be selected via a JavaScript popup.

```php
acf_color_picker([
    'name' => 'text-color',
    'label' => 'Text Color',
    'instructions' => 'Add the text color.',
    'default_value' => '#4a9cff',
]);
```

**Date Picker** - The [date picker field](https://www.advancedcustomfields.com/resources/date-picker) creates a jQuery date selection popup.

```php
acf_date_picker([
    'name' => 'birthday',
    'label' => 'Birthday',
    'instructions' => 'Add the employee\'s birthday.',
    'required' => true,
    'display_format' => 'd/m/Y',
    'return_format' => 'd/m/Y',
]);
```

**Date Time Picker** - The [date time picker field](https://www.advancedcustomfields.com/resources/date-time-picker) creates a jQuery date & time selection popup.

```php
acf_date_time_picker([
    'name' => 'date',
    'label' => 'Event date',
    'instructions' => 'Add the event\'s start date and time.',
    'required' => true,
    'display_format' => 'd-m-Y H:i',
    'return_format' => 'd-m-Y H:i',
]);
```

**Google Map** - The [Google Map field](https://www.advancedcustomfields.com/resources/google-map) creates an interactive map with the ability to place a marker.

```php
acf_google_map([
    'name' => 'address',
    'label' => 'Address',
    'instructions' => 'Add the Google Map address.',
    'required' => true,
]);
```

**Time Picker** - The [time picker field](https://www.advancedcustomfields.com/resources/time-picker) creates a jQuery time selection popup.

```php
acf_time_picker([
    'name' => 'start-time',
    'label' => 'Start Time',
    'instructions' => 'Add the start time.',
    'required' => true,
    'display_format' => 'H:i',
    'return_format' => 'H:i',
]);
```

### Layout Fields

**Accordion** - The [accordion field](https://www.advancedcustomfields.com/resources/accordion) is used to organize fields into collapsible panels.

```php
acf_accordion([
    'label' => 'Address',
    'open' => true,
    'multi_expand' => true, // Allow accordion to remain open when other accordions are opened
    // Any field after this accordion will become a child
]),
acf_accordion([
    'label' => 'endpoint',
    'endpoint' => 1, // 0 = new accordion
    // This field will not be visible, but will end the accordion above.
    // Any fields added after this will not be a child to the accordion.
]),
```

**Clone** - The [clone field](https://www.advancedcustomfields.com/resources/clone) allows you to select and display existing fields.

```php
// TODO: Add acf_clone function example.
```

**Flexible Content** - The [flexible content field](https://www.advancedcustomfields.com/resources/flexible-content) acts as a blank canvas to which you can add an unlimited number of [layouts](#layout) with full control over the order.
```php
acf_flexible_content([
  'name' => 'page-components',
  'label' => 'Components',
  'button_label' => 'Add a page component',
  'layouts' => [] // array of layouts (read more about layouts below)
]);
```

**Group** - The [group](https://www.advancedcustomfields.com/resources/group) allows you to create a group of sub fields.

```php
acf_group([
    'name' => 'hero',
    'label' => 'Hero',
    'layout' => 'row',
    'instructions' => 'Add a hero block with title, content and image to the page.',
    'sub_fields' => [
        acf_text([
            'name' => 'title',
            'label' => 'Title',
            'instructions' => 'Add the hero\'s title text.',
            'required' => true,
        ]),
        acf_textarea([
            'name' => 'content',
            'label' => 'Content',
            'instructions' => 'Add the hero\'s content text.',
            'required' => true,
        ]),
        acf_image([
            'name' => 'image',
            'label' => 'Image',
            'instructions' => 'Add the text hero\'s image.',
            'required' => true,
        ]),
    ],
]);
```

**Message** - The message fields allows you to display a text message.

```php
acf_message([
    'name' => 'message',
    'label' => 'Message',
    'message' => 'George. Good morning, sleepyhead, Good morning, Dave, Lynda How could I have been so careless. One point twenty-one gigawatts.',
]);
```

**Repeater** - The [repeater field](https://www.advancedcustomfields.com/resources/repeater) allows you to create a set of sub fields which can be repeated again and again whilst editing content!

```php
acf_repeater([
    'name' => 'employees',
    'label' => 'Employees',
    'instructions' => 'Add the employees.',
    'required' => true,
    'min' => 2,
    'layout' => 'block', // block, row or table
    'sub_fields' => [
        acf_text([
            'name' => 'name',
            'label' => 'Name',
            'instructions' => 'Add the employee name.',
        ]),
    ],
]);
```

**Tab** - The [tab field](https://www.advancedcustomfields.com/resources/tab) is used to group together fields into tabbed sections. Any fields or groups added after a acf_tab will become a child to that tab. Setting 'endpoint' to true on a tab will create a new group of tabs.

```php
acf_tab([
    'label' => 'Tab1',
    'name' => 'tab1',
]),
acf_tab([
    'label' => 'Tab2',
    'name' => 'tab2',
]),
acf_tab([
    'label' => 'Tab3',
    'name' => 'tab3',
    'placement' => 'top', // Valid settings are 'top' and 'left'.
    'endpoint' => true, // This will make a break in the tabs and create a new group of tabs.
]),
```

### Relational Fields

**Link** - The [link field](https://www.advancedcustomfields.com/resources/link) provides a simple way to select or define a link (url, title, target).

```php
acf_link([
    'name' => 'read-more-link',
    'label' => 'Read More Link',
]),
```

**Page Link** - The [page link field](https://www.advancedcustomfields.com/resources/page-link) allows the selection of 1 or more posts, pages or custom post types.

```php
acf_page_link([
    'name' => 'contact-link',
    'label' => 'Contact Link',
    'required' => true,
    'post_type' => ['contact'],
    'taxonomy' => [],
    'allow_null' => false,
    'allow_archives' => false,
    'multiple' => false,
]);
```

**Post Object** - The [post object field](https://www.advancedcustomfields.com/resources/post-object) creates a select field where the choices are your pages + posts + custom post types.

```php
acf_post_object([
    'name' => 'animal',
    'label' => 'Animal',
    'instructions' => 'Select an animal',
    'post_type' => ['animal'],
    'required' => true,
    'taxonomy' => [],
    'allow_null' => false,
    'multiple' => false,
]);
```

**Relationship** - The [relationship field](https://www.advancedcustomfields.com/resources/relationship) creates a very attractive version of the post object field.

```php
acf_relationship([
    'name' => 'contacts',
    'label' => 'Contacts',
    'instructions' => 'Add the contacts.',
    'post_type' => ['contact'],
    'required' => true,
    'filters' => '', // Ugly hack to hide filters and search.
    'max' => 6,
    'min' => 3,
]);
```

**Taxonomy** - The [taxonomy field](https://www.advancedcustomfields.com/resources/taxonomy) allows the selection of 1 or more taxonomy terms.

```php
acf_taxonomy([
    'name' => 'cinemas',
    'label' => 'Cinemas',
    'instructions' => 'Select one or more cinema terms.',
    'taxonomy' => 'cinema',
    'field_type' => 'checkbox', // Checkbox, multi_select, radio or select
    'add_term' => true, // Allow new terms to be created whilst editing
    'save_terms' => false, // Connect selected terms to the post
    'load_terms' => false, // Load value from posts terms
    'return_format' => 'id', // id or object
]);
```

**User** - The user field creates a select field for all your users.

```php
// TODO: Add acf_user function example.
```

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
    'name' => 'layout',
    'label' => 'Layout',
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
