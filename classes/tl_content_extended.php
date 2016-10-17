<?php

/**
 * @package   EuF-Grid
 * @author    Sebastian Buck
 * @license   LGPL
 * @copyright Erdmann & Freunde
 */

/**
 * Label_Callback anpassen, um Grid-KLassen hinzuzufügen
 */

class tl_content_extended extends tl_content
{

  public function addCteType($arrRow)
  {

    $return = parent::addCteType($arrRow);

    $return = GridClass::addClassesToLabels($arrRow, $return);

    return $return;
  }

}
