<?php
class User {

    public function __construct() {}
	public function userLogdIn()
	{
        //login kell
        if (!$_SESSION["logd_in"])
        {
            $_SESSION["errorMSG"]='<div class="alert alert-danger mt-3">Kérjük jelentkezzen be!</div>';
            header('location: http://sulid.loc/');
            exit();
        }
    }
}

?>