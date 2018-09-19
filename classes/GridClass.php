<?php

/**
 * @package   EuF-Grid
 * @author    Sebastian Buck
 * @license   LGPL
 * @copyright Erdmann & Freunde
 */

class GridClass extends Backend {

  /**
   * Optionen für Select-Feld 'Grid-Spalten' aus config laden und zusammenbauen
   */
  public function getGridCols() {

    $arrColumns = array();

    // columns
    if($GLOBALS['EUF_GRID_SETTING']['cols']) {
      foreach($GLOBALS['EUF_GRID_SETTING']['cols'] as $option) {
      	foreach ($GLOBALS['EUF_GRID_SETTING']['viewports'] as $viewport) {
      		foreach($GLOBALS['EUF_GRID_SETTING']['columns'] as $column) {
      			$arrColumns[$option.$viewport][] = $option.$viewport.$column;
      		}
      	}
      }
    }

    return $arrColumns;
  }

  /**
   * Optionen für Select-Feld 'Grid-Optionen' aus config laden und zusammenbauen
   */
  public function getGridOptions() {

    $arrOptions = array();

    // Offset
    if($GLOBALS['EUF_GRID_SETTING']['offset']) {
      foreach($GLOBALS['EUF_GRID_SETTING']['offset'] as $option) {
      	foreach ($GLOBALS['EUF_GRID_SETTING']['viewports'] as $viewport) {
      		foreach($GLOBALS['EUF_GRID_SETTING']['offset_cols'] as $column) {
      			$arrOptions[$option.$viewport][] = $option.$viewport.$column;
      		}
      	}
      }
    }

    // Pulls
    if($GLOBALS['EUF_GRID_SETTING']['pulls']) {
      foreach($GLOBALS['EUF_GRID_SETTING']['pulls'] as $option) {
      	foreach ($GLOBALS['EUF_GRID_SETTING']['viewports'] as $viewport) {
      			$arrOptions[$option][] = $option.$viewport;
      	}
      }
    }

    // Resets
    if($GLOBALS['EUF_GRID_SETTING']['resets']) {
      foreach($GLOBALS['EUF_GRID_SETTING']['resets'] as $option) {
      	foreach ($GLOBALS['EUF_GRID_SETTING']['viewports'] as $viewport) {
      			$arrOptions[$option][] = $option.$viewport;
      	}
      }
    }

    // further Options
    if($GLOBALS['EUF_GRID_SETTING']['options']) {
      foreach($GLOBALS['EUF_GRID_SETTING']['options'] as $option) {
      		$arrOptions[$GLOBALS['TL_LANG']['tl_content']['grid_further_options']][] = $option;
      }
    }

    return $arrOptions;
  }


  /**
   * Funktion zum Anzeigen der Grid-Klassen in der Übersicht im BE
   */
  public static function addClassesToLabels($arrRow, $return) {
    // Grid-Klassen dem Typ hinzufügen
    $grid = "(";

    if($arrRow['grid_columns'] != "" ) {
      $strField = "grid_columns";
      $env = "BE";
      $arrGridClasses = deserialize($arrRow['grid_columns']);

      // HOOK: create and manipulate grid classes
      if (isset($GLOBALS['TL_HOOKS']['manipulateGridClasses']) && is_array($GLOBALS['TL_HOOKS']['manipulateGridClasses']))
      {
        foreach ($GLOBALS['TL_HOOKS']['manipulateGridClasses'] as $callback)
        {
          $this->import($callback[0]);
          $arrGridClassesManipulated = array();

          foreach ($arrGridClasses as $class) {
            $arrGridClassesManipulated[] = $this->{$callback[0]}->{$callback[1]}($env, $strField, $class);
          }

          $arrGridClasses = $arrGridClassesManipulated;
        }
      }

      $grid .= implode(deserialize($arrGridClasses), ", ");

      if($arrRow['grid_options'] != "" ) {
        $grid .= ", ";
      }
    }

    if($arrRow['grid_options'] != "" ) {
      $env = "BE";
      $strField = "grid_options";
      $arrGridClasses = deserialize($arrRow['grid_options']);

      // HOOK: create and manipulate grid classes
      if (isset($GLOBALS['TL_HOOKS']['manipulateGridClasses']) && is_array($GLOBALS['TL_HOOKS']['manipulateGridClasses']))
      {
        foreach ($GLOBALS['TL_HOOKS']['manipulateGridClasses'] as $callback)
        {
          $this->import($callback[0]);
          $arrGridClassesManipulated = array();

          foreach ($arrGridClasses as $class) {
            $arrGridClassesManipulated[] = $this->{$callback[0]}->{$callback[1]}($env, $strField, $class);
          }

          $arrGridClasses = $arrGridClassesManipulated;
        }
      }

      $grid .= implode(deserialize($arrGridClasses), ", ");
    }

    // close classes
    $grid .= ")";

    if($arrRow['grid_columns'] == "" && $arrRow['grid_options'] == "") {
      $grid = "";
    }

    // Klasse hinzufügen, wenn $grid gesetzt
    if($grid!=="") {
      $type .= " <span class='tl_gray'>".$grid."</span>";

      $return .= '<div class="tl_gray tl_content_right">'.$grid.'</div>';
    }

    return $return;
  }
}
