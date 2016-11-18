<?php

/**
 * @package   EuF-Grid
 * @author    Sebastian Buck
 * @license   LGPL
 * @copyright Erdmann & Freunde
 */


class ContentRowStart extends ContentElement
{
  protected $strTemplate = 'ce_rowStart';

  public function compile()
  {
    return;
  }

  public function generate()
  {
  	if (TL_MODE == 'BE')
  	{
  		$this->Template = new BackendTemplate('be_wildcard');
  		$this->Template->wildcard = '### E&F GRID: ' . $GLOBALS['TL_LANG']['FFL']['rowStart'][0] . '  ###';
      $this->Template->wildcard .= '<div class="tl_content_right tl_gray m12">('.$GLOBALS['EUF_GRID_SETTING']['row'].')</div>';
  		return $this->Template->parse();
  	}

    return parent::generate();
  }
}
