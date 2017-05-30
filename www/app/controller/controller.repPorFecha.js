angular.module('IngressumApp').controller('repPorFechaController', ['$scope', 'reportesService', '$routeParams', function ($scope, reportesService, $routeParams) {

    $scope.reportes = [];
    
    var fechaInicial = moment($routeParams.fechaInicial, "YYYY-MM-DD").format('YYYY-MM-DD') + ' 00:00:00';
    var fechaFinal = moment($routeParams.fechaFinal, "YYYY-MM-DD").format('YYYY-MM-DD') + ' 23:59:59';
    
    $scope.pintarTabla = function () {
      reportesService.obtenerRepPorFecha({fechaInicial: fechaInicial, fechaFinal: fechaFinal}).then(function successCallback(response) {
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