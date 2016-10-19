(function() {

  'use strict';

  angular
    .module('dataParser')
    .factory('Entry', Entry);

    function Entry($resource) {

      // ngResource call to the API with id as a paramaterized URL
      var Entry = $resource('api/entries', {}, {
        update: {
          method: 'PUT'
        }
      });

     

      // Grab data passed from the view and send
      // a POST request to the API to save the data
      function saveEntry(data) {
        return Entry.save(data).$promise.then(function(results) {

          //Pass on the results to CTRL
          return results;
        }, function(error) {

          //Pass on the error to CTRL
          return error;
        });
      }

      
     
      //Return AngularJS Factory
      return {
        saveEntry: saveEntry,
      }
    }

})();