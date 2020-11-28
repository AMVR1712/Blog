<?php
require_once 'Seguridad.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/iconfont/material-icons.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Blog</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark colorFondo">
        <a class="navbar-brand" href="#">
            <i class="material-icons">comment</i>
            Blog
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#menuPrincipal">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuPrincipal">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="Inicio.php">Inicio</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="Mensajes.php">Mensajes</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="Usuarios.html">Usuarios</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="Index.html">Salir</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header colorFondo colorTexto">
                        Agregar tema
                    </div>
                    <div class="card-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Tema:
                                </div>
                            </div>
                            <input type="text" name="tema" id="tema" 
                            class="form-control" placeholder="Nombre de tema">
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-primary" onclick="agregarTema()">
                            <i class="material-icons align-middle">add_circle</i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tema</th>
                            <th>...</th>
                        </tr>
                    </thead>
                    <tbody id="tablaTemas">
                        <tr>
                            <td>1</td>
                            <td>Programacion</td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modificaTema">
                                    <i class="material-icons align-middle">edit</i>
                                </button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#eliminaTema">
                                    <i class="material-icons align-middle">cancel</i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Matematicas</td>
                            <td>
                                <button class="btn btn-primary">
                                    <i class="material-icons align-middle">edit</i>
                                </button>
                                <button class="btn btn-danger">
                                    <i class="material-icons align-middle">cancel</i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Es una ventana modal para editar -->
    <div class="modal fade" id="modificaTema" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Editar Tema</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            Tema:
                        </div>
                    </div>
                    <input type="text" name="temaEditar" id="temaEditar" 
                    class="form-control" placeholder="Nombre de tema">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" onclick="guardaCambios()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
          </div>
        </div>
      </div>

<!-- Es una ventana modal para eliminar -->
<div class="modal fade" id="eliminaTema" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Tema</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>¿Esta seguro de eliminar el tema? Se eliminaran todos los mensajes relacionados.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="button" onclick="confirmaEliminar()" class="btn btn-primary" data-dismiss="modal">Si</button>
        </div>
      </div>
    </div>
  </div>

  <footer class="container-fluid">
    <div class="row bg-dark text-light">
        <div class="col">
            <p class="text-center">Copyright Alan Manuel Vergara Ramírez (c) 2020. Todos los derechos reservados.</p>
            <p class="text-center"><a href="mailto:">alan.vr1712@gmail.com</a></p>
        </div>
    </div>
</footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Inicio.js"></script>
</body>
</html>