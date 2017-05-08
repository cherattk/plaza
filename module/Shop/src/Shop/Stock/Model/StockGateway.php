<?php

namespace Shop\Stock\Model;

use Zend\Db\TableGateway\TableGateway;

class StockGateway
{
    private $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
}
