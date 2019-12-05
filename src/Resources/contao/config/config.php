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

use ErdmannFreunde\ContaoGridBundle\ContentElement\ContentColEnd;
use ErdmannFreunde\ContaoGridBundle\ContentElement\ContentColStart;
use ErdmannFreunde\ContaoGridBundle\ContentElement\ContentRowEnd;
use ErdmannFreunde\ContaoGridBundle\ContentElement\ContentRowStart;
use ErdmannFreunde\ContaoGridBundle\EventListener\AddGridClassesToContentListener;
use ErdmannFreunde\ContaoGridBundle\EventListener\AddGridClassesToFormListener;
use ErdmannFreunde\ContaoGridBundle\EventListener\IncludeCssListener;
use ErdmannFreunde\ContaoGridBundle\Form\FormColEnd;
use ErdmannFreunde\ContaoGridBundle\Form\FormColStart;
use ErdmannFreunde\ContaoGridBundle\Form\FormRowEnd;
use ErdmannFreunde\ContaoGridBundle\Form\FormRowStart;

$GLOBALS['TL_CTE']['euf_grid'] = [
    'rowStart'  => ContentRowStart::class,
    'rowEnd'    => ContentRowEnd::class,
    'colStart'  => ContentColStart::class,
    'colEnd'    => ContentColEnd::class,
];

$GLOBALS['TL_FFL']['rowStart'] = FormRowStart::class;
$GLOBALS['TL_FFL']['rowEnd']   = FormRowEnd::class;
$GLOBALS['TL_FFL']['colStart'] = FormColStart::class;
$GLOBALS['TL_FFL']['colEnd']   = FormColEnd::class;

$GLOBALS['TL_WRAPPERS']['start'][] = 'rowStart';
$GLOBALS['TL_WRAPPERS']['stop'][]  = 'rowEnd';
$GLOBALS['TL_WRAPPERS']['start'][] = 'colStart';
$GLOBALS['TL_WRAPPERS']['stop'][]  = 'colEnd';

$GLOBALS['TL_HOOKS']['getContentElement'][] = [AddGridClassesToContentListener::class, 'onGetContentElement'];
$GLOBALS['TL_HOOKS']['loadFormField'][]     = [AddGridClassesToFormListener::class, 'onLoadFormField'];
$GLOBALS['TL_HOOKS']['getPageLayout'][]     = [IncludeCssListener::class, 'onGetPageLayout'];
