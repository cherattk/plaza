var stock = angular.module('stockModule',[]);

    stock.controller('stockController' ,
                    [ '$rootScope' , '$scope' , function( $rootScope , $scope){

        // listen to event(showStockEditor)
        $rootScope.$on('getItemDetails', function(e , itemID){
            $scope.showStockEditor = !!itemID;
        });

        // initial state
        $scope.showStockEditor = false;

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
                    'Accept' : 'application/json'
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
                $rootScope.$broadcast('getItemDetails' , 0);
            };

            // listen to event(showStockEditor)
            $rootScope.$on('getItemDetails', function(e , itemID){
                fetchItemDetails(itemID);
                $scope.showStockEditor = !!itemID;
            });
        
            
            var fetchItemDetails = function(id){
                
                if(!id){
                    that.item = { id : "", name : "" , price : "", 
                                    price_promo : "", description : "", image : []
                                  };
                    return;
                }
                else{
                    var endpoint = "/stock/item/" + id;
                    $http({
                        method : "GET",
                        url : endpoint,
                        headers: { 'Accept' : 'application/json' }

                    }).then(function onSuccess(response){
                        /**********************************************
                       item = { id, name , price, price_promo, description , image : [] }
                        ***********************************************/
                        that.item = response.data.item;


                    }, function onError(response){

                    });          
                }
            };
        }]
    });
