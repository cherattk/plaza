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
    
    public function onDispatch(\Zend\Mvc\MvcEvent $e)
    {
        $allowedMethod = ['GET' , 'POST' , 'PUT' , 'DELETE'];
        
        $requestMethod = $e->getRequest()->getMethod();

        if(!in_array($requestMethod, $allowedMethod)){

            $response = $this->getResponse();
            $response->setStatusCode(405);
            $response->setContent('Method Not Allowed');
            return $response;
        }            
        parent::onDispatch($e);
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
        $id = $this->params()->fromRoute('id');
        $requestMethod = $this->getRequest()->getMethod();
        
        if($id){            
            $response = $this->processItem($id , $requestMethod);
        }
        else if($requestMethod === "GET"){
            $filter = $this->params()->fromQuery('filter');
            $response = $this->searchInStock($filter);
            
        }else{
            $response = new JsonModel(['message' => 'bad request']);
        }
        
        return $response;        
    }
    
    
    /**
     * @param array $filter
     * @return JsonModel
     */
    public function searchInStock($filter)
    {
        return new JsonModel([
            'list' => 'list data'
        ]);
        
    }
    
    
    /**
     * @param string $id , item identifier
     * @param string $method , request method
     * 
     * @return JsonModel
     */
    public function processItem($id , $method)
    {        
        switch ($method) {
            case 'GET' :
                $response = $this->getStockService()->fetchItem($id);
                break;
            
            case 'POST' :
                $response = $this->getStockService()->createItem();
                break;
            
            case 'PUT' :
                $response = $this->getStockService()->updateItem($id);
                break;
            
            case 'DELETE' :
                $response = $this->getStockService()->deleteItem($id);
                break;
            
            default:
                $response = ['item' => 'method-not-allowed'] ;
                break;
        }
        
        return new JsonModel($response);
    }    
    
}
