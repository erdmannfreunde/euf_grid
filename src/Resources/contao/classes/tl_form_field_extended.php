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

/**
 * Label_Callback anpassen, um Grid-KLassen hinzuzufügen.
 */
class tl_form_field_extended extends tl_form_field
{
    public function listFormFields($arrRow)
    {
        $return = parent::listFormFields($arrRow);

        $return = GridClass::addClassesToLabels($arrRow, $return);

        return $return;
    }
}
