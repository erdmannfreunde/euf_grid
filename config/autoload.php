<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'GridClass'       => 'system/modules/euf_grid/classes/GridClass.php',
	'GridHooks'       => 'system/modules/euf_grid/classes/GridHooks.php',

	// Elements
	'ContentColEnd'   => 'system/modules/euf_grid/elements/ContentColEnd.php',
	'ContentColStart' => 'system/modules/euf_grid/elements/ContentColStart.php',
	'ContentRowEnd'   => 'system/modules/euf_grid/elements/ContentRowEnd.php',
	'ContentRowStart' => 'system/modules/euf_grid/elements/ContentRowStart.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_colEnd'   => 'system/modules/euf_grid/templates',
	'ce_colStart' => 'system/modules/euf_grid/templates',
	'ce_rowEnd'   => 'system/modules/euf_grid/templates',
	'ce_rowStart' => 'system/modules/euf_grid/templates',
));