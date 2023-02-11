<?php
	class Database{
		public $host = DB_HOST;
		public $user = DB_USER;
		public $pass = DB_PASS;
		public $dbname = DB_NAME;
		
		
		public $link;
		public $error;

		//construct for db
		public function __construct(){
			$this->connectDB();
		}
		
		//db connection method
		private function connectDB(){
			$this->link = new mysqli($this->host, $this->user,$this->pass, $this->dbname);
			if(!$this->link){
				$this->error = "Connection Failed: ".$this->link->connect_error;
				return false;
			}
		}

		//data select query
		public function select($sql){
			$result = $this->link->query($sql) or die($this->link->error.__LINE__);
			if($result->num_rows > 0){
				return $result;
			}else{
				return false;
			}
		}

		//data insert query
		public function insert($insertSql){
			$insert_row = $this->link->query($insertSql);
			if($insert_row){
				return $insert_row;
			}else{
				return false;
			}
		}
		
		//data update query
		public function update($update){
			$update_row = $this->link->query($update);
			if($update_row){
				return $update_row;
			}else{
				return false;
			}
		}
		
		//data delete_row query
		public function delete($query){
			$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if($delete_row){
				return $delete_row;
			}else{
				return false;
			}
		}
	}
?>