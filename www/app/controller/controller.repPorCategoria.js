angular.module('IngressumApp').controller('repPorCategoriaController', ['$scope', '$location', function ($scope, $location) {

    $scope.categoria = '';
    $scope.fechaInicialCategoriaRep = '';
    $scope.fechaFinalCategoriaRep = '';

    $scope.RepGeneralPersonasCategoria = function () {
      $location.path('/repGeneralPersonasCategoria/' + $scope.categoria);
    };

    $scope.ReporteEntradaSalidaPorFechaCategoria = function () {
      console.log('/repPorFechaCategoria/' + (moment($scope.fechaInicialCategoriaRep, "YYYY-MM-DD").format('YYYY-MM-DD') + ' 00:00:00') + '/' + (moment($scope.fechaFinalCategoriaRep, "YYYY-MM-DD").format('YYYY-MM-DD') + ' 23:59:59') + '/' + $scope.categoria);
      $location.path('/repPorFechaCategoria/' + (moment($scope.fechaInicialCategoriaRep, "YYYY-MM-DD").format('YYYY-MM-DD') + ' 00:00:00') + '/' + (moment($scope.fechaFinalCategoriaRep, "YYYY-MM-DD").format('YYYY-MM-DD') + ' 23:59:59') + '/' + $scope.categoria);
    };

  }]);

