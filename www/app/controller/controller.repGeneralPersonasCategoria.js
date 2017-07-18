angular.module('IngressumApp').controller('repGeneralPersonasCategoriaController', ['$scope', 'reportesCategoriaService', '$routeParams', function ($scope, reportesCategoriaService, $routeParams) {

    $scope.reportes = [];
    
    $scope.pintarTabla = function () {
      reportesCategoriaService.obtenerRepGeneralPersonasCategoria({categoria: $routeParams.categoria}).then(function successCallback(response) {
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