<?php

/**
* @package   EuF-Grid
* @author    Sebastian Buck
* @license   LGPL
* @copyright Erdmann & Freunde
*/

// Palettes
$GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] = str_replace (
  ',combineScripts',
  ',combineScripts,addEuFGridCss',
  $GLOBALS['TL_DCA']['tl_layout']['palettes']['default']
);

// Fields
$GLOBALS['TL_DCA']['tl_layout']['fields']['addEuFGridCss'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['addEuFGridCss'],
  'exclude'                 => true,
  'inputType'               => 'checkbox',
  'eval'                    => array('tl_class' => 'w50'),
  'sql'                     => "char(1) NOT NULL default ''"
);
