<?php

namespace Framework;

use Exception;
use App\Controllers\Controller;

class Uploader {
    private static array $allowedExtensions = ['jpg', 'jpeg', 'png'];
    private static int $maxFileSize = 1 * 1024 * 1024; 

    public static function uploadFile(array $file): ?string {
        if (!isset($file['name']) || empty($file['name'])) {
            return null;
        }

        $fileName = basename($file['name']);
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($fileExt, self::$allowedExtensions)) {
            $errors['file'] = 'Nicht valider Datentyp -> Erlaubte Datentypen: ' . implode(' ', self::$allowedExtensions);
            Controller::loadView('createCar', [
                'errors' => $errors
            ]);
            exit;
        }

        if ($fileSize > self::$maxFileSize) {
            $errors['file'] = 'Die Datei ist zu groß! Maximale Größe beträgt ' . self::$maxFileSize/1000/1000 . "mb";
            Controller::loadView('createCar', [
                'errors' => $errors
            ]);
            exit;
        }

        $uploadDir = "uploads/" . date("Y") . "/" . date("m") . "/" . date("d") . "/";

        $targetDir = basePath("public/{$uploadDir}");
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $uniqueFileName = time() . '_' . $fileName; // Um Namenskonflikte zu vermeiden
        $targetPath = "{$targetDir}{$uniqueFileName}";

        if (!move_uploaded_file($fileTmp, $targetPath)) {
            throw new Exception("Fehler beim Hochladen der Datei!");
        }

        return "./{$uploadDir}{$uniqueFileName}";
    }
}