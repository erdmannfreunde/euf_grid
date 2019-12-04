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

namespace ErdmannFreunde\ContaoGridBundle\EventListener\DataContainer;

use Contao\ContentModel;
use Contao\Database;
use InvalidArgumentException;

final class Content
{
    public function onsubmitCallback(\DataContainer $dc)
    {
        if (!\in_array($dc->activeRecord->type, ['rowStart', 'colStart'], true)) {
            return;
        }

        if ('auto' !== \Contao\Input::post('SUBMIT_TYPE') && $this->siblingStopElmentIsMissing(
                $dc->activeRecord->pid,
                $dc->activeRecord->ptable,
                $dc->activeRecord->sorting,
                substr($dc->activeRecord->type, 0, 3)
            )) {
            $data = $dc->activeRecord->row();
            unset($data['id']);
            $data['type']    = str_replace('Start', 'End', $dc->activeRecord->type);
            ++$data['sorting'];

            $newElement = new ContentModel();
            $newElement->setRow($data);
            $newElement->save();
        }
    }

    private function siblingStopElmentIsMissing($pid, $ptable, $sorting, $rowOrCol)
    {
        if (!\in_array($rowOrCol, ['row', 'col'], true)) {
            throw new InvalidArgumentException('Argument $rowOrCol must be either "row" or "col"');
        }

        $statement = Database::getInstance()
            ->prepare(
                'SELECT * FROM tl_content WHERE pid=? AND ptable=? AND sorting>? AND type IN("'.$rowOrCol.'Start", "'
                .$rowOrCol.'End") ORDER BY sorting'
            )
            ->limit(1)
            ->execute($pid, $ptable, $sorting);

        if (false === $row = $statement->fetchAssoc()) {
            return true;
        }

        if ($rowOrCol.'End' !== $row['type']) {
            return true;
        }

        return false;
    }
}
