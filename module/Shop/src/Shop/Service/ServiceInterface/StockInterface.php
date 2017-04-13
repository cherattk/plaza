<?php

namespace Shop\Service\ServiceInterface;

interface StockInterface
{
    public function getList($filter , $range);
}
