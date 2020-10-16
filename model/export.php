<?php

    class ModelExport extends DB{

        public function insertExport($code, $product_name, $quantity, $ispratnica_no, $ispratnica_date){
            $table_name = "export";
            $column_name = "code, product_name, quantity, ispratnica_no, ispratnica_date";
            $column_values = "$code, '$product_name', '$quantity', '$ispratnica_no', '$ispratnica_date'";

        parent::insertRow($table_name, $column_name, $column_values);
        }

        public function selectProduct(){
            return parent::selectRows("export");
        }
    }
?>