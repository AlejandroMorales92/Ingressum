angular.module('IngressumApp').
        config(['$routeProvider',
            function config($routeProvider) {
                $routeProvider.
                        when('/', {
                            controller: 'indexController',
                            templateUrl: 'app/template/index.html'
                        }).
                        otherwise('/');
            }
        ]);