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

namespace ErdmannFreunde\ContaoGridBundle\Form;

use Contao\Widget;

class FormColStart extends Widget
{
    protected $strTemplate = 'form_colStart';

    public function validate()
    {
    }

    public function parse($arrAttributes=null)
    {
        // Return a wildcard in the back end
        if (TL_MODE === 'BE') {
            /** @var \BackendTemplate|object $objTemplate */
            $objTemplate = new \BackendTemplate('be_wildcard');

            $objTemplate->wildcard = '### '.$GLOBALS['TL_LANG']['FFL']['colStart'][0].' ###';

            return $objTemplate->parse();
        }

        return parent::parse($arrAttributes);
    }

    public function generate()
    {
        return '';
    }
}
