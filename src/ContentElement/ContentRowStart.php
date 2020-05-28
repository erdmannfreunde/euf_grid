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
use Contao\System;
use ErdmannFreunde\ContaoGridBundle\GridClasses;

class ContentRowStart extends ContentElement
{
    protected $strTemplate = 'ce_rowStart';

    public function compile()
    {
        $rowClass = System::getContainer()->get(GridClasses::class)->getRowClass();

        $this->Template->rowClass = $rowClass;

        if (TL_MODE === 'BE') {
            $strCustomClasses = '';

            if ($this->cssID[1]) {
                $strCustomClasses .= ', ';
                $strCustomClasses .= str_replace(' ', ', ', $this->cssID[1]);
            }

            $this->Template           = new BackendTemplate('be_wildcard');
            $this->Template->wildcard = '### E&F GRID: '.$GLOBALS['TL_LANG']['FFL']['rowStart'][0].'  ###';
            $this->Template->wildcard .= '<div class="tl_content_right tl_gray m12">('.$rowClass.$strCustomClasses.')</div>';
        }
    }
}
