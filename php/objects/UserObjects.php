<?php

    class UserObject{
        private $user_id; 
        private $user_name; 
        private $user_pass; 
        private $user_fullname; 
        private $user_birthday; 
        private $user_phone; 
        private $user_email; 
        private $user_address; 
        private $user_job; 
        private $user_applyyear; 
        private $user_permission; 
        private $user_notes; 
        private $user_logined; 
        private $user_created_date; 
        private $user_last_modified; 
        private $user_last_logined; 
        private $user_parent_id; 
        private $user_deleted;
            
        public function getUser_id() {
            return $this->user_id;
        }
        public function getUser_name() {
            return $this->user_name;
        }
        public function getUser_pass() {
            return $this->user_pass;
        }
        public function getUser_fullname() {
            return $this->user_fullname;
        }
        public function getUser_birthday() {
            return $this->user_birthday;
        }
        public function getUser_phone() {
            return $this->user_phone;
        }
        public function getUser_email() {
            return $this->user_email;
        }
        public function getUser_address() {
            return $this->user_address;
        }
        public function getUser_job() {
            return $this->user_job;
        }
        public function getUser_applyyear() {
            return $this->user_applyyear;
        }
        public function getUser_permission() {
            return $this->user_permission;
        }
        public function getUser_notes() {
            return $this->user_notes;
        }
        public function getUser_logined() {
            return $this->user_logined;
        }
        public function getUser_created_date() {
            return $this->user_created_date;
        }
        public function getUser_last_modified() {
            return $this->user_last_modified;
        }
        public function getUser_last_logined() {
            return $this->user_last_logined;
        }
        public function getUser_parent_id() {
            return $this->user_parent_id;
        }
        public function getUser_deleted() {
            return $this->user_deleted;
        }
        public function setUser_id( $user_id) {
            $this->user_id = $user_id;
        }
        public function setUser_name( $user_name) {
            $this->user_name = $user_name;
        }
        public function setUser_pass( $user_pass) {
            $this->user_pass = $user_pass;
        }
        public function setUser_fullname( $user_fullname) {
            $this->user_fullname = $user_fullname;
        }
        public function setUser_birthday( $user_birthday) {
            $this->user_birthday = $user_birthday;
        }
        public function setUser_phone( $user_phone) {
            $this->user_phone = $user_phone;
        }
        public function setUser_email( $user_email) {
            $this->user_email = $user_email;
        }
        public function setUser_address( $user_address) {
            $this->user_address = $user_address;
        }
        public function setUser_job( $user_job) {
            $this->user_job = $user_job;
        }
        public function setUser_applyyear( $user_applyyear) {
            $this->user_applyyear = $user_applyyear;
        }
        public function setUser_permission( $user_permission) {
            $this->user_permission = $user_permission;
        }
        public function setUser_notes( $user_notes) {
            $this->user_notes = $user_notes;
        }
        public function setUser_logined( $user_logined) {
            $this->user_logined = $user_logined;
        }
        public function setUser_created_date( $user_created_date) {
            $this->user_created_date = $user_created_date;
        }
        public function setUser_last_modified( $user_last_modified) {
            $this->user_last_modified = $user_last_modified;
        }
        public function setUser_last_logined( $user_last_logined) {
            $this->user_last_logined = $user_last_logined;
        }
        public function setUser_parent_id( $user_parent_id) {
            $this->user_parent_id = $user_parent_id;
        }
        public function setUser_deleted( $user_deleted) {
            $this->user_deleted = $user_deleted;
        }

    }
?>