<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @package   EuF-Grid
 * @author    Sebastian Buck
 * @license   LGPL
 * @copyright Erdmann & Freunde
 */


/**
 * EuF Grid ContentElements
 */
$GLOBALS['TL_CTE']['euf_grid'] = array(
	'rowStart'	=> 'ContentRowStart',
	'rowEnd'		=> 'ContentRowEnd',
	'colStart'	=> 'ContentColStart',
	'colEnd'		=> 'ContentColEnd',
);


/**
 * EuF Grid HOOKS
 */
$GLOBALS['TL_HOOKS']['getContentElement'][] = array('GridHooks', 'addGridClasses');


/**
 * EuF Grid standard configuration
 */
$GLOBALS['EUF_GRID_SETTING'] = array (
  'columns'   => array ('1','2','3','4','5','6','7','8','9','10','11','12'),
  'viewports' => array ('xs','sm','md','lg','xl'),
	'devider'		=> '-',

	'cols' 			=> array ('col'),
	'offset' 		=> array ('offset'),
	'pulls'			=> array ('pull-left', 'pull-right'),
  'options'   => array ('') // additional custom classes
);
