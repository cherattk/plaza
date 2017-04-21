<?php

namespace Shop\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class StockController extends AbstractActionController
{
    private $StockService;
    
    public function __construct($StockService) {
        
        $this->StockService = $StockService;
    }
    
    protected function StockService()
    {
        return $this->StockService;
    }
    
    public function indexAction()
    {
        $response = ['stock' => 'not found'];
        
        $id = $this->params()->fromRoute('id');
        
        if($id){
            $response = $this->processItem($id);
        }
        else{
            $response = $this->searchStock();
        }
        
        return new JsonModel($response);
    }
    
    public function searchStock()
    {
        $query = $this->params()->fromQuery('filter');
        //
        $request = $this->request;
        $query = $request->getQuery();
        $filter = $query['filter'];
        
        $list = $this->StockService()->fetchList();
        return [
            'list' => 'list data'
        ];
        
    }
    
    public function processItem($id)
    {
        $verb = $this->getRequest()->getMethod();
        
        $response = [];
        
        switch ($verb) {
            case 'GET' :
                $response = $this->getItem($id);
                break;
            
            case 'POST' :
                $response = $this->createItem();
                break;
            
            case 'PUT' :
                $response = $this->updateItem($id);
                break;
            
            case 'DELETE' :
                $response = $this->deleteItem($id);
                break;
            
            default:
                //$this->methodeNotAllowed();
                break;
        }
        
        return $response;
    }    

    public function getItem($id)
    {
        // DUMMY DATA : ITEM //
        $productId = "1234";
        $item = [
            "id" => $productId,
            "name" => "Short product Name",
            "description" => "Product description",
            "price" => 13.55,
            "price_promo" => 10,
            "quantity" => 10,
            "quantity_mini" => 10,
            "image" => [],
        ];
        
        for($i = 0 ; $i < 6 ; $i++){
            $item['image'][] = "/any/img/product-image.png";
        }
        
        return [
            'item' => $item
        ];
    }
    
    public function createItem()
    {        
        return [
            'item' => 'create item'
        ];
    }
    
    public function updateItem($id)
    {
        return ['update' => 'update item'];
    }
    
    public function deleteItem($id)
    {
        return ['update' => 'delete item'];
    }
}
