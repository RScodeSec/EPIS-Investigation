<?php
require_once dirname(dirname(__FILE__)) .'\model\teachermodel.php';
class teacher extends dataTeacher {

    public function listTeacher()
    {
        $resultTeacher = $this->listTeachers();
        echo json_encode($resultTeacher);       
    }

    public function saveTeacher($id,$dni,$grado,$name,$lastname,$email,$image,$contrasena)
    {
        $this->id = $id;
        $this->DNI = $dni;
        $this->Nombres_docente = $name;
        $this->Apellidos_docente = $lastname;
        $this->Grado = $grado;
        $this->Pass = $contrasena;
        $this->Foto_docente = $image;
        $this->email_docente = $email;
        if($id==0)
        {
            $resulteacher = $this->saveInfoModelTeacher();
            echo $resulteacher ? json_encode(['title' => 'Perfecto!', 'text' => 'Docente agregado Correctamente','icon' => 'success']):
            json_encode(['title' => 'Noo!', 'text' => 'No se Pudo Agregar al Docente','icon' => 'error']);

        }
        else{
            $resulupdateteacher = $this->updateInfoModelTeacher();
            echo $resulupdateteacher ? json_encode(['title' => 'Perfecto!', 'text' => 'Docente Actualizado Correctamente','icon' => 'success']):
            json_encode(['title' => 'Noo!', 'text' => 'No se Pudo Actualizar al  Docente','icon' => 'error']);

        }
        
    }

    public function deleteTeacher($dni)
    {
        $this->DNI = $dni;
        $resulUpdateteacher = $this->deleteInfoModelTeacher();
        echo $resulUpdateteacher ? json_encode(['title' => 'Perfecto!', 'text' => 'Docente Eliminado Correctamente','icon' => 'success']):
        json_encode(['title' => 'Noo!', 'text' => 'No se Pudo Eliminar al Docente','icon' => 'error']);
        
    }







}

if(isset($_GET['action']) && $_GET['action']=='listTeacher'){
    $instancia = new teacher();
    $instancia->listTeacher();
}

if(isset($_POST['action']) && $_POST['action']=='insertTeacher'){
    $instancia = new teacher();
    $contrasena = password_hash($_POST['dni'], PASSWORD_DEFAULT);

    $imagenName = $_FILES['file']['name'];
    
    //-------- MODIFIED NAME --------------
    $extension = pathinfo($imagenName, PATHINFO_EXTENSION);
    $random = rand(0,99);
    $rename = $random.date('YmdH').$imagenName;
    $newname = $rename;
    //for obtain extension of image .'.'.$extension
    $imageurl = "../public/imgTeacher/" . $newname;

    $imagenTemp = $_FILES['file']['tmp_name'];
    move_uploaded_file($imagenTemp, $imageurl);   




    $instancia->saveTeacher($_POST['id'],$_POST['dni'],$_POST['grado'],$_POST['name'],$_POST['lastname'],$_POST['email'],$newname,$contrasena);
}

if(isset($_POST['action']) && $_POST['action']=='deleteTeacher'){
    $instancia = new teacher();
    if($_POST['nameimage']!=""){
        $eliminarimage = "../public/imgTeacher/" . $_POST['nameimage'];
        unlink($eliminarimage);

    }
    

    $instancia->deleteTeacher($_POST['id']);

}

?>