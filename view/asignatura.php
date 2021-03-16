<?php 
require_once 'layout/header.php';
?>
<div class="container">
    <h2>This seccion is for add Asingature EPIS</h2>
</div>
<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNewCourse" type="button" class="btn btn-success" data-toggle="modal">Agregar Asignatura</button>    
            </div>    
        </div>    
</div>


<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="galeria" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead>
                                <tr id="tabla__head">
                                    <th class="tabla__celda">id</th>
                                    <th class="tabla__celda">Nombre</th>
                                    <th class="tabla__celda">Codigo</th>
                                    <th class="tabla__celda">Eliminar</th>
                                    <th class="tabla__celda">Editar</th>
                                </tr>
                            </thead>                      
                                
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>

<!-- ______________________Modal_____________________-->
<div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formCourse">    
            <div class="modal-body">
                <div class="form-group">
                    <label for="descripcion" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" id="descripcion" required>
                </div>

                <div class="form-group">
                    <label for="user" class="col-form-label">Nombre:</label>
                        <br>
                        <select id ="users" class="form-select form-select-lg mb-3 user" >
                           
                        </select>                    
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" id="descripcion" required>
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" id="descripcion" required>
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
