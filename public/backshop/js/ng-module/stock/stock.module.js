var stock = angular.module('stockModule',[]);

    stock.controller('stockController' ,
                    [ '$rootScope' , '$scope' , function( $rootScope , $scope){



        $rootScope.$on('showStockEditor', function(e , arg){
            $scope.showStockEditor = arg;
        });

        $scope.showStockEditor = false;

    }]);

    stock.component('stockList', {

        templateUrl : "/backshop/js/ng-module/stock/stock-list.html",
        controller:[ '$http' , '$scope' , '$rootScope' , 
                    function( $http , $scope , $rootScope){

            this.openStockEditor = function() {
                $rootScope.$broadcast('showStockEditor' , true);
            };

            var data = {};
            var endpoint = "/stock/2";
            $http({
                method : "GET",
                url : endpoint,
                responseType : 'JSON',
                headers: {
                    'Accept' : 'application/json'
                }
                
            }).then( 
                function onSuccess(response){
                
            }, function onError(response){
                
            });
            
            /*
            this.items = [];
            var t = {};
            for (var i = 1; i < 8; i++) {
                t = {
                    id : "p123",
                    name:"chemise",
                    price:12.5,
                    pricepromo:10.5,
                    qtedispo:20,
                    qtemini:10,

                };

                t.image = "/any/img/product-image.png";
                this.items.push(t);
            }
            */
        }]
    });

    stock.component('stockEditor',{

        templateUrl : "/backshop/js/ng-module/stock/stock-editor.html",
        controller: [ '$rootScope' , '$scope' ,  '$http' , function($rootScope , $scope){

            this.closeStockEditor = function() {
                $rootScope.$broadcast('showStockEditor' , false);
            };

            this.item = {
                id : "p001",
                name : "chemise super cool taille M",
                price : 17,
                promoprice : 13.5,
                description : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. \
                                Phasellus vulputate sed enim a interdum. \
                                Cras tempus sapien in tristique porta.\
                                Morbi egestas auctor pretium. Curabitur sed ligula ornare, posuere lorem non, pretium mauris. Aliquam et tincidunt ligula. In orci neque, porttitor vitae maximus a, auctor eget justo.",
                image : []
            };

            for (var i = 0 ; i < 6 ; i++) {
                this.item.image[i] = "/any/img/product-image.png";
                
            }
        }]
    });
