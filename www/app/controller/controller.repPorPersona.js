angular.module('IngressumApp').controller('repPorPersonaController', ['$scope', 'reportesService', '$routeParams', function ($scope, reportesService, $routeParams) {

    $scope.reportes = [];
    
    $scope.pintarTabla = function () {
      reportesService.obtenerRepPorPersona({cedula: $routeParams.cedula}).then(function successCallback(response) {
        switch (response.data.code) {
          case 200:
            $scope.reportes = response.data.datos;
            break;
          case 500:
            $scope.reportes = [];
        }
      });
    };
    
    $scope.pintarTabla();

  }]);