<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" />
<?php 
require_once 'layout/header.php';
?>
<div class="container">
    <h2>This section is for control datails of teacher</h2>

</div>

<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNewteacher" type="button" class="btn btn-success" data-toggle="modal">Nuevo Docente</button>    
            </div>    
        </div>    
</div>

<br>
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="teachertable" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead>
                                <tr id="tabla__head">
                                    <th class="tabla__celda">DNI</th>
                                    <th class="tabla__celda">GRADO</th>
                                    <th class="tabla__celda">NOMBRES</th>
                                    <th class="tabla__celda">APELLIDOS</th>
                                    <th class="tabla__celda">EMAIL</th>
                                    <th class="tabla__celda">OPCIONES</th>
                                </tr>
                            </thead>                      
                                
                       </table>                    
                    </div>
                </div>
        </div>  
</div>

<!-- ______________________Modal_____________________-->
<div class="modal fade" id="teacherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formteacher" enctype="multipart/form-data">    
            <div class="modal-body">
              <input type="text" id="id" value="0" hidden>
                <div class="form-group">
                    <label for="dni" class="col-form-label">DNI:</label>
                    <input type="text" class="form-control" id="dni"  pattern="[0-9]{8}" required>
                    <label for="grado" class="col-form-label">Grado:</label>
                    <input type="text" class="form-control" id="grado" required>
                    <label for="name" class="col-form-label">Nombres:</label>
                    <input type="text" class="form-control" id="name" required>
                    <label for="lastname" class="col-form-label">Apellidos:</label>
                    <input type="text" class="form-control" id="lastname" required>
                    <label for="email" class="col-form-label">Email:</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col-form-label">Fotografia:</label>
                    <input  neme="file" type="file" id="file" class="dropify_" data-default-file="" accept=".jpg , .png , .webp" required>
                    
                </div>
                <div class="row">
                    <div id="file_" class="col-md-3"></div>
                
                </div>                    

            </div>
            <div class="modal-footer">
                <button type="button" id="btnCancel" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnSave" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>

<?php 
require_once 'layout/foother.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js" integrity="sha512-hJsxoiLoVRkwHNvA5alz/GVA+eWtVxdQ48iy4sFRQLpDrBPn6BFZeUcW4R4kU+Rj2ljM9wHwekwVtsb0RY/46Q==" crossorigin="anonymous"></script>
<script src="../js/teacher.js"></script>

<script >
    let file = $("#file").dropify({

    })
    file = file.data('dropify');
</script>