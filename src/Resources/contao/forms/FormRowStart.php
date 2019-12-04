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

class FormRowStart extends Widget
{
    protected $strTemplate = 'form_rowStart';

    public function validate()
    {
    }

    public function parse($arrAttributes=null)
    {
        // Return a wildcard in the back end
        if (TL_MODE === 'BE') {
            $strCustomClasses = '';

            if ($this->strClass) {
                $strCustomClasses .= ', ';
                $strCustomClasses .= str_replace(' ', ', ', $this->strClass);
            }

            /** @var \BackendTemplate|object $objTemplate */
            $objTemplate = new \BackendTemplate('be_wildcard');

            $objTemplate->wildcard = '### E&F GRID: '.$GLOBALS['TL_LANG']['FFL']['rowStart'][0].'  ###';
            $objTemplate->wildcard .= '<div class="tl_content_right tl_gray m12">('.$GLOBALS['EUF_GRID_SETTING']['row'].$strCustomClasses.')</div>';

            return $objTemplate->parse();
        }

        return parent::parse($arrAttributes);
    }

    public function generate()
    {
        return '';
    }
}
