# CHANGELOG

## 14.3.0

- Added bidirectional relationship method

## 14.2.2

- Fixed deprecations in PHP 8.4  
- Updated the dump method to utilize object cloning

## 14.2.1

- Updated resolve parent key traversal process

## 14.2.0

- Added icon picker field

## 14.1.0

- Added `select` method to tab field

## 14.0.1

- Updated `symfony/var-dumper` to 7.0

## 14.0.0

- Updated minimum PHP version to 8.2
- Added `weekStartsOnMonday` method to date picker field
- Added `weekStartsOnSunday` method to date picker field
- Added custom key support to conditional logic
- Rename `Url` field to `URL`
- Rename `WysiwygEditor` field to `WYSIWYGEditor`
- Renamed `addTerm` method to `create`
- Renamed `allowArchives` method to `disableArchives`
- Renamed `allowMultiple` method to `multiple`
- Renamed `allowNull` method to `nullable`
- Renamed `append` method to `suffix`
- Renamed `buttonLabel` method to `button`
- Renamed `characterLimit` method to `maxLength`
- Renamed `defaultValue` method to `default`
- Renamed `delay` method to `lazyLoad`
- Renamed `enableOpacity` method to `opacity`
- Renamed `fileSize` method to `minSize` and `maxSize`
- Renamed `height` method to `minHeight` and `maxHeight`
- Renamed `insert` method to `prependFiles`
- Renamed `instructions` method to `helperText`
- Renamed `loadTerms` method to `load`
- Renamed `mediaUpload` method to `disableMediaUpload`
- Renamed `message` method to `body`
- Renamed `mimeTypes` method to `acceptableFileTypes`
- Renamed `min` and `max` methods `minFiles` and `maxFiles`
- Renamed `min` and `max` methods `minInstances` and `maxInstances`
- Renamed `min` and `max` methods `minLayouts` and `maxLayouts`
- Renamed `min` and `max` methods `minPosts` and `maxPosts`
- Renamed `min` and `max` methods `minRows` and `maxRows`
- Renamed `pagination` method to `paginated`
- Renamed `prepend` method to `prefix`
- Renamed `returnFormat` method to `format`
- Renamed `saveTerms` method to `save`
- Renamed `stylisedUi` method to `stylized` and `lazyLoad`
- Renamed `weekStartsOn` method to `firstDayOfWeek`
- Renamed `width` method to `minWidth` and `maxWidth`
- Renamed `appearance` argument `$fieldType` to `$type`
- Renamed `paginated` argument `$rowsPerPage` to `$perPage`
- Renamed `Pending` trait to `Affixable`
- Renamed `SubFields` trait to `Fields`
- Renamed `Writable` trait to `Immutable`

## 13.8.0

- Added custom field key method (only use this method if you know what you're doing)
- Added `postStatus` filter to relationship fields

## 13.7.1

- Updated `wrapper` and `column` methods to include settings merging

## 13.7.0

- Added Markdown support to `instructions` method
- Added shorthand wrapper width method `column` to all fields

## 13.6.0

- Added buttons array to `toolbar` method on `WysiwygEditor` field

## 13.5.1

- Added return types to `dump` and `dd` methods on field class

## 13.5.0

- Added `dump` and `dd` methods to field class

## 13.4.0

- Added automatically conversion of `choices` list to associative array
- Updated PHP requirement to 8.1

## 13.3.0

- Added and, or and group support to conditional logic

## 13.2.1

- Added float support to `min` and `max` methods

## 13.2.0

- Added `withSettings` method to all fields

## 13.1.2

- Updated developer experience

## 13.1.1

- Updated parameter hints and documentation

## 13.1.0

- Added pagination to repeater field

## 13.0.0

- Rename package to `vinkla/extended-acf`
- Rename namespace from `WordPlate\Acf` to `Extended\ACF`

## 12.0.3

- Added default value to email field

## 12.0.2

- Renamed reserved word `ReadOnly` to `Writable`

## 12.0.1

- Removed field group class

## 12.0.0

- Updated minimum PHP version to 8.0
- Updated type hints and return types
- Renamed `Attributes` namespace to `Settings`
- Renamed `toArray` method to `get` 
- Renamed conditional logic method `if` to `where`
- Renamed location method `if` to `where`
- Removed `field` and `option` helper functions
- Removed `setParentKey` methods
- Removed conditional logic comparison methods
- Removed configuration class
- Removed field group class

## 11.2.0

- Added `delay` to wysiwyg editor field

## 11.1.0

- Added `enableOpacity` to color picker field

## 11.0.1

- Deprecated `field` and `option` helper functions

## 11.0.0

- Added `readonly` and `disabled` to date fields
- Renamed `Radio` class to `RadioButton`
- Renamed `Wysiwyg` class to `WysiwygEditor`
- Updated field label to name conversion from `kebab-case` to `snake_case`

## 10.0.0

- Added `allowNull` to radio button field
- Fixed issue with conditional logic in repeaters
- Removed check if `register_field_group` exists
- Removed key validation from key class

## 9.1.0

- Added return format documentation
- Added plain key text in duplicated keys error message
- Added static return type hint for better intellisense
- Added suggestions on location methods for better intellisense
- Added suggestions on multiple fields and attributes for better intellisense

## 9.0.0

- Added PHP 8.0 support
- Renamed taxonomy field's `createTerm` to `addTerm`
- Added boolean argument to taxonomy field's `loadTerms`, `saveTerms` and `addTerm`
- Added `previewSize` to gallery field

## 8.6.0

- Updated minimum PHP version to 7.3

## 8.5.1

- Added float support to `step` on range field

## 8.5.0

- Added `readOnly` to text fields
- Added `conditionalLogic` to message and tab fields
- Added `disabled` to supported fields

## 8.4.0

- Added `layout` to radio field
- Added `layout` to button_group field
- Added `message` to true_false field
- Added `stylisedUi` to select field

## 8.3.0

- Added `layout` to checkbox field
- Added `allowMultiple` to select field

## 8.2.1

- Added `allowNull` method to select field

## 8.2.0

- Added return format to button group, select, radio and checkbox fields

## 8.1.1

- Add ability to disallow archives for page link field

## 8.1.0

- Added default values to number and range fields

## 8.0.0

- Added `fileSize` to image and gallery fields
- Added static return type to `make` method for better intellisense
- Added option to allow null values for `width`, `height` and `fileSize`
- Added `characterLimit` to text field
- Added text labels to `stylisedUi`
- Renamed `ui` to `stylisedUi`
- Renamed `size` to `fileSize`
- Renamed `multiple` to `allowMultiple`

## 7.2.0

- Added collapsed to repeater field
- Added default value to true_false field

## 7.1.2

- Added default value to text field

## 7.1.1

- Fixes error with conditional logic key

## 7.1.0

- Added prepend and append methods

## 7.0.0

- Added new field classes API
- Removed acf_* helper functions
- Removed is_layout helper functions

## 6.0.0

- Added configuration repository class
- Added custom key support
- Added is layout helper function
- Added sanitize key helper method
- Added validate key helper method
- Added prefix group, field and layout validation
- Updated group key prefix sanitize
- Updated key generation argument order
- Updated key validation for fields without name
- Updated project structure
- Fixed clone field support
- Removed page helper function and class

## 5.1.3

- Fixed multiple tabs bug

## 5.1.2

- Removed required page key menu_title

## 5.1.1

- Fixed conditional logic issue

## 5.1.0

- Added options page helper function
- Added field helper function
- Added option helper function

## 5.0.0

- Updated hash algorithm to FNV-1a
- Fixed conditional logic key issue

## 4.0.0

- Added hashed field, group and layout keys
- Fixed conditional logic field keys bug
- Rename acf_conditional_logic to acf_conditional
- Removed PHP 7.0 support

## 3.1.0

- Added accordion field helper
- Remove name validation on layout fields
- Remove display property validation
- Remove illuminate dependency

## 3.0.0

- Added range field helper
- Added button group field helper
- Added flexible content layout helper
- Added support for flexible content layouts
- Added layout class
- Added conditional logic class
- Updated field and group logic
- Removed deprecated acf class

## 2.0.0

- Added link field
- Added group field
- Update group key title
- Removed hide on screen helper

## 1.0.0

- First stable release

## 0.3.0

- Added conditional logic helper
- Added field and group classes

## 0.2.1

- Added duplicate key exception 

## 0.2.0

- Added acf helper class
- Added layout fields function
- Added jquery fields function
- Added field key validation

## 0.1.1

- Fix bug if acf isn't available

## 0.1.0

- First beta release
