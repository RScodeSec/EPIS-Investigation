<?php

require_once dirname(dirname(__FILE__)). '\core\database.php';

class dataTeacher{
    protected $id;
    protected $DNI;
    protected $Nombres_docente;
    protected $Apellidos_docente;
    protected $Grado;
    protected $Pass;
    protected $Foto_docente;
    protected $email_docente;

    protected function listTeachers()
    {
        $ic = new Conexion();
        $sql = "SELECT DNI,Nombres_docente,Apellidos_docente,Grado,email_docente,Foto_docente FROM docentes";
        $consulta = $ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
        
    }

    protected function saveInfoModelTeacher()
    {
        $ic = new Conexion();
        $sql = "INSERT INTO docentes(DNI,Nombres_docente,Apellidos_docente,Grado,Pass,Foto_docente,email_docente) VALUES(?,?,?,?,?,?,?)";
        $insert =  $ic->db->prepare($sql);
        $insert->bindParam(1, $this->DNI);
        $insert->bindParam(2, $this->Nombres_docente);
        $insert->bindParam(3, $this->Apellidos_docente);
        $insert->bindParam(4, $this->Grado);
        $insert->bindParam(5, $this->Pass);
        $insert->bindParam(6, $this->Foto_docente);
        $insert->bindParam(7, $this->email_docente);
        return $insert->execute();
        
    }

    protected function updateInfoModelTeacher()
    {
        $ic = new Conexion();
        $sql = "UPDATE docentes SET DNI='$this->DNI',Nombres_docente='$this->Nombres_docente',Apellidos_docente='$this->Apellidos_docente' WHERE DNI='$this->id'";
        $updateteacher = $ic->db->prepare($sql);
        return $updateteacher->execute();
        
    }

    protected function deleteInfoModelTeacher()
    {
        $ic = new Conexion();
        $sql = "DELETE FROM docentes  WHERE DNI='$this->DNI'";
        $deleteteacher = $ic->db->prepare($sql);
        return $deleteteacher->execute();
        
    }




}
?>




