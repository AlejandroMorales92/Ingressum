angular.module('IngressumApp').controller('repGeneralPersonasController', ['$scope', 'reportesService', '$sessionStorage', '$location', 'rolAdmin', '$route', '$timeout', function ($scope, agregarReportes, $sessionStorage, $location, rolAdmin, $route, $timeout) {

    $scope.reportes = [];
    
    $scope.pintarTabla = function () {
      agregarReportes.obtenerRepGeneralPersonas.then(function successCallback(response) {
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