angular.module('IngressumApp').service('reportesCategoriaService', ['$http', function ($http) {
    
    this.obtenerRepGeneralPersonasCategoria = function (data) {
      return $http.post('http://localhost/Ingressum/www/server.php/obtenerRepGeneralPersonasCategoria', $.param(data));
    };
    this.obtenerRepPorFechaCategoria = function (data) {
      return $http.post('http://localhost/Ingressum/www/server.php/obtenerRepPorFechaCategoria', $.param(data));
    };


  }]);

