// can use Service or Factory...

angular.module('ngCribs')
   .factory('cribsFactory', function($http) {

   function getCribs() {

      return $http.get('data/data.json');

   }

   return {
      getCribs: getCribs // returns the entire function
   }

});