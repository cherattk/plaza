var vitrine = angular.module('shopProfilModule',[]);
    
    vitrine.component('shopProfil', {

        templateUrl : "/backshop/js/ng-module/shop-profil/shop-profil.html",
        controller:[ '$http' ,  function($http){

            this.configSelectFile = {
                endpoint : "/backshop/image"
            };
            
            var that = this;
            var endpoint = "/shop/profil";
            $http({
                method : "GET",
                url : endpoint,
                headers: { 
                    'Accept' : 'application/json' , 
                    "X-Requested-With": "XMLHttpRequest" 
                }

            }).then(function onSuccess(response){
                
                that.contact = response.data.contact;

            }, function onError(response){

            });
        }]

    });
