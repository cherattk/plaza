<?php
namespace Visitor\Service\ServiceInterface;

interface ProductInterface
{
    public function getProduct($id);
    
    public function getList($filter , $range);
}
