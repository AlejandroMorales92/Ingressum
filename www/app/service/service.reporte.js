angular.module('IngressumApp').service('reportesService', ['$http', function ($http) {

    this.obtenerRepGeneralPersonas = $http.get('http://localhost/Ingressum/www/server.php/obtenerRepGeneralPersonas');
    
    this.obtenerRepGeneralUsu = $http.get('http://localhost/Ingressum/www/server.php/obtenerRepGeneralUsu');
    
    this.obtenerRepPorPersona = function (data) {
      return $http.post('http://localhost/Ingressum/www/server.php/obtenerRepPorPersona', $.param(data));
    };
    
    this.obtenerRepPorFecha = function (data) {
      return $http.post('http://localhost/Ingressum/www/server.php/obtenerRepPorFecha', $.param(data));
    };

  }]);

