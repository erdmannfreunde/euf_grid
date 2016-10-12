<?php

/**
 * Label_Callback anpassen, um Grid-KLassen hinzuzufügen
 */
class tl_content_extended extends tl_content
{

  /**
   * Add the type of content element
   *
   * @param array $arrRow
   *
   * @return string
   */
  public function addCteType($arrRow)
  {

    $return = parent::addCteType($arrRow);

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

      $return = str_replace('<div class="cte_type', '<div class="tl_gray tl_content_right">'.$grid.'</div><div class="cte_type', $return);
    }

    return $return;
  }

}
