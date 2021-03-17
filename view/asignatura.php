<?php 
require_once 'layout/header.php';
?>
<div class="container">
    <h2>This seccion is for add Asingature EPIS</h2>
</div>

<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNewCourse" type="button" class="btn btn-success" data-toggle="modal">Nueva Asignatura</button>    
            </div>    
        </div>    
</div>

<br>
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="cousetable" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead>
                                <tr id="tabla__head">
                                    <th class="tabla__celda">N°</th>
                                    <th class="tabla__celda">Codigo</th>
                                    <th class="tabla__celda">Asignatura</th>
                                    <th class="tabla__celda">Ciclo Academico</th>
                                    <th class="tabla__celda">Opciones</th>
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
              <input type="text" id="id" value="0" hidden>
                <div class="form-group">
                    <label for="codecourse" class="col-form-label">Codigo Asignatura:</label>
                    <input type="text" class="form-control" id="codecourse"  pattern="^[0-9]{4}-\w{2}-\w{4}-[0-9]{2}$" required>
                </div>
                <div class="form-group">
                    <label for="namecouse" class="col-form-label">Nombre Asignatura:</label>
                    <input type="text" class="form-control" id="namecouse" required>
                </div>

                <div class="form-group">
                    <label for="degree" class="col-form-label">Ciclo Academico:</label>
                        <br>
                        <select id ="degree" class="form-select form-select-lg mb-3 user" >
                        <option value="1">Primero</option>
                        <option value="2">Seguando</option>
                        <option value="3">Tercero</option>
                        <option value="4">Cuarto</option>
                        <option value="5">Quinto</option>
                        <option value="6">Sexto</option>
                        <option value="7">Septimo</option>
                        <option value="8">Octavo</option>
                        <option value="9">Noveno</option>
                        <option value="10">Decimo</option>
                           
                        </select>                    
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
