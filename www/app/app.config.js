angular.module('IngressumApp').
        config(['$routeProvider',
          function config($routeProvider) {
            $routeProvider.
                    when('/', {
                      controller: 'loginController',
                      templateUrl: 'app/template/login.html'
                    }).
                    when('/index', {
                      controller: 'indexController',
                      templateUrl: 'app/template/index.html'
                    }).
                    when('/control', {
                      controller: 'controlController',
                      templateUrl: 'app/template/control.html'
                    }).
                    when('/registroColaboradores', {
                      controller: 'registroColaboradoresController',
                      templateUrl: 'app/template/registroColaboradores.html'
                    }).
                    when('/sistemaUsuarios', {
                      controller: 'sistemaUsuariosController',
                      templateUrl: 'app/template/sistemaUsuarios.html'
                    }).
                    when('/reportes', {
                      controller: 'reportesController',
                      templateUrl: 'app/template/reportes.html'
                    }).
                    otherwise('/');
          }
        ]);