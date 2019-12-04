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

use ErdmannFreunde\ContaoGridBundle\EventListener\DataContainer\Content;
use ErdmannFreunde\ContaoGridBundle\EventListener\DataContainer\GridClassesOptionsListener;
use ErdmannFreunde\ContaoGridBundle\EventListener\DataContainer\GridColsOptionsListener;

$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = [Content::class, 'onsubmitCallback'];

$GLOBALS['TL_DCA']['tl_content']['palettes']['rowStart'] = '{type_legend},type;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_content']['palettes']['rowEnd']   = '{type_legend},type';
$GLOBALS['TL_DCA']['tl_content']['palettes']['colStart'] =
    '{type_legend},type;{grid_legend},grid_columns,grid_options;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_content']['palettes']['colEnd']   = '{type_legend},type';

foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $k => $palette) {
    if (!\is_array($palette) && false !== strpos($palette, 'cssID')) {
        $GLOBALS['TL_DCA']['tl_content']['palettes'][$k] = str_replace(
            '{invisible_legend',
            '{grid_legend},grid_columns,grid_options;{invisible_legend',
            $GLOBALS['TL_DCA']['tl_content']['palettes'][$k]
        );
    }
}

$GLOBALS['TL_DCA']['tl_content']['fields']['grid_columns'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_content']['grid_columns'],
    'exclude'          => true,
    'search'           => true,
    'inputType'        => 'select',
    'options_callback' => [GridColsOptionsListener::class, 'onOptionsCallback'],
    'eval'             => [
        'mandatory' => false,
        'multiple'  => true,
        'size'      => 10,
        'tl_class'  => 'w50 w50h autoheight',
        'chosen'    => true,
    ],
    'sql'              => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['grid_options'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_content']['grid_options'],
    'exclude'          => true,
    'search'           => true,
    'inputType'        => 'select',
    'options_callback' => [GridClassesOptionsListener::class, 'onOptionsCallback'],
    'eval'             => [
        'mandatory' => false,
        'multiple'  => true,
        'size'      => 10,
        'tl_class'  => 'w50 w50h autoheight',
        'chosen'    => true,
    ],
    'sql'              => 'text NULL',
];
