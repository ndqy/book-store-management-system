<?php

    class CartObject{
        private $cart_id ;
		private $cart_user_name ;
		private $cart_adderss ;
		private $cart_book_name ;
		private $cart_book_total ;
		private $cart_creat_date ;
		private $cart_last_modifle ;
		private $cart_status ;
		private $cart_note ;
		private $cart_book_price;
		private $cart_user_phone;
		public function getCart_id() {
			return $this->cart_id;
		}
		public function getCart_user_phone() {
			return $this->cart_user_phone;
		}
		public function getCart_book_price() {
			return $this->cart_book_price;
		}
		public function getCart_user_name() {
			return $this->cart_user_name;
		}
		public function getCart_adderss() {
			return $this->cart_adderss;
		}
		public function getCart_book_name() {
			return $this->cart_book_name;
		}
		public function getCart_book_total() {
			return $this->cart_book_total;
		}
		public function getCart_creat_date() {
			return $this->cart_creat_date;
		}
		public function getCart_last_modifle() {
			return $this->cart_last_modifle;
		}
		public function getCart_status() {
			return $this->cart_status;
		}
		public function getCart_note() {
			return $this->cart_note;
		}
		public function setCart_id($cart_id) {
			$this->cart_id = $cart_id;
		}
		public function setCart_user_phone($cart_user_phone) {
			$this->cart_user_phone = $cart_user_phone;
		}
		public function setCart_book_price($cart_book_price) {
			$this->cart_book_price = $cart_book_price;
		}
		public function setCart_user_name($cart_user_name) {
			$this->cart_user_name = $cart_user_name;
		}
		public function setCart_adderss($cart_adderss) {
			$this->cart_adderss = $cart_adderss;
		}
		public function setCart_book_name($cart_book_name) {
			$this->cart_book_name = $cart_book_name;
		}
		public function setCart_book_total($cart_book_total) {
			$this->cart_book_total = $cart_book_total;
		}
		public function setCart_creat_date($cart_creat_date) {
			$this->cart_creat_date = $cart_creat_date;
		}
		public function setCart_last_modifle($cart_last_modifle) {
			$this->cart_last_modifle = $cart_last_modifle;
		}
		public function setCart_status($cart_status) {
			$this->cart_status = $cart_status;
		}
		public function setCart_note($cart_note) {
			$this->cart_note = $cart_note;
		}
		

    }
?>