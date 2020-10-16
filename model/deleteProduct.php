<?php
    
    class ModelDelete extends DB{

        public function deleteProduct($pk_value){
            $table_name = "import";
            $condition = " code LIKE '$pk_value'";

            parent::deleteRow($table_name,$condition);
        }
    }    

?>