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

    public function onsubmitCallback(\DataContainer $dc)
    {
        if (!in_array($dc->activeRecord->type, array('rowStart', 'colStart'))) {
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
            $data['sorting'] += 1;

            $newElement = new \Contao\ContentModel();
            $newElement->setRow($data);
            $newElement->save();
        }
    }

    private function siblingStopElmentIsMissing($pid, $ptable, $sorting, $rowOrCol)
    {
            if (!in_array($rowOrCol, array('row', 'col'))) {
            throw new InvalidArgumentException('Argument $rowOrCol must be either "row" or "col"');
        }
        $statement = \Contao\Database::getInstance()
            ->prepare(
                'SELECT * FROM tl_content WHERE pid=? AND ptable=? AND sorting>? AND type IN("' . $rowOrCol . 'Start", "'
                . $rowOrCol . 'End") ORDER BY sorting'
            )
            ->limit(1)
            ->execute($pid, $ptable, $sorting);

        if (false === $row = $statement->fetchAssoc()) {
            return true;
        }

        if ($rowOrCol . 'End' !== $row['type']) {
            return true;
        }

        return false;
    }
}
