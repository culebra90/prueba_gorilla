<?php
	class Connection {
		public $host,$driver,$bd,$user,$pwd;
		public $conn;

		public function __clone() {

		}

		public function __construct() {
		
			$this->driver = "mysql";
			$this->host   = "localhost";
			$this->bd     = "prueba";
			$this->user   = "root";
			$this->pwd    = "desarrolloglobal";
			
		}

		public function connect() {
			try {
				$this->conn = new PDO($this->driver.':host='.$this->host.';dbname='.$this->bd, $this->user, $this->pwd);
				return $this->conn;
			} catch (Exception $e) {
				print "¡Error!: " . $e->getMessage() . "<br/>";
    			die();
			}
		}

		public function consult($sql) {
			try {
				$conn = $this->connect();
				$result = $conn->query($sql);
				return $result;
			} catch (Exception $e) {
				print "¡Error!: " . $e->getMessage() . "<br/>";
    			die();
			}
		}

		public function execute($sql) {
			try {
				$conn = $this->connect();
				$result = $conn->query($sql);
				$last_id = $conn->lastInsertId();
				return $last_id;
			} catch (Exception $e) {
				print "¡Error!: " . $e->getMessage() . "<br/>";
    			die();
			}
		}
	}
?>