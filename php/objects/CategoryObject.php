<?php
class CategoryObject{
	private $category_id;
	private $category_name;
	private $category_notes;
	private $category_created_date;
	private $category_created_author_id;
	private $category_last_modified;
	private $category_manager_id;
	private $category_delete;
	private $category_image;
	
	public function  getCategory_id() {
		return $this->category_id;
	}
	public function  getCategory_name() {
		return $this->category_name;
	}
	public function  getCategory_notes() {
		return $this->category_notes;
	}
	public function  getCategory_created_date() {
		return $this->category_created_date;
	}
	public function getCategory_created_author_id() {
		return $this->category_created_author_id;
	}
	public function  getCategory_last_modified() {
		return $this->category_last_modified;
	}
	public function getCategory_manager_id() {
		return $this->category_manager_id;
	}
	public function isCategory_delete() {
		return $this->category_delete;
	}
	public function  getCategory_image() {
		return $this->category_image;
	}

	public function  setCategory_id($category_id) {
		$this->category_id = $category_id;
	}
	public function  setCategory_name($category_name) {
		$this->category_name = $category_name;
	}
	public function  setCategory_notes($category_notes) {
		$this->category_notes = $category_notes;
	}
	public function  setCategory_created_date($category_created_date) {
		$this->category_created_date = $category_created_date;
	}
	public function  setCategory_created_author_id($category_created_author_id) {
		$this->category_created_author_id = $category_created_author_id;
	}
	public function  setCategory_last_modified($category_last_modified) {
		$this->category_last_modified = $category_last_modified;
	}
	public function  setCategory_manager_id($category_manager_id) {
		$this->category_manager_id = $category_manager_id;
	}
	public function  setCategory_delete($category_delete) {
		$this->category_delete = $category_delete;
	}
	public function  setCategory_image($category_image) {
		$this->category_image = $category_image;
	}
	
}

?>
