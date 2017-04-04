var uikit  = angular.module('uikit',[]);
    
//    uikit.directive('browseFile' , function(){
//        return {
//            restrict : "A",            
//            link : function(scope , el){
//                
//                //console.log(attr);
//                $(el).on('click' , function(){
//                    //console.log(this);
//                    $(this).prev().click();
//                });
//            }
//        };
//        
//    });
    
    uikit.component('selectFile' , {
        
        bindings :{
            config : '<'
        },
        
        templateUrl : "/ng-module/utile/select-file.html",
        
        controller : [ '$element' , '$http' , function($element , $http){
            
            this.config = {
                endpoint : "",
                viewID : "banner-img"
            };
            var that = this;        
            
            var form = $element.find('form')[0];
            
            var fileField = form.elements['my-file'],
                browseButton = form.elements['browse'],
                saveButton = form.elements['save'],
                cancelButton = form.elements['cancel'],
                view = document.getElementById(that.config.viewID),
                oldFile = form.elements['default'],
                saveImage = $(form).children('.savefile')[0];
                
            browseButton.onclick = function(){
                fileField.click();
            };
            
            // read file content
            fileField.onchange = function(){                
                if(this.value !== ""){                    
                    // read file content                    
                    var reader = new FileReader();                    
                        reader.onload = function(){
                            // view image
                            oldFile.value = view.src;
                            view.src = reader.result;
                            
                            browseButton.style.display = "none";
                            saveImage.style.display = "inline-block";
                        };                        
                    reader.readAsDataURL(this.files[0]);
                }
            };
            
            // cancel readed file
            cancelButton.onclick = function(){                
                saveImage.style.display = "none";                  
                browseButton.style.display = "inline-block";                
                fileField.value = "";
                view.src = oldFile.value;
            };
            
            form.onsubmit = function(e){
                e.preventDefault();
                
                if(fileField.value === ""){
                    alert('You Must choose a file');
                    return false;
                }
                 
                ajaxProgress.call(form ,true);
                ajaxSaveFile(that.config.endpoint);
                
                /* demo
                srvResponse = function(){
                    clearTimeout(timeout);
                    ajaxProgress.call(form ,false);
                    
                };
                ajaxProgress.call(form ,true);
                timeout = setTimeout(srvResponse, 1000); 
                */                
               
            };
            
            var ajaxProgress = function(progress){ 
                
                var loadicon = this.getElementsByClassName('formload')[0];
                //var inload = progress;
                
                if(progress){
                    form.elements['save'].disabled = "disabled";
                    loadicon.style.display = "block";
                    
                }else{
                    form.elements['save'].removeAttribute('disabled');
                    loadicon.style.display = "none";
                }
            };
                
            var ajaxSaveFile = function(endpoint){
                
                //var endpoint = form.action;
                var dataFile = new FormData();
                    dataFile.append(fileField.name , fileField.files[0]);
                    
                //*
                $http({
                    method :"POST",
                    url : endpoint,
                    data : dataFile,
                    responseType : 'JSON',
                    cache : false,
                    headers: {'Content-Type': undefined} // important
                    
                }).then(
                    function whenSuccess(response){
                        ajaxProgress.call(form,false);
                        console.log(response);
                    },
                    function whenError(response){
                        ajaxProgress.call(form,false);  
                        console.log(response);
                    }
                );
                //*/

                /*
                jQuery.ajax({method : 'POST',
                            url : endpoint,
                            dataType :'JSON',
                            data : dataFile,
                            cache: false, // important
                            contentType:false, // important
                            processData : false // important

                }).done(function(data , textStatus , xhr){


                    console.log(data);
                    return;
                    
                    ajaxProgress.call(form,false);
                    if(typeof sendFileCallback === "function"){
                        sendFileCallback(data);

                        saveImage.style.display = "none";               
                        browseButton.style.display = "inline-block";
                    }

                }).fail(function(){                            
                    ajaxProgress.call(form,false);

                }).always(function(){
                    ajaxProgress.call(form,false);
                });
                //*/
            };
    }]
        
});


