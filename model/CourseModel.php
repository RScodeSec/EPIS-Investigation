<?php
//here require_once datbase.php
//this conection 


class dataCourse{

    protected $id;
    protected $name;
    protected $fullname;

    public function saveInfoModelCourse()
    {
        $ic = new Conexion();
        $sql = "INSERT INTO course(name, fullname) VALUES(?,?)";
        $insert =  $ic->db->prepare($sql);
        $insert->bindParam(1, $this->name);
        $insert->bindParam(2, $this->fullname);
        return $insert->execute();
        # code...
    }


}


?>