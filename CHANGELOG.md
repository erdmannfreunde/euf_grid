euf_grid Changelog
==================

Version 3.1.0 (2020-01-07)
--------------------------
### New
- add row-span classes for vertical grid layouts


Version 3.0.4 (2019-09-11)
--------------------------
### New
- end of contao 3.5 support
 

Version 3.0.3 (2019-09-06)
--------------------------
### Fixed
- move start-classes to the end, as they should override col-[viewport]-[width] classes


Version 3.0.2 (2019-08-19)
--------------------------
### New 
- add classes col-1 --> col-12 to css-file


Version 3.0.1 (2019-08-16)
--------------------------
### Fixed
- add update notes to README.md


Version 3.0.0 (2019-08-06)
--------------------------
### New
- switch to CSS3 Grid-Layout


Version 2.2.3 (2017-09-22)
--------------------------
### Fixed
- Restore compatibility for Contao 4.8


Version 2.2.2 (2017-06-03)
--------------------------
### New
- Allow classes like col, col-2 and col-xs
- Automatically create end elements.


Version 2.2.1 (2017-09-22)
--------------------------

### Fixed
- fixed an error that caused the whole grid was not visible (behind the article) in some installations


Version 2.2.0 (2017-09-04)
--------------------------

### New
- additional class `.row--show` to make the grid visible
- fallback for elements that don't have a col-class yet (e.g. `.col-xs-12`)


Version 2.1.0 (2017-08-29)
--------------------------
This version removes the old way to load the grid css and replaces it by adding a new field to the layout in style settings. Thereby it provides a better support for contao 4. We suggest removing the 'old' way of including the CSS before updating and readding it afterwards.

### New
- added new field in layout to load grid CSS

### Removed
- additional checkbox in CSS-Frameworks


Version 2.0.3 (2017-05-31)
--------------------------

### Fixed
- adjust field height in BE to be dynamic so it can display many classes

### Improved
- also show additional classes for RowStart elements


Version 2.0.2 (2017-02-21)
--------------------------

### New
- supports contao 4 (https://packagist.org/packages/erdmannfreunde/euf_grid)


Version 2.0.1 (2017-02-21)
--------------------------

### Fixed
- output element IDs in frontend

### Removed
- removed space fields from content elements


Version 2.0.0 (2016-11-19)
--------------------------

### New
- a default css-grid file is now included and can be activated in page layouts
- use your own hook, to write readable class names ("Box 1/3" --> .col-sm-3)
- new clear-classes (clear-xs --> clear-xl) to clear floating at different viewports
**If you use your own config in dcaconfig.php make sure to add 'resets' and 'offset_cols'**

### Improved
- see, which class names you used in elements overview

### Fixed
- offset-classes now start at 0 and end by 11


Versions previous to 2.0.0
--------------------------

Changelog was not maintained in previous versions.
Try to use the git history for details.
