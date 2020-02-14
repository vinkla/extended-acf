# ACF

![acf](https://user-images.githubusercontent.com/499192/34915298-1782a500-f924-11e7-85a7-dc7de6aacc14.png)

> An [Advanced Custom Fields](https://www.advancedcustomfields.com) helper for [WordPlate](https://wordplate.github.io).

If you're working with multiple developers on a WordPress application with custom fields it can be hard to keep track of changes made in custom fields. This package will help you register advanced custom fields with PHP without caring about field keys. All fields have their own class that automagically create unique field keys based on their parent field group. All fields exists within the theme and can be added to version control.

[![Build Status](https://badgen.net/travis/wordplate/acf/master)](https://travis-ci.org/wordplate/acf)
[![Coverage Status](https://badgen.net/codecov/c/github/wordplate/acf)](https://codecov.io/github/wordplate/acf)
[![Total Downloads](https://badgen.net/packagist/dt/wordplate/acf)](https://packagist.org/packages/wordplate/acf)
[![Latest Version](https://badgen.net/github/release/wordplate/acf)](https://github.com/wordplate/acf/releases)
[![License](https://badgen.net/packagist/license/wordplate/acf)](https://packagist.org/packages/wordplate/acf)

- [Installation](#installation)
- [Usage](#usage)
- [Fields](#location)
- [Location](#location)
- [Conditional Logic](#conditional-logic)
- [Theming](#theming)
- [Custom Fields](#custom-fields)
- [Installing ACF with Composer](#installing-acf-with-composer)
- [Resources](#resources)

## Installation

Require this package, with [Composer](https://getcomposer.org), in the root directory of your project.

```bash
$ composer require wordplate/acf
```

Download the [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/pro) plugin and put it in either the `plugins` or `mu-plugins` directory. Visit the WordPress dashboard and activate the plugin. Please note that this package supports ACF version 5.6 or later. If you want to install ACF Pro with Composer, [please scroll down](#installing-acf-with-composer).

## Usage

Use the `register_extended_field_group()` function to register a new field group in ACF. It uses the [`register_field_group()`](https://www.advancedcustomfields.com/resources/register-fields-via-php#example) function behind the scenes. The difference is that it appends the `key` value to field groups and fields. Below you'll find an example of a field group.

```php
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Location;

register_extended_field_group([
    'title' => 'About',
    'fields' => [
        Image::make('Image'),
        Text::make('Title'),
    ],
    'location' => [
        Location::if('post_type', 'page')
    ],
]);
```

[Visit the official documentation to read more about the field group settings.](https://www.advancedcustomfields.com/resources/register-fields-via-php#group-settings)

## Fields

All fields have their responding class except the clone field. All fields must have a `label`. If no `name` is given, it will use the `label` as `name` in lowercase letters. Furthur down this page you'll find a list of available field types.

```php
use WordPlate\Acf\Fields\Text;

Text::make('Title', 'heading')
    ->instructions('Add the text value')
    ->required();
```

Setting such as `wrapper`, `append` and `prepend` are supported on most fields but not listed in the documentation below. [Visit the official documentation](https://www.advancedcustomfields.com/resources/register-fields-via-php#field-settings) to read more about field settings.

### Basic Fields

**Email** - The [email field](https://www.advancedcustomfields.com/resources/text) creates a simple email input.

```php
use WordPlate\Acf\Fields\Email;

Email::make('Email')
    ->instructions('Add the employees email address.')
    ->required();
```

**Number** - The [number field](https://www.advancedcustomfields.com/resources/text) creates a simple number input.

```php
use WordPlate\Acf\Fields\Number;

Number::make('Age')
    ->instructions('Add the employees age.')
    ->min(18)
    ->max(65)
    ->required();
```

**Password** - The [password field](https://www.advancedcustomfields.com/resources/text) creates a simple password input.

```php
use WordPlate\Acf\Fields\Password;

Password::make('Password')
    ->instructions('Add the employees secret pwned password.')
    ->required();
```

**Range** - The [range](https://www.advancedcustomfields.com/resources/range) field provides an interactive experience for selecting a numerical value.

```php
use WordPlate\Acf\Fields\Range;

Range::make('Rate')
    ->instructions('Add the employees completion rate.')
    ->min(0)
    ->max(100)
    ->step(10)
    ->required();
```

**Text** - The [text field](https://www.advancedcustomfields.com/resources/text) creates a simple text input.

```php
use WordPlate\Acf\Fields\Text;

Text::make('Name')
    ->instructions('Add the employees name.')
    ->characterLimit(100)
    ->required();
```

**Textarea** - The [textarea field](https://www.advancedcustomfields.com/resources/textarea) creates a simple textarea.

```php
use WordPlate\Acf\Fields\Textarea;

Textarea::make('Biography')
    ->instructions('Add the employees biography.')
    ->newLines('br') // br or wpautop
    ->characterLimit(2000)
    ->rows(10)
    ->required();
```

**URL** - The [url field](https://www.advancedcustomfields.com/resources/text) creates a simple url input.

```php
use WordPlate\Acf\Fields\Url;

Url::make('Website')
    ->instructions('Add the employees website link.')
    ->required();
```

### Choice Fields

**Button Group** - The [button group](https://www.advancedcustomfields.com/resources/button-group) field creates a list of radio buttons.

```php
use WordPlate\Acf\Fields\ButtonGroup;

ButtonGroup::make('Color')
    ->instructions('Select the box shadow color.')
    ->choices([
        'cyan' => 'Cyan',
        'hotpink' => 'Hotpink',
    ])
    ->defaultValue('hotpink')
    ->returnFormat('value') // value, label or array
    ->required();
```

**Checkbox** - The [checkbox field](https://www.advancedcustomfields.com/resources/checkbox) creates a list of tick-able inputs.

```php
use WordPlate\Acf\Fields\Checkbox;

Checkbox::make('Color')
    ->instructions('Select the border color.')
    ->choices([
        'cyan' => 'Cyan',
        'hotpink' => 'Hotpink',
    ])
    ->defaultValue('cyan')
    ->returnFormat('value') // value, label or array
    ->required();
```

**Radio** - The [radio button field](https://www.advancedcustomfields.com/resources/radio-button) creates a list of select-able inputs.

```php
use WordPlate\Acf\Fields\Radio;

Radio::make('Color')
    ->instructions('Select the text color.')
    ->choices([
        'cyan' => 'Cyan',
        'hotpink' => 'Hotpink',
    ])
    ->defaultValue('hotpink')
    ->returnFormat('value') // value, label or array
    ->required();
```

**Select** - The [select field](https://www.advancedcustomfields.com/resources/select) creates a drop down select or multiple select input.

```php
use WordPlate\Acf\Fields\Select;

Select::make('Color')
    ->instructions('Select the background color.')
    ->choices([
        'cyan' => 'Cyan',
        'hotpink' => 'Hotpink',
    ])
    ->defaultValue('cyan')
    ->returnFormat('value') // value, label or array
    ->required();
```

**True False** - The [true / false field](https://www.advancedcustomfields.com/resources/true-false) allows you to select a value that is either 1 or 0.

```php
use WordPlate\Acf\Fields\TrueFalse;

TrueFalse::make('Social Media', 'display-social-media')
    ->instructions('Select whether to display social media links or not.')
    ->defaultValue(false)
    ->stylisedUi() // optinal on and off text labels
    ->required();
```

### Content Fields

**File** - The [file field](https://www.advancedcustomfields.com/resources/file) allows a file to be uploaded and selected.

```php
use WordPlate\Acf\Fields\File;

File::make('Resturant Menu', 'menu')
    ->instructions('Add the menu <strong>pdf</strong> file.')
    ->defaultValue(false)
    ->mimeTypes(['pdf'])
    ->library('all') // all or uploadedTo
    ->fileSize('400 KB', 5) // MB if entered as int
    ->returnFormat('array')
    ->required();
```

**Gallery** - The [gallery field](https://www.advancedcustomfields.com/resources/gallery) provides a simple and intuitive interface for managing a collection of images.

```php
use WordPlate\Acf\Fields\Gallery;

Gallery::make('Images')
    ->instructions('Add the gallery images.')
    ->mimeTypes(['jpg', 'jpeg', 'png'])
    ->height(500, 1400)
    ->width(1000, 2000)
    ->min(1)
    ->max(6)
    ->fileSize('400 KB', 5) // MB if entered as int
    ->library('all') // all or uploadedTo
    ->returnFormat('array')
    ->required();
```

**Image** - The [image field](https://www.advancedcustomfields.com/resources/image) allows an image to be uploaded and selected.

```php
use WordPlate\Acf\Fields\Image;

Image::make('Background Image')
    ->instructions('Add an image in at least 12000x100px and only in the formats <strong>jpg</strong>, <strong>jpeg</strong> or <strong>png</strong>.')
    ->mimeTypes(['jpg', 'jpeg', 'png'])
    ->height(500, 1400)
    ->width(1000, 2000)
    ->fileSize('400 KB', 5) // MB if entered as int
    ->library('all') // all or uploadedTo
    ->returnFormat('array')
    ->previewSize('medium') // thumbnail, medium or large
    ->required();
```

**Oembed** - The [oEmbed field](https://www.advancedcustomfields.com/resources/oembed) allows an easy way to embed videos, images, tweets, audio, and other content.

```php
use WordPlate\Acf\Fields\Oembed;

Oembed::make('Tweet')
    ->instructions('Add a tweet from Twitter.')
    ->required();
```

**WYSIWYG** - The [WYSIWYG field](https://www.advancedcustomfields.com/resources/wysiwyg-editor) creates a full WordPress tinyMCE content editor.

```php
use WordPlate\Acf\Fields\Wysiwyg;

Wysiwyg::make('Content')
    ->instructions('Add the text content.')
    ->mediaUpload(false)
    ->tabs('visual')
    ->toolbar('simple')
    ->required();
```

### jQuery Fields

**Color Picker** - The [color picker field](https://www.advancedcustomfields.com/resources/color-picker) allows a color to be selected via a JavaScript popup.

```php
use WordPlate\Acf\Fields\ColorPicker;

ColorPicker::make('Text Color')
    ->instructions('Add the text color.')
    ->defaultValue('#4a9cff')
    ->required();
```

**Date Picker** - The [date picker field](https://www.advancedcustomfields.com/resources/date-picker) creates a jQuery date selection popup.

```php
use WordPlate\Acf\Fields\DatePicker;

DatePicker::make('Birthday')
    ->instructions('Add the employee\'s birthday.')
    ->displayFormat('d/m/Y')
    ->returnFormat('d/m/Y')
    ->required();
```

**Date Time Picker** - The [date time picker field](https://www.advancedcustomfields.com/resources/date-time-picker) creates a jQuery date & time selection popup.

```php
use WordPlate\Acf\Fields\DateTimePicker;

DateTimePicker::make('Event Date', 'date')
    ->instructions('Add the event\'s start date and time.')
    ->displayFormat('d-m-Y H:i')
    ->returnFormat('d-m-Y H:i')
    ->required();
```

**Google Map** - The [Google Map field](https://www.advancedcustomfields.com/resources/google-map) creates an interactive map with the ability to place a marker.

```php
use WordPlate\Acf\Fields\GoogleMap;

GoogleMap::make('Address', 'address')
    ->instructions('Add the Google Map address.')
    ->center(57.456286, 18.377716)
    ->zoom(14)
    ->required();
```

**Time Picker** - The [time picker field](https://www.advancedcustomfields.com/resources/time-picker) creates a jQuery time selection popup.

```php
use WordPlate\Acf\Fields\DateTimePicker;

DateTimePicker::make('Start Time', 'time')
    ->instructions('Add the start time.')
    ->displayFormat('H:i')
    ->returnFormat('H:i')
    ->required();
```

### Layout Fields

**Accordion** - The [accordion field](https://www.advancedcustomfields.com/resources/accordion) is used to organize fields into collapsible panels.

```php
use WordPlate\Acf\Fields\Accordion;

Accordion::make('Address')
    ->open()
    ->multiExpand(),

// Allow accordion to remain open when other accordions are opened.
// Any field after this accordion will become a child.

Accordion::make('Endpoint')
    ->endpoint()
    ->multiExpand(),

// This field will not be visible, but will end the accordion above.
// Any fields added after this will not be a child to the accordion.
```

**Clone** - The [clone field](https://www.advancedcustomfields.com/resources/clone) allows you to select and display existing fields or groups. This field doesn't have a custom field class. Instead create a new file with your field and import it using `require` where you need it.

- `occupation.php`

  ```php
  use WordPlate\Acf\Fields\Text;

  return Text::make('Occupation')
      ->instructions('Add the employees occupation.')
      ->required();
  ```
- `employee.php`

  ```php
  register_extended_field_group([
      'fields' => [
          require __DIR__.'/fields/occupation.php';
      ]
  ]);
  ```

**Flexible Content** - The [flexible content field](https://www.advancedcustomfields.com/resources/flexible-content) acts as a blank canvas to which you can add an unlimited number of layouts with full control over the order.
```php
use WordPlate\Acf\Fields\FlexibleContent;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Text;

FlexibleContent::make('Components', 'page-components')
    ->instructions('Add the employees occupation.')
    ->buttonLabel('Add a page component')
    ->layouts([
        Layout::make('Image')
            ->layout('block')
            ->fields([
                Text::make('Description')
            ])
    ])
    ->required();
```

**Group** - The [group](https://www.advancedcustomfields.com/resources/group) allows you to create a group of sub fields.

```php
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Text;

Group::make('Hero')
    ->instructions('Add a hero block with title, content and image to the page.')
    ->fields([
        Text::make('Title'),
        Image::make('Background Image'),
    ])
    ->layout('row')
    ->required();
```

**Message** - The message fields allows you to display a text message.

```php
use WordPlate\Acf\Fields\Message;

Message::make('Message')
    ->message('George. One point twenty-one gigawatts.')
    ->escapeHtml();
```

**Repeater** - The [repeater field](https://www.advancedcustomfields.com/resources/repeater) allows you to create a set of sub fields which can be repeated again and again whilst editing content!

```php
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Text;

Repeater::make('Employees')
    ->instructions('Add the employees.')
    ->fields([
        Text::make('Name'),
        Image::make('Profile Picture'),
    ])
    ->min(2)
    ->collapsed('name')
    ->buttonLabel('Add employee')
    ->layout('table') // block, row or table
    ->required();
```

**Tab** - The [tab field](https://www.advancedcustomfields.com/resources/tab) is used to group together fields into tabbed sections. Any fields or groups added after a acf_tab will become a child to that tab. Setting 'endpoint' to true on a tab will create a new group of tabs.

```php
use WordPlate\Acf\Fields\Tab;

Tab::make('Tab 1'),
Tab::make('Tab 2'),
Tab::make('Tab 3')
    ->placement('top') // top or left
    ->endpoint(), // This will make a break in the tabs and create a new group of tabs.
```

### Relational Fields

**Link** - The [link field](https://www.advancedcustomfields.com/resources/link) provides a simple way to select or define a link (url, title, target).

```php
use WordPlate\Acf\Fields\Link;

Link::make('Read More Link')
    ->required();
```

**Page Link** - The [page link field](https://www.advancedcustomfields.com/resources/page-link) allows the selection of 1 or more posts, pages or custom post types.

```php
use WordPlate\Acf\Fields\PageLink;

PageLink::make('Contact Link')
    ->postTypes(['contact'])
    ->taxonomies(['category:city'])
    ->allowArchives() // optionally pass 'false' to disallow archives
    ->allowNull()
    ->allowMultiple()
    ->required();
```

**Post Object** - The [post object field](https://www.advancedcustomfields.com/resources/post-object) creates a select field where the choices are your pages + posts + custom post types.

```php
use WordPlate\Acf\Fields\PostObject;

PostObject::make('Animal')
    ->instructions('Select an animal')
    ->postTypes(['animal'])
    ->allowNull()
    ->allowMultiple()
    ->required();
```

**Relationship** - The [relationship field](https://www.advancedcustomfields.com/resources/relationship) creates a very attractive version of the post object field.

```php
use WordPlate\Acf\Fields\Relationship;

Relationship::make('Contacts')
    ->instructions('Add the contacts.')
    ->postTypes(['contact'])
    ->filters([
        'search', 
        'post_type',
        'taxonomy'
    ])
    ->min(3)
    ->max(6)
    ->required();
```

**Taxonomy** - The [taxonomy field](https://www.advancedcustomfields.com/resources/taxonomy) allows the selection of 1 or more taxonomy terms.

```php
use WordPlate\Acf\Fields\Taxonomy;

Taxonomy::make('Cinemas')
    ->instructions('Select one or more cinema terms.')
    ->taxonomy('cinema')
    ->fieldType('checkbox') // checkbox, multi_select, radio or select
    ->addTerms() // Allow new terms to be created whilst editing
    ->loadTerms() // Load value from posts terms
    ->saveTerms() // Connect selected terms to the post
    ->returnFormat('id'); // id or object
```

**User** - The user field creates a select field for all your users.

```php
use WordPlate\Acf\Fields\User;

User::make('User')
    ->roles([
        'administrator',
        'author'
    ])
    ->returnFormat('object');

// Available roles are administrator, author, subscriber, contributor and editor. Deafult is no filter.
```

## Location

The location class let you write [custom location rules](https://www.advancedcustomfields.com/resources/custom-location-rules) without the `name`, `operator` and `value` keys.

```php
use WordPlate\Acf\Location;

Location::if('post_type', 'post')->and('post_type', '!=', 'post');
```

## Conditional Logic

The conditional class help you write conditional logic without knowing the fields `key` value.

```php
use WordPlate\Acf\ConditionalLogic;
use WordPlate\Acf\Fields\File;
use WordPlate\Acf\Fields\Select;
use WordPlate\Acf\Fields\Url;

Select::make('Type')
    ->choices([
        'document' => 'Document',
        'link' => 'Link to resource',
    ]),
File::make('Document', 'file')
    ->conditionalLogic([
        ConditionalLogic::if('type')->equals('Document')
    ]),
Url::make('Link', 'url')
    ->conditionalLogic([
        ConditionalLogic::if('type')->equals('Link to resource')
    ]),
```

## Theming

This package provides two helpers to make theming with custom fields much cleaner.

### Field

Instead of fetching data with `get_field` and `get_sub_field` you can use the `field` helper function. It works as the `get_field` function except that it checks if the given field name is a sub field first.

```php
echo field('title');
```

> **Note:** This will not work if nested fields in a field group share the same name.

### Option

Instead of passing the `option` key to the `get_field` function we can now use the new option function. It will automagically use the `get_field` function with the `option` key.

```php
echo option('github-url');
```

## Custom Fields

If your application use fields which isn't part of ACF, you may extend and create custom helper classes. Lets say you've a field for OpenStreetMap. Create a new class which extends the base `WordPlate\Acf\Fields\Field` class:

```php
namespace Application\Fields;

use WordPlate\Acf\Fields\Field;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Required;

class OpenStreetMap extends Field
{
    use Instructions;
    use Required;

    protected $type = 'open_street_map';
}
```

Notice that we've imported traits which inlcude the `required()` and `instructions()` methods. We've also added the `$type` property in order to let ACF know which field we're working with. You may now add any additional methods to this class which you will need such as `latitude()`, `longitude()`, `zoom()`, etc. 

When you're ready you can import use it like any other field included in this package:

```php
use Application\Fields\OpenStreetMap;

OpenStreetMap::make('Map')
  ->latitude(56.474)
  ->longitude(11.863)
  ->zoom(10);
```

## Installing ACF with Composer

If you want to install [ACF Pro](https://www.advancedcustomfields.com/pro) with Composer you may use the [repositories feature](https://getcomposer.org/doc/05-repositories.md#package-2). Add the snippet below to your `composer.json` file. Replace `your-acf-key` with your ACF Pro key and run `composer install`. Composer should now install the plugin to the `plugins` directory.

```json
"repositories": [
    {
        "type": "package",
        "package": {
            "name": "wpackagist-plugin/advanced-custom-fields-pro",
            "type": "wordpress-plugin",
            "version": "5.8.0",
            "dist": {
                "url": "https://connect.advancedcustomfields.com/index.php?v=5.8.0&p=pro&a=download&k=your-acf-key",
                "type": "zip"
            }
        }
    }
]
```

## Resources

Below you'll find a list of articles which can help you getting started and advance your custom fields knowledge.

- [A Beginner’s Guide to Advanced Custom Fields](https://www.advancedcustomfields.com/blog/beginners-guide-advanced-custom-fields)
- [Best Practices when Designing Custom Fields](https://www.advancedcustomfields.com/blog/best-practices-designing-custom-fields)
- [Organizing Custom Fields Inside of WordPress with ACF](https://www.advancedcustomfields.com/blog/organizing-custom-fields-inside-wordpress-acf)
- [Wait, ACF Has Settings?](https://www.advancedcustomfields.com/blog/acf-has-settings)

## License

[MIT](LICENSE) © [Vincent Klaiber](https://doubledip.se)
