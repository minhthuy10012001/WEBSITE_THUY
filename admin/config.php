<?php
	class database{
		private $conn=null;
		private $host='localhost';
		private $user='root';
		private $password='';
		private $data='web_dienthoai';
		private $result=null;
		// phuong thuc connect sql
		private function connection(){
			$this->conn=new mysqli($this->host,$this->user,$this->password,$this->data);
			$this->conn->query('SET NAMES UTF8');
		}
		// phuong thuc select
		public function select($sql){
			$this->connection();
			$this->result=$this->conn->query($sql);
		}
		//lay du lieu gan vao mang
		public function fetch(){
			if($this->result->num_rows >0){
				$row=$this->result->fetch_assoc();

			}else{
				$row=0;
			}
			return $row;
		}	

		//dem so hang	
		public function num_rows(){
			return $count=$this->result->num_rows;
		}
		
		public function command($sql){
			$this->connection();
			$this->conn->query($sql);
		}
	} 
?>