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

use ErdmannFreunde\ContaoGridBundle\EventListener\AddGridClassesToContentListener;
use ErdmannFreunde\ContaoGridBundle\EventListener\AddGridClassesToFormListener;
use ErdmannFreunde\ContaoGridBundle\EventListener\IncludeCssListener;

$GLOBALS['TL_CTE']['euf_grid'] = [
    'rowStart'  => \ErdmannFreunde\ContaoGridBundle\ContentElement\ContentRowStart::class,
    'rowEnd'    => \ErdmannFreunde\ContaoGridBundle\ContentElement\ContentRowEnd::class,
    'colStart'  => \ErdmannFreunde\ContaoGridBundle\ContentElement\ContentColStart::class,
    'colEnd'    => \ErdmannFreunde\ContaoGridBundle\ContentElement\ContentColEnd::class,
];

$GLOBALS['TL_FFL']['rowStart'] = \ErdmannFreunde\ContaoGridBundle\Form\FormRowStart::class;
$GLOBALS['TL_FFL']['rowEnd']   = \ErdmannFreunde\ContaoGridBundle\Form\FormRowEnd::class;
$GLOBALS['TL_FFL']['colStart'] = \ErdmannFreunde\ContaoGridBundle\Form\FormColStart::class;
$GLOBALS['TL_FFL']['colEnd']   = \ErdmannFreunde\ContaoGridBundle\Form\FormColEnd::class;

$GLOBALS['TL_WRAPPERS']['start'][] = 'rowStart';
$GLOBALS['TL_WRAPPERS']['stop'][]  = 'rowEnd';
$GLOBALS['TL_WRAPPERS']['start'][] = 'colStart';
$GLOBALS['TL_WRAPPERS']['stop'][]  = 'colEnd';

$GLOBALS['TL_HOOKS']['getContentElement'][] = [AddGridClassesToContentListener::class, 'onGetContentElement'];
$GLOBALS['TL_HOOKS']['loadFormField'][]     = [AddGridClassesToFormListener::class, 'onLoadFormField'];
$GLOBALS['TL_HOOKS']['getPageLayout'][]     = [IncludeCssListener::class, 'onGetPageLayout'];

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
