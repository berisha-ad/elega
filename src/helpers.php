<?php

function inspect($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function inspectAndDie($value) {
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}

function basePath($path) {
    return __DIR__ . "/../" . $path;
}

function errorReporting() {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

function loadView($view, $data = []) {

    $viewPath = basePath("src/views/{$view}.php");
    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "{$view} not Found!";
    }
    
}

function shortenText($text, $wordCount) {
    // Text in Wörter aufteilen
    $words = explode(' ', $text);
    
    // Nur die ersten $anzahlWoerter behalten
    $shortendWords = array_slice($words, 0, $wordCount);
    
    // Wörter wieder zu einem String zusammenfügen
    $shortendText = implode(' ', $shortendWords);
    
    // Optional: "..." anhängen, falls Text gekürzt wurde
    if (count($words) > $wordCount) {
        $shortendText = $shortendText . '...';
    }
    
    return $shortendText;
}
