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
use Contao\Widget;

final class AddGridClassesToFormListener
{
    public function onLoadFormField(Widget $objWidget, string $formId, array $data, Form $form)
    {
        // Init
        $strClasses = '';

        // Bei diesen ContentElementen soll nichts verändert werden
        $arrWrongFields = ['rowStart', 'rowEnd', 'colEnd', 'html', 'fieldsetfsStop'];

        // Abfrage, ob anzupassenden CEs und Klassen gesetzt wurden
        if (!\in_array($objWidget->type, $arrWrongFields, true) && (isset($objWidget->grid_columns) || isset($objWidget->grid_options))) {
            if ($objWidget->grid_columns) {
                $env            = 'FE';
                $strField       = 'grid_columns';
                $arrGridClasses = unserialize($objWidget->grid_columns);
                foreach ($arrGridClasses as $class) {
                    // HOOK: create and manipulate grid classes
                    if (isset($GLOBALS['TL_HOOKS']['manipulateGridClasses']) && \is_array($GLOBALS['TL_HOOKS']['manipulateGridClasses'])) {
                        foreach ($GLOBALS['TL_HOOKS']['manipulateGridClasses'] as $callback) {
                            $this->import($callback[0]);
                            $class = $this->{$callback[0]}->{$callback[1]}($env, $strField, $class);
                        }
                    }

                    $strClasses .= $class.' ';
                }
            }

            // Weitere Optionen Klassen auslesen und in String speichern
            if ($objWidget->grid_options) {
                $env            = 'FE';
                $strField       = 'grid_options';
                $arrGridClasses = unserialize($objWidget->grid_options);
                foreach ($arrGridClasses as $class) {
                    // HOOK: create and manipulate grid classes
                    if (isset($GLOBALS['TL_HOOKS']['manipulateGridClasses']) && \is_array($GLOBALS['TL_HOOKS']['manipulateGridClasses'])) {
                        foreach ($GLOBALS['TL_HOOKS']['manipulateGridClasses'] as $callback) {
                            $this->import($callback[0]);
                            $class = $this->{$callback[0]}->{$callback[1]}($env, $strField, $class);
                        }
                    }

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
