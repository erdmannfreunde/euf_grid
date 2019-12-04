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

use ErdmannFreunde\ContaoGridBundle\EventListener\DataContainer\GridClassesOptionsListener;
use ErdmannFreunde\ContaoGridBundle\EventListener\DataContainer\GridColsOptionsListener;

$GLOBALS['TL_DCA']['tl_form_field']['palettes']['rowStart'] = '{type_legend},type;{expert_legend:hide},class;';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['rowEnd']   = '{type_legend},type';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['colStart'] =
    '{type_legend},type;{grid_legend},grid_columns,grid_options;{expert_legend:hide},class';
$GLOBALS['TL_DCA']['tl_content']['palettes']['colEnd']      = '{type_legend},type';

foreach ($GLOBALS['TL_DCA']['tl_form_field']['palettes'] as $k => $palette) {
    if (!\is_array($palette) && false !== strpos($palette, 'customTpl')
        && (!\in_array($k, ['html', 'fieldsetfsStop', 'rowStart'], true))) {
        $GLOBALS['TL_DCA']['tl_form_field']['palettes'][$k] = str_replace(
            '{template_legend:hide}',
            '{grid_legend},grid_columns,grid_options;{template_legend:hide}',
            $GLOBALS['TL_DCA']['tl_form_field']['palettes'][$k]
        );
    }
}

$GLOBALS['TL_DCA']['tl_form_field']['fields']['grid_columns'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_form_field']['grid_columns'],
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

$GLOBALS['TL_DCA']['tl_form_field']['fields']['grid_options'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_form_field']['grid_options'],
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
