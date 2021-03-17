<?php
require_once dirname(dirname(__FILE__)) .'\model\CourseModel.php';
class Course extends dataCourse {

    public function saveCourse($id,$code,$name,$degree)
    {
        $this->id = $id;
        $this->Codigo_asignatura = $code;
        $this->Curso = $name;
        $this->Ciclo = $degree;
        if($id==0){
            $course = $this->saveInfoModelCourse();
            echo $course ? json_encode(['title' => 'Perfecto!', 'text' => 'Asignatura agregado Correctamente','icon' => 'success']):
            json_encode(['title' => 'Noo!', 'text' => 'No se Pudo Agregar la Asignatura','icon' => 'error']);

        }else{
            $updateCourse = $this->UpdateInfoModelCourse();
            echo $updateCourse ? json_encode(['title' => 'Perfecto!', 'text' => 'Asignatura actualizado Correctamente','icon' => 'success']):
            json_encode(['title' => 'Noo!', 'text' => 'No se Pudo Actualizar la Asignatura','icon' => 'error']);
        }                    
        
    }
    public function listCourse()
    {
        $getCourse = $this->listCourses();
        echo json_encode($getCourse);
        
    }
    public function deleteCourse($id)
    {
        $this->id = $id;
        $coursedeleted = $this->deleteInfoModelCourse();
        echo $coursedeleted ? json_encode(['title' => 'Perfecto!', 'text' => 'Asignatura Eliminado Correctamente','icon' => 'success']):
        json_encode(['title' => 'Noo!', 'text' => 'No se Pudo Eliminar la Asignatura','icon' => 'error']);
        
    }


}

if(isset($_POST['action']) && $_POST['action']=='reguisterCourse'){
    $instancia = new Course();
    $instancia->saveCourse($_POST['id'],$_POST['codecourse'],$_POST['namecouse'],$_POST['degree']);
}
if(isset($_GET['action']) && $_GET['action']=='listCourse'){
    $instancia = new Course();
    $instancia->listCourse();
}

if(isset($_POST['action']) && $_POST['action']=='deletecourse'){
    $instancia = new Course();
    $instancia->deleteCourse($_POST['id']);
}

?>