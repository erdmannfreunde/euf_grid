<?php

/**
 * @package   EuF-Grid
 * @author    Sebastian Buck
 * @license   LGPL
 * @copyright Erdmann & Freunde
 */


/*
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['rowStart'] = '{type_legend},type;{expert_legend:hide},class;';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['rowEnd'] = '{type_legend},type';

$GLOBALS['TL_DCA']['tl_form_field']['palettes']['colStart'] = '{type_legend},type;{grid_legend},grid_columns,grid_options;{expert_legend:hide},class';
$GLOBALS['TL_DCA']['tl_content']['palettes']['colEnd'] = '{type_legend},type';

// Vorhandene Paletten ersetzen
foreach ($GLOBALS['TL_DCA']['tl_form_field']['palettes'] as $k => $palette) {

  if (!is_array($palette) && strpos($palette, "customTpl")!==false) {

    $GLOBALS['TL_DCA']['tl_form_field']['palettes'][$k] = str_replace (
      '{template_legend:hide}',
      '{grid_legend},grid_columns,grid_options;{template_legend:hide}',
      $GLOBALS['TL_DCA']['tl_form_field']['palettes'][$k]
    );
  }

}


/*
 * Fields
 */

//create fields for columns
$GLOBALS['TL_DCA']['tl_form_field']['fields']['grid_columns'] = array
(
  'label'            => &$GLOBALS['TL_LANG']['tl_form_field']['grid_columns'],
	'exclude'          => true,
	'search'           => true,
	'inputType'        => 'select',
  'options_callback' => array('GridClass', 'getGridCols'),
	'eval'             => array
    (
      'mandatory'       => false,
      'multiple'        => true,
      'size'            => 10,
      'tl_class'        => 'w50 w50h',
      'chosen'          => true
    ),
	'sql'              => "text NULL",
);

//create fields for options
$GLOBALS['TL_DCA']['tl_form_field']['fields']['grid_options'] = array
(
  'label'            => &$GLOBALS['TL_LANG']['tl_form_field']['grid_options'],
	'exclude'          => true,
	'search'           => true,
	'inputType'        => 'select',
  'options_callback' => array('GridClass', 'getGridOptions'),
	'eval'             => array
    (
      'mandatory'       => false,
      'multiple'        => true,
      'size'            => 10,
      'tl_class'        => 'w50 w50h',
      'chosen'          => true
    ),
	'sql'              => "text NULL",
);
