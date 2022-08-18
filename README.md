> :warning: The package **has been renamed** in version 13, see the [upgrade guide](#upgrade-guide).

![Extended ACF](https://user-images.githubusercontent.com/499192/34915298-1782a500-f924-11e7-85a7-dc7de6aacc14.png)

# Extended ACF

> Register [advanced custom fields](https://www.advancedcustomfields.com) with object oriented PHP.

Extended ACF provides an object oriented API to register groups and fields with ACF. If you register fields in your theme, you can safely rely on version control when working with other developers. Oh, and you don't have to worry about unique field keys.

[![Build Status](https://badgen.net/github/checks/vinkla/extended-acf?label=build&icon=github)](https://github.com/vinkla/extended-acf/actions)
[![Monthly Downloads](https://badgen.net/packagist/dm/vinkla/extended-acf)](https://packagist.org/packages/vinkla/extended-acf/stats)
[![Latest Version](https://badgen.net/packagist/v/vinkla/extended-acf)](https://packagist.org/packages/vinkla/extended-acf)

- [Installation](#installation)
- [Usage](#usage)
- [Fields](#fields)
- [Location](#location)
- [Conditional Logic](#conditional-logic)
- [Custom Configuration](#custom-configuration)
- [Custom Fields](#custom-fields)
- [Upgrade Guide](#upgrade-guide)

## Installation

Require this package, with Composer, in the root directory of your project.

```bash
composer require vinkla/extended-acf
```

Download the [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/pro) plugin and put it in either the `plugins` or `mu-plugins` directory. Visit the WordPress dashboard and activate the plugin.

#### Installing ACF Pro with Composer (optional)

If you want to install [ACF Pro](https://www.advancedcustomfields.com/pro) with Composer, you may use the [repositories feature](https://getcomposer.org/doc/05-repositories.md#package-2). Add the snippet below to your `composer.json` file. Replace `YOUR-ACF-KEY` with your license key and run `composer install`.

```json
"repositories": [
    {
        "type": "package",
        "package": {
            "name": "wpackagist-plugin/advanced-custom-fields-pro",
            "type": "wordpress-plugin",
            "version": "5.12",
            "dist": {
                "url": "https://connect.advancedcustomfields.com/v2/plugins/download?p=pro&k=YOUR-ACF-KEY&t=5.12",
                "type": "zip"
            }
        }
    }
]
```

Optionally, if you want to keep your ACF key hidden from your `composer.json` file, you may use the [private-composer-installer](https://github.com/ffraenz/private-composer-installer#wordpress-plugins) plugin.

## Usage

Use the `register_extended_field_group()` function to register a new field group. It extends the default [`register_field_group()`](https://www.advancedcustomfields.com/resources/register-fields-via-php#example) function provided in the ACF plugin. The difference is that it appends the `key` value to field groups and fields. Below you'll find an example of a field group.

```php
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Text;
use Extended\ACF\Location;

add_action('acf/init', function() {
    register_extended_field_group([
        'title' => 'About',
        'fields' => [
            Image::make('Image'),
            Text::make('Title'),
        ],
        'location' => [
            Location::where('post_type', 'page')
        ],
    ]);
});
```

## Settings

Visit the official [ACF documentation](https://www.advancedcustomfields.com/resources/register-fields-via-php#group-settings) to read more about the field group settings. Find more examples in the examples directory:

- [Register custom post type](examples/custom-post-type.php)
- [Register custom post type with Extended CPT](examples/with-extended-cpts.php)
- [Register Gutenberg block](examples/gutenberg-block.php)
- [Register option page](examples/option-page.php)

## Fields

All fields have their responding class (except the clone field). All fields must have a `label`. If no `name` is given, it will use the `label` as `name` in lowercase letters. The `name` can only contain alphanumeric characters, underscores and dashes.

```php
use Extended\ACF\Fields\Text;

Text::make('Title', 'heading')
    ->instructions('Add the text value')
    ->required();
```

### Basic Fields

**Email** - The [email field](https://www.advancedcustomfields.com/resources/text) creates a simple email input.

```php
use Extended\ACF\Fields\Email;

Email::make('Email')
    ->instructions('Add the employees email address.')
    ->required();
```

**Number** - The [number field](https://www.advancedcustomfields.com/resources/text) creates a simple number input.

```php
use Extended\ACF\Fields\Number;

Number::make('Age')
    ->instructions('Add the employees age.')
    ->min(18)
    ->max(65)
    ->required();
```

**Password** - The [password field](https://www.advancedcustomfields.com/resources/text) creates a simple password input.

```php
use Extended\ACF\Fields\Password;

Password::make('Password')
    ->instructions('Add the employees secret pwned password.')
    ->required();
```

**Range** - The [range](https://www.advancedcustomfields.com/resources/range) field provides an interactive experience for selecting a numerical value.

```php
use Extended\ACF\Fields\Range;

Range::make('Rate')
    ->instructions('Add the employees completion rate.')
    ->min(0)
    ->max(100)
    ->step(10)
    ->required();
```

**Text** - The [text field](https://www.advancedcustomfields.com/resources/text) creates a simple text input.

```php
use Extended\ACF\Fields\Text;

Text::make('Name')
    ->instructions('Add the employees name.')
    ->characterLimit(100)
    ->required();
```

**Textarea** - The [textarea field](https://www.advancedcustomfields.com/resources/textarea) creates a simple textarea.

```php
use Extended\ACF\Fields\Textarea;

Textarea::make('Biography')
    ->instructions('Add the employees biography.')
    ->newLines('br') // br or wpautop
    ->characterLimit(2000)
    ->rows(10)
    ->required();
```

**URL** - The [url field](https://www.advancedcustomfields.com/resources/text) creates a simple url input.

```php
use Extended\ACF\Fields\Url;

Url::make('Website')
    ->instructions('Add the employees website link.')
    ->required();
```

### Choice Fields

**Button Group** - The [button group](https://www.advancedcustomfields.com/resources/button-group) field creates a list of radio buttons.

```php
use Extended\ACF\Fields\ButtonGroup;

ButtonGroup::make('Color')
    ->instructions('Select the box shadow color.')
    ->choices([
        'cyan' => 'Cyan',
        'hotpink' => 'Hotpink',
    ])
    ->defaultValue('hotpink')
    ->returnFormat('value') // array, label or value (default)
    ->required();
```

**Checkbox** - The [checkbox field](https://www.advancedcustomfields.com/resources/checkbox) creates a list of tick-able inputs.

```php
use Extended\ACF\Fields\Checkbox;

Checkbox::make('Color')
    ->instructions('Select the border color.')
    ->choices([
        'cyan' => 'Cyan',
        'hotpink' => 'Hotpink',
    ])
    ->defaultValue('cyan')
    ->returnFormat('value') // array, label or value (default)
    ->layout('horizontal') // vertical or horizontal
    ->required();
```

**Radio** - The [radio button field](https://www.advancedcustomfields.com/resources/radio-button) creates a list of select-able inputs.

```php
use Extended\ACF\Fields\RadioButton;

RadioButton::make('Color')
    ->instructions('Select the text color.')
    ->choices([
        'cyan' => 'Cyan',
        'hotpink' => 'Hotpink',
    ])
    ->defaultValue('hotpink')
    ->returnFormat('value') // array, label or value (default)
    ->required();
```

**Select** - The [select field](https://www.advancedcustomfields.com/resources/select) creates a drop down select or multiple select input.

```php
use Extended\ACF\Fields\Select;

Select::make('Color')
    ->instructions('Select the background color.')
    ->choices([
        'cyan' => 'Cyan',
        'hotpink' => 'Hotpink',
    ])
    ->defaultValue('cyan')
    ->returnFormat('value') // array, label or value (default)
    ->allowMultiple()
    ->allowNull()
    ->required();
```

**True False** - The [true / false field](https://www.advancedcustomfields.com/resources/true-false) allows you to select a value that is either 1 or 0.

```php
use Extended\ACF\Fields\TrueFalse;

TrueFalse::make('Social Media', 'display_social_media')
    ->instructions('Select whether to display social media links or not.')
    ->defaultValue(false)
    ->stylisedUi() // optional on and off text labels
    ->required();
```

### Content Fields

**File** - The [file field](https://www.advancedcustomfields.com/resources/file) allows a file to be uploaded and selected.

```php
use Extended\ACF\Fields\File;

File::make('Resturant Menu', 'menu')
    ->instructions('Add the menu <strong>pdf</strong> file.')
    ->mimeTypes(['pdf'])
    ->library('all') // all or uploadedTo
    ->fileSize('400 KB', 5) // MB if entered as int
    ->returnFormat('array') // id, url or array (default)
    ->required();
```

**Gallery** - The [gallery field](https://www.advancedcustomfields.com/resources/gallery) provides a simple and intuitive interface for managing a collection of images.

```php
use Extended\ACF\Fields\Gallery;

Gallery::make('Images')
    ->instructions('Add the gallery images.')
    ->mimeTypes(['jpg', 'jpeg', 'png'])
    ->height(500, 1400)
    ->width(1000, 2000)
    ->min(1)
    ->max(6)
    ->fileSize('400 KB', 5) // MB if entered as int
    ->library('all') // all or uploadedTo
    ->returnFormat('array') // id, url or array (default)
    ->previewSize('medium') // thumbnail, medium or large
    ->required();
```

**Image** - The [image field](https://www.advancedcustomfields.com/resources/image) allows an image to be uploaded and selected.

```php
use Extended\ACF\Fields\Image;

Image::make('Background Image')
    ->instructions('Add an image in at least 12000x100px and only in the formats <strong>jpg</strong>, <strong>jpeg</strong> or <strong>png</strong>.')
    ->mimeTypes(['jpg', 'jpeg', 'png'])
    ->height(500, 1400)
    ->width(1000, 2000)
    ->fileSize('400 KB', 5) // MB if entered as int
    ->library('all') // all or uploadedTo
    ->returnFormat('array') // id, url or array (default)
    ->previewSize('medium') // thumbnail, medium or large
    ->required();
```

**Oembed** - The [oEmbed field](https://www.advancedcustomfields.com/resources/oembed) allows an easy way to embed videos, images, tweets, audio, and other content.

```php
use Extended\ACF\Fields\Oembed;

Oembed::make('Tweet')
    ->instructions('Add a tweet from Twitter.')
    ->required();
```

**WYSIWYG** - The [WYSIWYG field](https://www.advancedcustomfields.com/resources/wysiwyg-editor) creates a full WordPress tinyMCE content editor.

```php
use Extended\ACF\Fields\WysiwygEditor;

WysiwygEditor::make('Content')
    ->instructions('Add the text content.')
    ->mediaUpload(false)
    ->tabs('visual')
    ->toolbar('simple') // toolbar name in snake_case
    ->required();
```

### jQuery Fields

**Color Picker** - The [color picker field](https://www.advancedcustomfields.com/resources/color-picker) allows a color to be selected via a JavaScript popup.

```php
use Extended\ACF\Fields\ColorPicker;

ColorPicker::make('Text Color')
    ->instructions('Add the text color.')
    ->defaultValue('#4a9cff')
    ->required();
```

**Date Picker** - The [date picker field](https://www.advancedcustomfields.com/resources/date-picker) creates a jQuery date selection popup.

```php
use Extended\ACF\Fields\DatePicker;

DatePicker::make('Birthday')
    ->instructions('Add the employee\'s birthday.')
    ->displayFormat('d/m/Y')
    ->returnFormat('d/m/Y')
    ->required();
```

**Time Picker** - The [time picker field](https://www.advancedcustomfields.com/resources/time-picker) creates a jQuery time selection popup.

```php
use Extended\ACF\Fields\TimePicker;

TimePicker::make('Start Time', 'time')
    ->instructions('Add the start time.')
    ->displayFormat('H:i')
    ->returnFormat('H:i')
    ->required();
```

**Date Time Picker** - The [date time picker field](https://www.advancedcustomfields.com/resources/date-time-picker) creates a jQuery date & time selection popup.

```php
use Extended\ACF\Fields\DateTimePicker;

DateTimePicker::make('Event Date', 'date')
    ->instructions('Add the event\'s start date and time.')
    ->displayFormat('d-m-Y H:i')
    ->returnFormat('d-m-Y H:i')
    ->required();
```

**Google Map** - The [Google Map field](https://www.advancedcustomfields.com/resources/google-map) creates an interactive map with the ability to place a marker.

```php
use Extended\ACF\Fields\GoogleMap;

GoogleMap::make('Address', 'address')
    ->instructions('Add the Google Map address.')
    ->center(57.456286, 18.377716)
    ->zoom(14)
    ->required();
```

### Layout Fields

**Accordion** - The [accordion field](https://www.advancedcustomfields.com/resources/accordion) is used to organize fields into collapsible panels.

```php
use Extended\ACF\Fields\Accordion;

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

`occupation.php`

```php
use Extended\ACF\Fields\Text;

return Text::make('Occupation')
    ->instructions('Add the employees occupation.')
    ->required();
```

`employee.php`

```php
register_extended_field_group([
    'fields' => [
        require __DIR__.'/fields/occupation.php';
    ]
]);
```

**Flexible Content** - The [flexible content field](https://www.advancedcustomfields.com/resources/flexible-content) acts as a blank canvas to which you can add an unlimited number of layouts with full control over the order.
```php
use Extended\ACF\Fields\FlexibleContent;
use Extended\ACF\Fields\Layout;
use Extended\ACF\Fields\Text;

FlexibleContent::make('Components', 'page_components')
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
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Text;

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
use Extended\ACF\Fields\Message;

Message::make('Message')
    ->message('George. One point twenty-one gigawatts.')
    ->escapeHtml();
```

**Repeater** - The [repeater field](https://www.advancedcustomfields.com/resources/repeater) allows you to create a set of sub fields which can be repeated again and again whilst editing content!

```php
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Text;

Repeater::make('Employees')
    ->instructions('Add the employees.')
    ->fields([
        Text::make('Name'),
        Image::make('Profile Picture'),
    ])
    ->min(2)
    ->collapsed('name')
    ->buttonLabel('Add employee')
    ->pagination(10)
    ->layout('table') // block, row or table
    ->required();
```

**Tab** - The [tab field](https://www.advancedcustomfields.com/resources/tab) is used to group together fields into tabbed sections. Any fields or groups added after a acf_tab will become a child to that tab. Setting 'endpoint' to true on a tab will create a new group of tabs.

```php
use Extended\ACF\Fields\Tab;

Tab::make('Tab 1'),
Tab::make('Tab 2'),
Tab::make('Tab 3')
    ->placement('top') // top or left
    ->endpoint(), // This will make a break in the tabs and create a new group of tabs.
```

### Relational Fields

**Link** - The [link field](https://www.advancedcustomfields.com/resources/link) provides a simple way to select or define a link (url, title, target).

```php
use Extended\ACF\Fields\Link;

Link::make('Read More Link')
    ->returnFormat('array') // url or array (default)
    ->required();
```

**Page Link** - The [page link field](https://www.advancedcustomfields.com/resources/page-link) allows the selection of 1 or more posts, pages or custom post types.

```php
use Extended\ACF\Fields\PageLink;

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
use Extended\ACF\Fields\PostObject;

PostObject::make('Animal')
    ->instructions('Select an animal')
    ->postTypes(['animal'])
    ->allowNull()
    ->allowMultiple()
    ->returnFormat('object') // id or object (default)
    ->required();
```

**Relationship** - The [relationship field](https://www.advancedcustomfields.com/resources/relationship) creates a very attractive version of the post object field.

```php
use Extended\ACF\Fields\Relationship;

Relationship::make('Contacts')
    ->instructions('Add the contacts.')
    ->postTypes(['contact'])
    ->filters([
        'search', 
        'post_type',
        'taxonomy'
    ])
    ->elements(['featured_image'])
    ->min(3)
    ->max(6)
    ->returnFormat('object') // id or object (default)
    ->required();
```

**Taxonomy** - The [taxonomy field](https://www.advancedcustomfields.com/resources/taxonomy) allows the selection of 1 or more taxonomy terms.

```php
use Extended\ACF\Fields\Taxonomy;

Taxonomy::make('Cinemas')
    ->instructions('Select one or more cinema terms.')
    ->taxonomy('cinema')
    ->appearance('checkbox') // checkbox, multi_select, radio or select
    ->addTerm(true) // Allow new terms to be created whilst editing (true or false)
    ->loadTerms(true) // Load value from posts terms (true or false)
    ->saveTerms(true) // Connect selected terms to the post (true or false)
    ->returnFormat('id'); // object or id (default)
```

**User** - The user field creates a select field for all your users.

```php
use Extended\ACF\Fields\User;

User::make('User')
    ->roles([
        'administrator',
        'author'
    ])
    ->returnFormat('array'); // id, object or array (default)

// Available roles are administrator, author, subscriber, contributor and editor. Default is no filter.
```

## Location

The location class let you write [custom location rules](https://www.advancedcustomfields.com/resources/custom-location-rules) without the `name`, `operator` and `value` keys. If no `operator` is given it will use the `operator` as the `value`.

```php
use Extended\ACF\Location;

Location::where('post_type', 'post')->and('post_type', '!=', 'post');
```

> **Note:** The `if` method was renamed to `where` in version 12, see the [upgrade guide](#upgrade-guide).

## Conditional Logic

The conditional class help you write conditional logic [without knowing](https://media.giphy.com/media/SbtWGvMSmJIaV8faS8/source.gif) the field keys.

```php
use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\File;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Url;

Select::make('Type')
    ->choices([
        'document' => 'Document',
        'link' => 'Link to resource',
    ]),
File::make('Document', 'file')
    ->conditionalLogic([
        ConditionalLogic::where('type', '==', 'document') // available operators are ==, !=, >, <, ==pattern, ==contains, ==empty, !=empty
    ]),
Url::make('Link', 'url')
    ->conditionalLogic([
        ConditionalLogic::where('type', '==', 'link')
    ]),
```

## Custom Configuration

If you want to add custom settings to the fields, you can extend the field classes available in this library.

```php
namespace App\Fields;

use Extended\ACF\Fields\Select as Field;

class Select extends Field
{
    public function myNewSetting(string $value): self
    {
        $this->settings['my-new-settings'] = $value;

        return $this;
    }
}
```

## Custom Fields

If you want to create custom field classes you may extend the [base field class](src/Fields/Field.php). You may also import [available setting traits](src/Fields/Settings) in order to add common methods such as `required()` and `intstructions()`.

```php
namespace App\Fields;

use Extended\ACF\Fields\Field;
use Extended\ACF\Fields\Settings\Instructions;
use Extended\ACF\Fields\Settings\Required;

class OpenStreetMap extends Field
{
    use Instructions;
    use Required;

    protected $type = 'open_street_map';

    public function latitude(float $latitude): static
    {
        $this->settings['latitude'] = $latitude;

        return $this;
    }
    
    public function longitude(float $longitude): static
    {
        $this->settings['longitude'] = $longitude;

        return $this;
    }
    
    public function zoom(float $zoom): static
    {
        $this->settings['zoom'] = $zoom;

        return $this;
    }
}
```

When you're ready you can import use your field like any other field available in this library:

```php
use App\Fields\OpenStreetMap;

OpenStreetMap::make('Map')
    ->latitude(56.474)
    ->longitude(11.863)
    ->zoom(10);
```

## Upgrade Guide

This upgrade guide contains information on breaking changes in major releases of the package.

### 13

The package has been renamed to `vinkla/extended-acf`. If you're using version 12 or lower, you may simply change the package name in your `composer.json` file and everything will work as before.

```diff
-"wordplate/acf": "^12.0",
+"vinkla/extended-acf": "^12.0"
```

If you're upgrading to version 13, you'll also need to change your imports. The namespace has been changed to `Extended\ACF`.

```diff
-use WordPlate\Acf\Fields\Text;
-use WordPlate\Acf\Fields\Number;
+use Extended\ACF\Fields\Text;
+use Extended\ACF\Fields\Number;
```

### 12

The location query method `if` has been changed to `where`, you'll need to update your field groups accordingly.

```diff
use Extended\ACF\Location;

-Location::if('post_type', 'post');
+Location::where('post_type', 'post');
```
