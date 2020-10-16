<?php
    //DB class (Parent)
    include "../classes/db.php";

    //Sending data
    $data = json_decode(file_get_contents("php://input"));
    var_dump($data);
   

    $table_name =$data[0]->table_name;
    $pk_value = $data[0]->pk_value;
        
    switch($table_name){

        case "import";
            include "deleteProduct.php";
            $instanceModelImport = new ModelDelete();
            $instanceModelImport->deleteProduct($pk_value);
        break;
    }
?>        