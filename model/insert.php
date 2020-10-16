<?php

    //DB class (Parent)
    include "../classes/db.php";

    //Sending data
    $data = json_decode(file_get_contents("php://input"));
    var_dump($data);
   

    $table_name =$data[0]->table_name;
        
    switch($table_name){

        case "import";
            include "import.php";
            $instanceModelImport = new ModelImport();
            $code=$data[0]->product_code;
            $product_name=$data[0]->product_name;
            $day=$data[0]->date;
            $quantity=$data[0]->quantity;
            $faktura=$data[0]->faktura;
            $instanceModelImport->insertImport($code, $product_name, $day, $quantity, $faktura);
        break;
        
        case "export";
            include "export.php";
            $instanceModelExport = new ModelExport();
            $code=$data[0]->product_code;
            $product_name=$data[0]->product_name;
            $quantity=$data[0]->quantity;
            $ispratnica_date=$data[0]->ispratnica_date;
            $ispratnica_no=$data[0]->ispratnica_no;
            $instanceModelExport->insertExport($code, $product_name, $quantity, $ispratnica_no, $ispratnica_date);
        break;

        case "trash";
            include "trash.php";
            $instanceModelTrash = new ModelTrash();
            $code=$data[0]->product_code;
            $product_name=$data[0]->product_name;
            $day=$data[0]->date;
            $quantity=$data[0]->quantity;
            $instanceModelTrash->insertTrash($code,$product_name,$day,$quantity);
        break;

    }


?>