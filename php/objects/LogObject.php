<?php 


class LogObject {
	private $log_id; 
	private $log_name; 
	private $log_user_permission; 
	private $log_date; 
	private $log_user_name; 
	private $log_action; 
	private $log_position;
	public function getLog_id() {
		return $this->log_id;
	}
	public function getLog_name() {
		return $this->log_name;
	}
	public function getLog_user_permission() {
		return $this->log_user_permission;
	}
	public function getLog_date() {
		return $this->log_date;
	}
	public function getLog_user_name() {
		return $this->log_user_name;
	}
	public function getLog_action() {
		return $this->log_action;
	}
	public function getLog_position() {
		return $this->log_position;
	}
	public function setLog_id($log_id) {
		$this->log_id = $log_id;
	}
	public function setLog_name($log_name) {
		$this->log_name = $log_name;
	}
	public function setLog_user_permission($log_user_permission) {
		$this->log_user_permission = $log_user_permission;
	}
	public function setLog_date($log_date) {
		$this->log_date = $log_date;
	}
	public function setLog_user_name($log_user_name) {
		$this->log_user_name = $log_user_name;
	}
	public function setLog_action($log_action) {
		$this->log_action = $log_action;
	}
	public function setLog_position($log_position) {
		$this->log_position = $log_position;
	}
}


?>