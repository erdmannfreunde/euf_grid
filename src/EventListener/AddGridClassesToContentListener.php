<?php

declare(strict_types=1);

/*
 * Contao Grid Bundle for Contao Open Source CMS.
 *
 * @copyright  Copyright (c) 2019, Erdmann & Freunde
 * @author     Erdmann & Freunde <https://erdmann-freunde.de>
 * @license    MIT
 * @link       http://github.com/erdmannfreunde/contao-grid
 */

namespace ErdmannFreunde\ContaoGridBundle\EventListener;

use Contao\ContentElement;
use Contao\ContentModel;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\StringUtil;
use Symfony\Component\HttpFoundation\RequestStack;

final class AddGridClassesToContentListener
{

    private $requestStack;
    private $scopeMatcher;

    public function __construct(RequestStack $requestStack, ScopeMatcher $scopeMatcher)
    {
        $this->requestStack = $requestStack;
        $this->scopeMatcher = $scopeMatcher;
    }

    public function onGetContentElement(ContentModel $contentModel, string $strBuffer, ContentElement $element)
    {
        $strClasses = '';

        // Bei diesen ContentElementen soll nichts verändert werden
        $arrWrongCE = ['rowStart', 'rowEnd', 'colEnd'];

        if (!\in_array($contentModel->type, $arrWrongCE, true)
            && (isset($contentModel->grid_columns) || isset($contentModel->grid_options))) {
            if ($contentModel->grid_columns) {
                $arrGridClasses = StringUtil::deserialize($contentModel->grid_columns);
                foreach ($arrGridClasses as $class) {
                    $strClasses .= $class.' ';
                }
            }

            if ($contentModel->grid_options) {
                $arrGridClasses = StringUtil::deserialize($contentModel->grid_options);
                foreach ($arrGridClasses as $class) {
                    $strClasses .= $class.' ';
                }
            }

            switch ($contentModel->type) {
                case 'rowStart':
                case 'rowEnd':
                case 'colEnd':
                    // code...
                    break;
                case 'colStart':
                    $strBuffer = str_replace('ce_colStart', 'ce_colStart '.$strClasses, $strBuffer);
                    break;
                default:
                    $strBuffer = '<div class="'.$strClasses.'">'.$strBuffer.'</div>';
                    break;
            }

            if ($this->scopeMatcher->isBackendRequest($this->requestStack->getCurrentRequest())){
                $strBuffer = '<div class="tl_gray tl_content_right">'.$strClasses.'</div>'.$strBuffer;
            }
        }

        return $strBuffer;
    }
}
