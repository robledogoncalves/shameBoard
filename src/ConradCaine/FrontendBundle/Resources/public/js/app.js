(function() {
  var app = angular.module('shameBoard', []).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
  });

  app.controller('ShameController', [ '$scope', '$http', function($scope, $http) {
    $scope.shames = [];
    $http.get('shame').success(function(data) {
      $scope.shames = data;
    });
  }]);

})();