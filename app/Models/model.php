<?php

class Model{
		public $createdAt;

		public function humanDate(){
			return date("Y.M.d", strtotime($this->createdAt));
		}
}




?>