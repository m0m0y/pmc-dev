<?php

class Auth {
    
	function __construct() {
        $this->sessionStart();
    }
    
    function sessionStart() {
        if(!isset($_SESSION)) {
            session_start();
        }
    }

    function getSession($session_val) {
        if(isset($_SESSION[$session_val]) && !empty($_SESSION[$session_val])) {
            return $_SESSION[$session_val];
        } else {
            return false;
        }
    }

    function redirect($session_val, $expected, $location=null) {
        if($session_val != $expected) {
            header('location:' . $location); 
        }
    }

    function checkSession($session_val) {
        if(empty($session_val)) { 
            header('location: login.php'); 
        }
    }

}