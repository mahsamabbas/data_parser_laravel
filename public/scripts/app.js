
// Initiate Angular app ==> DataParser
(function() {

  'use strict';

  angular
    .module('dataParser', [
      'ngResource',
      'ui.bootstrap', 'filters'
    ]);

})();

// Cut Filter
angular.module('filters', []).
    filter('truncate', function () {
        return function (text, length, end) {
            if (isNaN(length))
                length = 20;

            if (end === undefined)
                end = "...";

            if (text.length <= length || text.length - end.length <= length) {
                return text;
            }
            else {
                return String(text).substring(0, length-end.length) + end;
            }
        };
    });