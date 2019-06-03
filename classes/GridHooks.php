<?php

/**
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
        $env = "FE";
        $strField = "grid_columns";
        $arrGridClasses = unserialize($objElement->grid_columns);
        foreach ($arrGridClasses as $class) {

          // HOOK: create and manipulate grid classes
          if (isset($GLOBALS['TL_HOOKS']['manipulateGridClasses']) && is_array($GLOBALS['TL_HOOKS']['manipulateGridClasses']))
          {
            foreach ($GLOBALS['TL_HOOKS']['manipulateGridClasses'] as $callback)
            {
              $this->import($callback[0]);
              $class = $this->{$callback[0]}->{$callback[1]}($env, $strField, $class);
            }
          }

          $strClasses .= $class." ";
        }
      }

      // Weitere Optionen Klassen auslesen und in String speichern
      if($objElement->grid_options) {
        $env = "FE";
        $strField = "grid_options";
        $arrGridClasses = unserialize($objElement->grid_options);
        foreach ($arrGridClasses as $class) {

          // HOOK: create and manipulate grid classes
          if (isset($GLOBALS['TL_HOOKS']['manipulateGridClasses']) && is_array($GLOBALS['TL_HOOKS']['manipulateGridClasses']))
          {
            foreach ($GLOBALS['TL_HOOKS']['manipulateGridClasses'] as $callback)
            {
              $this->import($callback[0]);
              $class = $this->{$callback[0]}->{$callback[1]}($env, $strField, $class);
            }
          }

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

  // Grid-Klassen dem CE hinzufügen
  public function addGridClassesToForms($objWidget, $strForm, $arrForm)
  {
    // Init
    $strClasses = "";

    // Bei diesen ContentElementen soll nichts verändert werden
    $arrWrongFields = array('rowStart', 'rowEnd', 'colEnd', 'html', 'fieldsetfsStop');

    // Abfrage, ob anzupassenden CEs und Klassen gesetzt wurden
    if (!in_array($objWidget->type, $arrWrongFields) && (isset($objWidget->grid_columns) || isset($objWidget->grid_options))) {

      if($objWidget->grid_columns) {
        $env = "FE";
        $strField = "grid_columns";
        $arrGridClasses = unserialize($objWidget->grid_columns);
        foreach ($arrGridClasses as $class) {

          // HOOK: create and manipulate grid classes
          if (isset($GLOBALS['TL_HOOKS']['manipulateGridClasses']) && is_array($GLOBALS['TL_HOOKS']['manipulateGridClasses']))
          {
            foreach ($GLOBALS['TL_HOOKS']['manipulateGridClasses'] as $callback)
            {
              $this->import($callback[0]);
              $class = $this->{$callback[0]}->{$callback[1]}($env, $strField, $class);
            }
          }

          $strClasses .= $class." ";
        }
      }

      // Weitere Optionen Klassen auslesen und in String speichern
      if($objWidget->grid_options) {
        $env = "FE";
        $strField = "grid_options";
        $arrGridClasses = unserialize($objWidget->grid_options);
        foreach ($arrGridClasses as $class) {

          // HOOK: create and manipulate grid classes
          if (isset($GLOBALS['TL_HOOKS']['manipulateGridClasses']) && is_array($GLOBALS['TL_HOOKS']['manipulateGridClasses']))
          {
            foreach ($GLOBALS['TL_HOOKS']['manipulateGridClasses'] as $callback)
            {
              $this->import($callback[0]);
              $class = $this->{$callback[0]}->{$callback[1]}($env, $strField, $class);
            }
          }

          $strClasses .= $class." ";
        }
      }

      // Klassen anfügen
      if ($objWidget->type === 'fieldset' || $objWidget->type==='submit') {
        $objWidget->class = $strClasses;
      } 
      elseif ($objWidget->type==='submit' && version_compare(VERSION, '4.0', '<=')) {
        $objWidget->class = $strClasses;
      }
      else {
        $objWidget->prefix .= " ".$strClasses;
      }

    }

    return $objWidget;

  }

  // Add css file to fronend css
  public function addCSSToFrondend($objPage, $objLayout, $objPty)
  {
    if($objLayout->addEuFGridCss) {
      $GLOBALS['TL_FRAMEWORK_CSS'][] = 'system/modules/euf_grid/assets/euf_grid.css';
    }
  }

}
