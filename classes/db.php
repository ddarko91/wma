<?php 
class DB {
	//class members
	private $servername ="localhost";
	private $db_username ="root";
	private $db_password = "";
	private $db_name = "wma";
	private $conn;

	public function __construct(){
		try {
		    $this->conn = new PDO("mysql:host=".$this->servername."; dbname=".$this->db_name."", $this->db_username, $this->db_password);
		    // set the PDO error mode to exception
		    $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$statement  = $this->conn->prepare("SET NAMES 'utf8'");
			$statement->execute();
			ini_set('default_charset', 'utf-8');
		    }
		catch(PDOException $e)
		    {
		    echo "Connection failed: " . $e->getMessage();
		    }

    } //end constructor
	
	
	//Query
	public function insertRow($table_name, $column_name, $column_values){
		$sql = "INSERT INTO $table_name ($column_name) VALUES ($column_values)";
		$this->conn->exec($sql); //EXECUTE
	}

	public function updateRow($table_name, $condition, $id){
		$sql = "UPDATE $table_name SET $condition WHERE $id ";
		$this->conn->exec($sql); //EXECUTE
	}

	public function deleteRow($table_name, $condition){
		$sql = "DELETE FROM $table_name WHERE $condition ";
		$this->conn->exec($sql); //EXECUTE
	}

	public function selectRows($table_name) {
		$con=$this->conn;
		$stmt=$con->prepare("SELECT * FROM  $table_name ");
		$stmt->execute();
		
		return $stmt->fetchAll();
	}
	public function selectJOIN($fields,$table_name) {
		$con=$this->conn;
		$stmt=$con->prepare("SELECT $fields FROM  $table_name ");
		$stmt->execute();
		
		return $stmt->fetchAll();
	}

}//end class DB
?>