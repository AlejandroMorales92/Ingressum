angular.module('IngressumApp').controller('repPorFechaCategoriaController', ['$scope', 'reportesCategoriaService', '$routeParams', function ($scope, reportesCategoriaService, $routeParams) {

     $scope.reportesc = [];
    
    $scope.pintarTabla = function () {
      reportesCategoriaService.obtenerRepPorFechaCategoria({categoria: $routeParams.categoria, fechaInicialC: $routeParams.fechaInicialC, fechaFinalC: $routeParams.fechaFinalC}).then(function successCallback(response) {
        switch (response.data.code) {
          case 200:
            $scope.reportesc = response.data.datos;
            break;
          case 500:
            $scope.reportesc = [];
        }
      });
    };
    
    $scope.pintarTabla();
  }]);

