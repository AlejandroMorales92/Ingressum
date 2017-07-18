angular.module('IngressumApp').constant('rolAdmin', 1);
angular.module('IngressumApp').constant('rolCelador', 2);


/**
 * middleware que comprueba las session y los tipos de roles
 */
angular.module('IngressumApp').config(['$middlewareProvider', function middlewareProviderConfig($middlewareProvider) {
        $middlewareProvider.map({
            'comprobarSession': ['$sessionStorage', function comprobarSession($sessionStorage) {
                    middlewareComprobarSession(this, $sessionStorage);
                }],
            'comprobarNoTenerSession': ['$sessionStorage', function comprobarNoTenerSession($sessionStorage) {
                    middlewareComprobarNoTenerSession(this, $sessionStorage);
                }]
        });
    }]);


angular.module('IngressumApp').config(['$routeProvider', '$httpProvider', function config($routeProvider, $httpProvider) {
        $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
        $routeProvider.
                when('/', {
                    controller: 'loginController',
                    templateUrl: 'app/template/login.html',
                    middleware: ['comprobarNoTenerSession']
                }).
                when('/index', {
                    controller: 'indexController',
                    templateUrl: 'app/template/index.html',
                    middleware: ['comprobarSession']
                }).
                when('/control', {
                    controller: 'controlController',
                    templateUrl: 'app/template/control.html',
                    middleware: ['comprobarSession']
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
                when('/repPorPersona/:cedula', {
                    controller: 'repPorPersonaController',
                    templateUrl: 'app/template/repPorPersona.html'
                }).
                when('/repPorFecha/:fechaInicial/:fechaFinal', {
                    controller: 'repPorFechaController',
                    templateUrl: 'app/template/repPorFecha.html'
                }).
                when('/repPorFechaYHora/:fecha/:HoraInicial/:HoraFinal', {
                    controller: 'repPorFechaYHoraController',
                    templateUrl: 'app/template/repPorFechaYHora.html'
                }).
                when('/repPorCategoria', {
                    controller: 'repPorCategoriaController',
                    templateUrl: 'app/template/repPorCategoria.html'
                }).
                when('/repGeneralPersonasCategoria/:categoria', {
                    controller: 'repGeneralPersonasCategoriaController',
                    templateUrl: 'app/template/repGeneralPersonasCategoria.html'
                }).
                when('/repPorFechaCategoria/:fechaInicialC/:fechaFinalC/:categoria', {
                    controller: 'repPorFechaCategoriaController',
                    templateUrl: 'app/template/repPorFechaCategoria.html'
                }).
                when('/repPorFechaYHoraCategoria', {
                    controller: 'repPorFechaYHoraCategoriaController',
                    templateUrl: 'app/template/repPorFechaYHoraCategoria.html'
                }).
                when('/logout', {
                    controller: 'logoutController',
                    template: '<p>Cerrando sesión...</p>',
                    middleware: ['comprobarSession']
                }).
                otherwise('/');
    }
]);

