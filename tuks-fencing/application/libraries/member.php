<?php
class memberFactory {
	static function getMember($model, $memberData) {
		if ($memberData == null)
			return new user();
		if ($memberData->type == 'admin')
			return new admin($model, $memberData);
		return new member($model, $memberData);
	}
}

class user {
	function isUser() {
		return false;
	}
	
	function isAdmin() {
		return false;
	}
	
	function isMember() {
		return false;
	}
}

class member extends user {
	private $model = null;
	private $id;
	private $data;
	
	function __construct($model, $data) {
		$this->model = $model;
		$this->data = $data;
	}
	
	function isMember () {
		return true;
	}
	
	function getID() {
		return $this->data->id;
	}
	
	/**
	* @param string $password
	* 
	* Hashes the password and returns a salt and the password hash
	* @return string
	*/
	static function hashPassword($password) {
	
		return crypt($password);
	}
	
	function matchPassword($password) {
		return (crypt($password, $this->data->password) == $this->data->password);
	}
}

class admin extends user {
	function __construct($model, $data) {
		parent::__construct($model, $data);
	}
	
	function isAdmin() {
		return true;
	}
}
?>