<?php

/**
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

$GLOBALS['TL_FFL']['rowStart'] = 'FormRowStart';
$GLOBALS['TL_FFL']['rowEnd']  = 'FormRowEnd';
$GLOBALS['TL_FFL']['colStart'] = 'FormColStart';
$GLOBALS['TL_FFL']['colEnd']  = 'FormColEnd';


/**
 * Front end wrappers
 */
$GLOBALS['TL_WRAPPERS']['start'][] = 'rowStart';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'rowEnd';
$GLOBALS['TL_WRAPPERS']['start'][] = 'colStart';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'colEnd';


/**
 * HOOKS
 */
$GLOBALS['TL_HOOKS']['getContentElement'][] = array('GridHooks', 'addGridClasses');
$GLOBALS['TL_HOOKS']['loadFormField'][] = array('GridHooks', 'addGridClassesToForms');
$GLOBALS['TL_HOOKS']['loadDataContainer'][] = array('GridHooks', 'addCSSFileAsFramework');


 /**
  * EuF Grid HOOK: manipulateGridClasses
	*
	* Übergibt die derzeitige Umgebung (BE/FE), das betroffene Feld
	* (grid_columns/grid_options) und die Klasse.
	* Erwartet als Rückgabe die manipulierte Klasse als String
	*
	* ###### config.php #######
	* $GLOBALS['TL_HOOKS']['manipulateGridClasses'][] = array('manipulateGridClasses', 'manipulateClasses');
	*
	* ###### manipulateGridClasses.php #######
	* class manipulateGridClasses {
	*
	*	  public function manipulateClasses($env, $strField, $class) {
	*
	*	    // Do something here...
	*
	*	    return $class;
	*	  }
	*	}
  */


/**
 * EuF Grid standard configuration
 */
$GLOBALS['EUF_GRID_SETTING'] = array (
  'columns'   => array ('1','2','3','4','5','6','7','8','9','10','11','12'),
  'viewports' => array ('xs','sm','md','lg','xl'),
	'devider'		=> '-',

	'row'       => 'row',
	'cols' 			=> array ('col'),
	'offset' 		=> array ('offset'),
	'offset_cols'   => array ('0', '1','2','3','4','5','6','7','8','9','10','11'),
	'pulls'			=> array ('pull-left', 'pull-right'),
	'resets'     => array ('clear'),
  'options'   => array ('') // additional custom classes
);
