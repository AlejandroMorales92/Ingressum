angular.module('IngressumApp').controller('reportesController', ['$scope', '$location', function ($scope, $location) {
  
    $scope.cedulaReportePorPersona = '';
    
    $scope.fechaInicialRep = '';
    $scope.fechaFinalRep = '';
    
    $scope.fechaRep = '';
    $scope.horaInicialRep = '';
    $scope.horaFinalRep = '';
    
    
    $scope.ReporteEntradaSalidaPorFecha = function() {
      $location.path('/repPorFecha/' + (moment($scope.fechaInicialRep, "YYYY-MM-DD").format('YYYY-MM-DD') + ' 00:00:00') + '/' + (moment($scope.fechaFinalRep, "YYYY-MM-DD").format('YYYY-MM-DD') + ' 23:59:59'));
    };
    
    $scope.ReporteEntradaSalidaPorFechayHora = function() {
      var fecha = moment($scope.fechaRep, "YYYY-MM-DD").format('YYYY-MM-DD');
      var horaInicial = fecha + ' ' + moment($scope.horaInicialRep, 'HH:mm:ss').format('HH:mm:ss');
      var horaFinal = fecha + ' ' + moment($scope.horaFinalRep, 'HH:mm:ss').format('HH:mm:ss');
      $location.path('/repPorFechaYHora/' + fecha + '/' + horaInicial + '/' + horaFinal);
    };
    
    $scope.ReportePorPersona = function() {
      $location.path('/repPorPersona/' + $scope.cedulaReportePorPersona);
    };

  }]);

