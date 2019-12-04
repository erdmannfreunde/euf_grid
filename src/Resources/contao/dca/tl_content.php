<?php

declare(strict_types=1);

/*
 * Contao Grid Bundle for Contao Open Source CMS.
 *
 * @copyright  Copyright (c) 2019, Erdmann & Freunde
 * @author     Erdmann & Freunde <https://erdmann-freunde.de>
 * @license    MIT
 * @link       http://github.com/erdmannfreunde/contao-grid
 */

$GLOBALS['TL_DCA']['tl_content']['list']['sorting']['child_record_callback'] = ['tl_content_extended', 'addCteType'];

$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = ['tl_content_extended', 'onsubmitCallback'];

$GLOBALS['TL_DCA']['tl_content']['palettes']['rowStart'] = '{type_legend},type;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_content']['palettes']['rowEnd']   = '{type_legend},type';
$GLOBALS['TL_DCA']['tl_content']['palettes']['colStart'] = '{type_legend},type;{grid_legend},grid_columns,grid_options;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_content']['palettes']['colEnd']   = '{type_legend},type';

foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $k => $palette) {
    if (!\is_array($palette) && false !== strpos($palette, 'cssID')) {
        $GLOBALS['TL_DCA']['tl_content']['palettes'][$k] = str_replace(
      '{invisible_legend:hide}',
      '{grid_legend},grid_columns,grid_options;{invisible_legend:hide}',
      $GLOBALS['TL_DCA']['tl_content']['palettes'][$k]
    );
    }
}

$GLOBALS['TL_DCA']['tl_content']['fields']['grid_columns'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_content']['grid_columns'],
    'exclude'          => true,
    'search'           => true,
    'inputType'        => 'select',
    'options_callback' => ['GridClass', 'getGridCols'],
    'eval'             => [
        'mandatory'       => false,
        'multiple'        => true,
        'size'            => 10,
        'tl_class'        => 'w50 w50h autoheight',
        'chosen'          => true,
    ],
    'sql'              => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['grid_options'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_content']['grid_options'],
    'exclude'          => true,
    'search'           => true,
    'inputType'        => 'select',
    'options_callback' => ['GridClass', 'getGridOptions'],
    'eval'             => [
        'mandatory'       => false,
        'multiple'        => true,
        'size'            => 10,
        'tl_class'        => 'w50 w50h autoheight',
        'chosen'          => true,
    ],
    'sql'              => 'text NULL',
];
