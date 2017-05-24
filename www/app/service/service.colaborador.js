   angular.module('IngressumApp').service('registroColaboradorService', ['$http', function($http){
    
    this.agregarCol = function (data) {
      return $http.post('http://localhost/Ingressum/www/server.php/agregarColaborador', $.param(data));
    };

    this.obtenerCol = $http.get('http://localhost/Ingressum/www/server.php/obtenerColaborador');
    
    this.editarCol = function (data) {
      return $http.post('http://localhost/Ingressum/www/server.php/editarColaborador', $.param(data));
    };
    
    this.eliminarCol = function (data) {
      return $http.post('http://localhost/Ingressum/www/server.php/eliminarColaborador', $.param(data));
    };
    
}]);
