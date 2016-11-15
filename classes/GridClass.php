<?php

/**
 * @package   EuF-Grid
 * @author    Sebastian Buck
 * @license   LGPL
 * @copyright Erdmann & Freunde
 */

class GridClass {

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
      			$arrColumns[$option.$GLOBALS['EUF_GRID_SETTING']['devider'].$viewport][] = $option.$GLOBALS['EUF_GRID_SETTING']['devider'].$viewport.$GLOBALS['EUF_GRID_SETTING']['devider'].$column;
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
      		foreach($GLOBALS['EUF_GRID_SETTING']['columns'] as $column) {
      			$arrOptions[$option.$GLOBALS['EUF_GRID_SETTING']['devider'].$viewport][] = $option.$GLOBALS['EUF_GRID_SETTING']['devider'].$viewport.$GLOBALS['EUF_GRID_SETTING']['devider'].$column;
      		}
      	}
      }
    }

    // Pulls
    if($GLOBALS['EUF_GRID_SETTING']['pulls']) {
      foreach($GLOBALS['EUF_GRID_SETTING']['pulls'] as $option) {
      	foreach ($GLOBALS['EUF_GRID_SETTING']['viewports'] as $viewport) {
      			$arrOptions[$option][] = $option.$GLOBALS['EUF_GRID_SETTING']['devider'].$viewport;
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
      $arrGridClasses = deserialize($arrRow['grid_columns']);
      $grid .= implode(deserialize($arrGridClasses), ", ");

      if($arrRow['grid_options'] != "" ) {
        $grid .= ", ";
      }
    }

    if($arrRow['grid_options'] != "" ) {
      $arrGridClasses = deserialize($arrRow['grid_options']);
      $grid .= implode(deserialize($arrGridClasses), ", ");
    }

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
