<?php 

    class ModelTrash extends DB{
    
        public function insertTrash($code,$product_name,$day,$quantity){
        $table_name = "trash";
        $column_name = "code, product_name, date, quantity";
        $column_values ="'$code','$product_name','$day','$quantity'";

        parent::insertRow($table_name, $column_name, $column_values);
        }

        public function selectProduct(){
            return parent::selectRows("trash");
        }
    }    
?>