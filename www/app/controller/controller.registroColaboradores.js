angular.module('IngressumApp').controller('registroColaboradoresController', ['$scope', 'registroColaboradorService', '$sessionStorage', '$location', 'rolAdmin', '$route', '$timeout', '$parse', function ($scope, agregarColaborador, $sessionStorage, $location, rolAdmin, $route, $timeout, $parse) {

    $scope.dataRegistrarColaborador = {
      cedula: '',
      nombre: '',
      apellido: '',
      categoria: '',
      telefono: '',
      direccion: '',
      correo: ''
    };

    $scope.inputError = {
      cedula: false,
      nombre: false,
      apellido: false,
      categoria: false,
      telefono: false,
      direccion: false,
      correo: false
    };

    $scope.colaboradorRegistrado = false;
    $scope.colaboradorEditado = false;
    $scope.colaboradorEliminado = false;
    $scope.colaboradores = [];
    $scope.edit = {};

    $scope.pintarTabla = function () {
      agregarColaborador.obtenerCol.then(function successCallback(response) {
        switch (response.data.code) {
          case 200:
            $scope.colaboradores = response.data.datos;
            break;
          case 500:
            console.log(response.data);
            //$scope.colaboradores = [];
        }
      });
    };

    $scope.pintarTabla();

    $scope.submit = function () {
      agregarColaborador.agregarCol($scope.dataRegistrarColaborador).then(function successCallback(response) {
        $scope.colaboradorRegistrado = false;
        $scope.dataRegistrarColaborador = {};
        if (response.data.code == 300) {

          angular.forEach(response.data.datos, function (value, key) {
            $parse('inputError.' + key).assign($scope, value);
          });

          console.log(response);

        } else if (response.data.code == 500) {
          console.log(response.data.datos);
        } else {
          $scope.colaboradorRegistrado = true;
          $scope.dataRegistrarColaborador = '';

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




    $scope.editar = function (dato) {
      $scope.edit.id = dato.col_id;
      $scope.edit.cedula = dato.col_cedula;
      $scope.edit.nombre = dato.col_nombre;
      $scope.edit.apellido = dato.col_apellido;
      $scope.edit.categoria = dato.col_categoria;
      $scope.edit.telefono = dato.col_telefono;
      $scope.edit.direccion = dato.col_direccion;
      $scope.edit.correo = dato.col_correo;
      $('#editarColaborador').modal('toggle');
    };

    $scope.submitEditarColaborador = function () {
      agregarColaborador.editarCol($scope.edit).then(function successCallback(response) {
        $scope.colaboradorEditado = false;
        $scope.edit = {};
        if (response.data.code == 500) {
        } else {
          $scope.colaboradorEditado = true;
          $scope.edit = '';
          $timeout(function () {
            $('#editarColaborador').modal('toggle');
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
      $('#eliminarColaborador').modal('toggle');
      $scope.nombre = dato.col_nombre;
      $scope.ideliminar = dato.col_id;
    };

    $scope.submitEliminarColaborador = function () {
      agregarColaborador.eliminarCol({id: $scope.ideliminar}).then(function successCallback(response) {
        $scope.colaboradorEliminado = false;
        if (response.data.code == 500) {
        } else {
          $scope.colaboradorEliminado = true;
          $timeout(function () {
            $('#eliminarColaborador').modal('toggle');
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