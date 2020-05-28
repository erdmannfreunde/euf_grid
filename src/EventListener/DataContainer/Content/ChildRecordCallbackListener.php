<?php

namespace ErdmannFreunde\ContaoGridBundle\EventListener\DataContainer\Content;


class ChildRecordCallbackListener
{

    public function onChildRecordCallback(array $row)
    {
        $buffer = (new \tl_content())->addCteType($row);

        $buffer .= '<a name="123123"></a><script>;</script>';

        return $buffer;
    }
}
