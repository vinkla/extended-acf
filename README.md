![Extended ACF](https://user-images.githubusercontent.com/499192/34915298-1782a500-f924-11e7-85a7-dc7de6aacc14.png)

# Extended ACF

> Register [advanced custom fields](https://www.advancedcustomfields.com) with object-oriented PHP.

Extended ACF provides an object-oriented API to register groups and fields with ACF. If you register fields in your theme, you can safely rely on version control when working with other developers. Oh, you don't have to worry about unique field keys.

[![Build Status](https://badgen.net/github/checks/vinkla/extended-acf?label=build&icon=github)](https://github.com/vinkla/extended-acf/actions)
[![Monthly Downloads](https://badgen.net/packagist/dm/vinkla/extended-acf)](https://packagist.org/packages/vinkla/extended-acf/stats)
[![Latest Version](https://badgen.net/packagist/v/vinkla/extended-acf)](https://packagist.org/packages/vinkla/extended-acf)

- [Installation](#installation)
- [Usage](#usage)
- [Settings](#settings)
- [Fields](#fields)
  - [Basic](#basic)
  - [Content](#content)
  - [Choice](#choice)
  - [Relational](#relational)
  - [Advanced](#advanced)
  - [Layout](#layout)
- [Location](#location)
- [Conditional Logic](#conditional-logic)
- [Bidirectional Relationships](#bidirectional-relationships)
- [Non-standards](#non-standards)
    - [`helperText`](#helperText)
    - [`column`](#column)
    - [`dd` and `dump`](#dd-and-dump)
    - [`key`](#key)
    - [`withSettings`](#withsettings)
- [Custom Fields](#custom-fields)
- [Upgrade Guide](#upgrade-guide)
  - [14](#14)
  - [13](#13)
  - [12](#12)
  - [11](#11)

## Installation

Require this package, with Composer, in the root directory of your project.

```bash
composer require vinkla/extended-acf
```

To install the [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/blog/composer-support-acf-pro/) plugin, download and place it in either the `plugins` or `mu-plugins` directory. After that, activate the plugin in the WordPress dashboard.

[Learn more about installing ACF PRO using Composer.](https://www.advancedcustomfields.com/resources/installing-acf-pro-with-composer/)

## Usage

To register a new field group, use the `register_extended_field_group()` function. This extends the default [`register_field_group()`](https://www.advancedcustomfields.com/resources/register-fields-via-php#example) function from the ACF plugin. The `key` value is appended to field groups and fields. Here's an example of a field group.

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

For detailed information on field group settings, please consult the [official ACF documentation](https://www.advancedcustomfields.com/resources/register-fields-via-php#group-settings). You can also find more examples in the examples directory.

- [Register custom post type](examples/custom-post-type.php)
- [Register custom post type with Extended CPT](examples/with-extended-cpts.php)
- [Register Gutenberg block](examples/gutenberg-block.php)
- [Register options page](examples/options-page.php)

## Fields

All fields, except the clone field, have a corresponding class. Each field needs a `label`. If no `name` is specified, the `label` will be used as the `name` in snake_case. The `name` can only contain alphanumeric characters and underscores.

```php
use Extended\ACF\Fields\Text;

Text::make('Title', 'heading')
    ->helperText('Add the text value')
    ->required()
```

Most fields have the methods `default`, `required`, and `wrapper`. The [basic fields](#basic) also have the methods `prepend`, `append`, `placeholder`, `readOnly`, and `disabled`. Please also check the non-standard methods mentioned in the [non-standards](#non-standards) section.

### Basic

**Email** - The [email field](https://www.advancedcustomfields.com/resources/text) creates a simple email input.

```php
use Extended\ACF\Fields\Email;

Email::make('Email')
    ->helperText('Add the employees email address.')
    ->required()
```

**Number** - The [number field](https://www.advancedcustomfields.com/resources/text) creates a simple number input.

```php
use Extended\ACF\Fields\Number;

Number::make('Age')
    ->helperText('Add the employees age.')
    ->min(18)
    ->max(65)
    ->required()
```

**Password** - The [password field](https://www.advancedcustomfields.com/resources/text) creates a simple password input.

```php
use Extended\ACF\Fields\Password;

Password::make('Password')
    ->helperText('Add the employees secret pwned password.')
    ->required()
```

**Range** - The [range](https://www.advancedcustomfields.com/resources/range) field provides an interactive experience for selecting a numerical value.

```php
use Extended\ACF\Fields\Range;

Range::make('Rate')
    ->helperText('Add the employees completion rate.')
    ->min(0)
    ->max(100)
    ->step(10)
    ->required()
```

**Text** - The [text field](https://www.advancedcustomfields.com/resources/text) creates a simple text input.

```php
use Extended\ACF\Fields\Text;

Text::make('Name')
    ->helperText('Add the employees name.')
    ->maxLength(100)
    ->required()
```

**Textarea** - The [textarea field](https://www.advancedcustomfields.com/resources/textarea) creates a simple textarea.

```php
use Extended\ACF\Fields\Textarea;

Textarea::make('Biography')
    ->helperText('Add the employees biography.')
    ->newLines('br') // br, wpautop
    ->maxLength(2000)
    ->rows(10)
    ->required()
```

**URL** - The [URL field](https://www.advancedcustomfields.com/resources/url/) creates a simple uRL input.

```php
use Extended\ACF\Fields\URL;

URL::make('Website')
    ->helperText('Add the employees website link.')
    ->required()
```

### Content

**File** - The [file field](https://www.advancedcustomfields.com/resources/file) allows a file to be uploaded and selected.

```php
use Extended\ACF\Fields\File;

File::make('Resturant Menu', 'menu')
    ->helperText('Add the menu **pdf** file.')
    ->acceptedFileTypes(['pdf'])
    ->library('all') // all, uploadedTo
    ->minSize('400 KB')
    ->maxSize(5) // MB if entered as int
    ->format('array') // id, url, array (default)
    ->required()
```

**Gallery** - The [gallery field](https://www.advancedcustomfields.com/resources/gallery) provides a simple and intuitive interface for managing a collection of images.

```php
use Extended\ACF\Fields\Gallery;

Gallery::make('Images')
    ->helperText('Add the gallery images.')
    ->acceptedFileTypes(['jpg', 'jpeg', 'png'])
    ->minHeight(500)
    ->maxHeight(1400)
    ->minWidth(1000)
    ->maxWidth(2000)
    ->minFiles(1)
    ->maxFiles(6)
    ->minSize('400 KB')
    ->maxSize(5) // MB if entered as int
    ->library('all') // all, uploadedTo
    ->format('array') // id, url, array (default)
    ->previewSize('medium') // thumbnail, medium, large
    ->prependFiles()
    ->required()
```

**Image** - The [image field](https://www.advancedcustomfields.com/resources/image) allows an image to be uploaded and selected.

```php
use Extended\ACF\Fields\Image;

Image::make('Background Image')
    ->helperText('Add an image in at least 12000x100px and only in the formats **jpg**, **jpeg** or **png**.')
    ->acceptedFileTypes(['jpg', 'jpeg', 'png'])
    ->minHeight(500)
    ->maxHeight(1400)
    ->minWidth(1000)
    ->maxWidth(2000)
    ->minSize('400 KB')
    ->maxSize(5) // MB if entered as int
    ->library('all') // all, uploadedTo
    ->format('array') // id, url, array (default)
    ->previewSize('medium') // thumbnail, medium, large
    ->required()
```

**Oembed** - The [oEmbed field](https://www.advancedcustomfields.com/resources/oembed) allows an easy way to embed videos, images, tweets, audio, and other content.

```php
use Extended\ACF\Fields\Oembed;

Oembed::make('Tweet')
    ->helperText('Add a tweet from Twitter.')
    ->required()
```

**WYSIWYG** - The [WYSIWYG field](https://www.advancedcustomfields.com/resources/wysiwyg-editor) creates a full WordPress tinyMCE content editor.

```php
use Extended\ACF\Fields\WYSIWYGEditor;

WYSIWYGEditor::make('Content')
    ->helperText('Add the text content.')
    ->tabs('visual') // all, text, visual (default)
    ->toolbar(['bold', 'italic', 'link']) // aligncenter, alignleft, alignright, blockquote, bold, bullist, charmap, forecolor, formatselect, fullscreen, hr, indent, italic, link, numlist, outdent, pastetext, redo, removeformat, spellchecker, strikethrough, underline, undo, wp_adv, wp_help, wp_more
    ->disableMediaUpload()
    ->lazyLoad()
    ->required()
```
### Choice

**Button Group** - The [button group](https://www.advancedcustomfields.com/resources/button-group) field creates a list of radio buttons.

```php
use Extended\ACF\Fields\ButtonGroup;

ButtonGroup::make('Color')
    ->helperText('Select the box shadow color.')
    ->choices(['Forest Green', 'Sky Blue']) // ['forest_green' => 'Forest Green', 'sky_blue' => 'Sky Blue']
    ->default('forest_green')
    ->format('value') // array, label, value (default)
    ->required()
```

**Checkbox** - The [checkbox field](https://www.advancedcustomfields.com/resources/checkbox) creates a list of tick-able inputs.

```php
use Extended\ACF\Fields\Checkbox;

Checkbox::make('Color')
    ->helperText('Select the border color.')
    ->choices(['Forest Green', 'Sky Blue']) // ['forest_green' => 'Forest Green', 'sky_blue' => 'Sky Blue']
    ->default('forest_green')
    ->format('value') // array, label, value (default)
    ->layout('horizontal') // vertical, horizontal
    ->required()
```

**Radio Button** - The [radio button field](https://www.advancedcustomfields.com/resources/radio-button) creates a list of select-able inputs.

```php
use Extended\ACF\Fields\RadioButton;

RadioButton::make('Color')
    ->helperText('Select the text color.')
    ->choices(['Forest Green', 'Sky Blue']) // ['forest_green' => 'Forest Green', 'sky_blue' => 'Sky Blue']
    ->default('forest_green')
    ->format('value') // array, label, value (default)
    ->required()
```

**Select** - The [select field](https://www.advancedcustomfields.com/resources/select) creates a drop down select or multiple select input.

```php
use Extended\ACF\Fields\Select;

Select::make('Color')
    ->helperText('Select the background color.')
    ->choices(['Forest Green', 'Sky Blue']) // ['forest_green' => 'Forest Green', 'sky_blue' => 'Sky Blue']
    ->default('forest_green')
    ->format('value') // array, label, value (default)
    ->multiple()
    ->nullable()
    ->stylized() // stylized checkbox using select2
    ->lazyLoad() // use AJAX to lazy load choices
    ->required()
```

**True False** - The [true / false field](https://www.advancedcustomfields.com/resources/true-false) allows you to select a value that is either 1 or 0.

```php
use Extended\ACF\Fields\TrueFalse;

TrueFalse::make('Social Media', 'display_social_media')
    ->helperText('Select whether to display social media links or not.')
    ->default(false)
    ->stylized(on: 'Yes', off: 'No') // optional on and off text labels
    ->required()
```

### Relational

**Link** - The [link field](https://www.advancedcustomfields.com/resources/link) provides a simple way to select or define a link (url, title, target).

```php
use Extended\ACF\Fields\Link;

Link::make('Read More Link')
    ->format('array') // url, array (default)
    ->required()
```

**Page Link** - The [page link field](https://www.advancedcustomfields.com/resources/page-link) allows the selection of 1 or more posts, pages or custom post types.

```php
use Extended\ACF\Fields\PageLink;

PageLink::make('Contact Link')
    ->postTypes(['contact'])
    ->postStatus(['publish']) // draft, future, pending, private, publish
    ->taxonomies(['category:city'])
    ->disableArchives()
    ->nullable()
    ->multiple()
    ->required()
```

**Post Object** - The [post object field](https://www.advancedcustomfields.com/resources/post-object) creates a select field where the choices are your pages + posts + custom post types.

```php
use Extended\ACF\Fields\PostObject;

PostObject::make('Animal')
    ->helperText('Select an animal')
    ->postTypes(['animal'])
    ->postStatus(['publish']) // draft, future, pending, private, publish
    ->nullable()
    ->multiple()
    ->format('object') // id, object (default)
    ->required()
```

**Relationship** - The [relationship field](https://www.advancedcustomfields.com/resources/relationship) creates a very attractive version of the post object field.

```php
use Extended\ACF\Fields\Relationship;

Relationship::make('Contacts')
    ->helperText('Add the contacts.')
    ->postTypes(['contact'])
    ->postStatus(['publish']) // draft, future, pending, private, publish
    ->filters([
        'search', 
        'post_type',
        'taxonomy'
    ])
    ->elements(['featured_image'])
    ->minPosts(3)
    ->maxPosts(6)
    ->format('object') // id, object (default)
    ->required()
```

**Taxonomy** - The [taxonomy field](https://www.advancedcustomfields.com/resources/taxonomy) allows the selection of 1 or more taxonomy terms.

```php
use Extended\ACF\Fields\Taxonomy;

Taxonomy::make('Cinemas')
    ->helperText('Select one or more cinema terms.')
    ->taxonomy('cinema')
    ->appearance('checkbox') // checkbox, multi_select, radio, select
    ->create(false) // false or true (default)
    ->load(true) // true or false (default)
    ->save(true) // true or false (default)x
    ->format('id'), // object, id (default)
```

**User** - The user field creates a select field for all your users.

```php
use Extended\ACF\Fields\User;

User::make('User')
    ->roles(['administrator', 'editor']) // administrator, author, contributor, editor, subscriber
    ->format('array'), // id, object, array (default)
```

### Advanced

**Color Picker** - The [color picker field](https://www.advancedcustomfields.com/resources/color-picker) allows a color to be selected via a JavaScript popup.

```php
use Extended\ACF\Fields\ColorPicker;

ColorPicker::make('Text Color')
    ->helperText('Add the text color.')
    ->default('#4a9cff')
    ->opacity()
    ->format('string') // array, string (default)
    ->required()
```

**Date Picker** - The [date picker field](https://www.advancedcustomfields.com/resources/date-picker) creates a jQuery date selection popup.

```php
use Extended\ACF\Fields\DatePicker;

DatePicker::make('Birthday')
    ->helperText('Add the employee\'s birthday.')
    ->displayFormat('d/m/Y')
    ->format('d/m/Y')
    ->required()
```

**Icon Picker** - The [icon picker field](https://www.advancedcustomfields.com/resources/icon-picker) allows you to easily select a Dashicon, a Media Library image, or a URL for an image or SVG.

```php
use Extended\ACF\Fields\IconPicker;

IconPicker::make('Icon')
    ->helperText('Add the icon.')
    ->format('string') // array, string (default)
    ->tabs(['dashicons']) // [dashicons, media_library, url] (default)
    ->required()
```

**Time Picker** - The [time picker field](https://www.advancedcustomfields.com/resources/time-picker) creates a jQuery time selection popup.

```php
use Extended\ACF\Fields\TimePicker;

TimePicker::make('Start Time', 'time')
    ->helperText('Add the start time.')
    ->displayFormat('H:i')
    ->format('H:i')
    ->required()
```

**Date Time Picker** - The [date time picker field](https://www.advancedcustomfields.com/resources/date-time-picker) creates a jQuery date & time selection popup.

```php
use Extended\ACF\Fields\DateTimePicker;

DateTimePicker::make('Event Date', 'date')
    ->helperText('Add the event\'s start date and time.')
    ->displayFormat('d-m-Y H:i')
    ->format('d-m-Y H:i')
    ->firstDayOfWeek(1) // Sunday is 0, Monday is 1, or use `weekStartsOnMonday` or `weekStartsOnSunday`
    ->required()
```

**Google Map** - The [Google Map field](https://www.advancedcustomfields.com/resources/google-map) creates an interactive map with the ability to place a marker.

```php
use Extended\ACF\Fields\GoogleMap;

GoogleMap::make('Address', 'address')
    ->helperText('Add the Google Map address.')
    ->center(57.456286, 18.377716)
    ->zoom(14)
    ->required()
```

### Layout

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

**Clone** - The [clone field](https://www.advancedcustomfields.com/resources/clone) enables you to choose and showcase pre-existing fields or groups. This field does not possess a custom field class. Instead, you can create a new file for your field and import it using the `require` statement whenever necessary.

```php
// fields/email.php
use Extended\ACF\Fields\Email;

return Email::make('Email')->required();

// employee.php
register_extended_field_group([
    'fields' => [
        require __DIR__.'/fields/email.php';
    ]
]);
```

**Flexible Content** - The [flexible content field](https://www.advancedcustomfields.com/resources/flexible-content) acts as a blank canvas to which you can add an unlimited number of layouts with full control over the order.

```php
use Extended\ACF\Fields\FlexibleContent;
use Extended\ACF\Fields\Layout;
use Extended\ACF\Fields\Text;

FlexibleContent::make('Blocks')
    ->helperText('Add the page blocks.')
    ->button('Add Component')
    ->layouts([
        Layout::make('Image')
            ->layout('block')
            ->fields([
                Text::make('Description')
            ])
    ])
    ->minLayouts(1)
    ->maxLayouts(10)
    ->required()
```

**Group** - The [group](https://www.advancedcustomfields.com/resources/group) allows you to create a group of sub fields.

```php
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Text;

Group::make('Hero')
    ->helperText('Add a hero block with title, content and image to the page.')
    ->fields([
        Text::make('Title'),
        Image::make('Background Image'),
    ])
    ->layout('row')
    ->required()
```

**Message** - The message fields allows you to display a text message.

```php
use Extended\ACF\Fields\Message;

Message::make('Heading')
    ->body('George. One point twenty-one gigawatts.')
    ->escapeHtml(),
```

**Repeater** - The [repeater field](https://www.advancedcustomfields.com/resources/repeater) allows you to create a set of sub fields which can be repeated again and again whilst editing content!

```php
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Text;

Repeater::make('Employees')
    ->helperText('Add the employees.')
    ->fields([
        Text::make('Name'),
        Image::make('Profile Picture'),
    ])
    ->minRows(2)
    ->maxRows(10)
    ->collapsed('name')
    ->button('Add employee')
    ->paginated(10)
    ->layout('table') // block, row, table
    ->required()
```

**Tab** - The [tab field](https://www.advancedcustomfields.com/resources/tab) groups fields into tabbed sections. Fields or groups added after a tab become its children. Enabling `endpoint` on a tab creates a new group of tabs.

```php
use Extended\ACF\Fields\Tab;

Tab::make('Tab 1'),
Tab::make('Tab 2'),
Tab::make('Tab 3')
    ->placement('top') // top, left
    ->selected() // specify which tab should be selected by default
    ->endpoint(), // This will make a break in the tabs and create a new group of tabs
```

## Location

The `Location` class allows you to write custom location rules without specifying the `name`, `operator`, and `value` keys. If no `operator` is provided, it will use the `operator` as the `value`. For additional details on custom location rules, please visit [this link](https://www.advancedcustomfields.com/resources/custom-location-rules).

```php
use Extended\ACF\Location;

Location::where('post_type', 'post')->and('post_type', '!=', 'post') // available operators: ==, !=
```

> [!NOTE]  
> The `if` method was renamed to `where` in version 12, see the [upgrade guide](#upgrade-guide).

## Conditional Logic

The conditional class helps you write conditional logic [without knowing](https://media.giphy.com/media/SbtWGvMSmJIaV8faS8/source.gif) the field keys.

```php
use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\File;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\URL;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\Text;

Select::make('Type')
    ->choices([
        'document' => 'Document',
        'link' => 'Link to resource',
        'embed' => 'Embed',
    ]),
File::make('Document', 'file')
    ->conditionalLogic([
        ConditionalLogic::where('type', '==', 'document') // available operators: ==, !=, >, <, ==pattern, ==contains, ==empty, !=empty
    ]),
URL::make('Link', 'url')
    ->conditionalLogic([
        ConditionalLogic::where('type', '==', 'link')
    ]),

// "and" condition
Textarea::make('Embed Code')
    ->conditionalLogic([
        ConditionalLogic::where('type', '!=', 'document')->and('type', '!=', 'link')
    ]),

// use multiple conditional logic for "or" condition
Text::make('Title')
    ->conditionalLogic([
        ConditionalLogic::where('type', '!=', 'document'),
        ConditionalLogic::where('type', '!=', 'link')
    ]),

// conditional logic that relies on another field from a different field group
Text::make('Sub Title')
    ->conditionalLogic([
      ConditionalLogic::where(
        group: 'other-group',
        name: 'enable_highlight', 
        operator: '==', 
        value: 'on', 
      )
    ]),
```

## Bidirectional Relationships

The `bidirectional` method establishes a bidirectional relationship between two or more fields. Each field involved in this relationship must use the `key` method to set a custom key. Then, the keys of these related fields should be passed to the `bidirectional` method.

```php
use Extended\ACF\Fields\Relationship;

// This field is attached to a "Project" post type.
Relationship::make('Related Testimonial')
  ->postTypes(['testimonial'])
  ->key('field_related_testimonial')
  ->bidirectional('field_related_project'),

// This field is attached to a "Testimonial" post type.
Relationship::make('Related Project')
  ->postTypes(['project'])
  ->key('field_related_project')
  ->bidirectional('field_related_testimonial'),
```

To learn more about ACF bidirectional relationships and their caveats, please consult the [official ACF documentation](https://www.advancedcustomfields.com/resources/bidirectional-relationships/).

> [!IMPORTANT]
We [usually recommend avoiding](#key) the use of custom field keys. This is an exception to that rule. When using bidirectional relationships, you must set custom field keys.

## Non-standards

### `helperText`

The `helperText` method supports [Markdown](https://wordpress.com/support/markdown-quick-reference/) for the elements listed below.

```php
Text::make('Title')
    ->helperText('__strong__ **strong** _italic_ *italic* `code` [link](https://example.com)')
```

### `column`

The `column` property is not a standard in ACF. It is used as a shorthand for setting the width of the field wrapper. You can provide a number between 0 and 100 as its value.

```php
Text::make('Text')
    ->column(50) // shorthand for ->wrapper(['width' => 50])
```

> [!NOTE]
> If you plan to use your custom fields in [block patterns](https://developer.wordpress.org/themes/patterns/), we recommend setting all fields to 100% width. The fields appear in the right-hand sidebar, which has limited space.

### `dd` and `dump`

The `dd` and `dump` methods are non-standard and not available in ACF. These methods are used for debugging. 

```php  
Text::make('Name')
    ->dd()
    ->dump()
```

To use the `dd` and `dump` methods, you need to install `symfony/var-dumper`.

```sh
composer require symfony/var-dumper --dev
```

### `key`

The `key` method enables you to define a custom field key. The `key` should consist of alphanumeric characters and underscores, and must be prefixed with either `field_` or `layout_`.


```php
Text::make('Text')
    ->key('field_123abc')
```

You can use the `key` argument to provide a custom field key in [conditional logic](#conditional-logic).

```php
ConditionalLogic::where(
  name: 'color', 
  operator: '==', 
  value: 'red'
  key: 'field_123abc', 
)
```

> [!IMPORTANT]
> Avoid using custom field keys unless you thoroughly understand them. The field keys are automatically generated when you use the `register_extended_field_group` function.

### `withSettings`

The `withSettings` method overwrites any existing settings on the field when you want to add custom settings.

```php
Text::make('Name')
	->withSettings(['my-new-setting' => 'value'])
	->required()
```

Another option for adding custom settings is to extend the field classes provided in the package. Please refer to the [custom fields](#custom-fields) section.

```php
namespace App\Fields;

use Extended\ACF\Fields\Select as Field;

class Select extends Field
{
    public function myNewSetting(string $value): static
    {
        $this->settings['my-new-setting'] = $value;

        return $this;
    }
}
```

## Custom Fields

To create custom field classes, you can extend the [base field class](src/Fields/Field.php). Additionally, you can import [available setting traits](src/Fields/Settings) to add common methods like `required` and `helperText`.

```php
namespace App\Fields;

use Extended\ACF\Fields\Field;
use Extended\ACF\Fields\Settings\HelperText;
use Extended\ACF\Fields\Settings\Required;

class OpenStreetMap extends Field
{
    use HelperText;
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

When you're ready, you can import and use your field just like any other field in this library.

```php
use App\Fields\OpenStreetMap;

OpenStreetMap::make('Map')
    ->latitude(56.474)
    ->longitude(11.863)
    ->zoom(10)
```

## Upgrade Guide

The upgrade guide provides information about the breaking changes in the package, now named `vinkla/extended-acf`. If you have version 12 or lower, you can update by replacing the package name in your `composer.json` file. This ensures that everything works as expected and you receive updates.


```diff
-"wordplate/acf": "^12.0",
+"vinkla/extended-acf": "^12.0"
```

### 14

The `Url` class has been renamed to `URL`.

```diff
-use Extended\ACF\Fields\Url;
+use Extended\ACF\Fields\URL;

-Url::make('GitHub URL')
+URL::make('GitHub URL')
```

The `WysiwygEditor` class has been renamed to `WYSIWYGEditor`.

```diff
-use Extended\ACF\Fields\WysiwygEditor;
+use Extended\ACF\Fields\WYSIWYGEditor;

-WysiwygEditor::make('Content')
+WYSIWYGEditor::make('Content')
```

The `defaultValue` method has been renamed to `default`.

```diff
-Text::make('Name')->defaultValue('Jeffrey Way')
+Text::make('Name')->default('Jeffrey Way')
```

The `instructions` method has been renamed to `helperText`.

```diff
-Text::make('Title')->instructions('Add the title text.')
+Text::make('Title')->helperText('Add the title text.')
```

The `allowMultiple` method has been renamed to `multiple`.

```diff
-Select::make('Colors')->allowMultiple()
+Select::make('Colors')->multiple()
```

The `allowNull` method has been renamed to `nullable`.

```diff
-Select::make('Features')->allowNull()
+Select::make('Features')->nullable()
```

The `characterLimit` method has been renamed to `maxLength`.

```diff
-Textarea::make('Description')->characterLimit(100)
+Textarea::make('Description')->maxLength(100)
```

The `pagination` method has been renamed to `paginated`.

```diff
-Repeater::make('Dogs')->pagination(10)
+Repeater::make('Dogs')->paginated(10)
```

The `buttonLabel` method has been renamed to `button`.

```diff
-Repeater::make('Cats')->buttonLabel('Add Cat')
+Repeater::make('Cata')->button('Add Cat')
```

The `weekStartsOn` method has been renamed to `firstDayOfWeek`.

```diff
-DatePicker::make('Date')->weekStartsOn(1)
+DatePicker::make('Date')->firstDayOfWeek(1) // or use `weekStartsOnMonday` or `weekStartsOnSunday`
```

The `prepend` method has been renamed to `prefix`.

```diff
-Number::make('Price')->prepend('$')
+Number::make('Price')->prefix('$')
```

The `append` method has been renamed to `suffix`.

```diff
-Number::make('Price')->append('€')
+Number::make('Price')->suffix('€')
```

The `stylisedUi` method has been renamed to `stylized` on the `TrueFalse` field.

```diff
-TrueFalse::make('Disabled')->stylisedUi(onText: 'Yes')
+TrueFalse::make('Disabled')->stylized(on: 'Yes')
```

The `stylisedUi` method has been split into two methods `stylized` and `lazyLoad` on the `Select` field.

```diff
-Select::make('Friends')->stylisedUi()
+Select::make('Friends')->stylized()

-Select::make('Friends')->stylisedUi(true)
+Select::make('Friends')->lazyLoad()
```

The `fileSize` method has been split into two methods `minSize` and `maxSize`.

```diff
-Image::make('Background')->fileSize('400 KB', 5)
+Image::make('Background')->minSize('400 KB')->maxSize(5)
```

The `height` method has been split into two methods `minHeight` and `maxHeight`.

```diff
-Gallery::make('Carousel')->height(100, 1000)
+Gallery::make('Carousel')->minHeight(100)->maxHeight(1000)
```

The `width` method has been split into two methods `minWidth` and `maxWidth`.

```diff
-Image::make('Product Image')->width(100, 1000)
+Image::make('Product Image')->minWidth(100)->maxWidth(1000)
```

The `insert` method has been renamed to `prependFiles`.

```diff
-Gallery::make('Downloads')->insert('prepend')
+Gallery::make('Downloads')->prependFiles()
```

The `min` and `max` methods has been renamed to `minFiles` and `maxFiles` on the `Gallery` field.

```diff
-Gallery::make('Files')->min(1)->max(10)
+Gallery::make('Files')->minFiles(1)->maxFiles(10)
```

The `min` and `max` methods has been renamed to `minPosts` and `maxPosts` on the `Relationship` field.

```diff
-Relationship::make('Posts')->min(1)->max(10)
+Relationship::make('Posts')->minPosts(1)->maxPosts(10)
```

The `min` and `max` methods has been renamed to `minRows` and `maxRows` on the `Repeater` field.

```diff
-Repeater::make('Items')->min(1)->max(10)
+Repeater::make('Items')->minRows(1)->maxRows(10)
```

The `min` and `max` methods has been renamed to `minLayouts` and `maxLayouts` on the `FlexibleContent` field.

```diff
-FlexibleContent::make('Blocks')->min(1)->max(10)
+FlexibleContent::make('Blocks')->minLayouts(1)->maxLayouts(10)
```

The `min` and `max` methods has been renamed to `minInstances` and `maxInstances` on the `Layout` field.

```diff
-Layout::make('Testimonials')->min(1)->max(10)
+Layout::make('Testimonials')->minInstances(1)->maxInstances(10)
```

The `mimeTypes` method has been renamed to `acceptedFileTypes`.

```diff
-File::make('Manual')->mimeTypes(['pdf'])
+File::make('Manual')->acceptedFileTypes(['pdf'])
```

The `enableOpacity` method has been renamed to `opacity`.

```diff
-ColorPicker::make('Background')->enableOpacity()
+ColorPicker::make('Background')->opacity()
```

The `delay` method has been renamed to `lazyLoad`.

```diff
-WysiwygEditor::make('Biography')->delay()
+WYSIWYGEditor::make('Biography')->lazyLoad()
```

The `mediaUpload` method has been renamed to `disableMediaUpload`.

```diff
-WysiwygEditor::make('Narrative')->mediaUpload(false)
+WYSIWYGEditor::make('Narrative')->disableMediaUpload()
```

The `message` method has been renamed to `body`.

```diff
-Message::make('Heading')->message('Text')
+Message::make('Heading')->body('Text')
```

The `allowArchives` method has been renamed to `disableArchives`.

```diff
-PageLink::make('Link')->allowArchives(false)
+PageLink::make('Link')->disableArchives()
```

The `addTerm`, `loadTerms` and `saveTerms` methods has been renamed to `create`, `load` and `save`.

```diff
-Taxonomy::make('Category')->addTerm()->loadTerms()->saveTerms()
+Taxonomy::make('Category')->create()->load()->save()
```

The `returnFormat` method has been renamed to `format` on all fields.

```diff
-Select::make('Superhero')->returnFormat('value')
+Select::make('Superhero')->format('value')
```

The `Instructions` trait has been renamed to `HelperText`.

```diff
-use Extended\ACF\Fields\Settings\Instructions;
+use Extended\ACF\Fields\Settings\HelperText;
```

The `MimeTypes` trait has been renamed to `FileTypes`.

```diff
-use Extended\ACF\Fields\Settings\MimeTypes;
+use Extended\ACF\Fields\Settings\FileTypes;
```

The `CharacterLimit` trait has been renamed to `MaxLength`.

```diff
-use Extended\ACF\Fields\Settings\CharacterLimit;
+use Extended\ACF\Fields\Settings\MaxLength;
```

The `Pending` trait has been renamed to `Affixable`.

```diff
-use Extended\ACF\Fields\Settings\Pending;
+use Extended\ACF\Fields\Settings\Affixable;
```

The `Writable` trait has been renamed to `Immutable`.

```diff
-use Extended\ACF\Fields\Settings\Writable;
+use Extended\ACF\Fields\Settings\Immutable;
```

The `SubFields` trait has been renamed to `Fields`.

```diff
-use Extended\ACF\Fields\Settings\SubFields;
+use Extended\ACF\Fields\Settings\Fields;
```

The `Message` and `ReturnFormat` traits has been removed.

```diff
-use Extended\ACF\Fields\Settings\Message;
-use Extended\ACF\Fields\Settings\ReturnFormat;
```

Changelog: [`13.0.0...14.0.0`](https://github.com/vinkla/extended-acf/compare/13.0.0...14.0.0)

### 13

If you're upgrading to version 13, you'll also need to update your imports. The namespace has been changed to `Extended\ACF`.

```diff
-use WordPlate\Acf\Fields\Text;
-use WordPlate\Acf\Fields\Number;
+use Extended\ACF\Fields\Text;
+use Extended\ACF\Fields\Number;
```

Changelog: [`12.0.0...13.0.0`](https://github.com/vinkla/extended-acf/compare/12.0.0...13.0.0)

### 12

The location query method `if` has been replaced with `where`. Please update your field groups accordingly.

```diff
use Extended\ACF\Location;

-Location::if('post_type', 'post')
+Location::where('post_type', 'post')
```

Changelog: [`11.0.0...12.0.0`](https://github.com/vinkla/extended-acf/compare/11.0.0...12.0.0)

### 11

The field name is now automatically formatted as snake_case instead of kebab-case.

```diff
-Text::make('Organization Number') // organization-number
+Text::make('Organization Number') // organization_number
```

The `Radio` field has been renamed to `RadioButton`.

```diff
-Radio::make('Color')
+RadioButton::make('Color')
```

The `Wysiwyg` field has been renamed to `WysiwygEditor`.

```diff
-Wysiwyg::make('Text')
+WysiwygEditor::make('Text')
```

Changelog: [`10.0.0...11.0.0`](https://github.com/vinkla/extended-acf/compare/10.0.0...11.0.0)
