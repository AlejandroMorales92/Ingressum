angular.module('IngressumApp').service('securityService', ['$http', function($http){
    
    this.validateUserAndPassword = function (data) {
      return $http.post('http://localhost/Ingressum/www/server.php/identificar', $.param(data));
    };

    // this.getUser = $http.get('http://localhost/cras/www/server.php/obtener_usuarios');
    
}]);