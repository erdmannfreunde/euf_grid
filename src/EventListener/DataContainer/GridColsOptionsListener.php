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

namespace ErdmannFreunde\ContaoGridBundle\EventListener\DataContainer;

final class GridColsOptionsListener
{
    public function onOptionsCallback()
    {
        $columns = [];

        if ($GLOBALS['EUF_GRID_SETTING']['cols']) {
            foreach ($GLOBALS['EUF_GRID_SETTING']['cols'] as $option) {
                foreach ($GLOBALS['EUF_GRID_SETTING']['viewports'] as $viewport) {
                    foreach ($GLOBALS['EUF_GRID_SETTING']['columns'] as $column) {
                        $columns[$option.$viewport][] = $option.$viewport.$column;
                    }
                }
            }
        }

        return $columns;
    }
}
