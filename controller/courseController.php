<?php
require_once dirname(dirname(__FILE__)) .'\model\courseController.php';
class Course extends dataCourse {

    public function saveCourse($name, $fullname)
    {
        $this->name = $name;
        $this->fullname = $fullname;
        $course = $this->saveInfoModelCourse();
        $course ? 1:0;

        # code...
    }


}

if(isset($_POST['action']) && $_POST['action']=='reguisterCourse'){
    $instancia = new Course();
    $instancia->saveCourse($_POST['name'],$_POST['fullname']);
}

?>