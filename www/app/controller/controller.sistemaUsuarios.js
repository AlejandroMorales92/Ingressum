angular.module('IngressumApp').controller('sistemaUsuariosController', ['$scope', 'registroUsuarioService', '$sessionStorage', '$location', 'rolAdmin', '$route', '$timeout', '$parse', function ($scope, agregarUsuario, $sessionStorage, $location, rolAdmin, $route, $timeout, $parse) {

    $scope.dataRegistrarUsuario = {
      cedula: '',
      nombre: '',
      apellido: '',
      telefono: '',
      alias: '',
      contrasena: '',
      rol: ''
    };


    $scope.usuarioRegistrado = false;
    $scope.usuarios = [];
    $scope.edit = {};

    $scope.pintarTabla = function () {
      agregarUsuario.obtenerUsu.then(function successCallback(response) {
        switch (response.data.code) {
          case 200:
            $scope.usuarios = response.data.datos;
            break;
          case 500:
            console.log(response.data);
            //$scope.usuarios = [];
        }
      });
    };

    $scope.pintarTabla();

    $scope.submit = function () {
      agregarUsuario.agregarUsu($scope.dataRegistrarUsuario).then(function successCallback(response) {

        $scope.usuarioRegistrado = false;
        $scope.dataRegistrarUsuario = {};
        if (response.data.code == 500) {
        } else {
          $scope.usuarioRegistrado = true;
          //$scope.dataRegistrarUsuario = '';

          $timeout(function () {
            $('#nuevoUsuario').modal('toggle');
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


    $scope.editar = function (dato) {
      $scope.edit.id = dato.usu_id;
      $scope.edit.cedula = dato.usu_cedula;
      $scope.edit.nombre = dato.usu_nombre;
      $scope.edit.apellido = dato.usu_apellido;
      $scope.edit.telefono = dato.usu_telefono;
      $scope.edit.alias = dato.usu_alias;
      $('#editarUsuario').modal('toggle');
    };

    $scope.submitEditarUsuario = function () {
      agregarUsuario.editarUsu($scope.edit).then(function successCallback(response) {
        $scope.usuarioEditado = false;
        $scope.edit = {};
        if (response.data.code == 500) {
        } else {
          $scope.usuarioEditado = true;
          $scope.edit = '';

          $timeout(function () {
            $('#editarUsuario').modal('toggle');
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


    $scope.eliminar = function (dato) {
      $('#eliminarUsuario').modal('toggle');
      $scope.nombre = dato.usu_nombre;
      $scope.ideliminar = dato.usu_id;
    };

    $scope.submitEliminarUsuario = function () {
      agregarUsuario.eliminarUsu({id: $scope.ideliminar}).then(function successCallback(response) {
        $scope.usuarioEliminado = false;
        if (response.data.code == 500) {
        } else {
          $scope.usuarioEliminado = true;
          $timeout(function () {
            $('#eliminarUsuario').modal('toggle');
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