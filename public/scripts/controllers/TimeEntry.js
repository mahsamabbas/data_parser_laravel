(function() {

  'use strict';

  angular
    .module('dataParser')
    .controller('Entries', Entries);

    function Entries(Entry, $scope) {


      //Define variables
      var vm = this;
      vm.urlentries = [];
      vm.activeProduct;
      vm.showLoader = false;
      vm.errorMsg = false;
      //Default URL
      vm.url = 'http://pf.tradetracker.net/?aid=1&type=xml&encoding=utf8&fid=251713&categoryType=2&additionalType=2&limit=10';

      //Func to pass URL to server 
      // and get back the processed data
      vm.logNewUrl = function() {
        vm.showLoader = true;
        
        Entry.saveEntry({
          "url": vm.url
        }).then(function(data) {
        
        //Assign data to variable
         vm.urlentries = data.products || data.product;

         if(!vm.urlentries.length || vm.urlentries.length <= 1 || vm.urlentries.length == undefined){
          vm.errorMsg = true;
         }
         vm.showLoader = false;
       
        }, function(error) {
          console.log(error);
        });


      }


      //Call it by default
      vm.logNewUrl();

      //Get Active Product Data 
      vm.showProductData = function(data){
        vm.activeProduct = data;
      }

      
    }    

})();