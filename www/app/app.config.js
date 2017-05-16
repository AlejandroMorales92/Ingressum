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
                        when('/repGeneralPersonas', {
                            controller: 'repGeneralPersonasController',
                            templateUrl: 'app/template/repGeneralPersonas.html'
                        }).
                        when('/repGeneralUsuarios', {
                            controller: 'repGeneralUsuariosController',
                            templateUrl: 'app/template/repGeneralUsuarios.html'
                        }).
                        when('/repPorPersona', {
                            controller: 'repPorPersonaController',
                            templateUrl: 'app/template/repPorPersona.html'
                        }).
                        when('/repPorFecha', {
                            controller: 'repPorFechaController',
                            templateUrl: 'app/template/repPorFecha.html'
                        }).
                        when('/repPorFechaYHora', {
                            controller: 'repPorFechaYHoraController',
                            templateUrl: 'app/template/repPorFechaYHora.html'
                        }).
                        when('/repPorCategoria', {
                            controller: 'repPorCategoriaController',
                            templateUrl: 'app/template/repPorCategoria.html'
                        }).
                        when('/repGeneralPersonasCategoria', {
                            controller: 'repGeneralPersonasCategoriaController',
                            templateUrl: 'app/template/repGeneralPersonasCategoria.html'
                        }).
                        when('/repPorFechaCategoria', {
                            controller: 'repPorFechaCategoriaController',
                            templateUrl: 'app/template/repPorFechaCategoria.html'
                        }).
                        when('/repPorFechaYHoraCategoria', {
                            controller: 'repPorFechaYHoraCategoriaController',
                            templateUrl: 'app/template/repPorFechaYHoraCategoria.html'
                        }).
                        otherwise('/');
            }
        ]);

