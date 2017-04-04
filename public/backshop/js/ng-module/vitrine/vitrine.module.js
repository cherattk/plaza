var vitrine = angular.module('vitrineModule',[]);
    
    vitrine.component('vitrineBanner', {

        templateUrl : "/ng-module/vitrine/vitrine.html",
        controller: function(){

            this.configSelectFile = {
                endpoint : "/backshop/image"
            };
        }

    });
