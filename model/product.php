<?php
    
    class ModelProduct extends DB{

        public function selectProduct(){
        $fields="import.code AS code, import.product_name AS product_name,
        (case when  import.quantity>0  then import.quantity ELSE 0 END) - 
        (case when  export.quantity>0  then export.quantity ELSE 0 END) -
        (case when  trash.quantity>0  then trash.quantity ELSE 0 END) AS quantity ";
        $table_name=" import 
                    LEFT JOIN export ON import.code = export.code 
                    LEFT JOIN trash ON export.code = trash.code  ";
            return parent::selectJOIN($fields,$table_name) ;
        }


        public function deleteProduct($pk_value){
            $table_name = "product";
            $condition = "WHERE product_id LIKE '$pk_value'";

            parent::deleteRow($table_name,$condition);
        }
    }

?>