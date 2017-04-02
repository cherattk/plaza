<?php
namespace Vitrine\ServiceInterface;

interface ProductInterface
{
    public function getProduct($id);
    
    public function getList($filter , $range);
}
