<?php

namespace App\Models;

use Framework\FileSystem;
use Framework\Database;

class UploadModel extends Model {

    const ALLOWED_MIME_TYPES = [ 'image/jpeg', 'image/png' ];

    public static function createImageUpload(array $file, array &$errors = []) : int|false {
        if (self::validateImageFile($file, $errors)) {

            return false;
        }
        
        $file_name = basename($file['name']);

        list(,,$mime_type) = getimagesize($file['tmp_name']);
        
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $relative_date_coded_path = '/uploads/' . FileSystem::createDateCodedPath();
        $date_coded_path = basePath("public/{$relative_date_coded_path}");

        $timestamped_file = str_replace( ".{$file_ext}", '-' . time() . ".{$file_ext}", $file_name );

        $upload_path ="{$date_coded_path}/{$timestamped_file}";

        if (!file_exists($date_coded_path) && !FileSystem::createDirectory($date_coded_path)) {
            
            $errors['directory'][] = sprintf(
                'Directory (%1$s) can not be created.',
                $date_coded_path
            );

            return false;
        }

        if (!FileSystem::moveUploadedFile($file, $upload_path)) {
            $errors['file'][] = sprintf(
                'File (%1$s) can not be moved.',
                $upload_path
            );

            return false;
        }

        $model = new self;

        $model->db->query(
            "INSERT INTO uploads (path, mime_type, size) VALUES (:path, :mime_type, :size);", 
            [
                'path' => $relative_date_coded_path . '/' . $timestamped_file,
                'mime_type' => $mime_type,
                'size' => $file['size']
            ]
        );

        return $model->db->conn->lastInsertId(); //TODO: Return real ID!
    }

    private static function validateImageFile(array $file, array &$errors) : bool {
        list($width,$height,$mime_type) = getimagesize($file['tmp_name']);
        
        if ( in_array($mime_type, static::ALLOWED_MIME_TYPES) ) {
            $errors['mime_type'][] = sprintf(
                'Mime type (%1$s) is not allowed.',
                $mime_type
            );
        }

        if ( $file['size'] > FileSystem::getUploadMaxFileSize() ) {
            $errors['file_size'][] = sprintf(
                'File size (%1$s) is not allowed.',
                $file['size']
            );
        }

        // validierung vervollständigen

        return empty($errors);
    }


}