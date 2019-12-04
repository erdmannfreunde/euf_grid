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

namespace ErdmannFreunde\ContaoGridBundle\ContentElement;

use Contao\BackendTemplate;
use Contao\ContentElement;

class ContentRowEnd extends ContentElement
{
    protected $strTemplate = 'ce_rowEnd';

    public function compile()
    {
    }

    public function generate()
    {
        if (TL_MODE === 'BE') {
            $this->Template           = new BackendTemplate('be_wildcard');
            $this->Template->wildcard = '### E&F GRID: Reihe Ende ###';

            return $this->Template->parse();
        }

        return parent::generate();
    }
}
