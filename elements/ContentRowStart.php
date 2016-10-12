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
  		$this->Template->wildcard = '### E&F GRID: Reihe Start ###';
  		return $this->Template->parse();
  	}

    return parent::generate();
  }
}
