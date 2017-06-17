angular.module('IngressumApp').service('BuscarService', ['$http', function ($http) {

    this.buscarCol = function (data) {
      return $http.post('http://localhost/Ingressum/www/server.php/buscarColaborador', $.param(data));
    };

  }]);

