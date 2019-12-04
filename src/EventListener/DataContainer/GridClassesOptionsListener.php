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

final class GridClassesOptionsListener
{
    public function onOptionsCallback()
    {
        $options = [];

        // Col-Start (used for Grid-Layout)
        if ($GLOBALS['EUF_GRID_SETTING']['col-start']) {
            foreach ($GLOBALS['EUF_GRID_SETTING']['col-start'] as $option) {
                foreach ($GLOBALS['EUF_GRID_SETTING']['viewports'] as $viewport) {
                    foreach ($GLOBALS['EUF_GRID_SETTING']['start_cols'] as $column) {
                        $options[$option.$viewport][] = $option.$viewport.$column;
                    }
                }
            }
        }

        // Row-Start (used for Grid-Layout)
        if ($GLOBALS['EUF_GRID_SETTING']['row-start']) {
            foreach ($GLOBALS['EUF_GRID_SETTING']['row-start'] as $option) {
                foreach ($GLOBALS['EUF_GRID_SETTING']['viewports'] as $viewport) {
                    foreach ($GLOBALS['EUF_GRID_SETTING']['start_cols'] as $column) {
                        $options[$option.$viewport][] = $option.$viewport.$column;
                    }
                }
            }
        }

        // Positioning Content via align and justify (used for Grid-Layout)
        if ($GLOBALS['EUF_GRID_SETTING']['positioning']) {
            foreach ($GLOBALS['EUF_GRID_SETTING']['positioning'] as $option) {
                foreach ($GLOBALS['EUF_GRID_SETTING']['viewports'] as $viewport) {
                    foreach ($GLOBALS['EUF_GRID_SETTING']['directions'] as $directions) {
                        $options[$option.$viewport][] = $option.$viewport.$directions;
                    }
                }
            }
        }

        // Pulls
        if ($GLOBALS['EUF_GRID_SETTING']['pulls']) {
            foreach ($GLOBALS['EUF_GRID_SETTING']['pulls'] as $option) {
                foreach ($GLOBALS['EUF_GRID_SETTING']['viewports'] as $viewport) {
                    $options[$option][] = $option.$viewport;
                }
            }
        }

        // further Options
        if ($GLOBALS['EUF_GRID_SETTING']['options']) {
            foreach ($GLOBALS['EUF_GRID_SETTING']['options'] as $option) {
                $options[$GLOBALS['TL_LANG']['tl_content']['grid_further_options']][] = $option;
            }
        }

        return $options;
    }
}
