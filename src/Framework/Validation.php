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

    public static function passwordConfirm( string $password, string $passwordConfirm ): bool {
        
        $password = trim($password);
        $passwordConfirm = trim($passwordConfirm);
        
        return $password === $passwordConfirm;
    }
}