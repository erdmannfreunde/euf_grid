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

$GLOBALS['TL_CTE']['euf_grid'] = [
    'rowStart'  => 'ContentRowStart',
    'rowEnd'    => 'ContentRowEnd',
    'colStart'  => 'ContentColStart',
    'colEnd'    => 'ContentColEnd',
];

$GLOBALS['TL_FFL']['rowStart'] = 'FormRowStart';
$GLOBALS['TL_FFL']['rowEnd']   = 'FormRowEnd';
$GLOBALS['TL_FFL']['colStart'] = 'FormColStart';
$GLOBALS['TL_FFL']['colEnd']   = 'FormColEnd';

$GLOBALS['TL_WRAPPERS']['start'][] = 'rowStart';
$GLOBALS['TL_WRAPPERS']['stop'][]  = 'rowEnd';
$GLOBALS['TL_WRAPPERS']['start'][] = 'colStart';
$GLOBALS['TL_WRAPPERS']['stop'][]  = 'colEnd';

$GLOBALS['TL_HOOKS']['getContentElement'][] = ['GridHooks', 'addGridClasses'];
$GLOBALS['TL_HOOKS']['loadFormField'][]     = ['GridHooks', 'addGridClassesToForms'];
$GLOBALS['TL_HOOKS']['getPageLayout'][]     = ['GridHooks', 'addCSSToFrondend'];

$GLOBALS['EUF_GRID_SETTING'] = [
    'columns'       => ['', '-1', '-2', '-3', '-4', '-5', '-6', '-7', '-8', '-9', '-10', '-11', '-12'],
    'viewports'     => ['', '-xs', '-sm', '-md', '-lg', '-xl'],
    'devider'       => '-',
    'row'           => 'row',
    'cols'          => ['col', 'row-span'],
    'pulls'         => ['pull-left', 'pull-right'],
    'col-start'     => ['col-start'],
    'row-start'     => ['row-start'],
    'positioning'   => ['align', 'justify'],
    'directions'    => ['-start', '-center', '-end', '-stretch'],
    'start_cols'    => ['-1', '-2', '-3', '-4', '-5', '-6', '-7', '-8', '-9', '-10', '-11', '-12'],
    'options'       => [''], // additional custom classes
];
