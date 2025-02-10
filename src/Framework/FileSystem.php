<?php

namespace Framework;

abstract class Filesystem {


    public static function createDirectory(string $dir) : bool {

        return mkdir($dir, 0755, true);
    }
 
    public static function createDateCodedPath( ?string $time = null ) : string {

        return date("Y/m", $time ?? time());
    }

    public static function moveUploadedFile($file, string $target_path) : bool {

        return move_uploaded_file($file['tmp_name'], $target_path);
    }

    public static function getUploadMaxFileSize() : string {

        return 2048;
    }

}