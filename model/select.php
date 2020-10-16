<?php 
    //DB class (Parent)
    include "../classes/db.php";

   
    $d = array();
    $table_name = $_GET["table_name"];
        
    switch($table_name){

        case "import";
            include "import.php";
            $instanceModelImport = new ModelImport();
            $result=$instanceModelImport->selectProduct();

            foreach($result as $row){
                
                $d["records"][] = array(
                    "code"          => $row["code"],
                    "product_name"  => $row["product_name"],
                    "date"          => $row["date"],
                    "quantity"      => $row["quantity"],
                    "faktura"       => $row["faktura"]
                );
            }
            echo json_encode($d);
        break;

        case "export";
            include "export.php";
            $instanceModelExport = new ModelExport();
            $result=$instanceModelExport->selectProduct();

            foreach($result as $row){
                
                $d["records"][] = array(
                    "code"           => $row["code"],
                    "product_name"   => $row["product_name"],
                    "quantity"       => $row["quantity"],
                    "ispratnica_no"  => $row["ispratnica_no"],
                    "ispratnica_date"=> $row["ispratnica_date"]
                );
            }
            echo json_encode($d);
        break;

        case "trash";
            include "trash.php";
            $instanceModelTrash = new ModelTrash();
            $result=$instanceModelTrash->selectProduct();

            foreach($result as $row){
                
                $d["records"][] = array(
                    "code"          => $row["code"],
                    "product_name"  => $row["product_name"],
                    "date"          => $row["date"],
                    "quantity"      => $row["quantity"]
                );
            }
            echo json_encode($d);
        break;

        case "product";
            include "product.php";
            $instanceModelProduct = new ModelProduct();
            $result=$instanceModelProduct->selectProduct();
            //var_dump($result);
            foreach($result as $row){
                
                $d["records"][] = array(
                    "code"          => $row["code"],
                    "product_name"  => $row["product_name"],
                    "quantity"      => $row["quantity"]
                );
            }
            echo json_encode($d);
        break;
    }

?>