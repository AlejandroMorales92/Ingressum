angular.module('IngressumApp').controller('repPorFechaYHoraController', ['$scope', 'reportesService', '$routeParams', function ($scope, reportesService, $routeParams) {

    $scope.reportes = [];
    
    $scope.pintarTabla = function () {
      var data = {
        fecha: $routeParams.fecha,
        HoraInicial: $routeParams.HoraInicial,
        HoraFinal: $routeParams.HoraFinal
      };
      reportesService.obtenerRepPorFechayHora(data).then(function successCallback(response) {
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