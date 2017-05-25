angular.module('IngressumApp').service('registroUsuarioService', ['$http', function($http){
    
    this.agregarUsu = function (data) {
      return $http.post('http://localhost/Ingressum/www/server.php/agregarUsuario', $.param(data));
    };

    this.obtenerUsu = $http.get('http://localhost/Ingressum/www/server.php/obtenerUsuario');
    
    this.editarUsu = function (data) {
      return $http.post('http://localhost/Ingressum/www/server.php/editarUsuario', $.param(data));
    };
    
    this.eliminarUsu = function (data) {
      return $http.post('http://localhost/Ingressum/www/server.php/eliminarUsuario', $.param(data));
    };
    
}]);