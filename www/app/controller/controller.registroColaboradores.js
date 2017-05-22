angular.module('IngressumApp').controller('registroColaboradoresController', ['$scope', 'registroColaboradorService', '$sessionStorage', '$location', 'rolAdmin', '$route', '$timeout', function ($scope, agregarColaborador, $sessionStorage, $location, rolAdmin, $route, $timeout) {

        $scope.dataRegistrarColaborador = {
            cedula: '',
            nombre: '',
            apellido: '',
            categoria: '',
            telefono: '',
            direccion: '',
            correo: ''
        };
        $scope.colaboradorRegistrado = false;
        $scope.colaboradores = [];

        $scope.pintarTabla = function () {
            agregarColaborador.obtenerCol.then(function successCallback(response) {
                switch (response.data.code) {
                    case 200:
                        $scope.colaboradores = response.data.datos;
                        break;
                    case 500:
                        $scope.colaboradores = [];
                }
            });
        };

        $scope.pintarTabla();

        $scope.submit = function () {
            agregarColaborador.agregarCol($scope.dataRegistrarColaborador).then(function successCallback(response) {
                // console.log(response);

                $scope.colaboradorRegistrado = false;
                $scope.dataRegistrarUsuario = {};
                if (response.data.code == 500) {


                } else {
                    $scope.colaboradorRegistrado = true;
                    $scope.dataRegistrarUsuario = '';
                    $timeout(function () {
                        $('#nuevoColaborador').modal('toggle');
                    }, 700);
                    $timeout(function () {
                        // $route.reload();
                        window.location.reload();
                    }, 1000);
                }
            }, function errorCallback(response) {
                console.error(response);
            });
        };
    }]);