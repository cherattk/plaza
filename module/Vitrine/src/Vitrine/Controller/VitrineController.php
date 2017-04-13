<?php

namespace Vitrine\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Vitrine\Service\ShopService;
use Vitrine\Service\ProductService;

class VitrineController extends AbstractActionController
{    
    private $cssPath = '/vitrine/css';
    
    private $jsPath = '/vitrine/js';
    
    private $ShopService ;
    
    private $ProductService ;
    
    private $authCookie = null;
    
    /////////////////////////////////////////////////////////////////////
    
    public function __construct(
            ShopService $ShopService, 
            ProductService  $ProductService
            )
    {
            $this->ShopService = $ShopService;
            $this->ProductService = $ProductService;
    }
    
    
    public function onDispatch(\Zend\Mvc\MvcEvent $e)
    {
        $connected = false;
        
        $layout = $e->getViewModel();
        
        if(!$connected){
            $login = new \Zend\View\Model\ViewModel();
            $login->setTemplate('login.phtml');        
            $layout->addChild($login, 'loginbox');
        }
        
        $layout->setVariable('isConnected', $connected);
        return parent::onDispatch($e);
    }
    
    /////////////////////////////////////////////////////////////////////
    
    public function testAction()
    {
        $data = '';
        return new ViewModel([
            'data' => $data
        ]);
    }
    
    /////////////////////////////////////////////////////////////////////
    
    public function appendHeadScript(array $asset)
    {
        $headScript = $this->getServiceLocator()
                            ->get('viewhelpermanager')
                            ->get('headScript');
        
        
        foreach ($asset as $value) {
            $file = filter_var($value , FILTER_VALIDATE_URL) 
                        ?  $value :  $this->jsPath . "/" . $value;
            $headScript->appendFile($file , 'text/javascript');
        }
        
    }    
    
    /////////////////////////////////////////////////////////////////////
    
    public function appendCss(array $asset)
    {
        $headScript = $this->getServiceLocator()
                            ->get('viewhelpermanager')
                            ->get('headLink');        
        
        foreach ($asset as $value) {
            $file = filter_var($value , FILTER_VALIDATE_URL) 
                        ?  $value :  $this->cssPath . "/" . $value;
            $headScript->appendStylesheet($file);            
        }
    }
    
    /////////////////////////////////////////////////////////////////////
    
    public function ShopService()
    {
        return $this->ShopService;
    }
    
    /////////////////////////////////////////////////////////////////////
    
    public function ProductService()
    {
        return $this->ProductService;
    }    
    
    /////////////////////////////////////////////////////////////////////
    
    public function welcomeAction()
    {
        
        $this->appendCss([
            'welcome.css',
            'https://cdn.jsdelivr.net/jquery.slick/1.5.7/slick.css'
        ]);
        $this->appendHeadScript(['https://cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js']);
        
        
        $itemList = $this->ProductService()->getList();
        
        return new ViewModel([
                'items'     => $itemList
        ]);
        
    }
    
    /////////////////////////////////////////////////////////////////////
    
    public function productAction()
    {
        $this->appendCss(['shop.css' , 'product.css']);
        
        $shopid = 1234;
        $shop = $this->ShopService()->getShop($shopid);
        
        $itemId = 1234;
        $item = $this->ProductService()->getProduct($itemId);
        
        return new ViewModel([
            'shop' => $shop,
            'item' => $item
        ]);
    }
    
    /////////////////////////////////////////////////////////////////////
    
    public function shopAction()
    {
        $this->appendCss([
            'shop.css',
            'https://cdn.jsdelivr.net/jquery.slick/1.5.7/slick.css'
        ]);
        
        $this->appendHeadScript([
            'https://cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js'
        ]);
        
        $shopId = 1234;
        $shop = $this->ShopService()->getShop($shopId);
        
        $itemList = $this->ProductService()->getList();
        
        return new ViewModel( [
            'shop'      => $shop,
            'items'     => $itemList
        ]);
    }
}
