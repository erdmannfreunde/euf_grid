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

use ErdmannFreunde\ContaoGridBundle\GridClasses;

final class GridClassesOptionsListener
{
    private $gridClasses;

    public function __construct(GridClasses $gridClasses)
    {
        $this->gridClasses = $gridClasses;
    }

    public function onOptionsCallback(): array
    {
        return $this->gridClasses->getGridClassOptions();
    }
}
