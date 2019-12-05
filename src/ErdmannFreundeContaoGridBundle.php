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

namespace ErdmannFreunde\ContaoGridBundle;

use ErdmannFreunde\ContaoGridBundle\DependencyInjection\ErdmannFreundeContaoGridExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class ErdmannFreundeContaoGridBundle extends Bundle
{
    public function getContainerExtension(): ErdmannFreundeContaoGridExtension
    {
        return new ErdmannFreundeContaoGridExtension();
    }
}
