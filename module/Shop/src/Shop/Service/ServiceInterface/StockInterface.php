<?php

namespace Shop\Service\ServiceInterface;

interface StockInterface
{
    public function fetchList($filter , $range);
    public function fetchItem($id);
}
