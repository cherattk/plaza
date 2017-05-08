<?php

namespace Shop\Stock;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class StockController extends AbstractActionController
{
    private $StockService;
    
    public function __construct($StockService) {
        
        $this->StockService = $StockService;
    }
    
    protected function getStockService()
    {
        return $this->StockService;
    }
    
    /**
     * 
     * @return JsonModel
     */
    public function indexAction()
    {        
        $response = ['message' => 'index action : method not allowed'] ;
        
        $id = $this->params()->fromRoute('id');
        $requestMethod = $this->getRequest()->getMethod();
        
        if($id){            
            $response = $this->processItem($id , $requestMethod);
        }
        else if($requestMethod === "GET"){
            
            $filter = $this->params()->fromQuery();
            $response = $this->search($filter);
            
        }
        else if($requestMethod === "POST"){
            
            $response = $this->createItem();
        }
        
        return new JsonModel($response);
    }
    
    /**
     * @param string $id , item identifier
     * @param string $method , request method
     * 
     * @return Array
     */
    public function processItem($id , $method)
    {        
        switch ($method) {
            case 'GET' :
                $response = $this->getItem($id);
                break;
            
            case 'PUT' :
                $response = $this->updateItem($id);
                break;
            
            case 'DELETE' :
                $response = $this->deleteItem($id);
                break;
            
            default:
                $response = ['message' => 'process item : method-not-allowed'];
                break;
        }
        
        return $response;
    }    
    
    /**
     * @param array $filter
     * @return array
     */
    public function search($filter)
    {        
        $list = $this->getStockService()->selectList();        
        return [ 'list' => $list ];
        
    }
    
    /**
     * 
     * @return array
     */
    public function createItem()
    {
        $item = $this->getStockService()->insert();
        return ['item' => $item];
    }
    
    /**
     * 
     * @param string $id
     * @return array
     */
    public function getItem($id)
    {
        $item = $this->getStockService()->select($id);
        return ['item' => $item];
    }
    
    /**
     * 
     * @param string $id
     * @return array
     */
    public function updateItem($id)
    {
        $item = $this->getStockService()->update($id);
        return ['item' => $item];
    }
    
    /**
     * 
     * @param string $id
     * @return array
     */
    public function deleteItem($id)
    {
        $item = $this->getStockService()->delete($id);
        return ['item' => $item];
    }
}
