<?php
namespace MiApp\Helpers;

class Validator {
    public static function validateEmail($email) {
        $email = trim($email);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    public static function validatePassword($pass) {
        $trimpass = trim($pass);
        $patron = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[$%&!#]).{8,}$/';
    
        if (preg_match($patron, $trimpass)) {
            return true;
        } else {
            return false;
        }
    }
}