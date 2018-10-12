<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD de productos con PHP - MySQL - jQuery AJAX </title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/datatables.min.css">
        <link rel="stylesheet" href="css/sweetalert2.min.css">
        <link rel="stylesheet" href="css/bootstrap-select.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div id="productModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form name="productForm" id="productForm">
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label>Código</label>
                                <input type="text" name="code" id="code" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Producto</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Categoría</label>
                                <select id="category_id" name="category_id" class="form-control selectpicker" data-live-search="true"></select>
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="text" pattern="\d*" name="stock" id="stock" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Precio</label>
                                <input type="text" pattern="\d*" name="price" id="price" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                            <input type="submit" class="btn btn-info" value="Guardar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Administrar <b>Productos</b></h2>
                        </div>
                        <div class="col-sm-12">
                            <a id="storeModal" class="btn btn-success"><i class="fa fa-plus"></i> <span>Agregar nuevo producto</span></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="col-md-12">
                        <table id="ProductTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Categoria</th>
                                    <th class="text-center">Stock</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- SCRIPTS -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/datatables.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/sweetalert2.min.js"></script>
        <script src="js/bootstrap-select.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>