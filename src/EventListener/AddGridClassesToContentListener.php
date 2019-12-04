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

use Contao\ContentElement;
use Contao\ContentModel;

final class AddGridClassesToContentListener
{
    public function onGetContentElement(ContentModel $contentModel, string $strBuffer, ContentElement $element)
    {
        // Init
        $strClasses = '';

        // Bei diesen ContentElementen soll nichts verändert werden
        $arrWrongCE = ['rowStart', 'rowEnd', 'colEnd'];

        // Abfrage, ob anzupassenden CEs und Klassen gesetzt wurden
        if (!\in_array($contentModel->type, $arrWrongCE, true)
            && (isset($contentModel->grid_columns)
                || isset($contentModel->grid_options))) {
            // Columns Klassen auslesen und in String speichern
            if ($contentModel->grid_columns) {
                $env            = 'FE';
                $strField       = 'grid_columns';
                $arrGridClasses = unserialize($contentModel->grid_columns);
                foreach ($arrGridClasses as $class) {
                    // HOOK: create and manipulate grid classes
                    if (isset($GLOBALS['TL_HOOKS']['manipulateGridClasses'])
                        && \is_array(
                            $GLOBALS['TL_HOOKS']['manipulateGridClasses']
                        )) {
                        foreach ($GLOBALS['TL_HOOKS']['manipulateGridClasses'] as $callback) {
                            $this->import($callback[0]);
                            $class = $this->{$callback[0]}->{$callback[1]}($env, $strField, $class);
                        }
                    }

                    $strClasses .= $class.' ';
                }
            }

            // Weitere Optionen Klassen auslesen und in String speichern
            if ($contentModel->grid_options) {
                $env            = 'FE';
                $strField       = 'grid_options';
                $arrGridClasses = unserialize($contentModel->grid_options);
                foreach ($arrGridClasses as $class) {
                    // HOOK: create and manipulate grid classes
                    if (isset($GLOBALS['TL_HOOKS']['manipulateGridClasses'])
                        && \is_array(
                            $GLOBALS['TL_HOOKS']['manipulateGridClasses']
                        )) {
                        foreach ($GLOBALS['TL_HOOKS']['manipulateGridClasses'] as $callback) {
                            $this->import($callback[0]);
                            $class = $this->{$callback[0]}->{$callback[1]}($env, $strField, $class);
                        }
                    }

                    $strClasses .= $class.' ';
                }
            }

            // Ausgabe abhängig vom Elementtyp anpassen
            switch ($contentModel->type) {
                case 'rowStart':
                case 'rowEnd':
                case 'colEnd':
                    // code...
                    break;
                case 'colStart':
                    // vorhandene Klasse erweitern
                    $strBuffer = str_replace('ce_colStart', 'ce_colStart '.$strClasses, $strBuffer);
                    break;
                default:
                    // Umschließendes DIV hinzufügen
                    $strBuffer = '<div class="'.$strClasses.'">'.$strBuffer.'</div>';
                    break;
            }
        }

        // Rückgabe
        return $strBuffer;
    }
}
