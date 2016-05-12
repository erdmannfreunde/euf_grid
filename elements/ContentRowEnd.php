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


class ContentRowEnd extends ContentElement
{
  protected $strTemplate = 'ce_rowEnd';

  public function compile()
  {
    return;
  }

  public function generate()
  {
  	if (TL_MODE == 'BE')
  	{
  		$this->Template = new BackendTemplate('be_wildcard');
  		$this->Template->wildcard = '### E&F GRID: Reihe Ende ###';
  		return $this->Template->parse();
  	}

    return parent::generate();
  }
}
