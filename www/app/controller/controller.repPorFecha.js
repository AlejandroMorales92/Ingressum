angular.module('IngressumApp').controller('repPorFechaController', ['$scope', 'reportesService', '$routeParams', function ($scope, reportesService, $routeParams) {

    $scope.reportes = [];
    
    $scope.pintarTabla = function () {
      reportesService.obtenerRepPorFecha({fechaInicial: $routeParams.fechaInicial, fechaFinal: $routeParams.fechaFinal}).then(function successCallback(response) {
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