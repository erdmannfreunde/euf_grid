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

namespace ErdmannFreunde\ContaoGridBundle\EventListener;

use Contao\LayoutModel;
use Contao\PageModel;
use Contao\PageRegular;

final class IncludeCssListener
{
    public function onGetPageLayout(PageModel $pageModel, LayoutModel $layoutModel, PageRegular $page)
    {
        if ($layoutModel->addEuFGridCss) {
            $GLOBALS['TL_FRAMEWORK_CSS'][] = 'bundles/erdmannfreundecontaogrid/euf_grid.css';
        }
    }
}
