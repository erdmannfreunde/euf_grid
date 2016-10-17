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

class tl_form_field_extended extends tl_form_field
{

  public function listFormFields($arrRow)
  {

    $return = parent::listFormFields($arrRow);

    $return = GridClass::addClassesToLabels($arrRow, $return);

    return $return;
  }

}
