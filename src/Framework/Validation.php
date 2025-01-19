<?php


namespace Framework;
class Validation {


    public static function string( string $value, int $min = 1, int $max = INF): bool {
        if(is_string($value)){
            $value = trim($value);
            $length = strlen($value);
            return $length >= $min ?? $length <= $max;
        }
        return false;
        
    }

    public static function email( string $email): mixed {
        $value = trim($email);
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function match( mixed $value1, mixed $value2 ): bool {
        
        if(isset($value1)) {
            $value1 = trim($value1);
        }
        if(isset($value2)) {
            $value2 = trim($value2);
        }
        
        return $value1 === $value2;
    }

    public static function password($password) : bool {
        if (!preg_match('/[a-z]/', $password)) {
            return false;
        }
        
        // Uppercase
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }
        
        // mindestens eine Zahl
        if (!preg_match('/\d/', $password)) {
            return false;
        }
        
        // specialchar
        if (!preg_match('/[@$!%*?&.]/', $password)) {
            return false;
        }
        
        // >8
        if (strlen($password) < 8) {
            return false;
        }
        return true;
    }
}