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

use Contao\Form;
use Contao\StringUtil;
use Contao\Widget;

final class AddGridClassesToFormListener
{
    public function onLoadFormField(Widget $objWidget, string $formId, array $data, Form $form)
    {
        $strClasses = '';

        // Bei diesen ContentElementen soll nichts verändert werden
        $arrWrongFields = ['rowStart', 'rowEnd', 'colEnd', 'html', 'fieldsetfsStop'];

        if (!\in_array($objWidget->type, $arrWrongFields, true) && (isset($objWidget->grid_columns) || isset($objWidget->grid_options))) {
            if ($objWidget->grid_columns) {
                $arrGridClasses = StringUtil::deserialize($objWidget->grid_columns);
                foreach ($arrGridClasses as $class) {
                    $strClasses .= $class.' ';
                }
            }

            // Weitere Optionen Klassen auslesen und in String speichern
            if ($objWidget->grid_options) {
                $arrGridClasses = StringUtil::deserialize($objWidget->grid_options);
                foreach ($arrGridClasses as $class) {
                    $strClasses .= $class.' ';
                }
            }

            // Klassen anfügen
            if ('fieldset' === $objWidget->type || 'submit' === $objWidget->type) {
                $objWidget->class = $strClasses;
            } else {
                $objWidget->prefix .= ' '.$strClasses;
            }
        }

        return $objWidget;
    }
}
