<?php
 
    class ModelImport extends DB{

        public function insertImport($code, $nam, $day, $quantity, $faktura){
            $table_name = "import";
            $column_name = "code, product_name, date, quantity, faktura";
            $column_values ="'$code', '$nam', '$day', $quantity, '$faktura'";

        parent::insertRow($table_name, $column_name, $column_values);
        }

        public function selectProduct(){
            return parent::selectRows("import");
        }

    }
?>