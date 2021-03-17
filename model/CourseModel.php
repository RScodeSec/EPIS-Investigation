<?php

require_once dirname(dirname(__FILE__)). '\core\database.php';

class dataCourse{
    protected $id;
    protected $Codigo_asignatura;
    protected $Curso;
    protected $Ciclo;

    protected function saveInfoModelCourse()
    {
        $ic = new Conexion();
        $sql = "INSERT INTO asignaturas(Codigo_asignatura,Curso,Ciclo) VALUES(?,?,?)";
        $insert =  $ic->db->prepare($sql);
        $insert->bindParam(1, $this->Codigo_asignatura);
        $insert->bindParam(2, $this->Curso);
        $insert->bindParam(3, $this->Ciclo);
        return $insert->execute();
        # code...
    }
    protected function listCourses()
    {
        $ic = new Conexion();
        $sql = "SELECT * FROM asignaturas";
        $consulta = $ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
        # code...
    }

    protected function UpdateInfoModelCourse()
    {
        $ic = new Conexion();
        $sql = "UPDATE asignaturas SET Codigo_asignatura='$this->Codigo_asignatura',Curso='$this->Curso',Ciclo='$this->Ciclo' WHERE Codigo_asignatura='$this->id'";
        $updatecourse = $ic->db->prepare($sql);
        return $updatecourse->execute();        
    }

    protected function deleteInfoModelCourse()
    {
        $ic = new Conexion();
        $sql = "DELETE  FROM asignaturas  WHERE Codigo_asignatura='$this->id'";
        $deletecourse = $ic->db->prepare($sql);
        return $deletecourse->execute(); 
        
    }


}


?>