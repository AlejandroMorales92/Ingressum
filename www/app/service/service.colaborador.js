angular.module('IngressumApp').service('registroColaboradorService', ['$http', function($http){
    
    this.agregarCol = function (data) {
      return $http.post('http://localhost/Ingressum/www/server.php/agregarColaborador', $.param(data));
    };

    this.obtenerCol = $http.get('http://localhost/Ingressum/www/server.php/obtenerColaborador');
    
}]);
