angular.module('IngressumApp').controller('BuscarController', ['$scope', 'BuscarService', '$sessionStorage', '$location', 'rolAdmin', '$route', '$timeout', '$parse', function ($scope, BuscarService, $sessionStorage, $location, rolAdmin, $route, $timeout, $parse) {

    $scope.colaboradores = [];
    $scope.buscarp = {};
    $scope.buscarp.persona = $sessionStorage.persona;
    $scope.busquedadFallida = false;
    $scope.personaBuscada = '';


    $scope.buscar = function () {
      BuscarService.buscarCol({persona: $scope.personaBuscada}).then(function successCallback(response) {
        $scope.$parent.colaboradores = response.data.colaboradores;
      }, function errorCallback(response) {
        console.error(response);
      });
    };


    $scope.buscarColaborador = function () {

      console.log($scope.buscarp);

      BuscarService.buscarCol($scope.buscarp).then(function successCallback(response) {
        delete $sessionStorage.persona;
        if (response.data.code == 500) {
          $scope.busquedaFallida = true;
        } else {
          $scope.colaborador = response.data.datos;
          console.log(response.data);
        }
      }, function errorCallback(response) {
        console.error(response);
      });
    };

    $scope.buscarColaborador();

  }]);


