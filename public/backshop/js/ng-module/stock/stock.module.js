var stock = angular.module('stockModule',[]);

    stock.controller('stockController' ,
                    [ '$rootScope' , '$scope' , function( $rootScope , $scope){

        // initial state
        $scope.showStockEditor = false;
        
        // listen to event
        $rootScope.$on('showStockEditor', function(e , state){
            $scope.showStockEditor = state;
        });

        

    }]);

    stock.component('stockList', {

        templateUrl : "/backshop/js/ng-module/stock/stock-list.html",
        controller:[ '$http' , '$scope' , '$rootScope' , 
                    function( $http , $scope , $rootScope){

            this.getItemDetails = function(itemID) {
                $rootScope.$broadcast('getItemDetails' , itemID);                
            };

            var that = this;
            var range = 1;
            var endpoint = "/stock/" + range;
            $http({
                method : "GET",
                url : endpoint,
                headers: {
                        "Cache-Control" : "no-cache",
                    'Accept' : 'application/json',
//                    "X-Requested-With": "XMLHttpRequest"
                }
                
            }).then(
                function onSuccess(response){
                
                /************************************************************************
                array of { id , name_short , price, pricepromo , quantity , quantity_mini }
                *************************************************************************/               
                that.items = response.data.list;
                
                
            }, function onError(response){
                
            });
        }]
    });

    stock.component('stockEditor',{

        templateUrl : "/backshop/js/ng-module/stock/stock-editor.html",
        controller: [ '$http' , '$scope' , '$rootScope' , 
                    function( $http , $scope , $rootScope){
            
             var that = this;
             
            this.closeStockEditor = function() {
                itemEditor(0);                
            };
            
            $rootScope.$on('getItemDetails', function(e , itemID){
                itemEditor(itemID);
            });
            
            var itemEditor = function(id){
                
                var state = !!id;
                
                if(!id){
                    that.item =  { id : "", name : "" , price : "", 
                                    price_promo : "", description : "", image : []
                                 };
                }
                else{
                    //var endpoint = "/stock/item/" + id + "?XDEBUG_SESSION_START=netbeans-xdebug";
                    var endpoint = "/stock/item/" + id;
                    $http({
                        method : "GET",
                        url : endpoint,
                        headers: { 
                            "Accept" : "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        }

                    }).then(function onSuccess(response){
                        /**********************************************
                       item = { id, name , price, price_promo, description , image : [] }
                        ***********************************************/
                        that.item = response.data.item;

                    }, function onError(response){

                    });
                }
                
                $rootScope.$broadcast('showStockEditor' , state);
            };
        }]
    });
