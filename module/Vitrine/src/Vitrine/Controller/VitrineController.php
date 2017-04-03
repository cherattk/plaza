<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Vitrine\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

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
        $this->authCookie = 'hi im cookie';
        
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
    
    public function getShopService()
    {
        return $this->ShopService;
    }
    
    /////////////////////////////////////////////////////////////////////
    
    public function getProductService()
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
        
        
        $itemList = $this->getProductService()->getList();
        
        return new ViewModel([
                'items'     => $itemList
        ]);
        
    }
    
    /////////////////////////////////////////////////////////////////////
    
    public function productAction()
    {
        $this->appendCss(['shop.css' , 'product.css']);
        
        $shopid = 1234;
        $shop = $this->getShopService()->getShop($shopid);
        
        $itemId = 1234;
        $item = $this->getProductService()->getProduct($itemId);
        
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
        $shop = $this->getShopService()->getShop($shopId);
        
        $itemList = $this->getProductService()->getList();
        
        return new ViewModel( [
            'shop'      => $shop,
            'items'     => $itemList
        ]);
    }
}
