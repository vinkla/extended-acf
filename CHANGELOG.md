# CHANGELOG

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
