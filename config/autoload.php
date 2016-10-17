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
	'GridClass'              => 'system/modules/euf_grid/classes/GridClass.php',
	'GridHooks'              => 'system/modules/euf_grid/classes/GridHooks.php',
	'tl_content_extended'    => 'system/modules/euf_grid/classes/tl_content_extended.php',
	'tl_form_field_extended' => 'system/modules/euf_grid/classes/tl_form_field_extended.php',

	// Elements
	'ContentColEnd'          => 'system/modules/euf_grid/elements/ContentColEnd.php',
	'ContentColStart'        => 'system/modules/euf_grid/elements/ContentColStart.php',
	'ContentRowEnd'          => 'system/modules/euf_grid/elements/ContentRowEnd.php',
	'ContentRowStart'        => 'system/modules/euf_grid/elements/ContentRowStart.php',

	// Forms
	'FormColEnd'             => 'system/modules/euf_grid/forms/FormColEnd.php',
	'FormColStart'           => 'system/modules/euf_grid/forms/FormColStart.php',
	'FormRowEnd'             => 'system/modules/euf_grid/forms/FormRowEnd.php',
	'FormRowStart'           => 'system/modules/euf_grid/forms/FormRowStart.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_colEnd'     => 'system/modules/euf_grid/templates',
	'ce_colStart'   => 'system/modules/euf_grid/templates',
	'ce_rowEnd'     => 'system/modules/euf_grid/templates',
	'ce_rowStart'   => 'system/modules/euf_grid/templates',
	'form_colEnd'   => 'system/modules/euf_grid/templates',
	'form_colStart' => 'system/modules/euf_grid/templates',
	'form_rowEnd'   => 'system/modules/euf_grid/templates',
	'form_rowStart' => 'system/modules/euf_grid/templates',
));
