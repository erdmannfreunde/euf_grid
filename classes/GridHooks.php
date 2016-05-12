<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @package   EuF-Grid
 * @author    Sebastian Buck
 * @license   LGPL
 * @copyright Erdmann & Freunde
 */

class GridHooks extends \Controller {

  // Grid-Klassen dem CE hinzufügen
  public function addGridClasses($objElement, $strBuffer)
  {
    // Init
    $strClasses = "";

    // Bei diesen ContentElementen soll nichts verändert werden
    $arrWrongCE = array('rowStart', 'rowEnd', 'colEnd');

    // Abfrage, ob anzupassenden CEs und Klassen gesetzt wurden
    if (!in_array($objElement->type, $arrWrongCE) && (isset($objElement->grid_columns) || isset($objElement->grid_options))) {
      // Columns Klassen auslesen und in String speichern
      if($objElement->grid_columns) {
        $arrGridClasses = unserialize($objElement->grid_columns);
        foreach ($arrGridClasses as $class) {
           $strClasses .= $class." ";
        }
      }

      // Weitere Optionen Klassen auslesen und in String speichern
      if($objElement->grid_options) {
        $arrGridClasses = unserialize($objElement->grid_options);
        foreach ($arrGridClasses as $class) {
           $strClasses .= $class." ";
        }
      }

      // Ausgabe abhängig vom Elementtyp anpassen
      switch ($objElement->type) {
        case 'rowStart':
        case 'rowEnd':
        case 'colEnd':
          # code...
          break;
        case 'colStart':
          // vorhandene Klasse erweitern
          $strBuffer = str_replace('ce_colStart', 'ce_colStart '.$strClasses, $strBuffer);
          break;
        default:
          // Umschließendes DIV hinzufügen
          $strBuffer = '<div class="' . $strClasses . '">' . $strBuffer . '</div>';
          break;
      }
    }

    // Rückgabe
    return $strBuffer;
  }
}
